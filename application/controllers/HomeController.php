<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class HomeController extends CI_Controller
{
	public function viewLoad($main ,$value = NULL)
	{
		$this->load->view('layout/header');
		$this->load->view($main , $value);
		$this->load->view('layout/footer');
	}
	public function index()
	{
		$this->load->model('Category');
		$this->load->model('Post');
		$this->load->model('Comment');
		$this->load->model('Like');
		$data['categories'] = $this->Category->get_category_data();
		$data['latests']=$this->Category->latest();
		$data['posts'] = $this->Post->getAll();
		// var_dump($data['categories']);
		$this->viewLoad('index',$data);

	}
	public function test()
	{
		$this->viewLoad('test');
	}
}