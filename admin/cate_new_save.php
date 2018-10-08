<?php
	include('../conn.php');

	//后台处理数据四步
	//1、接收数据
	$catename = $_POST['catename'];
	$module = $_POST['module'];
	$orderno = $_POST['orderno'];

	//3、构造SQL语句，写入数据表，实现新增分类功能  数字不用''
	$sql = "insert into category(catename,module,orderno) values('$catename','$module',$orderno)"; 
	echo $sql;
	$res = mysqli_query($conn,$sql);

	// //4、给出执行结果
	if($res){
		alert('新增分类成功','cate_list.php');
	}else{
		alert('新增分类失败','cate_new.php');
	}

