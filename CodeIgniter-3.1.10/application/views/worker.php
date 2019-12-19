<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>幼儿园管理系统</title>
	<!-- ================= Favicon ================== -->
	<!-- Standard -->
	<link rel="shortcut icon" href="/CodeIgniter-3.1.10/assets/images/tubiao/title.png">
	<!-- Styles -->
	<link href="http://localhost/CodeIgniter-3.1.10/assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
	<link href="http://localhost/CodeIgniter-3.1.10/assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
	<link href="http://localhost/CodeIgniter-3.1.10/assets/css/lib/font-awesome.min.css" rel="stylesheet">
	<link href="http://localhost/CodeIgniter-3.1.10/assets/css/lib/themify-icons.css" rel="stylesheet">
	<link href="http://localhost/CodeIgniter-3.1.10/assets/css/lib/owl.carousel.min.css" rel="stylesheet"/>
	<link href="http://localhost/CodeIgniter-3.1.10/assets/css/lib/owl.theme.default.min.css" rel="stylesheet"/>
	<link href="http://localhost/CodeIgniter-3.1.10/assets/css/lib/weather-icons.css" rel="stylesheet"/>
	<link href="http://localhost/CodeIgniter-3.1.10/assets/css/lib/menubar/sidebar.css" rel="stylesheet">
	<link href="http://localhost/CodeIgniter-3.1.10/assets/css/lib/bootstrap.min.css" rel="stylesheet">
	<link href="http://localhost/CodeIgniter-3.1.10/assets/css/lib/helper.css" rel="stylesheet">
	<link href="http://localhost/CodeIgniter-3.1.10/assets/css/style.css" rel="stylesheet">
	<link href="http://localhost/CodeIgniter-3.1.10/assets/css/ply.css" rel="stylesheet">

</head>
<body>

<!-- /# sidebar -->
<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
	<div class="nano">
		<div class="nano-content">
			<ul>

				<li class="label">馨馨点灯幼儿园</li>
				<li><a class="sidebar-sub-toggle"><img src="/CodeIgniter-3.1.10/assets/images/tubiao/教师.png"
													   style="width:19px;height:19px;">&nbsp;&nbsp;&nbsp;&nbsp;工作人员 <span
							class="sidebar-collapse-icon ti-angle-down"></span></a>
					<ul>
						<li><a>工作人员管理</a></li>
					</ul>
					<ul>
						<li><a href="WorkerSalaryController">工资管理</a></li>
					</ul>
				<li><a class="sidebar-sub-toggle"><img src="/CodeIgniter-3.1.10/assets/images/tubiao/学生.png"
													   style="width:19px;height:19px;">&nbsp;&nbsp;&nbsp;&nbsp;学生<span
							class="sidebar-collapse-icon ti-angle-down"></span></a>
					<ul>
						<li><a href="StudentController">学生管理</a></li>
					</ul>
					<ul>
						<li><a href="StudentPayController">学生缴费管理</a></li>
					</ul>
				<li><a class="sidebar-sub-toggle"><img src="/CodeIgniter-3.1.10/assets/images/tubiao/课程表.png"
													   style="width:19px;height:19px;">&nbsp;&nbsp;&nbsp;&nbsp;课程 <span
							class="sidebar-collapse-icon ti-angle-down"></span></a>
					<ul>
						<li><a href="TeacherLessonController">教师课程</a></li>
					</ul>
					<ul>
						<li><a href="LessonController">学生课程</a></li>
					</ul>
				<li><a href="ClassController"><img src="/CodeIgniter-3.1.10/assets/images/tubiao/班级.png"
												   style="width:19px;height:19px;">&nbsp;&nbsp;&nbsp;&nbsp;班级</a></li>

				<li><a href="InventoryController"><img src="/CodeIgniter-3.1.10/assets/images/tubiao/工具.png"
													   style="width:19px;height:19px;">&nbsp;&nbsp;&nbsp;&nbsp;库存管理</a></li>
				</li>

				<li class="label">用户</li>
				<li><a class="sidebar-sub-toggle"><i class="ti-target"></i> 登录<span
							class="sidebar-collapse-icon ti-angle-down"></span></a>
					<ul>
						<li><a href="page-login.html">登录</a></li>
						<li><a href="page-register.html">注册</a></li>
						<li><a href="page-reset-password.html">忘记密码</a></li>
					</ul>
				</li>

				<li><a><i class="ti-close"></i>退出</a></li>
			</ul>
		</div>
	</div>
</div>


<!--顶部-->
<div class="header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="float-left">
					<div class="hamburger sidebar-toggle">
						<span class="line"></span>
						<span class="line"></span>
						<span class="line"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--内容-->

