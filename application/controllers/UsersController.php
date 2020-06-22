<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
// TODO: Use a bootstrap template
class UsersController extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('User');
	}
    
    public function viewLoad($main)
	{
		$this->load->view('layout/header');
		$this->load->view($main);
		$this->load->view('layout/footer');
	}

	public function index()
	{
		//TODO: break the view into partials
		if($this->session->has_userdata('isUserLoggedIn')){
    		redirect(site_url('user/profile'));
    	}else{
			$this->viewLoad('users/register');
			
    	}
    	
	}
	// TODO: rename this function to suitable value
	public function createUser()
	{

		$this->form_validation->set_rules('name', 'Username', 'required');
        $this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]',array('required' => 'Error Email is required','valid_email'=>'Invalid Email address'));
        $this->form_validation->set_rules('pwd', 'Password', 'required');
        $this->form_validation->set_rules('cpwd', 'Password Confirmation', 'required|matches[pwd]');
        // TODO: Seprate these validations into a function
		$userData = array(
			'name' => $this->input->post('name'),
			'email'=>$this->input->post('email'),
			'password' =>md5($this->input->post('pwd'))      
		);

		$this->load->library('Uuid');
		$id = $this->uuid->v4();
        $id = str_replace('-', '', $id);
        $this->db->set('uuid', $id, true);

		if($this->form_validation->run() == FALSE){
        	$this->viewLoad('users/register');
        }else{
			$user = $this->User->create($userData);
			if ($user == TRUE) {
				$data['register_msg'] = 'Registration Successfully !';
				redirect(site_url('login'));
			}}
			
	}
  
    public function showlogin()
    {
    	if($this->session->has_userdata('isUserLoggedIn')){
    		redirect(site_url('user/profile'));
    	}else{
			$this->viewLoad('users/login');
    		
    	}
    }

	public function login()
	{

		$this->form_validation->set_rules('email', 'email', 'required|valid_email',array('required' => 'Error Email is required','valid_email'=>'Invalid Email address'));
        $this->form_validation->set_rules('pwd', 'Password', 'required');

		$userData=array(
			'email' =>$this->input->post('email'),
			'password' => md5($this->input->post('pwd'))
		);

        if($this->form_validation->run() == FALSE){
        	$this->viewLoad('users/login');
        }
        else{
        	$userInfo =$this->User->checkLogin($userData);
        	
        	if (!$userInfo==FALSE) {
        		$session_data = array(
					'user_id' => $userInfo->user_id,
					'user_email' => $userInfo->email,
					'user_name' => $userInfo->name,
				);
				$this->session->set_userdata($session_data);
				$this->session->set_userdata('isUserLoggedIn',TRUE);
 
        		redirect(site_url('user/profile'));
        	}else{
        		redirect(site_url('login'));
        	}
        }
	
	}

	public function profile()
	{
		if($this->session->isUserLoggedIn){
			$this->viewLoad('users/profile');
		}else{
			redirect(base_url('login'));
		}
		
	}

	public function logout(){
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }

}