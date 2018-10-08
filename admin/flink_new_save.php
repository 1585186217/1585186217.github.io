<?php
	include('../conn.php');

	$title = $_POST['title'];
	$link_url = $_POST['link_url'];
	$content = $_POST['content'];

	$sql = "insert into flink (title,link_url,content) values('$title','$link_url','$content')";
	$res = mysqli_query($conn,$sql);

	if($res){
		alert('新增友情链接成功','flink_list.php');
	}else{
		echo '新增友情链接失败';
		echo mysqli_error($conn);
		// alert('新增友情链接失败','flink_list.php?id='.$id);
	}

















?>