<div class="content-wrap">
	<div class="main">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12 p-r-0 title-margin-right">
					<div class="page-header">
						<div style="width: 40%;float:left;box-sizing: border-box">
							<h1>你好, <span>欢迎使用馨馨点灯幼儿园管理系统</span></h1>
						</div>
						<div style="width: 60%;float:left; box-sizing: border-box;">
							<form>
								工号
								<input type="text" id="find_worker" placeholder="输入你的工号">
								<input type="button" class="button2" value="查找" onclick="find()">
							</form>
						</div>
					</div>
				</div>
				<!-- /# column -->
			</div>


			<!--增加的模态框-->
			<div class="modal addfade" id="addmodal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4>职工管理</h4>
							<i onclick="$('.addfade').fadeOut(600);">X</i>
						</div>
						<div class="modal-body">
							<table>
								<tr><td>职工类型：</td><td>
										<input type="radio" name="forAddWorkerType" value="教师"/>教师
										<input type="radio" name="forAddWorkerType" value="厨师"/>厨师
										<input type="radio" name="forAddWorkerType" value="保安"/>保安
										<input type="radio" name="forAddWorkerType" value="清洁工"/>清洁工
										<input type="radio" name="forAddWorkerType" value="管理人员"/>管理人员
									</td></tr>
								<tr><td>职工姓名：</td><td><input type="text" id="forAddWorkerName"/></td></tr>
								<tr><td>职工号：</td><td><input type="text" id="forAddWorkerNumber"/></td></tr>
								<tr><td>职工身份证号：</td><td><input type="text" id="forAddWorkerIdCard"/></td></tr>
								<tr><td>职工性别：</td><td>
										<input type="radio" name="forAddWorkerSex" value="男"/>男
										<input type="radio" name="forAddWorkerSex" value="女"/>女
									</td></tr>
								<tr><td>职工联系方式：</td><td><input type="text" id="forAddWorkerPhone"/></td></tr>
								<tr><td>职工工资卡号：</td><td><input type="text" id="forAddWorkerSalaryCardNumber"/></td></tr>
								<tr><td>职工入职时间：</td><td><input type="text" id="forAddWorkerEntryDate"/></td></tr>
								<tr><td>职工工资：</td><td><input type="text" id="forAddWorkerSalary"/></td></tr>
							</table>
						</div>
						<div class="modal-footer">
							<button class="button" onclick="add()">确定</button>
							<button class="button" onclick="$('.addfade').fadeOut(600);">取消</button>
						</div>
					</div>
				</div>
			</div>


			<!--修改的模态框-->
			<div class="modal movefade movemodal" id="movemodal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4>工作人员修改</h4>
							<i onclick="$('.movefade').fadeOut(600)">X</i>
						</div>
						<div class="modal-body">
							<table>
								<tr><td>工号:</td><td><div id="forUpdateWorkerNumber"></div></td></tr>
								<tr><td>姓名：</td><td><input type="text" id="forUpdateName"/></td></tr>
								<td><td>姓别：</td><td><input type="text" id="forUpdateSex"/></td></tr>
								<tr><td>身份证号：</td><td><input type="text" id="forUpdateCardId"/></td></tr>
								<tr><td>职工联系方式：</td><td><input type="text" id="forUpdatePhone"/></td></tr>
							</table>
						</div>
						<div class="modal-footer">
							<button class="button" onclick="TrueUpdate()">确定</button>
							<button class="button" onclick="$('.movefade').fadeOut(600)">取消</button>
						</div>
					</div>
				</div>
			</div>



			<section id="main-content">
				<div id="table">
					<div class='col-lg-12'>
						<div   class='card' style="background: #ffffff">
							<div>
								<h4 >职工表</h4>
							</div>

							<div>
								<form class="select">
									<select id="type" onchange="view()">
										<option disabled selected>---请选择---</option>
										<option value="全部">全部</option>
										<option value="教师">教师</option>
										<option value="其他">其他</option>
									</select>
								</form>
							</div>
							<div class='card-body'>
								<div class='table-responsive'>
									<table class='table student-data-table m-t-20'>
										<thead>
										<tr>
											<th>职工类型</th>
											<th>职工姓名</th>
											<th>职工号</th>
											<th>职工身份证号</th>
											<th>职工性别</th>
											<th>职工联系方式</th>
											<th>职工工资卡号</th>
											<th>职工入职时间</th>
											<th><input type="button" class="button" id="add_button" value="添加" onclick=" $('.addfade').fadeIn(600);"></th>
										</tr>
										</thead>
										<tbody id="tabletext">
			</section>
		</div>
	</div>

</div>


<script src="/CodeIgniter-3.1.10/assets/js/worker.js"></script>

<script src="/CodeIgniter-3.1.10/assets/js/lib/jquery.min.js"></script>

<!-- nano scroller -->
<script src="/CodeIgniter-3.1.10/assets/js/lib/jquery.nanoscroller.min.js"></script>

<!-- sidebar -->
<script src="/CodeIgniter-3.1.10/assets/js/lib/menubar/sidebar.js"></script>

<script src="/CodeIgniter-3.1.10/assets/js/lib/preloader/pace.min.js"></script>

<!-- scripit init-->
<script src="/CodeIgniter-3.1.10/assets/js/dashboard2.js"></script>
</body>
</html>


