<?php

include('./header.php');

$username = $_POST['username'];
$content = $_POST['content'];

if(strlen($username)<1){
	echo '请输入留言人昵称';
	exit;
}
if(strlen($content)<1){
	echo '请输入留言内容';
	exit;
}

$sql = "insert into guestbook (username,content) values('$username','$content')";
$res = mysqli_query($conn,$sql);

if($res){
	alert('恭喜你，留言成功!','guestbook.php');
}else{
	alert('留言失败，请稍后再试!','guestbook.php');
}








