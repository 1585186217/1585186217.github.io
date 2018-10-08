<?php
	include('../conn.php');

	//后台处理数据四步
	//1、接收数据
	$id = $_POST['id'];
	$title = $_POST['title'];
	$link_url = $_POST['link_url'];
	$content = $_POST['content'];


	//3、构造SQL语句，写入数据表，实现修改产品功能
	$sql = "update flink set title='$title',link_url='$link_url',content='$content' where id=$id";
	$res = mysqli_query($conn,$sql);

	//4、给出执行结果
	if($res){
		alert('友情链接修改成功!','flink_list.php');
	}else{
		alert('友情链接修改失败!','flink_edit.php?id='.$id);
	}

