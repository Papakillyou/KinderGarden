<?php
class WorkController extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->Model('workerModel');
		$this->load->Model('workerSalaryModel');
	}

	public function model(){
		$this->load->view('dd');
	}

	public function index(){
		$this->load->view('worker');
	}
	//展示指定类型的
	public function view(){
		$type=$_GET['type'];
		$info=$this->workerModel->show('worker',$type);
		echo json_encode($info);

	}

	//查找
	public function find(){
		$WorkerNumber=$_GET['WorkerNumber'];
		$info=$this->workerModel->find('worker',$WorkerNumber);
		if($info!=null)
			echo json_encode($info);
		else echo null;

	}

	//增加
	public function add(){
		$WorkInfo['WorkerType']=$_GET['WorkerType'];
		$WorkInfo['WorkerName']=$_GET['WorkerName'];
		$WorkInfo['WorkerNumber']=$_GET['WorkerNumber'];
		$WorkInfo['WorkerIdCard']=$_GET['WorkerIdCard'];
		$WorkInfo['WorkerGender']=$_GET['WorkerGender'];
		$WorkInfo['WorkerContact']=$_GET['WorkerContact'];
		$WorkInfo['WorkerCardNumber']=$_GET['WorkerCardNumber'];
		$WorkInfo['WorkerEntryDate']=$_GET['WorkerEntryDate'];
		$WorkSalary['SalaryNum']=$_GET['WorkerSalaryNum'];
		echo "a";
		if($this->workerModel->add('worker',$WorkInfo))
			echo"ss";
		echo"mm";
		$WorkSalary['WorkerId']=$this->workerModel->find_id('worker',$WorkInfo['WorkerNumber']);
		#echo $WorkSalary['WorkerId'];
		echo"dd";
		$this->workerSalaryModel->add('workersalary',$WorkSalary);
		echo "添加成功";



		#$WorkSalary['WorkerId']=();
		# $this->load->view('index');
	}

	//移除
	public  function remove(){
		$WorkerNumber=$_GET['WorkerNumber'];
		if($this->workerModel->remove('worker',$WorkerNumber))
			echo "删除成功";
		else echo "删除失败";
	}

	public function update(){
		$WorkInfo['WorkerName']=$_GET['WorkerName'];
		$WorkInfo['WorkerNumber']=$_GET['WorkerNumber'];
		$WorkInfo['WorkerGender']=$_GET['WorkerGender'];
		$WorkInfo['WorkerContact']=$_GET['WorkerContact'];
		$WorkInfo['WorkerCardNumber']=$_GET['WorkerCardNumber'];
		$this->workerModel->update('worker',$WorkInfo);
	}
}
