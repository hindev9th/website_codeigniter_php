<?php

class News_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
	}

	public function getData()
	{
		$data = $this->db->get('tb_tin_tuc');
		return $data->result();
	}

	public function search($search,$sl){
		$this->db->like('tieu_de',$search);
		$data = $this->db->get('tb_tin_tuc',$sl,0);
		return $data->result();
	}

	public function read($id)
	{
		$this->db->where('id',$id);
		$data = $this->db->get('tb_tin_tuc');
		return $data->row();
	}
	public function edit($id){
		$this->db->where('id',$id);
		$data = $this->db->get('tb_tin_tuc');
		return $data->row();
	}
	public function insert($id_user,$tieu_de,$noi_dung,$anh){
		$data = array(
			'id_user' => $id_user,
			'tieu_de' => $tieu_de,
			'noi_dung' => $noi_dung,
			'thoi_gian' => date("Y-m-d H:i:s"),
			'anh' => $anh
		);

		$this->db->insert('tb_tin_tuc',$data);
		return ($this->db->affected_rows() > 0) ? false : true;
	}

	public function update($id,$tieu_de,$noi_dung,$anh){
		$data = array(
			'tieu_de' => $tieu_de,
			'noi_dung' => $noi_dung,
			'anh' => $anh
		);

		$this->db->where('id',$id);

		return $this->db->update('tb_tin_tuc',$data);
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("tb_tin_tuc");
		return $this->db->affected_rows();
	}
}
