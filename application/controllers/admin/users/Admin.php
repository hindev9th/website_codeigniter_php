<?php

class Admin extends CI_Controller
{
	protected $header_top = "admin/include/header";
	protected $menu_left = "admin/include/menu-left";


	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view($this->header_top);
		$this->load->view($this->menu_left);

		$query['count'] = $this->Admin_model->getCount();
		$query['data'] = $this->Admin_model->getData();
		$this->load->view("admin/users/admin/admin",$query);
	}
	public function search(){
		$search = $this->input->post('search');
		$max_data = $this->input->post('max_data') == 0 ? 20 : $this->input->post('max_data');

		$query['count'] = count($this->Admin_model->search($search,$max_data));
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
		$anh = $this->input->post('anh');
		if (isset($_FILES['img_avt']['name'])  && !empty($_FILES['img_avt']['name'])){
			$anh = time().$_FILES['img_avt']['name'];

			move_uploaded_file($_FILES['img_avt']['tmp_name'] , "./pub/upload/img/avt/".time().$_FILES['img_avt']['name']);
		}

		if (empty($id)){
			$this->Admin_model->insert($ho_ten,$gioi_tinh,$ngay_sinh,$email,$sdt,$username,$password,$anh);
			header("Location:".base_url()."admin/users/admin");

		}else{
			$this->Admin_model->update($id,$ho_ten,$gioi_tinh,$ngay_sinh,$email,$sdt,$username,$password,$anh);

			header("Location:".base_url()."admin/users/admin");

		}
	}

	public function delete($id){
		if($this->Admin_model->delete($id)){
			header("Location:".base_url()."admin/users/admin");
		}else{

		}
	}
}
