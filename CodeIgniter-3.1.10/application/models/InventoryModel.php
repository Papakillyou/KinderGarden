<?php
class InventoryModel extends CI_Model
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
		$this->db->where('InventoryName',$id);
		$data=$this->db->get($table);
		$query=$data->result_array();
		return $query;
	}

	public function add($table,$inventory){
		$this->db->insert($table,$inventory);
	}
	public  function remove($table,$name){
		$this->db->where('InventoryName',$name);
		if($this->db->delete($table))
			return true;
		else
			return false;
	}
	public function update($table,$inventory){
		$this->db->where('InventoryName',$inventory['InventoryName']);
		$this->db->update($table,$inventory);
		return $this->db->last_query();
	}
}
