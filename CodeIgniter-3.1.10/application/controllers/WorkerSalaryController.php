<?php
class WorkerSalaryController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->Model('workerSalaryModel');
	}

	public function index(){
		$this->load->view('salary');
	}

	#发工资
	public function sendSalary(){
		$SalaryYear=$_GET['SalaryYear'];
		$SalaryMonth=$_GET['SalaryMonth'];
		$SendDate=$_GET['SendDay'];
		if($this->workerSalaryModel->sendSalary($SalaryYear,$SalaryMonth,$SendDate)){
			echo "插入成功!";
		}
	}

	#根据某个人的工号查找这个人的薪水，为修改人员薪资用。
	public function findSalaryFromNum(){
		$WorkerNum=$_GET['WorkerNum'];
		$info=$this->workerSalaryModel->findSalaryFromNum('workersalary',$WorkerNum);
		echo json_encode($info);
	}
	#修改人员薪资。
	public function editWorkerSalary(){
		$WorkerNum=$_GET['WorkerNum'];
		$ChangedSalary=$_GET['ChangedSalary'];
		if($this->workerSalaryModel->editWorkerSalary('workersalary',$WorkerNum,$ChangedSalary))
			echo "修改成功!";
		else echo "修改失败!";
	}

	#根据工号查询该人的薪资单,展示用。
	public function selectFromNum(){
		$WorkerNum=$_GET['WorkerNum'];
		# ==-1 表示是要展示所有的人的薪资单。
		$info=$this->workerSalaryModel->showFromNum('salary',$WorkerNum);
		echo json_encode($info);

	}

}
