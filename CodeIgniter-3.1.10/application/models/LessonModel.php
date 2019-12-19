<?php
class LessonModel extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	//获取所有课程信息
	public function getAllLesson(){
		$sql="select a.LessonId as id,fi.lessonName as first,
								se.lessonName as second,
								th.lessonName as third,
								fo.lessonName as fourth,
								LessonWeek,LessonClass
				from lesson a 
				left join teacherlesson fi on a.LessonFirst=fi.lessonId
				left join teacherlesson se on a.LessonSecond=se.lessonId
				left join teacherlesson th on a.LessonThird=th.lessonId
				left join teacherlesson fo on a.LessonFourth=fo.lessonId
				";
		$data = $this->db->query($sql);
		$query=$data->result_array();
		return $query;
	}
	//按班级查询
	public function getByClass($classid){
		$sql="select a.LessonWeek,a.LessonClass,a.LessonId as id,
								fi.lessonName as first,
								se.lessonName as second,
								th.lessonName as third,
								fo.lessonName as fourth,
								LessonWeek,LessonClass
				from lesson a 
				left join teacherlesson fi on a.LessonFirst=fi.lessonId
				left join teacherlesson se on a.LessonSecond=se.lessonId
				left join teacherlesson th on a.LessonThird=th.lessonId
				left join teacherlesson fo on a.LessonFourth=fo.lessonId
				where a.LessonClass=$classid
				";
		$data = $this->db->query($sql);
		$query=$data->result_array();
		return $query;
	}
	//按Id查询
	public function findById($id){
		$this->db->where('LessonId',$id);
		$data=$this->db->get('lesson');
		$query=$data->result_array();
		return $query;
	}

	//插入一条信息
	public function insertLesson($data){
		if ($this->db->insert('lesson',$data))
			return true;


	}
	//更新数据
	public function updateLesson($lessonid,$lessonfitrst,$lessonsecond,$lessonthird,$lessonfourth,$lessonweek,$lessonclass){
		$sql="update lesson set LessonFirst=$lessonfitrst,
													LessonSecond=$lessonsecond,
													LessonThird=$lessonthird,
													LessonFourth=$lessonfourth,
				LessonWeek=$lessonweek,LessonClass=$lessonclass
				where LessonId=$lessonid";
		if($this->db->query($sql))
		{
			echo "更改成功";
			return true;
		}
		else return false;
	}

	//删除数据
	public function deleteLesson($id){
		$this->db->where('LessonId',$id);
		if($this->db->delete('lesson'))
			return true;
		else
			return false;
	}
}
