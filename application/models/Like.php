<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Like extends CI_model
{
	public function create($data)
	{
		$this->db->select('*');
        $this->db->where('user_id', $data['user_id'])->where('post_id',$data['post_id']);
        $query = $this->db->get('likes');
        $num_rows = $query->num_rows();
        if($num_rows){
			redirect(base_url());
		}else{
			$this->db->insert('likes',$data);
	        if ($this->db->affected_rows() > 0) {
	            return true;
	        }else{
	        	redirect(base_url());
	        }
			
		}

	}

	
}