<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Comment extends CI_model
{
	public function create($commentData)
	{
		$this->db->insert('comments',$commentData);
		if ($this->db->affected_rows() > 0) {
            return true;
        }
		
	}

}