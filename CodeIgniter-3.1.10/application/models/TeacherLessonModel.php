<?php
class TeacherLessonModel extends  CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	#展示或者查询
	public function showTeacherLesson($TeacherName,$LessonName){
		$this->db->select('lessonId,lessonName,worker.WorkerName');
		#是指定老师的查找
		if($TeacherName!=-1){
			$this->db->where('worker.WorkerName',$TeacherName);
		}
		if($LessonName!=-1){
			$this->db->where('lessonName',$LessonName);
		}
		$this->db->from('teacherlesson');
		$this->db->join('worker','worker.Workerid=teacherlesson.lessonTeacherId');
		$query=$this->db->get();
		#echo $this->db->last_query();
		$result=$query->result_array();
		return $result;
	}

	#增加一行
	public function addTeacherLesson($TeacherName,$LessonName){
		$sql="insert into teacherlesson(lessonName,lessonTeacherId) values('$LessonName',(select WorkerId from worker where WorkerName='$TeacherName'))";
		$this->db->query($sql);
		echo $sql;
		echo "插入成功";
	}

	public function updateTeacherLesson($teacherLessonId,$aln,$atn){
		$sql="update teacherlesson 
				set lessonName='$aln',lessonTeacherId=(select Workerid from worker where WorkerName='$atn')  
				where  lessonId= $teacherLessonId";
		echo $sql;
		if($this->db->query($sql)>0)
			return true;
		else return false;
		/*$this->db->where('lessonName',$bln);
		$s="(select WorkerId from worker where WorkerName='$btn')";
		$this->db->where('lessonTeacherId',$s);
		$after['lessonName']=$aln;
		$after['lessonTeacherId']="(select Workerid from worker where WorkerName=$atn)";
		$this->db->update('teacherlesson',$after);
		echo $this->db->last_query();*/
	}
	public function deleteTeacherLesson($LessonName,$TeacherName){
		$sql="delete from teacherlesson where lessonName='$LessonName' and lessonTeacherId=(select WorkerId from worker where WorkerName='$TeacherName')";
		if($this->db->query($sql)){
			echo $sql;
			return true;
		}

		else return false;
	}
}
