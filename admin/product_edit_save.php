<?php
	include('../conn.php');

	//后台处理数据四步
	//1、接收数据
	$id = $_POST['id'];
	$productname = $_POST['productname'];
	$pro_no = $_POST['pro_no'];
	$cate_id = $_POST['cate_id'];
	//暂时搁置：引入了editor，可能会出现单引号等特殊字符，需要进行html转义
	$content = $_POST['content'];
	$img = $_FILES['img'];
	//获取图片信息，主要是获得tmp_name，得到存放路径，这个路径在执行后就会删除
	//var_dump($img);


	//判断图片是否上传
	if($img['name']){
		$ext = strrchr($img['name'],'.'); //截取最后一个点.之后的内容，扩展名
		//给文件名设置为时间戳再rand，然后带上类型
		$filename = time().rand(100,999).$ext;
		//上传文件后自动写入到临时文件夹中，必须用这个函数将临时文件夹移动到指定目录，才能实现上传文件的功能，加上filename是为了让上传的文件不会重名。而数据库保存的只是它的文件名
		move_uploaded_file($img['tmp_name'], '../files/'.$filename);

		//上传新图片时删除之前的图片
		$oldimg = $_POST['old_img'];
		if(strlen($oldimg)>1){
			unlink('../files/'.$oldimg);
		}
	}else{
		//如果没有上传新的图片就用原来的图片名，也就是图片不变
		$filename = $_POST['old_img'];
	}


	//3、构造SQL语句，写入数据表，实现修改产品功能
	$sql = "update product set productname='$productname',pro_no='$pro_no',cate_id=$cate_id,content='$content',img='$filename' where id=$id";
	$res = mysqli_query($conn,$sql);

	//4、给出执行结果
	if($res){
		alert('产品修改成功!','product_list.php');
	}else{
		alert('产品修改失败!','product_edit.php?id='.$id);
	}

