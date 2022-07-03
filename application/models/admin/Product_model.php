<?php
class Product_model extends CI_Model{

	protected $table = 'san_pham';

	public function __construct()
	{
		parent::__construct();
	}

	public function getCount(){
		return $this->db->count_all($this->table);
	}

	public function getDanhMuc()
	{
		return $this->db->get('danh_muc')->result();
	}
	public function getThuongHieu()
	{
		return $this->db->get('thuong_hieu')->result();
	}
	public function getData(){

		$data = $this->db->get($this->table,20,0);
		return $data->	result();
	}
	public function search($search,$sl){
		$this->db->like('ma_sp',$search);
		$this->db->or_like('ten_sp',$search);
		$data = $this->db->get($this->table,$sl,0);
		return $data->result();
	}
	public function edit($id){
		$this->db->where('id',$id);
		$data = $this->db->get($this->table);
		return $data->row();
	}
	public function insert($ma,$ten){
		$data = array(
			'ma_sp' => $ma,
			'ten_sp' => $ten
		);

		$this->db->insert($this->table,$data);
		return ($this->db->affected_rows() > 0) ? false : true;
	}

	public function update($id,$ma,$ten){
		$data = array(
			'ma_sp' => $ma,
			'ten_sp' => $ten
		);

		$this->db->where('id',$id);

		return $this->db->update($this->table,$data);
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}
}
?>
