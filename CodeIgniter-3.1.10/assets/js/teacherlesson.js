var TeacherName=-1;
var LessonName=-1;

function deleteTeacherLesson(DeleteTeacherName,DeleteLessonName) {
	var LessonName=DeleteLessonName;
	var TeacherName=DeleteTeacherName;
	$.ajax({
		url:"/CodeIgniter-3.1.10/index.php/TeacherLessonController/showTeacherLesson?teacherName="+TeacherName+"&lessonName="+LessonName,
		dataType:"json",
		success:function (datas){
			if(datas!=null)
			{
				alert("查询到原来的课程名和老师");
				$.get("/CodeIgniter-3.1.10/index.php/TeacherLessonController/deleteTeacherLesson?LessonName="+LessonName
					+"&TeacherName="+TeacherName,function (data,status) {
					alert("删除完毕");
					ShowTeacherLesson();})
			} else{
				alert("原课程姓名和老师有问题！");
				ShowTeacherLesson();
			}
		},
		error:function () {
			alert("原课程姓名和老师有问题！")
			ShowTeacherLesson();;
		}
	});

}

function updateTeacherLesson() {
	var TeacherLessonId=$("#forUpdateTeacherLessonId").text();
	var aftlsnm=$("#forUpdateTeacherLessonLessonName").val();
	var afttcnm=$("#forUpdateTeacherLessonTeacherName").val();
	$.get("/CodeIgniter-3.1.10/index.php/TeacherLessonController/updateTeacherLesson?aftlsnm="+aftlsnm +
		"&afttcnm="+afttcnm+"&teacherLessonId="+TeacherLessonId,function (data,status) {
		alert("修改完毕");});
	ShowTeacherLesson();
}

function addLessonTeacher() {

	var LessonName=$("#forAddTeacherLessonLessonName").val();
	var LessonTeacherName=$("#forAddTeacherLessonTeacherName").val();
	var se =confirm("课程姓名:"+LessonName+"\n"+"老师姓名:"+LessonTeacherName+"\n\n"+"确认添加？");
	if (se==true){
		$.ajax({
			url:"/CodeIgniter-3.1.10/index.php/TeacherLessonController/addTeacherLesson?teachername="+LessonTeacherName+"&lessonname="+LessonName,
			error:function () {
				alert("插入失败!");$(".addfade").fadeOut(600);
				TeacherName=$("#forAddTeacherLessonTeacherName").val();
				ShowTeacherLesson();
				},
			success:function () {
				alert("插入成功!");$(".addfade").fadeOut(600);
				TeacherName=$("#forAddTeacherLessonTeacherName").val();
				ShowTeacherLesson();
			}
		})
	}

}

function ShowTeacherLesson() {
	$.ajax({
		url:"/CodeIgniter-3.1.10/index.php/TeacherLessonController/showTeacherLesson?teacherName="+TeacherName+"&lessonName="+LessonName,
		dataType:"json",
		success:function (datas) {
			var tbhtml = "";
			for(var i = 0;i<datas.length;i++){
				tbhtml+="<tr><td>"+datas[i].lessonId+"</td><td>"+datas[i].lessonName+"</td><td>"+ datas[i].WorkerName+
					// 汉字需要转义
					"</td><td><div onclick='deleteTeacherLesson(\"" +datas[i].WorkerName+ "\",\""+datas[i].lessonName+
					"\")'><img src=\'/CodeIgniter-3.1.10/assets/images/删除.png\'>删除</div>" +
					"<div onclick='showUpdateTeacherLesson("+datas[i].lessonId+ ",\"" +datas[i].WorkerName+ "\",\""+datas[i].lessonName+
					"\")'><img src=\'/CodeIgniter-3.1.10/assets/images/修改.png\'>修改</div>" +
					"</td></tr>";
			}
			$("#tabletext").html(tbhtml);
		},
		error:function () {alert("显示失败!");}
	});
	TeacherName=-1;
	LessonName=-1;
}

function showUpdateTeacherLesson(TeacherLessonId,WorkerName,LessonName) {
	$("#forUpdateTeacherLessonId").text(TeacherLessonId);
	$("#forUpdateTeacherLessonLessonName").val(LessonName);
	$("#forUpdateTeacherLessonTeacherName").val(WorkerName);
	$(".movefade").fadeIn(600);
}

function findLessonFromAnyOne() {
	<!-- 没有输入老师名-->
	if($("#LessonTeacherName").val()!=''){
		TeacherName=$("#LessonTeacherName").val();
	}
	if($("#LessonName").val()!=''){
		LessonName=$("#LessonName").val();
	}
	ShowTeacherLesson();
	TeacherName=-1;
	LessonName=-1;
}
