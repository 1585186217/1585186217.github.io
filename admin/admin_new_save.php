<?php
	include('../conn.php');

	$username = $_POST['username'];
	$password = $_POST['password'];
	$flag = $_POST['flag'];

	$sql = "insert into admin (username,password,flag) values('$username','$password','$flag')";
	$res = mysqli_query($conn,$sql);

	if($res){
		alert('新增管理员账号成功','admin_list.php');
	}else{
		echo '新增管理员账号失败';
		echo mysqli_error($conn);
		// alert('新增友情链接失败','flink_list.php?id='.$id);
	}

















?>