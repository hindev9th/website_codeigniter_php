<?php
class Category_model extends CI_Model{
	protected $table = 'danh_muc';
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getCount(){
		return $this->db->count_all($this->table);
	}

	
	public function getData(){

		$data = $this->db->get($this->table,20,0);
		return $data->	result();
	}

	public function search($search,$sl){
		$this->db->like('ma_dm',$search);
		$this->db->or_like('ten_dm',$search);
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
			'ma_dm' => $ma,
			'ten_dm' => $ten
		);

		$this->db->insert($this->table,$data);
		return ($this->db->affected_rows() > 0) ? false : true;
	}

	public function update($id,$ma,$ten){
		$data = array(
			'ma_dm' => $ma,
			'ten_dm' => $ten
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
