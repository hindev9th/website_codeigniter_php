<?php
class Home extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->view("include/header");
		$this->load->view("include/menu-left");

	}

	public function index(){
		$this->load->view('home/home');
	}
}
?>
