<?php
include('./header.php');

//接收传递过来的id
$id = $_GET['id'];
//构造sql，去news表中查询
$sql = "select * from news where id = $id";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res) > 0){
	//从结果集中读取一行数据，并将指针下移一行
	$news = mysqli_fetch_assoc($res);
	//每次有人点击进来或者刷新页面就添加一次hits
	mysqli_query($conn,"update news set hits=hits+1 where id=$id");
}else{
	echo '没有数据';
	exit;
}
?>
		<div class="inbody">
			<?php
			include('./left.php');
			?>
			
	<div class="inright">
		<h3 class="intitle"><span>您所在的位置：<a href="/">首页</a> &gt; <a href="news.php">新闻中心</a> &gt; 阅读内容</span>阅读内容</h3>
		<div class="mbody">
			<h1 class="title1"><?php echo $news['title'];?></h1>
			<div class="title2">来源：本站　　　发布日期：<?php echo $news['intime'];?>　　　已有 <?php echo $news['hits'];?> 人浏览过此信息</div>
			<div class="newsbody">
				<p><?php echo $news['content'];?></p>
				<img src="./files/<?php echo $news['img'];?>" width="80%" height="50%;" style="margin:50px 10%;">
			</div>
			<div class="newsauthor">编辑：<?php echo $news['author'];?></div>
			
			<div class="newsmore">
				上一条：
				<?php
				//取得倒叙排列的第一条id，比如现在是5，如果不加order by，那么这里返回的会是1
				$sql = "select id,title from news where id<$id order by id desc limit 1";
				$res = mysqli_query($conn,$sql);
				if($row = mysqli_fetch_assoc($res)){
					echo '<a href="content.php?id='.$row['id'].'">'.$row['title'].'</a>';
				}else{
					echo '没有上一条了';
				}
				?>
				
			</div>
			<div class="newsmore">
				下一条：
				<?php
				//取得正序排列的第一条id，就是下一条
				$sql = "select id,title from news where id>$id order by id asc limit 1";
				$res = mysqli_query($conn,$sql);
				if($row = mysqli_fetch_assoc($res)){
					echo '<a href="content.php?id='.$row['id'].'">'.$row['title'].'</a>';
				}else{
					echo '没有上一条了';
				}
				?>
			</div>
		</div>
	</div>
</div>

<?php

?>