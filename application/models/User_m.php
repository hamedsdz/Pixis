<?php

class User_m extends CI_Model
{
	public function Login($user = null,$pass=null)
	{
		$this->load->database();
		$prefix = $this->db->dbprefix;
		$this->db->select('username,password');
		$this->db->from("{$prefix}users");
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		$query = $this->db->get();
		return $query->row();
	}
	public function Userinfo($user=null,$pass=null)
	{
		$this->load->database();
		$prefix=$this->db->dbprefix;
		$this->db->select('*');
		$this->db->from("{$prefix}users");
		$this->db->where('username',$user);
		$this->db->where('password',$pass);
		$query=$this->db->get();
		return $query->row();
	}
	public function GetUser_Profile($username=null)
	{
		$this->load->database();
		$prefix=$this->db->dbprefix;
		$this->db->select('*');
		$this->db->from("{$prefix}user_info");
		$this->db->where('username',$username);
		$query=$this->db->get();
		return $query->row();
	}
	public function register($data = array())
	{
		$this->load->database();
		$prefix = $this->db->dbprefix;
		$this->load->database();
		$this->db->insert("{$prefix}users", $data);

	}
	public function get_all_users()
	{
		$this->load->database();
		$prefix = $this->db->dbprefix;
		return $this->db->count_all("{$prefix}users");
	}
	public function users_popular()
	{
		$this->load->database();
		$prefix = $this->db->dbprefix;
		$this->db->select('username,profile_pic,followers');
		$this->db->order_by('followers', 'DESC');
		$this->db->from("{$prefix}user_info");
		$this->db->limit('10');
		$query = $this->db->get();
		return $query->result();

	}
	public function Change_Pass($username,$Pass)
	{
		$this->load->database();
		$prefix=$this->db->dbprefix;
		$this->db->where('username',$username);
		$Data=array(
			'password'=>$Pass
		);
		$this->db->update("{$prefix}users",$Data);
	}
	public function Update_Info($Data=null,$username=null)
	{
		$this->load->database();
		$prefix=$this->db->dbprefix;
		$this->db->where('username',$username);
		$this->db->update("{$prefix}users",$Data);
	}
	public function Get_user_posts($username=null)
	{
		$this->load->database();
		$prefix=$this->db->dbprefix;
		$this->db->select('*');
		$this->db->from("{$prefix}post_info");
		$this->db->where('username',$username);
		$query=$this->db->get();
		return $query->result();
	}
	public function Get_Notifications()
	{
		$this->load->database();
		$prefix=$this->db->dbprefix;
		$this->db->select('*');
		$this->db->from("{$prefix}notification_info");
		$query=$this->db->get();
		return $query->result();
	}
	public function Delete_User($Data)
	{
		$this->load->database();
		$prefix=$this->db->dbprefix;
		$this->db->delete("{$prefix}users",$Data);
	}
	public function follow($Data=null)
	{
		$this->load->database();
		$prefix=$this->db->dbprefix;
		$this->db->insert("{$prefix}followers",$Data);
	}
	public function Check_Follow($follower=null,$following=null)
	{
		$this->load->database();
		$prefix=$this->db->dbprefix;
		$this->db->select('*');
		$this->db->from("{$prefix}followers");
		$this->db->where('follower',$follower);
		$this->db->where('following',$following);
		$query=$this->db->get();
		return $query->row();
	}
	public function Update_Profile($Data,$id=null)
	{
		$this->load->database();
		$Prefix=$this->db->dbprefix;
		$this->db->set($Data);
		$this->db->where('id',$id);
		$this->db->update("{$Prefix}users");

	}
	public function Un_Follow($Follower=null,$Following=null)
	{
		$this->load->database();
		$Prefix=$this->db->dbprefix;
		$this->db->where('follower',$Follower);
		$this->db->where('following',$Following);
		$this->db->delete("{$Prefix}followers");
	}
}
