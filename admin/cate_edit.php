<?php
	include('./header.php');
	$id = $_GET['id'];
	$sql = "select * from category where id = $id";
	$res = mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)){
		$row = mysqli_fetch_assoc($res);
	}else{
		echo '没有数据';
		exit;
	}
?>

	<div class="mainbox">
		<div class="note">
			<h4>修改分类</h4>
			<form action="cate_edit_save.php" method="post">
				<input type="hidden" name="id" value="<?php echo $id ?>"/>
				<table class="news_form">
					<tr>
						<td>分类名：</td>
						<td><input type="text" name="catename" class="inbox" value="<?php echo $row['catename'];?>"/></td>
					</tr>
					<tr>
						<td>所属模块：</td>
						<td>
							<select name="module" class="inbox">
								<option value="新闻中心" <?php if($row['module']=='新闻中心'){ echo 'selected="selected"'; }?> >新闻中心</option>
								<option value="产品中心" <?php if($row['module']=='产品中心'){ echo 'selected="selected"'; }?>>产品中心</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>排序号：</td>
						<td><input type="text" name="orderno" class="inbox" value="<?php echo $row['orderno'];?>"/></td>
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