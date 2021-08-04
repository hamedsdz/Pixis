<?php

class Post_m extends CI_Model
{
	public function get_all_posts_Count()
	{
		$this->load->database();
		$prefix = $this->db->dbprefix;
		return $this->db->count_all("{$prefix}post_info");
	}
	public function popular_post()
	{
		$this->load->database();
		$prefix = $this->db->dbprefix;
		$this->db->select('*');
		$this->db->order_by('likes', 'DESC');
		$this->db->from("{$prefix}post_info");
		$this->db->limit('5');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_post($id = '')
	{
		$this->load->database();
		$prefix = $this->db->dbprefix;
		$this->db->select('*');
		$this->db->from("{$prefix}post_info");
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->row();
	}
	public function get_all_posts()
	{
		$this->load->database();
		$prefix = $this->db->dbprefix;
		$this->db->select('*');
		$this->db->from("{$prefix}post_info");
		$this->db->limit('200');
		$query = $this->db->get();
		return $query->result();
	}
	public function Add_Post($Data = array())
	{
		$this->load->database();
		$prefix = $this->db->dbprefix;
		$this->db->insert("{$prefix}post", $Data);
	}
	//Get Post For 1 User
	public function GetUserPosts($username = null)
	{
		$this->load->database();
		$prefix = $this->db->dbprefix;
		$this->db->select('*');
		$this->db->from("{$prefix}post_info");
		$this->db->where('username', $username);
		$query = $this->db->get();
		return $query->result();
	}
	// Update Post
	public function Update_Post($id, $Data = array())
	{
		$this->load->database();
		$prefix = $this->db->dbprefix;
		$this->db->where('id', $id);
		$this->db->update("{$prefix}post_info", $Data);
	}
	public function Like($Data)
	{
		$this->load->database();
		$Prefix = $this->db->dbprefix;
		$this->db->insert("{$Prefix}likes", $Data);
	}
	public function Un_Like($Data)
	{
		$this->load->database();
		$Prefix = $this->db->dbprefix;
		$this->db->delete("{$Prefix}likes",$Data);
	}
	public function Check_Like($User_id=null,$Post_id=null)
	{
		$this->load->database();
		$prefix=$this->db->dbprefix;
		$this->db->select('*');
		$this->db->from("{$prefix}likes");
		$this->db->where('post_id',$Post_id);
		$this->db->where('user_id',$User_id);
		$query=$this->db->get();
		return $query->row();
	}
	public function Send_Comment($Data=null)
	{
		$this->load->database();
		$Prefix=$this->db->dbprefix;
		$this->db->insert("{$Prefix}comments",$Data);

	}
	public function Get_Comments($Post_Id)
	{
		$this->load->database();
		$Prefix=$this->db->dbprefix;
		$this->db->select('*');
		$this->db->where("post_id",$Post_Id);
		$this->db->from("{$Prefix}comments");
		$query=$this->db->get();
		return $query->result();
	}
}
