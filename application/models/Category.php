<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Category extends CI_model
{
	
	function __construct()
	{
		
	}
	public function viewLoad($main ,$value)
	{
		$this->load->view('layout/header');
		$this->load->view($main , $value);
		$this->load->view('layout/footer');
	}

	public function get_category_data()
	{
		$query= $this->db->get('categories');
		return $result=$query->result();

	}
	public function latest()
	{
		$query= $this->db->select('*')
			->from('categories')
			->join('posts', 'posts.category_id = categories.id')
            ->get();
            // var_dump($query->result());
        return $result=$query->result();
	}
	public function viewCategory($id)
	{
		$query=$this->db->select('*')
			->from('categories')
			->where('id',$id)
			->get();
		return $category=$query->result();

	}
}