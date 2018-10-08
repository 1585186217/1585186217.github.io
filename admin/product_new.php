<?php
	include('./header.php');
?>
	<div class="mainbox">
		<div class="note">
			<h4>新增产品</h4>
			<form action="product_new_save.php" method="post" enctype="multipart/form-data">
				<table class="news_form">
					<tr>
						<td>产品名称：</td>
						<td><input type="text" name="productname" class="inbox"/></td>
					</tr>
					<tr>
						<td>产品编号：</td>
						<td><input type="text" name="pro_no" class="inbox"/></td>
					</tr>
					<tr>
						<td>产品分类：</td>
						<td>
							<select name="cate_id" class="inbox">
								<option value="0">请选择产品分类</option>
								<?php
									$sql = "select * from category where module='产品中心' order by orderno asc,id desc";
									$res = mysqli_query($conn,$sql);
									while($row = mysqli_fetch_assoc($res)){
										echo '<option value="'.$row['id'].'">'.$row['catename'].'</option>';
									}

								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>产品描述：</td>
						<td><textarea name="content" id="content" cols="60" rows="6" style="display:none;"></textarea>
						<iframe id="FCK_Frame" src="editor/editor/fckeditor.html?InstanceName=content&amp;Toolbar=Default" width="100%" height="350" frameborder="no" scrolling="no"></iframe></td>
					</tr>
					<tr>
						<td>产品图片：</td>
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