<?php

class Admin extends CI_Controller
{
	protected $header_top = "include/header";
	protected $menu_left = "include/menu-left";


	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view($this->header_top);
		$this->load->view($this->menu_left);

		$query['count'] = $this->Admin_model->getCount();
		$query['data'] = $this->Admin_model->getData();
		$this->load->view("admin/users/admin/users/admin",$query);
	}
	public function search(){
		$search = $this->input->post('search');
		$max_data = $this->input->post('max_data') == 0 ? 20 : $this->input->post('max_data');

		$query['count'] = $this->Admin_model->getCount();
		$query['data'] = $this->Admin_model->search($search,$max_data);
		$this->load->view('admin/users/admin/table',$query);
	}
	public function add(){
		$this->load->view($this->header_top);
		$this->load->view($this->menu_left);

		$this->load->view("admin/users/admin/add");
	}
	public function edit($id){
		$this->load->view($this->header_top);
		$this->load->view($this->menu_left);

		$query['data'] = $this->Admin_model->edit($id);

		$this->load->view("admin/users/admin/add",$query);
	}
	public function save(){
		$id = $this->input->post('id');
		$ho_ten = $this->input->post('ho_ten');
		$gioi_tinh = $this->input->post('gioi_tinh');
		$ngay_sinh = $this->input->post('ngay_sinh');
		$email = $this->input->post('email');
		$sdt = $this->input->post('sdt');
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		if (empty($id)){
			$this->Admin_model->insert($ma_dm,$ten_dm);
			header("Location:".base_url()."index.php/admin/users/admin");

		}else{
			$this->Admin_model->update($id,$ma_dm,$ten_dm);

			header("Location:".base_url()."index.php/admin/users/admin");

		}
	}

	public function delete($id){
		if($this->Admin_model->delete($id)){
			header("Location:".base_url()."index.php/admin/users/admin");
		}else{

		}
	}
}
