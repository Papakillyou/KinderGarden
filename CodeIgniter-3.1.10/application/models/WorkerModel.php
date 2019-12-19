<?php
class WorkerModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//展示某种类型的worker
	public function show($table,$type){
		# typel类型： 全部，教师，其他。
		switch ($type)
		{
			case '全部':
				$data=$this->db->get($table);
				break;
			case '教师':
				$this->db->where('WorkerType',$type);
				$data=$this->db->get($table);
				break;
			default:
				$this->db->where('WorkerType!=','教师');
				$data=$this->db->get($table);
				break;
		}
		$query=$data->result_array();
		return $query;
	}
	//查找工号为id的worker
	public function find($table,$id){
		$this->db->where('WorkerNumber',$id);
		$data=$this->db->get($table);
		$query=$data->result_array();
		return $query;
	}
	//增加一个worker
	public function add($table,$person){
		$this->db->insert($table,$person);
	}
	//根据id删除一个worker
	public function remove($table,$id){
		$this->db->where('WorkerNumber',$id);
		if($this->db->delete($table))
			return true;
		else
			return false;
	}

	//根据工号查找出workerid,用来其他方法使用。
	public function find_id($table,$id){
		$this->db->select('Workerid');
		$this->db->where('WorkerNumber',$id);
		$this->db->from($table);
		$query=$this->db->get();
		if($query->num_rows()>0){
			$row=$query->row_array();
			return $row['Workerid'];
		}
	}

	//根据工号来修改worker信息。
	public function update($table,$person){
		$this->db->where('WorkerNumber',$person['WorkerNumber']);
		$this->db->update($table,$person);
	}
}
