<?php
include('./header.php');
//获取传入的单页模块id数据
$id = isset($_GET['id'])?$_GET['id'] : 1;
//构造sql，从单页表读取公司简介（id=1）
$sql = "select * from board where id = $id";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
	//这里不能用row了，因为在left.php也有row，会被覆盖
	$about = mysqli_fetch_assoc($res);
}else{
	echo '无数据';
	exit;
}
?>
		<div class="inbody">
			<?php
			//左边栏分离
			include('./left.php');
			?>
			<div class="inright">
				<h3 class="intitle"><span>您所在的位置：<a href="/">首页</a> &gt; <?php echo $about['boardname'] ?></span><?php echo $about['boardname'] ?></h3>
				<div class="mbody">
					<?php echo $about['content'] ?>
				</div>
			</div>
		</div>
<?php
include('./footer.php');
?>