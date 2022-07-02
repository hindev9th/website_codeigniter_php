<?php

class News extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view("include/header");
		$this->load->view("include/menu-left");

		$query['data'] = $this->News_model->getData();
		$this->load->view('admin/news/news',$query);
	}

	public function read($id)
	{
		$this->load->view("include/header");
		$this->load->view("include/menu-left");

		$query['data'] = $this->News_model->read($id);
		$this->load->view('admin/news/read',$query);
	}
	public function add()
	{
		$this->load->view("include/header");
		$this->load->view("include/menu-left");

		$this->load->view('admin/news/add');
	}

	public function save()
	{
		$id = $this->input->post('id');
		$id_user = $this->input->post('id_user');
		$tieu_de = $this->input->post('tieu_de');
		$noi_dung = $this->input->post('noi_dung');
		$anh =  $this->input->post('anh');

		if (empty($id)){
			$this->News_model->insert($id_user,$tieu_de,$noi_dung,$anh);
			header("Location:" .base_url().'admin/news');
		}else{

		}

	}
}
