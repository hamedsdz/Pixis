<?php

class Notification_m extends CI_Model
{
	public function Send_Notification($Data)
	{
		$this->load->database();
		$prefix=$this->db->dbprefix;
		$this->db->insert("{$prefix}notifications",$Data);
	}
	public function Set_Message($Data)
	{
		$this->load->database();
		$prefix=$this->db->dbprefix;
		$this->db->insert("{$prefix}messages",$Data);
		$id = $this->db->insert_id();
		return $id;
	}
	public function Check_Notification($User_id)
	{
		$this->db->database();
		$prefix=$this->db->dbprefix;
		$this->db->select('*');
		$this->db->from("{$prefix}notifications");
		$this->db->where('user_id',$User_id);
		$query=$this->db->get();
		return $query->result();
	}
	public function Get_User_Notif($User_id=null)
	{
		$this->load->database();
		$Prefix=$this->db->dbprefix;
		$this->db->select('*');
		$this->db->from("{$Prefix}notification_info");
		$this->db->where('ReceiverId',$User_id);
		$query=$this->db->get();
		return $query->result();
	}
}
