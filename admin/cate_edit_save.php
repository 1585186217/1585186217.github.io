<?php
	include('../conn.php');

	//后台处理数据四步
	//1、接收数据
	$id = $_POST['id'];
	$catename = $_POST['catename'];
	$module = $_POST['module'];
	$orderno = $_POST['orderno'];


	//3、构造SQL语句，写入数据表，实现新增单页功能
	$sql = "update category set catename='$catename',module='$module',orderno=$orderno where id=$id";
	$res = mysqli_query($conn,$sql);

	//4、给出执行结果
	if($res){
		alert('修改分类成功!','cate_list.php');
	}else{
		// alert('修改分类失败!','cate_edit.php?id='.$id);
		echo '修改失败！';
		echo mysqli_error($conn);
	}

