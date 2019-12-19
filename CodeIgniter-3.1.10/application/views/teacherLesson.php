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
	<!--	/*搜索框，下拉框的style.*/-->
	<link href="/CodeIgniter-3.1.10/assets/css/ply.css" rel="stylesheet">
	<script src="/CodeIgniter-3.1.10/assets/js/teacherlesson.js"></script>

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
						<li><a>教师课程</a></li>
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

<!--主体部分-->
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
							<input type="button" id="showTeacherLessonButton" class="button2" value="查看所有课程老师情况" onclick="ShowTeacherLesson()">
						</div>
						<div style="width: 60%;float:left; box-sizing: border-box;">

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
							<h4>课程老师管理</h4>
							<i onclick="$('.addfade').fadeOut(600);">X</i>

						</div>
						<div class="modal-body">
							<p>
								课程姓名：<input type="text" id="forAddTeacherLessonLessonName"/>
							</p>
							<p>
								课程老师姓名：<input type="text" id="forAddTeacherLessonTeacherName"/>
						</div>
						<div class="modal-footer">
							<button class="button" onclick="addLessonTeacher()">确定</button>
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
							<p>
								课程id:
							<div id="forUpdateTeacherLessonId"></div>
							</p>
							<p>
								课程：<input type="text" id="forUpdateTeacherLessonLessonName"/>
							</p>
							<p>
								课程老师：<input type="text" id="forUpdateTeacherLessonTeacherName"/>
							</p>
						</div>
						<div class="modal-footer">
							<button class="button" onclick="updateTeacherLesson()">确定</button>
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
								<h4 >教师课程表</h4>
							</div>

							<div class='card-body'>
								<div class='table-responsive'>
									<table class='table student-data-table m-t-20'>
										<thead>
										<tr>
											<th>课程id</th>
											<th>课程姓名</th>
											<th>课程老师姓名</th>
											<th><input type="button" class="button" id="add_button" value="添加" onclick=" $('.addfade').fadeIn(600);"></th>
										</tr>
										</thead>
										<tbody id="tabletext">
			</section>
		</div>
	</div>

</div>

<form>
	<br><br>
	<p>
		输入课程老师姓名:<input type="text" id="LessonTeacherName" >
		输入课程姓名:<input type="text" id="LessonName">
		<input type="button" id="findLessonFromTeacherNameButton" class="button2" value="搜索" onclick="findLessonFromAnyOne()">
	</p>
	<!--  可以用 value 标识初始值。  将2个查看合并为一个 -->

</form>

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
