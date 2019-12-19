//添加
function add() {
	var WorkerType = $("input[name='forAddWorkerType']:checked").val();
	var WorkerGender=$("input[name='forAddWorkerSex']:checked").val();
	// var WorkerType = $("#forAddWorkerType").val();
	var WorkerName = $("#forAddWorkerName").val();
	var WorkerNumber = $("#forAddWorkerNumber").val();
	var WorkerIdCard = $("#forAddWorkerIdCard").val();
	// var WorkerGender = $("#forAddWorkerSex").val();
	var WorkerContact = $("#forAddWorkerPhone").val();
	var WorkerCardNumber = $('#forAddWorkerSalaryCardNumber').val();
	var WorkerEntryDate = $('#forAddWorkerEntryDate').val();
	var WorkerSalaryNum = $("#forAddWorkerSalary").val();
	$.ajax({
		url: "/CodeIgniter-3.1.10/index.php/WorkController/add?WorkerType=" + WorkerType + "&WorkerName=" + WorkerName
			+ "&WorkerNumber=" + WorkerNumber + "&WorkerIdCard=" + WorkerIdCard + "&WorkerGender=" + WorkerGender
			+ "&WorkerContact=" + WorkerContact + "&WorkerCardNumber=" + WorkerCardNumber + "&WorkerEntryDate=" + WorkerEntryDate
			+ "&WorkerSalaryNum=" + WorkerSalaryNum,
		error: function () {
			alert("插入失败!")
		},
		success: function () {
			alert("插入成功!");
		}
	});
	$('.addfade').fadeOut(600);
}

//移除
function remove(del) {
	// var del_Num=$("#del").val();
	var del_Num = del;
	$.ajax({
		url: "/CodeIgniter-3.1.10/index.php/WorkController/find?WorkerNumber=" + del_Num,
		dataType: "json",
		error: function () {
			alert("请求失败,没有该工作人员的信息!");
		},
		success: function (datas) {
			alert(datas);
			for (var i = 0; i < datas.length; i++) {
				alert("职工类型: " + datas[i].WorkerType + "\n" + "职工姓名:  " + datas[i].WorkerName + "\n" +
					"职工号:     " + datas[i].WorkerNumber + "\n" + "职工身份证号" + datas[i].WorkerIdCard + "\n" +
					"职工性别:   " + datas[i].WorkerGender + "\n" + "职工联系方式:" + datas[i].WorkerContact + "\n" +
					"职工工资卡号:" + datas[i].WorkerCardNumber + "\n" + "职工入职时间:" + datas[i].WorkerEntryDate + "\n")
			}
			var se = confirm("确认删除？");

			<!--要确认该教师已经没有教课了。-->
			if (se == true) {
				$.ajax({
					url: "/CodeIgniter-3.1.10/index.php/WorkController/remove?WorkerNumber=" + del_Num,
					error: function () {
						alert("删除失败!请先删除该老师的课程！");
					},
					success: function (data) {
						alert("删除成功!");
					}
				});
			}
		}
	});
}

//查看选项
function view() {
	var type = document.getElementById("type").value;
	$.ajax(
		{
			type: "GET",
			url: "/CodeIgniter-3.1.10/index.php/WorkController/view?type=" + type,
			dataType: "json",
			success: function (datas) {
				var tbhtml = "";
				for (var i = 0; i < datas.length; i++) {
					tbhtml += "<tr><td>" + datas[i].WorkerType + "</td><td>" +
						datas[i].WorkerName + "</td><td>" + datas[i].WorkerNumber + "</td><td>" +
						datas[i].WorkerIdCard + "</td><td>" + datas[i].WorkerGender + "</td><td>" +
						datas[i].WorkerContact + "</td><td>" + datas[i].WorkerCardNumber + "</td><td>" +
						datas[i].WorkerEntryDate +
						"</td><td><div onclick='remove(" + datas[i].WorkerNumber + ")'>" +
						"<img src=\'/CodeIgniter-3.1.10/assets/images/删除.png\'>删除</div>" + "</td><td>"
						+ "</td><td><div onclick='showUpdate(" + datas[i].WorkerNumber + ",\"" + String(datas[i].WorkerName) + "\",\"" +
						String(datas[i].WorkerGender) + "\"," +
						datas[i].WorkerContact + "," + datas[i].WorkerCardNumber + ")'>" +
						"<img src=\'/CodeIgniter-3.1.10/assets/images/修改.png\'>修改</div>" + "</td></tr>";
					//用来展示修改模态框

				}
				$("#tabletext").html(tbhtml);

			}
		}
	)
}

//展示修改的页面，用于填写修改的信息
function showUpdate(WorkerNumber, beforeUpdateName, beforeUpdateSex, beforeUpdatePhone, beforeUpdateNameCardId) {
	$("#forUpdateWorkerNumber").text(WorkerNumber);
	$("#forUpdateName").val(beforeUpdateName);
	$("#forUpdateSex").val(beforeUpdateSex);
	$("#forUpdateCardId").val(beforeUpdateNameCardId);
	$("#forUpdatePhone").val(beforeUpdatePhone);
	$(".movefade").fadeIn(600);
}

//真正修改的页面
function TrueUpdate() {
	var WorkerNumber = $("#forUpdateWorkerNumber").text();
	var WorkerName = $("#forUpdateName").val();
	var WorkerGender = $("#forUpdateSex").val();
	var WorkerContact = $("#forUpdatePhone").val();
	var WorkerCardNumber = $('#forUpdateCardId').val();
	$.ajax({
		type: "GET",
		url: "/CodeIgniter-3.1.10/index.php/WorkController/update?WorkerName=" + WorkerName +
			"&WorkerNumber=" + WorkerNumber + "&WorkerGender=" + WorkerGender + "&WorkerContact=" + WorkerContact +
			"&WorkerCardNumber=" + WorkerCardNumber,
		success: function () {
			alert("修改成功!");
		},
		error: function () {
			alert("修改失败!");
		}
	});
	$(".movefade").fadeOut(600);
}

//查找
function find() {
	var WorkNum = $("#find_worker").val();
	$.ajax(
		{
			type: "GET",
			url: "/CodeIgniter-3.1.10/index.php/WorkController/find?WorkerNumber=" + WorkNum,
			dataType: "json",
			error: function () {
				alert("请求失败,没有查找到该工作人员");
			},
			success: function (datas) {
				var tbhtml = "";
				for (var i = 0; i < datas.length; i++) {
					tbhtml += "<tr><td>" + datas[i].WorkerType + "</td><td>" +
						datas[i].WorkerName + "</td><td>" + datas[i].WorkerNumber + "</td><td>" +
						datas[i].WorkerIdCard + "</td><td>" + datas[i].WorkerGender + "</td><td>" +
						datas[i].WorkerContact + "</td><td>" + datas[i].WorkerCardNumber + "</td><td>" +
						datas[i].WorkerEntryDate + "</td><td onclick='remove(" + datas[i].WorkerNumber + ")'>" +
						"删除" + "</td><td>" + "</td><td onclick='showUpdate(" + datas[i].WorkerNumber + ",\"" + String(datas[i].WorkerName) + "\",\"" +
						String(datas[i].WorkerGender) + "\"," +
						datas[i].WorkerContact + "," + datas[i].WorkerCardNumber + ")'>" +
						"修改" + "</td></tr>";
				}
				$("#tabletext").html(tbhtml);
			}
		}
	)
}

