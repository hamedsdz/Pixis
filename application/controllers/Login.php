<?php
class Login extends CI_Controller
{
	public function index()
	{
		if (get_cookie('username') == null) {
			$this->data['page'] = 'login/login';
			$this->load->view('_layout_main', $this->data);
		} else {
			redirect('dashboard');
		}
	}
	public function check_user()
	{
		$this->load->model('User_m');
		$user = $this->input->post("username");
		$pass = $this->hash($this->input->post("password"));
		$GetUser = $this->User_m->Login($user, $pass);
		if ($GetUser) {
			if ($GetUser->username == $user && $GetUser->password == $pass) {

				set_cookie('username', $user, 3600);
				set_cookie('password', $pass, 3600);
				redirect('Main/index');
			}
		} else {
			$this->data['message_danger'] = 'مشخصات وارد شده صحیح نیست.';
		}

		$this->data['page'] = 'login/login';
		$this->load->view('_layout_main', $this->data);
	}
	public function hash($String)
	{
		$Data = hash('sha256', $String);
		return $Data;
	}
	public function Logout()
	{
		delete_cookie('username');
		delete_cookie('password');
		redirect('Main');

	}
	public function Captcha()
	{
		$vals = array(
			'word'          => rand(111111, 999999),
			'img_path'      => './captcha/',
			'img_url'       => base_url("/captcha"),
			'font_path'     => './path/to/fonts/texb.ttf',
			'img_width'     => '150',
			'img_height'    => 30,
			'expiration'    => 7200,
			'word_length'   => 8,
			'font_size'     => 16,
			'img_id'        => 'Imageid',
			'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

			// White background and border, black text and red grid
			'colors'        	=> array(
				'background' 	=> array(255, 255, 255),
				'border' 		=> array(255, 255, 255),
				'text' 			=> array(0, 0, 0),
				'grid' 			=> array(0, 0, 255)
			)
		);

		$cap = create_captcha($vals);
		echo $cap['image'];
		echo ($vals['word']);
	}
	public function register()
	{
		$this->load->model('User_m');
		$name = $this->security->xss_clean($this->input->post('name'));
		$username = $this->security->xss_clean($this->input->post('username'));
		$password = $this->security->xss_clean($this->input->post('password'));
		if ($name != null && $username != null && $password != null) {
			$data = array(
				'name' => $name,
				'username' => $username,
				'password' => $this->hash($password),
				'role_id ' => '4',
				'profile_pic'=>'/assets/images/profiles/default.png',
				'public ' => '1',
			);
			$CheckData = $this->User_m->GetUser_Profile($username);
			if ($CheckData == null) {
				$this->User_m->register($data);
			} else {
				$this->data['message_danger'] = 'نام کاربری وارد شده از قبل وجود دارد!';
			}
		} else {
			$this->data['message_danger'] = 'لطفا مقادير ورودي را چک کنيد!';
		}
		$this->data['page'] = 'login/login';
		$this->load->view('_layout_main', $this->data);
	}
}
