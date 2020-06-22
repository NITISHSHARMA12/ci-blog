<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class PostController extends CI_Controller
{
	public function viewLoad($main ,$value=null)
	{
		$this->load->view('layout/header');
		$this->load->view($main ,$value);
		$this->load->view('layout/footer');
	}

	public function index()
	{	if($this->session->has_userdata('isUserLoggedIn')){
			$this->load->model('Post');
			$this->load->model('Category');
			$data['categories'] = $this->Category->get_category_data();
			$data['latests']=$this->Category->latest();
			$data['posts'] = $this->Post->get_posts();
			$this->viewLoad('posts/index',$data);
		}else{
			redirect(site_url());
		}
	}

	public function showPostForm()
	{	
		if($this->session->has_userdata('isUserLoggedIn')){

			$this->load->model('Category');
			$data['categories'] = $this->Category->get_category_data();
			$data['latests']=$this->Category->latest();
			$this->viewLoad('posts/create' ,$data);
		}else{
			redirect(site_url('/login'));
		}

	}

	public function createPost()
	{
		if($this->session->has_userdata('isUserLoggedIn')){
			
			$this->form_validation->set_rules('title', 'Title', 'required');
	        $this->form_validation->set_rules('description', 'Story', 'required|min_length[8]');

	        $postData=array(
	        	'title' => $this->input->post('title'),
	        	'category_id' => $this->input->post('category_id'),
	        	'description' => $this->input->post('description'),
	        	'user_id' => $this->session->user_id,
	        );
	        $this->load->library('Uuid');
			$id = $this->uuid->v4();
	        $id = str_replace('-', '', $id);
	        $this->db->set('uuid', $id, true);
	        if ($this->form_validation->run() == FALSE) {
	        	$this->showPostForm();
	        }else{
	        	$this->load->model('Post');
	        	$post=$this->Post->create($postData);
	        	if($post){
	        		redirect(site_url('view/post'));
	        	}
	        }

		}else{
			redirect(site_url('login'));
		}
	}


	public function delete($id)
	{
		$this->load->model('Post');
		$this->Post->deleteElement($id);
		redirect(site_url('view/post'));
	}
	
}