<?php

class Home_model extends CI_Model
{
	protected $table = 'tb_admin';
	public function __construct()
	{
		parent::__construct();
	}

	public function getData($id)
	{
		$this->db->where('id',$id);
		return $this->db->get($this->table)->row();
	}

	public function login($username,$password){
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get($this->table)->row();
	}
}
