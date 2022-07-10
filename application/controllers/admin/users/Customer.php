<?php

class Customer extends CI_Controller
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

		$query['count'] = $this->Customer_model->getCount();
		$query['data'] = $this->Customer_model->getData();
		$this->load->view("admin/users/customer/customer",$query);
	}
	public function search(){
		$search = $this->input->post('search');
		$max_data = $this->input->post('max_data') == 0 ? 20 : $this->input->post('max_data');

		$query['count'] = $this->Customer_model->getCount();
		$query['data'] = $this->Customer_model->search($search,$max_data);
		$this->load->view('admin/users/customer/table',$query);
	}
	public function add(){
		$this->load->view($this->header_top);
		$this->load->view($this->menu_left);

		$this->load->view("admin/users/customer/add");
	}
	public function edit($id){
		$this->load->view($this->header_top);
		$this->load->view($this->menu_left);

		$query['data'] = $this->Customer_model->edit($id);

		$this->load->view("admin/users/customer/add",$query);
	}
	public function save(){
		$id = $this->input->post('id');
		$ho_ten = $this->input->post('ho_ten');
		$gioi_tinh = $this->input->post('gioi_tinh');
		$ngay_sinh = $this->input->post('ngay_sinh');
		$sdt = $this->input->post('sdt');
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$dia_chi = $this->input->post('dia_chi');
		$anh = $this->input->post('anh');
		if (isset($_FILES['img_avt']['name'])  && !empty($_FILES['img_avt']['name'])){
			$anh = time().$_FILES['img_avt']['name'];

			move_uploaded_file($_FILES['img_avt']['tmp_name'] , base_url()."pub/upload/img/avt".time().$_FILES['img_avt']['name']);
		}

		if (empty($id)){
			$this->Customer_model->insert($ho_ten,$gioi_tinh,$ngay_sinh,$sdt,$email,$password,$dia_chi,$anh);
			header("Location:".base_url()."admin/users/customer");

		}else{
			$this->Customer_model->update($id,$ho_ten,$gioi_tinh,$ngay_sinh,$sdt,$email,$password,$dia_chi,$anh);

			header("Location:".base_url()."admin/users/customer");

		}
	}

	public function delete($id){
		if($this->Customer_model->delete($id)){
			header("Location:".base_url()."admin/users/customer");
		}else{

		}
	}
}
