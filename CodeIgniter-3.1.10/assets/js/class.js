function show_update(ClassId, ClassGrade, ClassClass, name) {
	$("#showUpdateId").text(ClassId);
	$("#showUpdateGrade").text(ClassGrade);
	$("#showUpdateClass").text(ClassClass);
	$('#UpdateClassBossName').val(name);
	$(".movefade").fadeIn(600);

}

function updateClass() {
	var ClassId = $("#showUpdateId").text();
	var ClassGrade = $("#showUpdateGrade").text();
	var ClassClass = $("#showUpdateClass").text();
	var ClassBossName = $("#UpdateClassBossName").val();
	$.get("/CodeIgniter-3.1.10/index.php/ClassController/updateClass?ClassId=" + ClassId + "&ClassGrade='" + ClassGrade +
		"'&ClassClass=" + ClassClass + "&ClassBossName='" + ClassBossName + "'", function (data, status) {
		alert("修改完毕");
		view();
	});
	$(".movefade").fadeOut(600);

}

function add() {
	var ClassGrade = $("#forAddClassGrade").val();
	var ClassClass = $("#forAddClassClass").val();
	var ClassBossId = $("#forAddClassBossId").val();
	$.ajax({
		url: "/CodeIgniter-3.1.10/index.php/ClassController/insertClass?ClassGrade=" + ClassGrade + "&ClassClass=" + ClassClass
			+ "&ClassBossId=" + ClassBossId,
		error: function () {
			alert("插入失败!")
			view();
		},
		success: function () {
			alert("插入成功!");
			view();
		}
	});
	$('.addfade').fadeOut(600);

}

function deletee(del_id) {
	$.ajax({
		url: "/CodeIgniter-3.1.10/index.php/ClassController/findById?ClassId=" + del_id,
		dataType: "json",
		error: function () {
			alert("请求失败,没有该班级的信息!");
		},
		success: function (datas) {
			for (var i = 0; i < datas.length; i++) {
				alert(
					"班级ID: " + datas[i].classId + "\n" +
					"年级:  " + datas[i].classGrade + "\n" +
					"班级:     " + datas[i].classClass + "\n" +
					"班主任:" + datas[i].classBossId + "\n")
			}
			var se = confirm("确认删除？");

			$.ajax({
				url: "/CodeIgniter-3.1.10/index.php/ClassController/deleteClass?ClassId=" + del_id,
				error: function () {
					alert("删除失败!");

					view();
				},
				success: function (data) {
					alert("删除成功!");

					view();
				}
			});
		}
	});
}

function view() {
	var type = document.getElementById("type").value;
	$.ajax(
		{
			type: "GET",
			url: "/CodeIgniter-3.1.10/index.php/ClassController/view?type=" + type,
			dataType: "json",
			success: function (datas) {
				var tbhtml="";

				for (var i = 0; i < datas.length; i++) {
					var removeurl = "\"/CodeIgniter-3.1.10/index.php/ClassController/deleteClass?ClassId=" + datas[i].classId + "\"";
					var updateurl = datas[i].classId + ",'" + datas[i].classGrade + "'," + datas[i].classClass + ",'" + datas[i].name + "'";
					tbhtml += "<tr>" +
						"<td>" + datas[i].classId + "</td>" +
						"<td>" + datas[i].classGrade + "</td>" +
						"<td>" + datas[i].classClass + "</td>" +
						"<td>" + datas[i].name + "</td>" +
						"<td><div onclick=show_update(" + updateurl + ")><img src=\'/CodeIgniter-3.1.10/assets/images/编辑.png\'>编辑</div>" +
						"<div onclick=deletee(" + datas[i].classId + ")><img src=\'/CodeIgniter-3.1.10/assets/images/删除.png\'>删除 </div></td>" +
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

function find() {
	var ClassGrade = $("#find_grade").val();
	var ClassClass = $("#find_class").val();
	$.ajax(
		{
			type: "GET",
			url: "/CodeIgniter-3.1.10/index.php/ClassController/getByGradeAndClass?Grade=" + ClassGrade + "&Class=" + ClassClass,
			// url:"/CodeIgniter-3.1.10/index.php/ClassController/getByGradeAndClass?Grade="+ClassGrade+"&Class="+ClassClass,
			dataType: "json",
			error: function () {
				alert("请求失败,没有查找到该班级");
			},
			success: function (datas) {
				var tbhtml = "";
				for (var i = 0; i < datas.length; i++) {
					var removeurl = "\"/CodeIgniter-3.1.10/index.php/ClassController/deleteClass?ClassId=" + datas[i].classId + "\"";
					var updateurl = datas[i].classId + ",'" + datas[i].classGrade + "'," + datas[i].classClass + ",'" + datas[i].name + "'";
					tbhtml += "<tr>" +
						"<td>" + datas[i].classId + "</td>" +
						"<td>" + datas[i].classGrade + "</td>" +
						"<td>" + datas[i].classClass + "</td>" +
						"<td>" + datas[i].name + "</td>" +
						"<td><div onclick=show_update(" + updateurl + ")><img src=\'/CodeIgniter-3.1.10/assets/images/编辑.png\'>编辑</div>" +
						"<div onclick=deletee(" + datas[i].classId + ")><img src=\'/CodeIgniter-3.1.10/assets/images/删除.png\'>删除 </div></td>" +
						"</tr>";
				}
				$("#tablebody").html(tbhtml);
			}
		}
	)
}

function findById() {
	var ClassId = $("#find_id").val();
	$.ajax(
		{
			type: "GET",
			url: "/CodeIgniter-3.1.10/index.php/ClassController/findById?ClassId=" + ClassId,
			dataType: "json",
			error: function () {
				alert("请求失败,没有查找到该班级");
			},
			success: function (datas) {
				var tbhtml ="";
				for (var i = 0; i < datas.length; i++) {
					var removeurl = "\"/CodeIgniter-3.1.10/index.php/ClassController/deleteClass?ClassId=" + datas[i].classId + "\"";
					var updateurl = datas[i].classId + ",'" + datas[i].classGrade + "'," + datas[i].classClass + ",'" + datas[i].name + "'";
					tbhtml += "<tr>" +
						"<td>" + datas[i].classId + "</td>" +
						"<td>" + datas[i].classGrade + "</td>" +
						"<td>" + datas[i].classClass + "</td>" +
						"<td>" + datas[i].classBossId + "</td>" +
						"<td>  <div onclick=deletee(" + datas[i].classId + ")>删除 </div>     </td>" +
						"<td><div onclick=show_update(" + updateurl + ")>编辑</div></td>" +
						"</tr>";
				}
				$("#tablebody").html(tbhtml);
			}
		}
	)
}

