<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class LikeController extends CI_Controller
{
	
	public function saveLike()
	{
		if($this->session->has_userdata('isUserLoggedIn')){
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'post_id'=>$this->input->post('post_id'),     
			);

			$this->load->model('Like');
			$likes = $this->Like->create($data);
			if ($likes == TRUE) {
				redirect(base_url());
			}else{
				echo "string";
			}
			
		}else{
			redirect('login');
		}
	}
	
}