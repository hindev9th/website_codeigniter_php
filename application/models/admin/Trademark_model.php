<?php
class Trademark_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
	}
	public function getData(){

		$data = $this->db->get("thuong_hieu",25,0);
		return $data->	result();
	}
	public function search($search,$sl){
		$this->db->like('ma_th',$search);
		$this->db->or_like('ten_th',$search);
		$data = $this->db->get('thuong_hieu',$sl,0);
		return $data->result();
	}
	public function edit($id){
		$this->db->where('id',$id);
		$data = $this->db->get('thuong_hieu');
		return $data->row();
	}
	public function insert($ma,$ten){
		$data = array(
			'ma_th' => $ma,
			'ten_th' => $ten
		);

		return $this->db->insert('thuong_hieu',$data);
	}

	public function update($id,$ma,$ten){
		$data = array(
			'ma_th' => $ma,
			'ten_th' => $ten
		);

		$this->db->where('id',$id);

		return $this->db->update('thuong_hieu',$data);
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("thuong_hieu");
		return $this->db->affected_rows();
	}
}
?>
