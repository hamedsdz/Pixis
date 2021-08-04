<?php

class chat extends CI_Controller
{
	public function index()
	{
		redirect(base_url('Dashboard/page/adminChat'));
	}
	public function user()
	{
		redirect(base_url('Dashboard/page/userChat'));
	}
}
