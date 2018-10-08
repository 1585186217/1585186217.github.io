<?php
	include('../conn.php');

	//后台处理数据四步
	//1、接收数据
	$title = $_POST['title'];
	$cate_id = $_POST['cate_id'];
	$author = $_POST['author'];
	//暂时搁置：引入了editor，可能会出现单引号等特殊字符，需要进行html转义
	$content = $_POST['content'];
	//上传的是文件
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
	}else{
		$filename = '';
	}

	//2、验证数据有效性
	// if(strlen($boardname)<1){
	// 	alert('请输入单页模块名称','page_new.php');
	// 	exit;
	// }

	//3、构造SQL语句，写入数据表，实现新增新闻功能  数字不用''
	$sql = "insert into news(title,cate_id,author,content,img) values('$title',$cate_id,'$author','$content','$filename')"; //图片保存的是文件名
	// echo $sql;
	$res = mysqli_query($conn,$sql);

	// //4、给出执行结果
	if($res){
		alert('发表成功','news_list.php');
	}else{
		alert('发表失败','news_new.php');
	}

