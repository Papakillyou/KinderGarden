//展示修改的页面，用于填写修改的信息
function showUpdate(studentPayId,studentPayStudentNumber, beforeUpdatestudentPaySuc) {
	$("#forUpdatestudentPayId").text(studentPayId);
	$("#forUpdatestudentPayStudentNumber").text(studentPayStudentNumber);
	$("#forUpdatestudentPaySuc").val(beforeUpdatestudentPaySuc);
	$(".movefade").fadeIn(600);
}

//真正修改的页面
function TrueUpdate() {
	var studentPayId=$("#forUpdatestudentPayId").text();
	//var studentPayStudentNumber=$("#forUpdatestudentPayStudentNumber").text();
	var studentPaySuc = $("#forUpdatestudentPaySuc").val();
	//alert(studentPayStudentNumber+","+beforeUpdatestudentPaySuc);
	$.ajax({
		type: "GET",
		url: "/CodeIgniter-3.1.10/index.php/StudentPayController/update?studentPayId="+studentPayId+
			"&studentPaySuc=" + studentPaySuc ,
		success: function (data) {
			alert("修改成功!");
			view();
		},
		error: function () {
			alert("修改失败!");
		}
	});
	$(".movefade").fadeOut(600);
}

function view() {
	console.log("view函数进来了！");
	$.ajax(
		{
			url:"/CodeIgniter-3.1.10/index.php/StudentPayController/view",
			dataType:"json",
			success:function (datas) {
				console.log(datas);
				var tbhtml ="";

				for (var i = 0; i < datas.length; i++) {

					var test= "<td><div onclick='showUpdate("+datas[i].studentPayId+",\""+datas[i].studentPayStudentNumber+"\"," +
						datas[i].studentPaySuc+")'><img src=\'/CodeIgniter-3.1.10/assets/images/编辑.png\'>编辑</div>" +
						"</td></tr>";
					// alert(test);
					tbhtml+="<tr><td>"+
						datas[i].studentPayStudentNumber+"</td><td>"+datas[i].studentPayTime+"</td><td>"+
						datas[i].studentPayCost+"</td><td>"+datas[i].studentPaySuc+"</td>"+test;
				}

				// console.log(tbhtml);
				$("#tablebody").html(tbhtml);
				//$("#tebletext").html(tbhtml);
			}
		}
	)
}
function find() {
	var studentPayStudentNumber=$("#find_studentpay").val();
	console.log(studentPayStudentNumber);
	if(studentPayStudentNumber==""){
		view();
		return;
	}
	$.ajax(
		{
			type:"GET",
			url:"/CodeIgniter-3.1.10/index.php/StudentPayController/find?studentPayStudentNumber="+studentPayStudentNumber,
			dataType:"json",
			error:function(){
				alert("请求失败,没有查找到该学生缴费信息");
			},
			success:function (datas) {
				var tbhtml ="";

				for (var i = 0; i < datas.length; i++) {
					var test= "<td><div onclick='showUpdate("+datas[i].studentPayId+",\""+datas[i].studentPayStudentNumber+"\"," +
						datas[i].studentPaySuc+")'><img src=\'/CodeIgniter-3.1.10/assets/images/编辑.png\'>编辑</div>" +
						"</td></tr>";
					// alert(test);
					tbhtml+="<tr><td>"+
						datas[i].studentPayStudentNumber+"</td><td>"+datas[i].studentPayTime+"</td><td>"+
						datas[i].studentPayCost+"</td><td>"+datas[i].studentPaySuc+"</td>"+test;
				}

				// console.log(tbhtml);
				$("#tablebody").html(tbhtml);
				//$("#tebletext").html(tbhtml);
			}
		}
	)
}
