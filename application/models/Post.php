<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Post extends CI_model
{

	public function create($postData)
	{
		$this->db->insert('posts',$postData);
		if ($this->db->affected_rows() > 0) {
            return true;
        }
	}

	public function get_posts()
	{	
		$query= $this->db->select('*')
        	->where('user_id', $this->session->user_id)
        	->get('posts');
		return $result=$query->result();
	}
	public function getAll()
	{
		$query = $this->db->select('*')
          	->from('posts`')
          	->join('users', 'users.user_id = posts.user_id')
          	->order_by('id',"desc")
          	->get();
          	$post=$query->result();
          	foreach ($post as $key => $value) {
          		$count = 0;
          		$max = 4;
          		$self = false;
          		$like_details = array();
              $comment_query = $this->db->select('*')
                                    ->from('comments')
                                    ->join('users','users.user_id =comments.user_id')
                                    ->where('post_id',$value->id);
              $comments=$comment_query->get()->result();
          		$query=$this->db->start_cache()->select('*')
			          		->from('likes')
			          		->join('users','users.user_id=likes.user_id')
			          		->where('likes.post_id',$value->id)->stop_cache();
          		if(isset($this->session->user_id)){
          			$self_query = $query->where('users.user_id',$this->session->user_id);
          			$self_res = $self_query->get()->num_rows();
          			if($self_res>0){
          				array_push($like_details,"You");
          				$count++;
          				$self = true;
          			}

          			$query = $query->start_cache()->where_not_in('users.user_id',$this->session->user_id)->stop_cache();
          		}
	          	$num_of_likes = $query->get()->num_rows();
	          	if($num_of_likes > ($max-$count)){
          			$get_num_likes = $max-$count-1;
	          	}
	          	else{
	          		$get_num_likes = $max-$count;
	          	}
          		$final_query = $query->limit($get_num_likes);
          		$name_res = $final_query->get()->result();
          		//echo $this->db->last_query()." ".count($like_details);

          		foreach ($name_res as $name_key => $name_value) {
          			array_push($like_details,$name_value->name);
          		}
          		//echo $this->db->last_query();
          		if($num_of_likes > ($max-$count)){
          			$others = $num_of_likes-count($like_details);
          			if($self){
		          		$others++;
		          	}
		          	array_push($like_details,$others." others");
	          	}
	          	$final_size = count($like_details);
          		$form_str = array_splice($like_details,0,$final_size-1);
          		if($final_size>1)
          			$like_str = implode(", ",$form_str)." and ".$like_details[0]." liked this";
          		else if($final_size==1)
          			$like_str = $like_details[0]." liked this";
              else
                $like_str = "";
              // var_dump($like_str);
              $post[$key]->like_str=$like_str;
              $post[$key]->comments=$comments;
          		$post[$key]->self=$self;
          		$this->db->flush_cache();
          	}
          	// var_dump($post);
        return $post;
	}

	public function deleteElement($id)
	{
		$this->db->where('id', $id);
      $this->db->delete('posts');
      if ($this->db->affected_rows() > 0) {
          return true;
      }
	}
}
	