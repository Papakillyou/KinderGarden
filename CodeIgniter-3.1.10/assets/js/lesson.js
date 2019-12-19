function show_update(id,week,first, second, third, fourth,classid) {
	$("#showUpdateLessonId").text(id);
	$("#showUpdateClass").text(classid);
	$("#showUpdateWeek").text(week);
	$("#UpdateLessonFirst").val(first);
	$("#UpdateLessonSecond").val(second);
	$("#UpdateLessonThird").val(third);
	$("#UpdateLessonFourth").val(fourth);
	$(".movefade").fadeIn(600);

}

function updateLesson() {
	var LessonId = $("#showUpdateLessonId").text();
	var LessonClassId = $("#showUpdateClass").text();
	var LessonWeek = $("#showUpdateWeek").text();
	var LessonFirst = $("#UpdateLessonFirst").val();
	var LessonSecond = $("#UpdateLessonSecond").val();
	var LessonThird = $("#UpdateLessonThird").val();
	var LessonFourth = $("#UpdateLessonFourth").val();
	url="/CodeIgniter-3.1.10/index.php/LessonController/updateLesson?LessonId=" + LessonId + "&LessonClass=" + LessonClassId +
		"&LessonWeek='" + LessonWeek + "'&LessonFirst=" + LessonFirst +
		"&LessonSecond=" + LessonSecond +
		"&LessonThird=" + LessonThird +
		"&LessonFourth=" + LessonFourth;
	$.get(url, function (data, status) {
		alert("修改完毕");
		view();
	});
	$(".movefade").fadeOut(600);

}

function add() {
	var LessonFirst = $("#forAddLessonFirst").val();
	var LessonSecond = $("#forAddLessonSecond").val();
	var LessonThird = $("#forAddLessonThird").val();
	var LessonFourth = $("#forAddLessonFourth").val();
	var LessonWeek = $("#forAddLessonWeek").val();
	var LessonClass = $("#forAddLessonClass").val();
	url="/CodeIgniter-3.1.10/index.php/LessonController/insertLesson?" +
		"LessonFirst="   + LessonFirst +
		"&LessonSecond=" + LessonSecond +
		"&LessonThird="  + LessonThird +
		"&LessonFourth=" + LessonFourth +
		"&LessonWeek="  + LessonWeek+
		"&LessonClass= " + LessonClass;
	$.ajax({
		url:url,
		error:function(){
			alert("插入失败!");
			view();
		},
		success:function () {
			alert("插入成功!");
			view();
		}
	});
	$('.addfade').fadeOut(600);

}

function remove(del_id) {
	$.ajax({
		url:"/CodeIgniter-3.1.10/index.php/LessonController/findById?LessonId="+del_id,
		dataType:"json",
		error:function(){alert("请求失败,没有该课程的信息!");},
		success:function (datas) {
			for(var i = 0;i<datas.length;i++){
				alert(
					"课程ID"+datas[i].LessonId+"\n" +
					"第一节课"+datas[i].LessonFirst+"\n" +
					"第一节课"+datas[i].LessonSecond+"\n" +
					"第三节课"+datas[i].LessonThird+"\n" +
					"第四节课"+datas[i].LessonFourth+"\n" +
					"星期"+datas[i].LessonWeek+"\n" +
					"班级"+datas[i].LessonClass+"\n" )
			}
			var se=confirm("确认删除？");

			$.ajax({
				url: "/CodeIgniter-3.1.10/index.php/LessonController/deleteLesson?LessonId=" + del_id,
				error: function () {alert("删除失败!");view();},
				success: function (data) {alert("删除成功!");view();}
			});
		}
	});
}

function view() {
	$.ajax(
		{
			type:"GET",
			url:"/CodeIgniter-3.1.10/index.php/LessonController/findAllLesson",
			dataType:"json",
			success:function (datas) {
				var tbhtml = "";
				for(var i = 0;i<datas.length;i++){

					var removeurl = "\"/CodeIgniter-3.1.10/index.php/LessonController/deleteLesson?LessonId=" + datas[i].id + "\"";
					var updateurl = datas[i].id + ",\'" + datas[i].LessonWeek + "\',\'" + datas[i].first + "\',\'" + datas[i].second + "\',\'"
						+ datas[i].third + "\',\'" + datas[i].fourth + "\',"+ datas[i].LessonClass;
					tbhtml+="<tr>" +
						"<td>"+datas[i].id+"</td>" +
						"<td>"+datas[i].LessonWeek+"</td>" +
						"<td>"+datas[i].first+"</td>" +
						"<td>"+datas[i].second+"</td>" +
						"<td>"+datas[i].third+"</td>" +
						"<td>"+datas[i].fourth+"</td>" +
						"<td>"+datas[i].LessonClass+"</td>" +
						"<td><div onclick=show_update(" + updateurl + ")><img src=\'/CodeIgniter-3.1.10/assets/images/编辑.png\'>编辑</div>" +
						"<div onclick=remove(" + datas[i].id + ")><img src=\'/CodeIgniter-3.1.10/assets/images/删除.png\'>删除 </div></td>" +
						"</tr>";
				}
				tbhtml +=
					"</tbody>" +
					"</table>";

				$("#tablebody").html(tbhtml);


			}
		}
	)
}


function findById() {
	var ClassId=$("#find_id").val();
	$.ajax(
		{
			type:"GET",
			url:"/CodeIgniter-3.1.10/index.php/LessonController/findByClass?ClassId="+ClassId,
			dataType:"json",
			error:function(){
				alert("请求失败,没有查找到该班级");
			},
			success:function (datas) {
				var tbhtml = "";
				for(var i = 0;i<datas.length;i++){

					var removeurl = "\"/CodeIgniter-3.1.10/index.php/LessonController/deleteLesson?LessonId=" + datas[i].id + "\"";
					var updateurl = datas[i].id + ",\'" + datas[i].LessonWeek + "\',\'" + datas[i].first + "\',\'" + datas[i].second + "\',\'"
						+ datas[i].third + "\',\'" + datas[i].fourth + "\',"+ datas[i].LessonClass;

					tbhtml+="<tr>" +
						"<td>"+datas[i].id+"</td>" +
						"<td>"+datas[i].LessonWeek+"</td>" +
						"<td>"+datas[i].first+"</td>" +
						"<td>"+datas[i].second+"</td>" +
						"<td>"+datas[i].third+"</td>" +
						"<td>"+datas[i].fourth+"</td>" +
						"<td>"+datas[i].LessonClass+"</td>" +
						"<td><div onclick=show_update(" + updateurl + ")><img src=\'/CodeIgniter-3.1.10/assets/images/编辑.png\'>编辑</div>" +
						"<div onclick=remove(" + datas[i].id + ")><img src=\'/CodeIgniter-3.1.10/assets/images/删除.png\'>删除 </div></td>" +
						"</tr>";
				}
				tbhtml +=
					"</tbody>" +
					"</table>";

				$("#tablebody").html(tbhtml);
			}
		}
	)
}
