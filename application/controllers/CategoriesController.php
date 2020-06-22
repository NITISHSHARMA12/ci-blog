<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class CategoriesController extends CI_Controller
{
	public function viewLoad($main ,$value = NULL)
	{
		$this->load->view('layout/header');
		$this->load->view($main , $value);
		$this->load->view('layout/footer');
	}
	public function view($id)
	{
		$this->load->model('Category');
		$data['categories']=$this->Category->viewCategory($id);
		// var_dump($data['categories']);
		$this->viewLoad('posts/view',$data);
	}
	
}