<?php
	include('./header.php');
?>
	<div class="mainbox">
		<div class="note">
			<h4>发布新闻</h4>
			<!--
			上传图片的前提
				数据必须要以FORM的POST方式提交
				输入框必须是type="filt"上传
				FORM里面必须设置为多格式数据上传，enctype，因为不止文本格式，还有二进制数据流	
			-->
			<form action="news_new_save.php" method="post" enctype="multipart/form-data">
				<table class="news_form">
					<tr>
						<td>新闻标题：</td>
						<td><input type="text" name="title" class="inbox"/></td>
					</tr>
					<tr>
						<td>新闻分类：</td>
						<td>
							<select name="cate_id" class="inbox">
								<option value="0">请选择新闻分类</option>
								<?php
									$sql = "select * from category where module='新闻中心' order by orderno asc,id desc";
									$res = mysqli_query($conn,$sql);
									while($row = mysqli_fetch_assoc($res)){
										echo '<option value="'.$row['id'].'">'.$row['catename'].'</option>';
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>作&emsp;&emsp;者：</td>
						<td><input type="text" name="author" class="inbox"/></td>
					</tr>
					<tr>
						<td>新闻内容：</td>
						<td><textarea name="content" id="content" cols="60" rows="6" style="display:none;"></textarea>
						<iframe id="FCK_Frame" src="editor/editor/fckeditor.html?InstanceName=content&amp;Toolbar=Default" width="100%" height="350" frameborder="no" scrolling="no"></iframe></td>
					</tr>
					<tr>
						<td>上传图片：</td>
						<td><input type="file" name="img" class="inbox"/></td>
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