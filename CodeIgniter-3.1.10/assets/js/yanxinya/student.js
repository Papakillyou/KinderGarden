
//展示修改的页面，用于填写修改的信息
function showUpdate(StudentNumber, beforeUpdateStudentName, beforeUpdateStudentSex,
					beforeUpdateStudentAdress,beforeUpdateStudentParentName,beforeUpdateStudentParentPhone,
					beforeUpdateStudentParentRelation,beforeUpdateStudentTime,beforeUpdateStudentClassId) {
	//alert(StudentNumber+","+beforeUpdateStudentName+","+beforeUpdateStudentSex+"."+beforeUpdateStudentAdress+" "+beforeUpdateStudentParentName);
	$("#forUpdateStudentNumber").text(StudentNumber);
	$("#forUpdateStudentName").val(beforeUpdateStudentName);
	$("#forUpdateStudentSex").val(beforeUpdateStudentSex);
	$("#forUpdateStudentAdress").val(beforeUpdateStudentAdress);
	$("#forUpdateStudentParentName").val(beforeUpdateStudentParentName);
	$("#forUpdateStudentParentPhone").val(beforeUpdateStudentParentPhone);
	$("#forUpdateStudentParentRelation").val(beforeUpdateStudentParentRelation);
	$("#forUpdateStudentTime").val(beforeUpdateStudentTime);
	$("#forUpdateStudentClassId").val(beforeUpdateStudentClassId);
	$(".movefade").fadeIn(600);

}

//真正修改的页面
function TrueUpdate() {
	var StudentNumber=$("#forUpdateStudentNumber").text();
	var StudentName = $("#forUpdateStudentName").val();
	var StudentSex = $("#forUpdateStudentSex").val();
	var StudentAdress = $("#forUpdateStudentAdress").val();
	var StudentParentName = $('#forUpdateStudentParentName').val();
	var StudentParentPhone = $('#forUpdateStudentParentPhone').val();
	var StudentParentRelation = $('#forUpdateStudentParentRelation').val();
	var StudentInTime = $('#forUpdateStudentTime').val();
	var StudentClassId = $('#forUpdateStudentClassId').val();


	$.ajax({
		type: "GET",
		url: "/CodeIgniter-3.1.10/index.php/StudentController/update?StudentNumber=" +StudentNumber+
			"&StudentName=" + StudentName +
			"&StudentSex=" + StudentSex +
			"&StudentAdress=" + StudentAdress+
			"&StudentParentName=" + StudentParentName+
			"&StudentParentPhone=" + StudentParentPhone+
			"&StudentParentRelation=" + StudentParentRelation+
			"&StudentInTime=" + StudentInTime+
			"&StudentClassId=" + StudentClassId,
		success: function (data) {
			//alert(data);
			alert("修改成功!");
			view();
		},
		error: function () {
			alert("修改失败!");
		}
	});
	$(".movefade").fadeOut(600);
}
function add() {
	console.log("添加函数进来了哦！");
	var StudentNumber = $("#forAddStudentNumber").val();
	var StudentName = $("#forAddStudentName").val();
	//var StudentSex = $("#forUpdateStudentSex").val();
	var StudentAdress = $("#forAddStudentAddress").val();
	var StudentParentName = $("#forAddStudentParentName").val();
	var StudentParentPhone = $("#forAddStudentParentPhone").val();
	var StudentParentRelation = $("#forAddStudentParentRelation").val();
	var StudentInTime = $("#forAddStudentTime").val();
	var StudentClassId = $("#forAddStudentClassId").val();
	var StudentSex=$('input:radio:checked').val();
	$.ajax({
		url:"/CodeIgniter-3.1.10/index.php/StudentController/add?StudentNumber="+StudentNumber+"&StudentName="
			+StudentName+"&StudentSex="+StudentSex+"&StudentAdress="+StudentAdress+"&StudentParentName="+StudentParentName+
			"&StudentParentPhone="+StudentParentPhone+"&StudentParentRelation="+StudentParentRelation
			+"&StudentInTime="+StudentInTime+"&StudentClassId="+StudentClassId,
		error:function(){alert("插入失败!")},
		success:function () {alert("插入成功!");}
	})
	$('.addfade').fadeOut(600);
}

