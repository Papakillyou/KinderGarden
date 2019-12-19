<?php
class TeacherLessonController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->Model('teacherLessonModel');
	}

	public function index(){
		$this->load->view('teacherLesson');
	}

	#展示课程老师的表和根据老师姓名查找课程老师的表。
	public function showTeacherLesson(){
		#根据TeacherName来判断是展示还是查询,展示的时候TeacherName=-1，查询的时候就是等于老师名字。
		$TeacherName=$_GET['teacherName'];
		$LessonName=$_GET['lessonName'];
		$info=$this->teacherLessonModel->showTeacherLesson($TeacherName,$LessonName);
		if($info!=null)
			echo json_encode($info);
	}

	public function addTeacherLesson(){
		$TeacherName=$_GET['teachername'];
		$LessonName=$_GET['lessonname'];
		if($this->teacherLessonModel->addTeacherLesson($TeacherName,$LessonName))
			echo "插入成功!";
		else echo "插入失败";
	}

	public function updateTeacherLesson(){
		#$BeforeChangeLessonName,$BeforeChangeTeacherName,$AfterChangeLessonName,$AfterChanmeTeacherName.
		$teacherLessonId=$_GET['teacherLessonId'];
		$aftlsnm=$_GET['aftlsnm'];
		$afttcnm=$_GET['afttcnm'];
		if($this->teacherLessonModel->updateTeacherLesson($teacherLessonId,$aftlsnm,$afttcnm)){
			echo "修改成功!";
		}
		else echo"修改失败";
	}

	public function deleteTeacherLesson(){
		$LessonName=$_GET['LessonName'];
		$TeacherName=$_GET['TeacherName'];
		if($this->teacherLessonModel->deleteTeacherLesson($LessonName,$TeacherName))
			echo true;
		else echo false;
	}
}
