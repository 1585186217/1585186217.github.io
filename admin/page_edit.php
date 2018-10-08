<?php
	include('./header.php');

	$id = $_GET['id'];
	$sql = "select * from board where id = $id";
	$res = mysqli_query($conn,$sql);
	//判断是否有数据，决定中断或者提取数据
	if(mysqli_num_rows($res)){
		//从结果集中提取一行数据，以关联数组的形式返回给变量
		$row = mysqli_fetch_assoc($res);
	}else{
		echo '从数据库未查询到当前信息，请刷新后再试';
		exit;
	}
	mysqli_free_result($res);
?>
	<div class="mainbox">
		<div class="note">
			<h4>修改单页</h4>
			<form action="page_edit_save.php" method="post">
				<!-- 隐藏域传递id -->
				<input type="hidden" name="id" value="<?php echo $id ?>" />
				<table class="news_form">
					<tr>
						<td>单页模块名：</td>
						<!-- value设置默认值为数据库读取的值 -->
						<td><input type="text" name="boardname" class="inbox" value="<?php echo $row['boardname'];?>"/></td>
					</tr>
					<tr>
						<td>详情内容：</td>
						<!-- iframe是关联的textarea，所以放在文本域中即可 -->
						<td><textarea name="content" id="content" cols="60" rows="6" style="display:none;"><?php echo $row['content'];?></textarea>
						<iframe id="FCK_Frame" src="editor/editor/fckeditor.html?InstanceName=content&amp;Toolbar=Default" width="100%" height="350" frameborder="no" scrolling="no"></iframe></td>
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