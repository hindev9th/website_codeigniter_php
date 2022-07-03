<?php
class Customer_model extends CI_Model{
	protected $table = 'tb_users';

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
		$this->db->like('ho_ten',$search);
		$this->db->or_like('email',$search);
		$this->db->or_like('username',$search);
		$data = $this->db->get($this->table,$sl,0);
		return $data->result();
	}
	public function edit($id){
		$this->db->where('id',$id);
		$data = $this->db->get($this->table);
		return $data->row();
	}
	public function insert($ho_ten,$gioi_tinh,$ngay_sinh,$sdt,$email,$password,$dia_chi,$anh){
		$data = array(
			'ho_ten' => $ho_ten,
			'gioi_tinh' => $gioi_tinh,
			'ngay_sinh' => $ngay_sinh,
			'sdt' => $sdt,
			'email' => $email,
			'password' => $password,
			'dia_chi' => $dia_chi,
			'anh' => $anh
		);

		$this->db->insert($this->table,$data);
		return ($this->db->affected_rows() > 0) ? false : true;
	}

	public function update($id,$ho_ten,$gioi_tinh,$ngay_sinh,$sdt,$email,$password,$dia_chi,$anh){
		$data = array(
			'ho_ten' => $ho_ten,
			'gioi_tinh' => $gioi_tinh,
			'ngay_sinh' => $ngay_sinh,
			'sdt' => $sdt,
			'email' => $email,
			'password' => $password,
			'dia_chi' => $dia_chi,
			'anh' => $anh
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
