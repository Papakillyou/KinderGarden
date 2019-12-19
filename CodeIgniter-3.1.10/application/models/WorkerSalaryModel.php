<?php
class WorkerSalaryModel extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//增加一条人员工资单，增加工作人员的时候添加会使用。
	public function add($table,$WorkerSalary){
		$this->db->insert($table,$WorkerSalary);
	}

	//根据工作人员工号查询出它的所有薪水单
	public function showFromNum($table,$num){
		$this->db->select('SalaryId,Year(SalaryMonth) as WorkerSalaryYear,Month(SalaryMonth) as WorkerSalaryMonth,SalaryDate,SalaryCost,worker.WorkerName');
		if($num!=-1){
			$this->db->where('worker.WorkerNumber',$num);
		}
		$this->db->from($table);
		$this->db->join('worker','worker.WorkerId='.$table.'.Workerid');
		$this->db->join('workersalary','workersalary.Workerid='.$table.'.Workerid');
		$query=$this->db->get();
		$result=$query->result_array();
		#echo $this->db->last_query();
		return ($result);

	}

	//根据工作人员工号查出它现如今的薪水。
	public function findSalaryFromNum($table,$num){
		$this->db->select('SalaryNum');
		$this->db->where('worker.WorkerNumber',$num);
		$this->db->from($table);
		$this->db->join('worker','worker.WorkerId='.$table.'.Workerid');
		$query=$this->db->get();
		$result=$query->result_array();
		#echo $this->db->last_query();
		return ($result);
	}

	//修改工作人员的薪水。
	public function editWorkerSalary($table,$WorkNum,$ChangedSalary){
		$sql="update $table set SalaryNum=$ChangedSalary where Workerid= (select WorkerId from worker where WorkerNumber=$WorkNum)";
		if($this->db->query($sql))
		{
			echo "更改成功";
			return true;
		}
		else return false;
	}

	//发工资
	public function sendSalary($SalaryYear,$SalaryMonth,$Today){
		#在发工资表中批量插入数据.
		$this->db->select('Workerid,SalaryNum');
		$this->db->from('workersalary');
		$query=$this->db->get();
		$result=$query->result_array();
		#echo json_encode($result);
		$Salary=$SalaryYear."-".$SalaryMonth."-"."01";
		foreach ($result as $row){
			$Workerid=$row['Workerid'];
			$SalaryNum=$row['SalaryNum'];
			$sql="insert into salary(WorkerId,SalaryDate,SalaryMonth,SalaryCost) values ($Workerid,'$Today','$Salary',$SalaryNum)";
			echo $sql."<br>";
			$this->db->query($sql);
		}
		echo "插入成功";
		return true;

	}
}
