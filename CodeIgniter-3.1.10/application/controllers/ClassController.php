<?php
class ClassController extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('classmodel');
		$this->load->helper('url');
	}
	public function index(){
		$this->load->view('class.php');
	}

	//查询所有班级
	public function view(){
		$type=$_GET['type'];
		$info=$this->classmodel->getAllClass($type);
		echo json_encode($info);
	}

	//按年级，班级查询
	public function getByGradeAndClass(){
		$Grade=$_GET['Grade'];
		$Class=$_GET['Class'];
		$info=$this->classmodel->getByGradeAndClass($Grade,$Class);
		if($info!=null)
			echo json_encode($info);
		else echo null;
	}
	//按ID查询
	public function findById(){
		$ClassId=$_GET['ClassId'];
		$info=$this->classmodel->findById($ClassId);
		if($info!=null)
			echo json_encode($info);
		else echo null;

	}

	//添加班级
	public function insertClass(){
		$ClassInfo['ClassGrade']=$_GET['ClassGrade'];
		$ClassInfo['ClassClass']=$_GET['ClassClass'];
		$ClassInfo['ClassBossId']=$_GET['ClassBossId'];
		if($this->classmodel->insertClass($ClassInfo))
			echo "添加成功";
		# $this->load->view('index');
	}
	//修改信息
	public function updateClass(){
		$ClassInfo['ClassId']=$_GET['ClassId'];
		$ClassInfo['ClassGrade']=$_GET['ClassGrade'];
		$ClassInfo['ClassClass']=$_GET['ClassClass'];
		$ClassInfo['ClassBossName']=$_GET['ClassBossName'];
		if($this->classmodel->updateClass($ClassInfo['ClassId'],$ClassInfo['ClassGrade'],$ClassInfo['ClassClass'],$ClassInfo['ClassBossName']))
			echo "修改成功";
		else echo "修改失败";
	}

	//删除
	public  function deleteClass(){
		$ClassId=$_GET['ClassId'];
		if($this->classmodel->deleteClass($ClassId))
			echo "删除成功";
		else echo "删除失败";
	}
}
