<!DOCTYPE html>
<html lang="en" xmlns:display="http://www.w3.org/1999/xhtml">
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


	<!--下面是增加和修改的模态框-->
	<!--	<link href="/CodeIgniter-3.1.10/assets/css/motai.css" rel="stylesheet">-->
	<!--	<script src="/CodeIgniter-3.1.10/assets/js/jquery-3.4.1.min.js"></script>-->
</head>
<body>
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
						<li><a href="WorkerSalaryController">工资管理</a></li>
					</ul>
				<li><a class="sidebar-sub-toggle"><img src="/CodeIgniter-3.1.10/assets/images/tubiao/学生.png"
																				  style="width:19px;height:19px;">&nbsp;&nbsp;&nbsp;&nbsp;学生<span
							class="sidebar-collapse-icon ti-angle-down"></span></a>
					<ul>
						<li><a href="StudentController">学生管理</a></li>
					</ul>
					<ul>
						<li><a>学生缴费管理</a></li>
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

<!-- /# 顶部 -->
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
							<form>

								<input type="text" id="find_studentpay" placeholder="学生学号">
								<input type="button" class="button2" value="查找" onclick="find()">
							</form>
						</div>
					</div>
				</div>
				<!-- /# column -->
			</div>

<!--修改的模态框-->
<div class="modal movefade movemodal" id="movemodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<i onclick="$('.movefade').fadeOut(600)">X</i>
				<h4>学生缴费信息修改</h4>

			</div>

			<div class="modal-body">
				<div display:none id="forUpdatestudentPayId"></div>
                <p>
					学号:<div id="forUpdatestudentPayStudentNumber"></div>
            	</p>
				<p>
					是否已经缴费：<input type="text" id="forUpdatestudentPaySuc"/>
				</p>
			</div>

			<div class="modal-footer">
				<button class="addbtn_ok" onclick="TrueUpdate()">确定</button>
				<button class="addbtn_no" onclick="$('.movefade').fadeOut(600)">取消</button>
			</div>
		</div>
	</div>
</div>
			<section id="main-content">

				<div id="table">
					<div class='col-lg-12'>
						<div   class='card' style="background: #ffffff">
							<!--						<div class='card-title pr'>-->
							<div>
								<h4 >学生缴费表</h4>
								<form>
									<input type="button" id="view_button" class="button2" value="显示全部缴费信息" onclick="view()">
								</form>
							</div>
							<div class='card-body'>
								<div class='table-responsive'>
									<table class='table student-data-table m-t-20'>
										<thead>
										<tr>
											<th>学号</th>
											<th>缴费时间</th>
											<th>费用</th>
											<th>是否已缴费</th>
											<th></th>

										</tr>
										</thead>
										<tbody id="tablebody">


			</section>

<br>
			<script src="/CodeIgniter-3.1.10/assets/js/lib/jquery.min.js"></script>

			<!-- nano scroller -->
			<script src="/CodeIgniter-3.1.10/assets/js/lib/jquery.nanoscroller.min.js"></script>

			<!-- sidebar -->
			<script src="/CodeIgniter-3.1.10/assets/js/lib/menubar/sidebar.js"></script>

			<script src="/CodeIgniter-3.1.10/assets/js/lib/preloader/pace.min.js"></script>

			<!-- scripit init-->
			<script src="/CodeIgniter-3.1.10/assets/js/dashboard2.js"></script>
			<script src="/CodeIgniter-3.1.10/assets/js/yanxinya/studentpay.js"></script>
</body>
</html>


