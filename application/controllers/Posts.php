<?php
class posts extends CI_Controller
{
	public function index()
	{
		$this->data['posts']=$this->get_all_posts();
		$this->data['page']='posts/posts';
		$this->load->view('_layout_main',$this->data);
	}
	public function get_all_posts()
	{
		$this->load->model('Post_m');
		return $this->Post_m->get_all_posts();
	}
}
