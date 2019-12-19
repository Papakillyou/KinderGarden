<?php
class ClassModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	//获取所有班级信息
	public function getAllClass($type){
		# typel类型： 全部，小班，中班，大班。
		switch ($type)
		{
			case '全部':
				$this->db->select('classId,classGrade,classClass,worker.WorkerName as name');
				$this->db->from('class');
				$this->db->join('worker', 'worker.WorkerId = class.classBossId');
				$data = $this->db->get();
				break;
			case 'low':
				$this->db->select('classId,classGrade,classClass,worker.WorkerName as name');
				$this->db->from('class');
				$this->db->join('worker', 'worker.WorkerId = class.classBossId');
				$this->db->where('classGrade',$type);
				$data=$this->db->get();
				break;
			case 'middle':
				$this->db->select('classId,classGrade,classClass,worker.WorkerName as name');
				$this->db->from('class');
				$this->db->join('worker', 'worker.WorkerId = class.classBossId');
				$this->db->where('classGrade',$type);
				$data=$this->db->get();
				break;
			case 'high':
				$this->db->select('classId,classGrade,classClass,worker.WorkerName as name');
				$this->db->from('class');
				$this->db->join('worker', 'worker.WorkerId = class.classBossId');
				$this->db->where('classGrade',$type);
				$data=$this->db->get();
				break;
		}
		$query=$data->result_array();
		return $query;
	}
	//按年级班级查询
	public function getByGradeAndClass($grade,$class){
		$this->db->select('classId,classGrade,classClass,worker.WorkerName as name');
		$this->db->where(array('classGrade'=>$grade,'classClass'=> $class));
		$this->db->from('class');
		$this->db->join('worker', 'worker.WorkerId = class.classBossId');
		$data = $this->db->get();
		$query=$data->result_array();
		return $query;
	}

	//按Id查询
	public function findById($id){
		$this->db->where('classId',$id);
		$data=$this->db->get('class');
		$query=$data->result_array();
		return $query;
	}

	//插入一条信息
	public function insertClass($data){
//		$data=array(
//			'classGrade'=>'填年级',
//			'classClass'=>'填班级',
//			'classBossId'=>'填班主任的id'
//		);
		$this->db->insert('class',$data);
//		if($this->db->affected_rows()>0){
//			return $this->db->insert_id();
//		}else{
//			return FALSE;
//		}
	}
	//更新数据
	public function updateClass($id,$grade,$class,$name){
		print($id);
		$sql="update class set classGrade=$grade,classClass=$class,classBossId=(select WorkerId from worker where WorkerName=$name) 
				where classId= $id";
		if($this->db->query($sql))
		{
			echo "更改成功";
			return true;
		}
		else return false;

	}

	//删除数据
	public function deleteClass($id){
		$this->db->where('classId',$id);
		if($this->db->delete('class'))
			return true;
		else
			return false;
	}
}
