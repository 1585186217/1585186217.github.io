<?php
	include('./header.php');
	$id = $_GET['id'];
	$sql = "select * from news where id = $id";
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
			<h4>修改新闻</h4>
			<!--
			上传图片的前提
				数据必须要以FORM的POST方式提交
				输入框必须是type="filt"上传
				FORM里面必须设置为多格式数据上传，enctype，因为不止文本格式，还有二进制数据流	
			-->
			<form action="news_edit_save.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $id ?>"/>
				<table class="news_form">
					<tr>
						<td>新闻标题：</td>
						<td><input type="text" name="title" class="inbox" value="<?php echo $row['title'];?>"/></td>
					</tr>
					<tr>
						<td>新闻分类：</td>
						<td>
							<select name="cate_id" class="inbox">
								<!-- <option value="0">请选择新闻分类</option> -->
								<!-- 修改时出现数据库中保存的分类。给select下拉框默认值 -->
								<?php
									$sql = "select * from category where module='新闻中心' order by orderno asc,id desc";
									$res = mysqli_query($conn,$sql);
									while($trow = mysqli_fetch_assoc($res)){
										if($row['cate_id'] == $trow['id']){
											//查出来的trow的id等于传过来这个新闻的cate_id时，就是它的分类名，给他加上selected默认值的属性就可以让它正常显示出来
											echo '<option value="'.$trow['id'].'" selected="selected">'.$trow['catename'].'</option>'; 
										}
										echo '<option value="'.$trow['id'].'">'.$trow['catename'].'</option>';
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>作&emsp;&emsp;者：</td>
						<td><input type="text" name="author" class="inbox" value="<?php echo $row['author'];?>"/></td>
					</tr>
					<tr>
						<td>新闻内容：</td>
						<td><textarea name="content" id="content" cols="60" rows="6" style="display:none;"><?php echo $row['content'];?></textarea>
						<iframe id="FCK_Frame" src="editor/editor/fckeditor.html?InstanceName=content&amp;Toolbar=Default" width="100%" height="350" frameborder="no" scrolling="no"></iframe></td>
					</tr>
					<tr>
						<td>上传图片：</td>
						<td>
							<img src="../files/<?php echo $row['img'];?>" width="200"/><br/>
							<input type="file" name="img" class="inbox"/>
							<!-- 如果没有修改上传图片时就用这个 -->
							<input type="hidden" name="old_img" value="<?php echo $row['img'];?>"/>
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