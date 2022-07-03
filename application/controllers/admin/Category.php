<?php
class Category extends CI_Controller{

	protected $header_top = "include/header";
	protected $menu_left = "include/menu-left";


	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view($this->header_top);
		$this->load->view($this->menu_left);

		$query['count'] = $this->Category_model->getCount();
		$query['data'] = $this->Category_model->getData();
		$this->load->view("admin/category/category",$query);
	}
	public function search(){
		$search = $this->input->post('search');
		$max_data = $this->input->post('max_data') == 0 ? 20 : $this->input->post('max_data');

		$query['count'] = $this->Category_model->getCount();
		$query['data'] = $this->Category_model->search($search,$max_data);
		$this->load->view('admin/category/table',$query);
	}
	public function add(){
		$this->load->view($this->header_top);
		$this->load->view($this->menu_left);

		$this->load->view("admin/category/add");
	}
	public function edit($id){
		$this->load->view($this->header_top);
		$this->load->view($this->menu_left);

		$query['data'] = $this->Category_model->edit($id);

		$this->load->view("admin/category/add",$query);
	}
	public function save(){
		$id = $this->input->post('id');
		$ma_dm = $this->input->post('ma_dm');
		$ten_dm = $this->input->post('ten_dm');

		if (empty($id)){
			$this->Category_model->insert($ma_dm,$ten_dm);
			header("Location:".base_url()."index.php/admin/category");

		}else{
			$this->Category_model->update($id,$ma_dm,$ten_dm);

			header("Location:".base_url()."index.php/admin/category");

		}
	}

	public function delete($id){
		if($this->Category_model->delete($id)){
			header("Location:".base_url()."index.php/admin/category");
		}else{

		}
	}
}
?>
