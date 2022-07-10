<?php
class Home extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->view("admin/include/header");
		$this->load->view("admin/include/menu-left");

	}

	public function index(){
		if ($this->session->has_userdata('admin')){
			$id = $this->session->userdata('admin');
			$query['data'] = $this->Home_model->getData($id['id']);
			$this->load->view('admin/home',$query);
		}else{
			header("Location:".base_url()."admin/login");
		}
	}

	public function logOut()
	{
		if ($this->session->has_userdata('admin')) {
			$this->session->unset_userdata('admin');
			header("Location:".base_url()."admin/login");
		}
	}
}
?>
