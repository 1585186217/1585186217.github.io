<?php
	include('../conn.php');
	//后台处理数据四步
	//1、接收数据
	$id = $_GET['id'];

	//2、验证数据有效性，是否是数字
	if(!is_numeric($id)){
		alert('ID值不是一个数字','flink_list.php');
		exit;
	}

	//3、构造SQL语句，将ID作为删除条件
	$sql = "delete from flink where id = $id";
	$res = mysqli_query($conn,$sql);

	//4、给出执行结果
	if($res){
		alert('删除成功','flink_list.php');
	}else{
		echo '删除失败！';
		echo mysqli_error($conn);
	}

