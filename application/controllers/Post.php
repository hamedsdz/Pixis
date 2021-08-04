<?php

class post extends CI_Controller
{
	public function index($post_id = '')
	{
		$this->load->model('Post_m');
		$this->load->model('User_m');
		$this->data['Post_Data'] = $this->Post_m->get_post($post_id);
		$this->data['User_Data'] = $this->User_m->GetUser_Profile($this->data['Post_Data']->username);
		if(get_cookie('username'))
		{
			$this->data['Check_Like'] = $this->Post_m->Check_Like(($this->User_m->GetUser_Profile(get_cookie('username'))->id), $post_id);
		}
		else
		{
			$this->data['Check_Like'] ='';
		}
		$this->data['Comments'] = $this->Post_m->Get_Comments($post_id);
		if ($this->data['Post_Data']) {
			$this->data['page'] = 'posts/post';
			$this->load->view('_layout_main', $this->data);
		} else {
			redirect('Main');
		}


	}

	public function Add_post()
	{
		$this->load->model('Post_m');
		$this->load->model('User_m');
		$Post_Title = $this->input->post('PostTitle');
		$Post_Context = $this->input->post('PostContent');
		$Date = $this->input->post('Date');
		$User_data = $this->User_m->GetUser_Profile(get_cookie('username'));
		$Data = array(
			'publisher_id' => $User_data->id,
			'title' => $Post_Title,
			'context' => $Post_Context,
			'date' => $Date,
			'publish' => '1',
		);
		$this->Post_m->Add_Post($Data);
	}

	public function Get_Post_User_Login($Post_id)
	{
		$this->load->model('Post_m');
		$this->load->model('User_m');
		$Post = $this->Post_m->get_post($Post_id);
		$UserData = $this->User_m->GetUser_Profile(get_cookie('username'))->id;
		if ($Post->username == get_cookie('username')) {
			echo $Post->title . '◄►' . $Post->context;
		} else {
			echo 'error';
		}
	}

	public function Edit_post()
	{
		$this->load->model('Post_m');
		$Id = $this->input->post('id');
		$Title = $this->input->post('title');
		$Context = $this->input->post('context');
		$Data = array(
			'title' => $Title,
			'context' => $Context
		);
		$this->Post_m->Update_Post($Id, $Data);
	}

	public function Like($Post_id)
	{
		$this->load->model("Post_m");
		$Username = get_cookie('username');
		if ($Username) {
			$Data = array(
				'post_id' => $Post_id,
				'user_id' => $Username
			);
			$this->Post_m->Like($Data);
		}
		else
		{
			redirect('404/404.php');
		}
	}

	public function Check_Like($user_Id = null, $Post_id = null)
	{
		$this->load->model("Post_m");
		$Check = $this->Post_m->Check_Like($user_Id, $Post_id);
		$Data = array(
			'post_id' => $Post_id,
			'user_id' => $user_Id
		);
		if ($Check == null) {

			$this->Post_m->Like($Data);
		} else {
			$this->Post_m->Un_Like($Data);
		}
	}

	public function Send_Comment()
	{
		$this->load->helper('uri');
		$this->load->model("Post_m");
		$this->load->model("User_m");
		$Post_id=$this->input->post('PostId');
		$Comment_Text=$this->input->post('PostContent');
		$User_Id=$this->User_m->GetUser_Profile(get_cookie('username'))->id;
		$Data_Comment=array(
			'post_id'=>$Post_id,
			'user_id'=>$User_Id,
			'context'=>$Comment_Text
		);
		$this->Post_m->Send_Comment($Data_Comment);
	}
}
