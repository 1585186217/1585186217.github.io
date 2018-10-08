<?php
	date_default_timezone_set('PRC');
	header('Content-Type:Text/html;charset=utf-8');

	$conn = mysqli_connect('localhost','root','x5','web1') or die('数据库连接出错');
	mysqli_query($conn,'set names utf8'); //与数据库交互时编码


	//自定义弹出提示框，并且跳转到指定URL
	function alert($str,$url){
		echo '<script> window.alert("'.$str.'");location.href="'.$url.'"</script>';
	}
	


?>