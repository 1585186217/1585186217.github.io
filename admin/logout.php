<?php

	include('../conn.php');
	session_start();

	//将SESSION定义为空数组。即可注销
	$_SESSION = array();

	//SESSION默认以文件形式存在于电脑上
	session_destroy();

	//回到登录页
	alert('退出成功，欢迎下次再来','./login.php');



?>