<?php
	include('../conn.php');
	//后台处理数据四步
	//1、接收数据
	$id = $_GET['id'];

	//2、验证数据有效性，是否是数字
	if(!is_numeric($id)){
		alert('ID值不是一个数字','product_list.php');
		exit;
	}

	//读取产品图片的文件名
	$sql = "select * from product where id = $id";
	$res = mysqli_query($conn,$sql);
	if($row = mysqli_fetch_assoc($res)){
		//在F12可知，img就是文件名
		$img = $row['img'];
	}else{
		echo '要删除的数据不存在';
		exit;
	}

	//3、构造SQL语句，将ID作为删除条件
	$sql = "delete from product where id = $id";
	$res = mysqli_query($conn,$sql);

	//4、给出执行结果
	if($res){
		//要全部删除产品，还要删除图片/文件,unlink(文件路径);
		if(strlen($img)>0){
			unlink('../files/'.$img);  //拼接路径
		}
		alert('删除成功','product_list.php');
	}else{
		echo '删除失败！';
		echo mysqli_error($conn);
	}

