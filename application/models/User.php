<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class User extends CI_model
{
	
	function __construct()
	{
		
	}

	public function create($userdata)
	{
		$this->db->insert('users',$userdata);
        if ($this->db->affected_rows() > 0) {
            return true;
        }
	}


    public function checkLogin($userdata)
    {
        // $this->load->library('password');       
        $this->db->select('*');
        $this->db->where('email', $userdata['email'])->where('password',$userdata['password']);
        $query = $this->db->get('users');
        $num_rows = $query->num_rows();
        
        if($num_rows){
        	$userInfo = $query->first_row();
            return $userInfo;

        }else{
            return false;
        }

    }
	
	public function userData()
	{
		$query= $this->db->get('users');
        $users=$query->row();
		return $users;
	}
}