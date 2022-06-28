<?php
class Category extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->view("include/header");
		$this->load->view("include/menu-left");
	}

	public function index(){
		$query['data'] = $this->Category_model->getData();
		$this->load->view("category/category",$query);
	}
	public function search(){
		$search = $this->input->post('search');
		$max_data = $this->input->post('max_data') == 0 ? 25 : $this->input->post('max_data');
		$query['data'] = $this->Category_model->search($search,$max_data);
		$this->load->view('category/table',$query);
	}
	public function add(){
		$this->load->view("include/header");
		$this->load->view("include/menu-left");

		$this->load->view("category/add");
	}
	public function edit($id){
		$this->load->view("include/header");
		$this->load->view("include/menu-left");

		$query['data'] = $this->Category_model->edit($id);

		$this->load->view("category/edit",$query);
	}
	public function insert(){
		$ma_dm = $this->input->post('Ma_DM');
		$ten_dm = $this->input->post('Ten_DM');

		if($this->Category_model->insert($ma_dm,$ten_dm)){
			header("Location:/myProject/index.php/category");
		}else{

		}
	}

	public function update(){
		$id	= $this->input->post('id');
		$ma_dm = $this->input->post('Ma_DM');
		$ten_dm = $this->input->post('Ten_DM');

		if($this->Category_model->update($id,$ma_dm,$ten_dm)){
			header("Location:/myProject/index.php/category");
		}else{

		}
	}

	public function delete($id){
		if($this->Category_model->delete($id)){
			header("Location:/myProject/index.php/category");
		}else{

		}
	}
}
?>
