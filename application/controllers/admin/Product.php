<?php
class Product extends CI_Controller{


	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view("include/header");
		$this->load->view("include/menu-left");

		$query['count'] = $this->Product_model->getCount();
		$query['data'] = $this->Product_model->getData();
		$this->load->view("admin/product/product",$query);
	}
	public function search(){
		$search = $this->input->post('search');
		$max_data = $this->input->post('max_data') == 0 ? 20 : $this->input->post('max_data');
		$query['data'] = $this->Product_model->search($search,$max_data);
		$this->load->view('admin/product/table',$query);
	}
	public function add(){
		$this->load->view("include/header");
		$this->load->view("include/menu-left");

		$query['thuongHieu'] = $this->Product_model->getThuongHieu();
		$query['danhMuc'] = $this->Product_model->getDanhMuc();
		$this->load->view("admin/product/add",$query);
	}
	public function edit($id){
		$this->load->view("include/header");
		$this->load->view("include/menu-left");

		$query['data'] = $this->Product_model->edit($id);

		$this->load->view("admin/product/add",$query);
	}
	public function save(){
		$id = $this->input->post('id');
		$ma_dm = $this->input->post('ma_dm');
		$ten_dm = $this->input->post('ten_dm');

		if (empty($id)){
			if($this->Product_model->insert($ma_dm,$ten_dm)){
				header("Location:".base_url()."index.php/admin/product");
			}else{

			}
		}else{
			$this->Product_model->update($id,$ma_dm,$ten_dm);

			header("Location:".base_url()."index.php/admin/product");

		}
	}

	public function delete($id){
		if($this->Product_model->delete($id)){
			header("Location:".base_url()."index.php/admin/product");
		}else{

		}
	}
}
?>
