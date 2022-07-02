<?php
class Category_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
	}
	public function getData(){

		$data = $this->db->get("danh_muc",25,0);
		return $data->	result();
	}
	public function search($search,$sl){
		$this->db->like('ma_dm',$search);
		$this->db->or_like('ten_dm',$search);
		$data = $this->db->get('danh_muc',$sl,0);
		return $data->result();
	}
	public function edit($id){
		$this->db->where('id',$id);
		$data = $this->db->get('danh_muc');
		return $data->row();
	}
	public function insert($ma,$ten){
		$data = array(
			'ma_dm' => $ma,
			'ten_dm' => $ten
		);

		$this->db->insert('danh_muc',$data);
		return ($this->db->affected_rows() > 0) ? false : true;
	}

	public function update($id,$ma,$ten){
		$data = array(
			'ma_dm' => $ma,
			'ten_dm' => $ten
		);

		$this->db->where('id',$id);

		return $this->db->update('danh_muc',$data);
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("danh_muc");
		return $this->db->affected_rows();
	}
}
?>
