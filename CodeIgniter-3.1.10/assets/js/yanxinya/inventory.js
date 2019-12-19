//展示修改的页面，用于填写修改的信息
function showUpdate( beforeUpdateInventoryName, beforeUpdateInventoryTotal, beforeUpdateInventoryLeft, beforeUpdateInventorySingelPrice) {
	$("#forUpdateInventoryName").val(beforeUpdateInventoryName);
	$("#forUpdateInventoryTotal").val(beforeUpdateInventoryTotal);
	$("#forUpdateInventorySingelPrice").val(beforeUpdateInventorySingelPrice);
	$("#forUpdateInventoryLeft").val(beforeUpdateInventoryLeft);
	$(".movefade").fadeIn(600);
}

//真正修改的页面
function TrueUpdate() {
	var InventoryName = $("#forUpdateInventoryName").val();
	var InventoryTotal = $("#forUpdateInventoryTotal").val();
	var InventoryLeft = $("#forUpdateInventoryLeft").val();
	var InventorySingelPrice = $('#forUpdateInventorySingelPrice').val();
	//alert(InventoryName+"  "+InventoryTotal+" "+InventoryLeft+" "+InventorySingelPrice);
	// alert(InventoryName+","+WorkerName+","+WorkerGender+"."+WorkerContact+">"+WorkerCardNumber);
	$.ajax({
		type: "GET",
		url: "/CodeIgniter-3.1.10/index.php/InventoryController/update?InventoryName=" + InventoryName + "&InventoryTotal="
			+ InventoryTotal + "&InventoryLeft=" + InventoryLeft +
			"&InventorySingelPrice=" + InventorySingelPrice,
		success: function (data) {
			// alert(data);
			alert("修改成功!");
			view();
		},
		error: function () {
			alert("修改失败!");
		}
	});
	$(".movefade").fadeOut(600);
}

function remove(del) {
	//alert("删除函数进来了！");
	// var del_Num=$("#del").val();
	var del_Name = del;
	//alert(del_Name);
	var url="/CodeIgniter-3.1.10/index.php/InventoryController/remove?InventoryName=" + del_Name;
	var se = confirm("确认删除？");
	if (se == true) {
		$.ajax({
			url: url,
			error: function () {
				alert("删除失败!该教具不存在！");
			},
			success: function (data) {
				//alert(url);
				alert("删除成功!");
				view();
			}
		});
	}

}

function view() {
	console.log("view函数进来了！");
	$.ajax({
		url:"/CodeIgniter-3.1.10/index.php/InventoryController/view",
		dataType:"json",
		success:function (datas) {
			console.log(datas);
			var tbhtml = "";
			for (var i = 0; i < datas.length; i++) {

				var test="</td><td><div onclick='showUpdate(\"" + datas[i].InventoryName + "\"," + (datas[i].InventoryTotal) + "," +
					(datas[i].InventoryLeft) + "," +
					String(datas[i].InventorySingelPrice) + ")'><img src=\'/CodeIgniter-3.1.10/assets/images/编辑.png\'>编辑</div>" +
					"<div onclick='remove(\""+datas[i].InventoryName+ "\")'><img src=\'/CodeIgniter-3.1.10/assets/images/删除.png\'>删除 </div></td>" +
					"</tr>";
				// alert(test);
				tbhtml+="<tr><td>" +
					datas[i].InventoryName + "</td><td>" + datas[i].InventoryTotal + "</td><td>" +
					datas[i].InventoryLeft+"</td><td>" + datas[i].InventorySingelPrice+test;
			}
			console.log(tbhtml);
			$("#tablebody").html(tbhtml);
		}
	})
}

function add() {
	console.log("添加函数进来了哦！")
	var InventoryName = $("#forAddInventoryName").val();
	var InventoryTotal = $("#forAddInventoryTotal").val();
	var InventoryLeft = $("#forAddInventoryLeft").val();
	var InventorySingelPrice = $("#forAddInventorySingelPrice").val();
	$.ajax({
		url:"/CodeIgniter-3.1.10/index.php/InventoryController/add?InventoryName="+InventoryName+"&InventoryTotal="
			+InventoryTotal+"&InventoryLeft="+InventoryLeft+"&InventorySingelPrice="+InventorySingelPrice,
		error:function(){alert("插入失败!")},
		success:function () {alert("插入成功!");
			view();}
	})
	$('.addfade').fadeOut(600);
}

function find() {
	//alert("find函数进来了");
	var InventoryName=$("#find_inventory2").val();
	//alert("find第二部函数进来了");
	//alert(InventoryName);
	if(InventoryName==""){
		view();
		//alert("find空函数进来了");
		return;
	}
	console.log(InventoryName);
	$.ajax(
		{
			type:"GET",
			url:"/CodeIgniter-3.1.10/index.php/InventoryController/find?InventoryName="+InventoryName,
			dataType:"json",
			error:function(){alert("请求失败,没有查找到该教具信息！");
			},
			success:function (datas) {
				// alert("找到了！");
				var tbhtml = "";
				for (var i = 0; i < datas.length; i++) {
					var test="</td><td><div onclick='showUpdate(\"" + datas[i].InventoryName + "\"," + (datas[i].InventoryTotal) + "," +
						(datas[i].InventoryLeft) + "," +
						String(datas[i].InventorySingelPrice) + ")'><img src=\'/CodeIgniter-3.1.10/assets/images/编辑.png\'>编辑</div>" +
						"<div onclick='remove(\""+datas[i].InventoryName+ "\")'><img src=\'/CodeIgniter-3.1.10/assets/images/删除.png\'>删除 </div></td>" +
						"</tr>";
					// alert(test);
					tbhtml+="<tr><td>" +
						datas[i].InventoryName + "</td><td>" + datas[i].InventoryTotal + "</td><td>" +
						datas[i].InventoryLeft+"</td><td>" + datas[i].InventorySingelPrice+test;
				}
				console.log(tbhtml);
				$("#tablebody").html(tbhtml);
			}
		}
	)
}