function remove(del) {
	console.log("删除进来了！");
	var del_Number=del;
	var se=confirm("确认删除？");
	//alert(del_Number);
	<!--要确认该教师已经没有教课了。-->
	if(se==true) {
		$.ajax({
			url:"/CodeIgniter-3.1.10/index.php/StudentController/remove?StudentNumber="+del_Number,
			error: function () {alert("删除该学生信息失败！！");},
			success: function (data) {alert("删除成功!");
				//alert(data);
				view();
			}
		});
	}

}

function view() {
	console.log("view（）函数进来啦！");
	$.ajax(
		{
			url:"/CodeIgniter-3.1.10/index.php/StudentController/view",
			dataType:"json",
			success:function (datas) {
				console.log(datas);
				var tbhtml ="";

				for (var i = 0; i < datas.length; i++) {
					var test="<td><div onclick='showUpdate("+datas[i].StudentNumber+"," +
						"\""+datas[i].StudentName+"\"," +
						"\""+datas[i].StudentSex+"\"," +
						"\""+datas[i].StudentAdress+"\"," +
						"\""+datas[i].StudentParentName+"\"," +
						"\""+datas[i].StudentParentPhone+"\"," +
						"\""+datas[i].StudentParentRelation+"\"," +
						datas[i].StudentInTime+"," +
						datas[i].StudentClassId+")'><img src=\'/CodeIgniter-3.1.10/assets/images/编辑.png\'>编辑</div>" +
						"<div onclick='remove("+datas[i].StudentNumber+")'><img src=\'/CodeIgniter-3.1.10/assets/images/删除.png\'>删除 </div></td>" +
						"</tr>";
					// alert(test);
					tbhtml+="<tr><td>"+
						datas[i].StudentNumber+"</td><td>"+datas[i].StudentName+"</td><td>"+
						datas[i].StudentSex+"</td><td>"+datas[i].StudentAdress+"</td><td>"+
						datas[i].StudentParentName+"</td><td>"+datas[i].StudentParentPhone+"</td><td>"+
						datas[i].StudentParentRelation+"</td><td>"+datas[i].StudentInTime+"</td><td>"+
						datas[i].StudentClassId+"</td>"+test;
				}
				$("#tablebody").html(tbhtml);
			}
		}
	)
}


function find() {
	var StudentNumber=$("#find_student").val();
	console.log(StudentNumber);
	if(StudentNumber==""){
		view();
		//alert("find空函数进来了");
		return;
	}
	$.ajax(
		{
			type:"GET",
			url:"/CodeIgniter-3.1.10/index.php/StudentController/find?StudentNumber="+StudentNumber,
			dataType:"json",
			error:function(){
				alert("请求失败,没有查找到该学生");
			},
			success:function (datas) {
				// console.log(datas);
				var tbhtml ="";

				for (var i = 0; i < datas.length; i++) {


					var test="<td><div onclick='showUpdate("+datas[i].StudentNumber+"," +
						"\""+datas[i].StudentName+"\"," +
						"\""+datas[i].StudentSex+"\"," +
						"\""+datas[i].StudentAdress+"\"," +
						"\""+datas[i].StudentParentName+"\"," +
						"\""+datas[i].StudentParentPhone+"\"," +
						"\""+datas[i].StudentParentRelation+"\"," +
						datas[i].StudentInTime+"," +
						datas[i].StudentClassId+")'><img src=\'/CodeIgniter-3.1.10/assets/images/编辑.png\'>编辑</div>" +
						"<div onclick='remove("+datas[i].StudentNumber+")'><img src=\'/CodeIgniter-3.1.10/assets/images/删除.png\'>删除 </div></td>" +
						"</tr>";
					// alert(test);
					tbhtml+="<tr><td>"+
						datas[i].StudentNumber+"</td><td>"+datas[i].StudentName+"</td><td>"+
						datas[i].StudentSex+"</td><td>"+datas[i].StudentAdress+"</td><td>"+
						datas[i].StudentParentName+"</td><td>"+datas[i].StudentParentPhone+"</td><td>"+
						datas[i].StudentParentRelation+"</td><td>"+datas[i].StudentInTime+"</td><td>"+
						datas[i].StudentClassId+"</td>"+test;
				}
				$("#tablebody").html(tbhtml);
			}
		}
	)
}
