<?php
class StudentPayModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function show($table){
		# typel类型： 全部，教师，其他。
		$data=$this->db->get($table);
		$query=$data->result_array();
		return $query;
	}
	public function find($table,$id){
		$this->db->where('studentPayStudentNumber',$id);
		$data=$this->db->get($table);
		$query=$data->result_array();
		return $query;
	}
	public function add($table,$studentpay){
		$this->db->insert($table,$studentpay);
	}
	public function update($table,$studentpay){
		$this->db->where('studentPayId',$studentpay['studentPayId']);
		$this->db->update($table,$studentpay);
	}
}
