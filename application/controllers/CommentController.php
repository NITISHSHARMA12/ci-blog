<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class CommentController extends CI_Controller
{
	public function viewLoad($main ,$value=null)
	{
		$this->load->view('layout/header');
		$this->load->view($main ,$value);
		$this->load->view('layout/footer');
	}

	public function submitComment()
	{
		if($this->session->has_userdata('isUserLoggedIn')){
			$this->form_validation->set_rules('comment','Comment', 'required');
			$commentData=array(
				'comment' => $this->input->post('comment'),
				'post_id'=>$this->input->post('post_id'),
				'user_id' => $this->session->user_id,
			);
			if ($this->form_validation->run() == FALSE) {
				$this->viewLoad('index');
			}else{
				$this->load->model('Comment');
				$this->Comment->create($commentData);
				redirect(base_url());
			}
		}else{
			redirect('login');
		}
	}
}


