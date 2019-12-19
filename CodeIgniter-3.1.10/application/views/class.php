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
<!--侧边栏-->
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
				<li><a><img src="/CodeIgniter-3.1.10/assets/images/tubiao/班级.png"
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
								年级
								<input type="text" id="find_grade" placeholder="low/middle/high">
								班级
								<input type="text" id="find_class" placeholder="班级名">
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
							<h4 align="center">添加班级</h4>
							<i onclick="$('.addfade').fadeOut(600);">X</i>
						</div>
						<div class="modal-body">
							<table>
								<tr><td>年级：</td><td><input type="text" id="forAddClassGrade"/></td></tr>
								<tr><td>班级：</td><td><input type="text" id="forAddClassClass"/></td></tr>
								<tr><td>班主任：</td><td><input type="text" id="forAddClassBossId"/></td></tr>
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
							<h4>班级修改</h4>
							<i onclick="$('.movefade').fadeOut(600)">X</i>
						</div>
						<div class="modal-body">
							<table>
								<tr><td>班级编号:</td><td><div id="showUpdateId"></div></td></tr>
								<tr><td>年级:</td><td><div id="showUpdateGrade"></div></td></tr>
								<tr><td>班级:</td><td><div id="showUpdateClass"></div></td></tr>
								<tr><td>班主任:</td><td><input type="text" id="UpdateClassBossName"/></td></tr>
							</table>

						</div>
						<div class="modal-footer">
							<button class="button" onclick="updateClass()">确定</button>
							<button class="button" onclick="$('.movefade').fadeOut(600)">取消</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /# row -->
		<section id="main-content">

			<div id="table">
				<div class='col-lg-12'>
					<div   class='card' style="background: #ffffff">
<!--						<div class='card-title pr'>-->
						<div>
						<h4 >班级表</h4>
						</div>

						<div>
							<form class="select">

								<select id="type" onchange="view()">
									<option disabled selected>---请选择---</option>
									<option value="全部">全部</option>
									<option value="low">小班</option>
									<option value="middle">中班</option>
									<option value="high">大班</option>
								</select>
							</form>
						</div>

						<div class='card-body'>
						<div class='table-responsive'>
							<table class='table student-data-table m-t-20'>
							<thead>
							<tr>
								<th>班级编号</th>
								<th>年级</th>
								<th>班级</th>
								<th>班主任</th>
								<th><input type="button" class="button" id="add_button" value="添加" onclick=" $('.addfade').fadeIn(600);"></th>

							</tr>
							</thead>
							<tbody id="tablebody">


		</section>
	</div>
</div>

</div>

<!-- jquery vendor -->

</body>



<script src="/CodeIgniter-3.1.10/assets/js/lib/jquery.min.js"></script>

<!-- nano scroller -->
<script src="/CodeIgniter-3.1.10/assets/js/lib/jquery.nanoscroller.min.js"></script>

<!-- sidebar -->
<script src="/CodeIgniter-3.1.10/assets/js/lib/menubar/sidebar.js"></script>

<script src="/CodeIgniter-3.1.10/assets/js/lib/preloader/pace.min.js"></script>

<!-- scripit init-->
<script src="/CodeIgniter-3.1.10/assets/js/dashboard2.js"></script>

<!--scripit class-->
<script src="/CodeIgniter-3.1.10/assets/js/class.js"></script>
</html>


