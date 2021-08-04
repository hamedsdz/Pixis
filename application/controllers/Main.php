<?php
class Main extends CI_Controller
{
	public function post_popular()
	{
		$this->load->model('Post_m');
		return $this->Post_m->popular_post();
	}
	public function users_popular()
	{
		$this->load->model('User_m');
		return $this->User_m->users_popular();
	}


	public function index()
	{
		$this->data['Count']=$this->Count();
		$this->data['popular_post']=$this->post_popular();
		$this->data['users_popular']=$this->users_popular();
		$this->data['page']='home';
		$this->load->view('_layout_main',$this->data);
	}


	public function Count()
	{
		$this->load->model('Post_m');
		$this->load->model('User_m');

		$Posts = $this->Post_m->get_all_posts();
		$Users = $this->User_m->get_all_users();
		$Count = array(
			'Users' => $Users,
			'Posts' => $Posts
		);
		return $Count;
	}
}

