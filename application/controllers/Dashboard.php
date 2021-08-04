<?php

class dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}


	public function index($Page = null)
	{
		if($Page!=null)
		{
			if (get_cookie('username') != null) {
				$user = get_cookie('username');
				$pass = get_cookie('password');
				$this->load->model('User_m');
				$this->load->model('Notification_m');
				$this->data['user_info'] = $this->User_m->Userinfo($user, $pass);
				$this->data['Posts'] = $this->User_m->Userinfo($user, $pass);
				$this->data['User_Profile'] = $this->User_m->GetUser_Profile($user);
				$this->data['Notification'] = $this->Notification_m->Get_User_Notif($this->User_m->GetUser_Profile($user)->id);
				$this->data['User_Posts'] = $this->Get_User_Posts($user);
				if ($Page) {
					$this->data['dashboard_page'] = 'dashboard/' . $Page ;
				}
				else
				{
					$this->data['dashboard_page']='null';
				}
				$this->data['page'] = 'dashboard/index';
				$this->load->view('_layout_main', $this->data);
			} else {
				redirect('Login/index');
			}
		}
		else
		{
			redirect('dashboard/page/addPost');
		}

	}

	public function page($page = null)
	{
		if (get_cookie('username') != null) {
			$this->index($page);
		} else {
			redirect('Login');
		}
	}
	public function Change_pass()
	{
		$this->load->model('User_m');
		$Username=get_cookie('username');
		$Old_Pass=hash('sha256',$this->security->xss_clean($this->input->post('OldPass')));
		$data=$this->User_m->Userinfo($Username,$Old_Pass);
		if($data)
		{
			$New_Pass=$this->security->xss_clean($this->input->post('NewPass'));
			$this->User_m->Change_Pass($Username,hash('sha256',$New_Pass));
			$this->data['Message'] = 'رمز عبور شما با موفقیت تغییر یافت!';
		}
		else
		{
			$this->data['Message'] = 'مشخصات وارد شده صحیح نیست.';
		}
		$this->data['page'] = 'dashboard/page/editPass';
		$this->load->view('_layout_main', $this->data);
	}
	public function edit_user_info()
	{
		$this->load->model('User_m');
		$username=get_cookie('username');
		$bio=$this->input->post('bio');
		$profile_pic=$this->input->post('profile_pic');
		$birthday=$this->input->post('birthdate');
		$Data=array(
			'bio'=>$bio,
			'profile_pic'=>$profile_pic,
			'birthdate'=>$birthday,
		);
		$this->User_m->Update_Info($Data,$username);
	}
	public function Delete_Account()
	{
		$username=get_cookie('username');
		$this->load->model("User_m");
		$Data=array(
			'username'=>$username
		);
		$this->User_m->Delete_User($Data);
		delete_cookie('username');
		delete_cookie('password');
	}
	public function Get_User_Posts($username=null)
	{
		$this->load->model('Post_m');
		$Posts_Data=$this->Post_m->GetUserPosts($username);
		return $Posts_Data;
	}
	public function SaveProfile()
	{
		$config['upload_path'] = './assets/images/profiles/';
		$config['file_name'] = 'sth'.time();
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size'] = 5120;
		$config['overwrite'] = TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		if(!$this->upload->do_upload('ProfileImage')){
			echo $this->upload->display_errors();
		} else {
			$w = $this->upload->data();
			$data = array(
				'profile_pic' => 'assets/images/profiles/'.$w['file_name'],
			);
			echo 'success';
		}
	}
	public function Update_Profile()
	{
		$this->load->model('User_m');
		$id=$this->User_m->GetUser_Profile(get_cookie('username'))->id;
		$Name=$this->input->post('Name');
		$Birthdate=$this->input->post('Birthdate');
		$Bio=$this->input->post('Bio');
		$Data=array(
			'name'=>$Name,
			'birthdate'=>$Birthdate,
			'bio'=>$Bio
		);
		$this->User_m->Update_Profile($Data,$id);
	}

}
