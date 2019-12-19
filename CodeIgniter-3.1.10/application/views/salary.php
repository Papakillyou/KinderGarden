<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>幼儿园管理系统</title>

	<!-- ================= Favicon ================== -->
	<!-- Standard -->
	<link rel="shortcut icon" href="/CodeIgniter-3.1.10/assets/images/tubiao/title.png">
	<!-- Styles -->
	<link href="/CodeIgniter-3.1.10/assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
	<link href="/CodeIgniter-3.1.10/assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
	<link href="/CodeIgniter-3.1.10/assets/css/lib/font-awesome.min.css" rel="stylesheet">
	<link href="/CodeIgniter-3.1.10/assets/css/lib/themify-icons.css" rel="stylesheet">
	<link href="/CodeIgniter-3.1.10/assets/css/lib/owl.carousel.min.css" rel="stylesheet"/>
	<link href="/CodeIgniter-3.1.10/assets/css/lib/owl.theme.default.min.css" rel="stylesheet"/>
	<link href="/CodeIgniter-3.1.10/assets/css/lib/weather-icons.css" rel="stylesheet"/>
	<link href="/CodeIgniter-3.1.10/assets/css/lib/menubar/sidebar.css" rel="stylesheet">
	<link href="/CodeIgniter-3.1.10/assets/css/lib/bootstrap.min.css" rel="stylesheet">
	<link href="/CodeIgniter-3.1.10/assets/css/lib/helper.css" rel="stylesheet">
	<link href="/CodeIgniter-3.1.10/assets/css/style.css" rel="stylesheet">
	<link href="/CodeIgniter-3.1.10/assets/css/ply.css" rel="stylesheet">

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
						<li><a href="WorkController">工作人员管理</a></li>
					</ul>
					<ul>
						<li><a>工资管理</a></li>
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
							<input type="button" id="showAllSalaryButton" class="button2" value="查看已发所有薪水单" onclick="showAllSalary(-1)">
						</div>
					</div>
				</div>
			</div>



			<!--修改的模态框-->
			<div class="modal movefade movemodal" id="movemodal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4>工作人员薪资修改</h4>
							<i onclick="$('.movefade').fadeOut(600)">X</i>
						</div>
						<div class="modal-body">
							<p>
								工作人员工号:<input type="text" id="forUpdateWorkerNumber">
							</p>
							<p>
								修改后的薪水：<input type="text" id="forUpdateWorkerSalary"/>
							</p>
						</div>
						<div class="modal-footer">
							<button class="button" onclick="edit_salary()">确定</button>
							<button class="button" onclick="$('.movefade').fadeOut(600)">取消</button>
						</div>
					</div>
				</div>
			</div>

			<!--展示薪水的模态框-->
			<div class="modal addfade" id="addmodal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4>薪水展示</h4>
							<i onclick="$('.addfade').fadeOut(600);">X</i>
						</div>
						<div class="modal-body">
							<p>
								你的薪水是: <div id="showWorkerSalary"></div>
							</p>
						</div>
						<div class="modal-footer">
							<button class="button" onclick="$('.addfade').fadeOut(600);">确定</button>
						</div>
					</div>
				</div>
			</div>

			<section id="main-content">

				<div id="table">
					<div class='col-lg-12'>
						<div   class='card' style="background: #ffffff">
							<div>
								<h4 >薪水表</h4>
							</div>



							<div class='card-body'>
								<div class='table-responsive'>
									<table class='table student-data-table m-t-20'>
										<thead>
										<tr>
											<th>工资单id</th>
											<th>哪个月的工资</th>
											<th>发工资的日期</th>
											<th>薪水数量</th>
											<th>职工姓名</th>
											<th>
												<input type="button" id="changeSalary" class="button" onclick="$('.movefade').fadeIn(600)" value="改变职工薪水">
											</th>
										</tr>
										</thead>
										<tbody id="tabletext">
			</section>
		</div>
	</div>
</div>

<br>
输入工号:<input type="text" id="forFindSalaryFromWorkerNum" placeholder="查看当月薪水">
<input type="button" id="changeSalary" class="button2" onclick="findSalaryFromWorkerNum()" value="查看当月薪水">
<br><br>
工号:<input type="text" id="WorkerNum" placeholder="输入工号查询所有薪水单">
<input type="button" class="button2" onclick="find_salary()" value="查询所有薪水单">

<br>
年:<input type="text" id="year" placeholder="发工资年份">
月:<input type="text" id="month" placeholder="发工资月份">
<input type="button" id="handSalaryButton" class="button2" value="分发薪水" onclick="handSalary()">
<br>


<script src="/CodeIgniter-3.1.10/assets/js/salary.js"></script>

<!--jquery-->
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
