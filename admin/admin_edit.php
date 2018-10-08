<?php
	include('./header.php');
	$id = $_GET['id'];
	$sql = "select * from admin where id = $id";
	$res = mysqli_query($conn,$sql);
	// if(mysqli_num_rows($res)){
	// 	$row = mysqli_fetch_assoc($res);
	// }
	//这样直接给$row赋值也可以
	if($row = mysqli_fetch_assoc($res)){
	}else{
		echo '你要修改的管理员不存在';
		exit;
	}
?>

	<div class="mainbox">
		<div class="note">
			<h4>修改产品</h4>
			<form action="admin_edit_save.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id ?>"/>
				<table class="news_form">
					<tr>
						<td>登录名：</td>
						<td><input type="text" name="username" class="inbox" value="<?php echo $row['username'];?>"/></td>
					</tr>
					<tr>
						<td>密码：</td>
						<td><input type="text" name="password" class="inbox" value="<?php echo $row['password'];?>"/></td>
					</tr>
					<tr>
						<td>权限：</td>
						<td>
							<select name="flag">
								<option value="1" <?php if($row['flag']==1){echo 'selected="selected"';} ?>>超级管理员</option>
								<option value="2" <?php if($row['flag']==2){echo 'selected="selected"';} ?>>普通管理员</option>
							</select>
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