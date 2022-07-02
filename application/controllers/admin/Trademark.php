<?php

class Trademark extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view("include/header");
		$this->load->view("include/menu-left");

		$query['data'] = $this->Trademark_model->getData();
		$this->load->view("admin/trademark/trademark", $query);
	}

	public function search()
	{
		$search = $this->input->post('search');
		$max_data = $this->input->post('max_data') == 0 ? 25 : $this->input->post('max_data');
		$query['data'] = $this->Trademark_model->search($search, $max_data);
		$this->load->view('admin/trademark/table', $query);
	}

	public function add()
	{
		$this->load->view("include/header");
		$this->load->view("include/menu-left");

		$this->load->view("admin/trademark/add");
	}

	public function edit($id)
	{
		$this->load->view("include/header");
		$this->load->view("include/menu-left");

		$query['data'] = $this->Trademark_model->edit($id);

		$this->load->view("admin/trademark/add", $query);
	}

	public function save()
	{
		$id = $this->input->post('id');
		$ma_th = $this->input->post('ma_th');
		$ten_th = $this->input->post('ten_th');

		if (empty($id)) {
			if ($this->Trademark_model->insert($ma_th, $ten_th)) {
				header("Location:" . base_url() . "index.php/admin/trademark");
			} else {

			}
		} else {
			$this->Trademark_model->update($id, $ma_th, $ten_th);

			header("Location:" . base_url() . "index.php/admin/trademark");

		}
	}

	public function delete($id)
	{
		if ($this->Trademark_model->delete($id)) {
			header("Location:" . base_url() . "index.php/admin/trademark");
		} else {

		}
	}
}

