<?php

class user extends CI_Controller
{
	public function view($username = null)
	{
		if ($username != null) {
			$this->load->model('User_m');
			$User_Data = $this->User_m->GetUser_Profile($username);
			$User_Posts = $this->User_m->Get_user_posts($username);
			$this->data['User_Data'] = $User_Data;
			$this->data['User_Posts'] = $User_Posts;
			$this->data['page'] = 'profile/profile';
			$this->load->view('_layout_main', $this->data);
		} else {
			redirect('errors/404');
		}
	}
	public function follow($Username)
	{
		if(get_cookie('username'))
		{
			$this->load->model("User_m");
			$this->load->model("Notification_m");

			$Follower = $this->User_m->GetUser_Profile($Username)->id;
			$Following = $this->User_m->GetUser_Profile(get_cookie('username'))->id;
			if($Following)
			{
				$data = array(
					'follower' => $Follower,
					'following' => $Following
				);
				$Check_Data = $this->User_m->Check_Follow($Follower,$Following);
				if ($Check_Data==null) {
					$this->User_m->follow($data);
					$Message_Data=array(
						'context'=>"توسط ".get_cookie('username')." فالو شدی. ",
						'date'=>time()
					);
					$id=$this->Notification_m->Set_Message($Message_Data);
					$Notif_Data=array(
						'user_id'=>$Follower,
						'send_to'=>$Following,
						'notification_type'=>'4',
						'message_id'=>$id,
						'time'=>time(),
						'seen'=>'0'
					);
					$this->Notification_m->Send_Notification($Notif_Data);
				}
				else
				{
					$this->User_m->Un_Follow($Follower,$Following);
				}
			}
		}
		else
		{
			redirect('404/404.php');
		}
	}
	public function Check_Follow($Username)
	{
		$this->load->model("User_m");
		$Follower = $this->User_m->GetUser_Profile(get_cookie('username'))->id;
		$Following = $this->User_m->GetUser_Profile($Username)->id;
		$Check_Data = $this->User_m->Check_Follow($Follower,$Following);
		if ($Check_Data==null) {
			echo 'No Follow';
		}
		else
		{
			echo 'Followed';
		}
	}
}
