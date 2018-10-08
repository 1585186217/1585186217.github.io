<?php
	include('../conn.php');

	//后台处理数据四步
	//1、接收数据
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$flag = $_POST['flag'];


	//3、构造SQL语句，写入数据表，实现修改产品功能
	$sql = "update admin set username='$username',password='$password',flag='$flag' where id=$id";
	$res = mysqli_query($conn,$sql);

	//4、给出执行结果
	if($res){
		alert('管理员信息修改成功!','admin_list.php');
	}else{
		alert('管理员信息修改失败!','admin_edit.php?id='.$id);
	}

