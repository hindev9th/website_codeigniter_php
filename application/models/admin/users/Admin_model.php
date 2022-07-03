<?php
class Admin extends CI_Model{
	protected $table = 'tb_admin';

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
	public function insert($ho_ten,$gioi_tinh,$ngay_sinh,$email,$sdt,$username,$password,$anh){
		$data = array(
			'ho_ten' => $ho_ten,
			'gioi_tinh' => $gioi_tinh,
			'ngay_sinh' => $ngay_sinh,
			'email' => $email,
			'sdt' => $sdt,
			'username' => $username,
			'password' => $password,
			'anh' => $anh
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
