<?php

class Chat_m extends CI_Model
{
	public function Send($Data=array())
	{
		$this->load->database();
		$prefix=$this->db->dbprefix;
		$this->db->insert("{$prefix}Chat",$Data);
	}
	public function Get($User_Id=null,$Date=null)
	{
		$this->load->database();
		$prefix=$this->db->dbprefix;
		$this->db->select('*');
		$this->db->from('');

	}
}
