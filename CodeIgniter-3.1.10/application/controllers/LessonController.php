<?php
class LessonController extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('lessonmodel');
		$this->load->helper('url');
	}
	public function index(){
		$this->load->view('lesson.php');
	}
	public function findAllLesson(){
		$lesson=$this->lessonmodel->getAllLesson();
		echo json_encode($lesson);
	}
	//按班级ID查询课表
	public function findByClass(){
		$ClassId=$_GET['ClassId'];
		$info=$this->lessonmodel->getByClass($ClassId);
		if($info!=null)
			echo json_encode($info);
		else echo null;
	}
	//按课程ID查询
	public function findById(){
		$LessonId=$_GET['LessonId'];
		$info=$this->lessonmodel->findById($LessonId);
		if($info!=null)
			echo json_encode($info);
		else echo null;

	}
	//添加课表
	public function insertLesson(){
		$LessonInfo['LessonFirst']=$_GET['LessonFirst'];
		$LessonInfo['LessonSecond']=$_GET['LessonSecond'];
		$LessonInfo['LessonThird']=$_GET['LessonThird'];
		$LessonInfo['LessonFourth']=$_GET['LessonFourth'];
		$LessonInfo['LessonWeek']=$_GET['LessonWeek'];
		$LessonInfo['LessonClass']=$_GET['LessonClass'];
//		echo $LessonInfo['LessonWeek'];
		if($this->lessonmodel->insertLesson($LessonInfo))
			echo "添加成功";
		# $this->load->view('index');
	}
	//修改信息
	public function updateLesson(){
		$LessonInfo['LessonId']=$_GET['LessonId'];
		$LessonInfo['LessonFirst']=$_GET['LessonFirst'];
		$LessonInfo['LessonSecond']=$_GET['LessonSecond'];
		$LessonInfo['LessonThird']=$_GET['LessonThird'];
		$LessonInfo['LessonFourth']=$_GET['LessonFourth'];
		$LessonInfo['LessonWeek']=$_GET['LessonWeek'];
		$LessonInfo['LessonClass']=$_GET['LessonClass'];
		if($this->lessonmodel->updateLesson($LessonInfo['LessonId'],
			$LessonInfo['LessonFirst'],
			$LessonInfo['LessonSecond'],
			$LessonInfo['LessonThird'],
			$LessonInfo['LessonFourth'],
			$LessonInfo['LessonWeek'],
			$LessonInfo['LessonClass']))
			echo "修改成功";
	}

	//删除
	public  function deleteLesson(){
		$LessonId=$_GET['LessonId'];
		if($this->lessonmodel->deleteLesson($LessonId))
			echo "删除成功";
		else echo "删除失败";
	}
}
