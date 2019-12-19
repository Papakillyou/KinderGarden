<?php
class StudentModel extends CI_Model
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
		$this->db->where('StudentNumber',$id);
		$data=$this->db->get($table);
		$query=$data->result_array();
		return $query;
	}
	public function add($table,$student){
		$this->db->insert($table,$student);
	}
	public  function remove($table,$number){
		$this->db->where('StudentNumber',$number);
		if($this->db->delete($table))
			return $this->db->last_query();
		else
			return $this->db->last_query();
	}
	public function update($table,$inventory){
		$this->db->where('StudentNumber',$inventory['StudentNumber']);
		$this->db->update($table,$inventory);
		return $this->db->last_query();
	}
}
