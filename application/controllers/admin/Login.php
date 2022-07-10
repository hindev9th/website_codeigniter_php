<?php
class Login extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view('admin/login');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = $this->Home_model->login($username,md5($password));
		if (!empty($data)){

			$data = array(
				'id' => $data->id,
				'ho_ten' => $data->ho_ten,
				'email' => $data->email,
				'anh' => $data->anh
			);
			$this->session->set_userdata("admin", $data);
		}
		header("Location:".base_url()."admin/home");
	}
}
?>
