<?php
	include('../conn.php');

	//后台处理数据四步
	//1、接收数据
	$id = $_POST['id'];
	$boardname = $_POST['boardname'];
	//暂时搁置：引入了editor，可能会出现单引号等特殊字符，需要进行html转义
	$content = $_POST['content'];

	//2、验证数据有效性
	if(strlen($boardname)<1){
		alert('请输入单页模块名称','page_edit.php?id='.$id);
		exit;
	}

	//3、构造SQL语句，写入数据表，实现新增单页功能
	$sql = "update board set boardname='$boardname',content='$content' where id=$id";
	$res = mysqli_query($conn,$sql);

	//4、给出执行结果
	if($res){
		alert('修改成功!','page_list.php');
	}else{
		alert('数据修改失败!','page_edit.php?id='.$id);
	}

