<?php
	//引入musql
	include('../conn.php');
	//得到数据
	$username = $_POST['username'];
	$password = $_POST['password'];
	//验证数据有效性
	if(strlen($username)<1){
		alert('用户名不能为空','./login.php');
		exit;
	}
	if(strlen($password)<6){
		alert('密码长度必须大于六位','./login.php');
		exit;
	}
	// echo '数据已正常提交！';

	//构造sql查询数据是否存在
	$sql = "select * from admin where username='$username' and password='$password'";
	// var_dump($sql);
	$res = mysqli_query($conn,$sql);
	// mysqli_num_rows($res);
	//从结果集读取数据，返回关联数组，以数据库中字段名作为数组的键名
	if($row = mysqli_fetch_assoc($res)){ 
		//成功，写入SESSION
		session_start(); //开启共享机制，其他页面能用
		$_SESSION['username'] = $row['username'];
		$_SESSION['userid'] = $row['id'];
		$_SESSION['flag'] = $row['flag'] == 1 ? '超级管理员':'普通管理员';
		header('location: index.php');
	}else{
		//失败
		alert('用户名或密码错误，请重试','./login.php');
	}


?>