<?php
	include('./header.php');
	$id = $_GET['id'];
	$sql = "select * from flink where id = $id";
	$res = mysqli_query($conn,$sql);
	// if(mysqli_num_rows($res)){
	// 	$row = mysqli_fetch_assoc($res);
	// }
	//这样直接给$row赋值也可以
	if($row = mysqli_fetch_assoc($res)){
	}else{
		echo '你要修改的友情链接不存在';
		exit;
	}
?>

	<div class="mainbox">
		<div class="note">
			<h4>修改产品</h4>
			<form action="flink_edit_save.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id ?>"/>
				<table class="news_form">
					<tr>
						<td>链接名称：</td>
						<td><input type="text" name="title" class="inbox" value="<?php echo $row['title'];?>"/></td>
					</tr>
					<tr>
						<td>链接网址：</td>
						<td><input type="text" name="link_url" class="inbox" value="<?php echo $row['link_url'];?>"/></td>
					</tr>
					<tr>
						<td>链接内容：</td>
						<td><textarea name="content" cols="60" rows="6"><?php echo $row['content'];?></textarea>
						</td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" value="提交"/></td>
					</tr>
				</table>
			</form>
		</div>
	</div>

<?php
	include('./footer.php');
?>