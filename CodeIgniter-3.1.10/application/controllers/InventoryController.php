<?php
class InventoryController extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->Model('inventoryModel');
	}

	public function index()
	{
		$this->load->view('inventory');
	}

	public function view()
	{
		$info = $this->inventoryModel->show('inventory');
		echo json_encode($info);

	}

	public function find()
	{
		$InventoryName = $_GET['InventoryName'];
		$info = $this->inventoryModel->find('inventory',$InventoryName);
		if ($info != null)
			echo json_encode($info);
		else echo null;

	}

	public function add()
	{
		$inventoryinfo['InventoryName'] = $_GET['InventoryName'];
		$inventoryinfo['InventoryTotal'] = $_GET['InventoryTotal'];
		$inventoryinfo['InventoryLeft'] = $_GET['InventoryLeft'];
		$inventoryinfo['InventorySingelPrice'] = $_GET['InventorySingelPrice'];
		$this->inventoryModel->add('inventory', $inventoryinfo);
		echo "添加成功";
		# $this->load->view('index');
	}

	public function remove()
	{
		$InventoryName = $_GET['InventoryName'];
		if ($this->inventoryModel->remove('inventory', $InventoryName))
			echo "删除成功";
		else echo "删除失败";
	}
	public function update(){
		$inventoryinfo['InventoryName'] = $_GET['InventoryName'];
		$inventoryinfo['InventoryTotal'] = $_GET['InventoryTotal'];
		$inventoryinfo['InventoryLeft'] = $_GET['InventoryLeft'];
		$inventoryinfo['InventorySingelPrice'] = $_GET['InventorySingelPrice'];
		$mess=$this->inventoryModel->update('inventory', $inventoryinfo);
		print $mess;
	}
}
