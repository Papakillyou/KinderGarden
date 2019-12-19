<?php
class StudentPayController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->Model('studentpayModel');
	}

	public function index()
	{
		$this->load->view('studentpay');
	}

	public function view()
	{
		$info = $this->studentpayModel->show('studentpay');
		echo json_encode($info);

	}

	public function find()
	{
		$studentPayStudentNumber = $_GET['studentPayStudentNumber'];
		$info = $this->studentpayModel->find('studentpay',$studentPayStudentNumber);
		if ($info != null)
			echo json_encode($info);
		else echo null;

	}
	public function add()
	{
		$studentpayinfo['studentPayStudentNumber'] = $_GET['studentPayStudentNumber'];
		$studentpayinfo['studentPayTime'] = $_GET['studentPayTime'];
		$studentpayinfo['studentPayCost'] = $_GET['studentPayCost'];
		$studentpayinfo['studentPaySuc'] = $_GET['studentPaySuc'];
		$this->studentpayModel->add('studentpay', $studentpayinfo);
		echo "添加成功";
		# $this->load->view('index');
	}
	public function update(){
		$studentpayinfo['studentPayId']=$_GET['studentPayId'];
		//$studentpayinfo['studentPayStudentNumber'] = $_GET['studentPayStudentNumber'];
		//$studentpayinfo['studentPayTime'] = $_GET['studentPayTime'];
		//$studentpayinfo['studentPayCost'] = $_GET['studentPayCost'];
		$studentpayinfo['studentPaySuc'] = $_GET['studentPaySuc'];
		$this->studentpayModel->update('studentpay',$studentpayinfo);
		echo"修改成功";
	}

}
