<?php
	include('../conn.php');

	//后台处理数据四步
	//1、接收数据
	$id = $_POST['id'];
	$username = $_POST['username'];
	$content = $_POST['content'];

	//3、构造SQL语句，写入数据表，实现修改产品功能
	$sql = "update guestbook set username='$username',content='$content' where id=$id";
	$res = mysqli_query($conn,$sql);

	//4、给出执行结果
	if($res){
		alert('留言修改成功!','guestbook_list.php');
	}else{
		// alert('留言修改失败!','guestbook_edit.php?id='.$id);
		echo '修改失败';
		echo mysqli_error($conn);
	}

