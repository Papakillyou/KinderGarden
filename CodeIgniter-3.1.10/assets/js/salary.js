function showAllSalary() {
	$.ajax({
		url:"/CodeIgniter-3.1.10/index.php/WorkerSalaryController/selectFromNum?WorkerNum=-1",
		dataType:"json",
		success:function (datas) {
			var tbhtml = "";
			for(var i = 0;i<datas.length;i++){
				tbhtml+="<tr><td>"+datas[i].SalaryId+"</td><td>"+datas[i].WorkerSalaryYear+"-"+
					datas[i].WorkerSalaryMonth+"</td><td>"+datas[i].SalaryDate+"</td><td>"+
					datas[i].SalaryCost+"</td><td>"+datas[i].WorkerName+"</td><td></td></tr>";
			}
			$("#tabletext").html(tbhtml);
		},
		error:function () {
			alert("显示失败!");
		}
	})
}

function handSalary() {
	Date.prototype.format = function (fmt) {
		var o = {
			"M+": this.getMonth() + 1, //月份
			"d+": this.getDate(), //日
			"h+": this.getHours(), //小时
			"m+": this.getMinutes(), //分
			"s+": this.getSeconds(), //秒
			"q+": Math.floor((this.getMonth() + 3) / 3), //季度
			"S": this.getMilliseconds() //毫秒
		};
		if (/(y+)/.test(fmt)) fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
		for (var k in o)
			if (new RegExp("(" + k + ")").test(fmt)) fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(("" + o[k]).length)));
		return fmt;
	}

	var SalaryYear=$("#year").val();
	var SalaryMonth=$("#month").val();
	var Today=new Date();
	Today.setDate(Today.getDate());
	var Today2 = Today.format("yyyy-MM-dd");
	$.ajax({
		url:"/CodeIgniter-3.1.10/index.php/WorkerSalaryController/sendSalary?SalaryYear="+SalaryYear+"&SalaryMonth="+SalaryMonth+"&SendDay="+Today2,
		success:function () {alert("插入成功!");},
		error:function () {alert("插入失败!");}
	})

}

function findSalaryFromWorkerNum() {
	var WorkerNum=$("#forFindSalaryFromWorkerNum").val();
	$.ajax({
		url:"/CodeIgniter-3.1.10/index.php/WorkerSalaryController/findSalaryFromNum?WorkerNum="+WorkerNum,
		dataType: "json",
		success:function (datas) {
			var print="";
			print=datas[0].SalaryNum;
			$("#showWorkerSalary").text(print);
			$(".addfade").fadeIn(600);

		}
	})
}
function edit_salary() {
	var WorkerNum=$("#forUpdateWorkerNumber").val();
	var ChangedSalary=$("#forUpdateWorkerSalary").val();
	<!-- 首先要输出它现在的工资.然后让他确认是否更改工资。-->
	$.ajax({
		url:"/CodeIgniter-3.1.10/index.php/WorkerSalaryController/findSalaryFromNum?WorkerNum="+WorkerNum,
		dataType: "json",
		success:function (datas) {
			var print="";
			print=datas[0].SalaryNum;
			alert("当前工资是:"+print+"\n改变后的工资是:"+ChangedSalary);
			var se=confirm("确认更改？");
			if(se==true)
			{
				$.ajax({
					url:"/CodeIgniter-3.1.10/index.php/WorkerSalaryController/editWorkerSalary?WorkerNum="+WorkerNum+"&ChangedSalary="+ChangedSalary,
					success:function () {alert("修改成功!");},
					error:function () {alert("修改失败!");}
				})
			}
		}
	})
}

function find_salary() {
	var WorkerNum=$("#WorkerNum").val();
	$.ajax({
		url:"/CodeIgniter-3.1.10/index.php/WorkerSalaryController/selectFromNum?WorkerNum="+WorkerNum,
		dataType:"json",
		success:function (datas) {
			var tbhtml = "";
			for(var i = 0;i<datas.length;i++){
				tbhtml+="<tr><td>"+datas[i].SalaryId+"</td><td>"+datas[i].WorkerSalaryYear+"-"+
					datas[i].WorkerSalaryMonth+"</td><td>"+datas[i].SalaryDate+"</td><td>"+
					datas[i].SalaryCost+"</td><td>"+datas[i].WorkerName+"</td></tr>";
			}
			$("#tabletext").html(tbhtml);
		},
		error:function () {
			alert("查找失败!");
		}
	})
}
