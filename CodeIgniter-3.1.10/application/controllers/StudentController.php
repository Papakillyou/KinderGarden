<?php
class StudentController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->Model('studentModel');
	}

	public function index()
	{
		$this->load->view('student');
	}

	public function view()
	{
		$info = $this->studentModel->show('student');
		echo json_encode($info);

	}

	public function find()
	{
		$StudentNumber = $_GET['StudentNumber'];
		$info = $this->studentModel->find('student',$StudentNumber);
		if ($info != null)
			echo json_encode($info);
		else echo null;

	}

	public function add()
	{
		$StudentInfo['StudentNumber'] = $_GET['StudentNumber'];
		$StudentInfo['StudentName'] = $_GET['StudentName'];
		$StudentInfo['StudentSex'] = $_GET['StudentSex'];
		$StudentInfo['StudentAdress'] = $_GET['StudentAdress'];
		$StudentInfo['StudentParentName'] = $_GET['StudentParentName'];
		$StudentInfo['StudentParentPhone'] = $_GET['StudentParentPhone'];
		$StudentInfo['StudentParentRelation'] = $_GET['StudentParentRelation'];
		$StudentInfo['StudentInTime'] = $_GET['StudentInTime'];
		$StudentInfo['StudentClassId'] = $_GET['StudentClassId'];
		$this->studentModel->add('student', $StudentInfo);
		echo "添加成功";
		# $this->load->view('index');
	}

	public function remove()
	{
		echo"Controller的删除函数进来了";
		$StudentNumber = $_GET['StudentNumber'];
		echo($StudentNumber);
		$mss=$this->studentModel->remove('student', $StudentNumber);
		echo $mss;
//		if ($this->studentModel->remove('student', $StudentNumber))
//			echo "删除成功";
//		else echo "删除失败";
	}
	public function update(){
		$StudentInfo['StudentNumber'] = $_GET['StudentNumber'];
		$StudentInfo['StudentName'] = $_GET['StudentName'];
		$StudentInfo['StudentSex'] = $_GET['StudentSex'];
		$StudentInfo['StudentAdress'] = $_GET['StudentAdress'];
		$StudentInfo['StudentParentName'] = $_GET['StudentParentName'];
		$StudentInfo['StudentParentPhone'] = $_GET['StudentParentPhone'];
		$StudentInfo['StudentParentRelation'] = $_GET['StudentParentRelation'];
		$StudentInfo['StudentInTime'] = $_GET['StudentInTime'];
		$StudentInfo['StudentClassId'] = $_GET['StudentClassId'];
		$mess=$this->studentModel->update('student', $StudentInfo);
		print $mess;
	}
}
