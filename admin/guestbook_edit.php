<?php
	include('./header.php');
	$id = $_GET['id'];
	$sql = "select * from guestbook where id = $id";
	$res = mysqli_query($conn,$sql);

	if($row = mysqli_fetch_assoc($res)){
	}else{
		echo '你要修改的留言不存在';
		exit;
	}
?>

	<div class="mainbox">
		<div class="note">
			<h4>修改产品</h4>
			<form action="guestbook_edit_save.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id ?>"/>
				<table class="news_form">
					<tr>
						<td>用户名：</td>
						<td><input type="text" name="username" class="inbox" value="<?php echo $row['username'];?>"/></td>
					</tr>
					<tr>
						<td>留言内容：</td>
						<td><textarea name="content" cols="50" rows="6"><?php echo $row['content'];?></textarea></td>
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