<?php
	include('./header.php');
	$id = $_GET['id'];
	$sql = "select * from product where id = $id";
	$res = mysqli_query($conn,$sql);
	// if(mysqli_num_rows($res)){
	// 	$row = mysqli_fetch_assoc($res);
	// }
	//这样直接给$row赋值也可以
	if($row = mysqli_fetch_assoc($res)){
	}else{
		echo '你要修改的产品不存在';
		exit;
	}
?>

	<div class="mainbox">
		<div class="note">
			<h4>修改产品</h4>
			<form action="product_edit_save.php" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?php echo $id ?>"/>
				<table class="news_form">
					<tr>
						<td>产品名称：</td>
						<td><input type="text" name="productname" class="inbox" value="<?php echo $row['productname'];?>"/></td>
					</tr>
					<tr>
						<td>产品编号：</td>
						<td><input type="text" name="pro_no" class="inbox" value="<?php echo $row['pro_no'];?>"/></td>
					</tr>
					<tr>
						<td>产品分类：</td>
						<td>
							<select name="cate_id" class="inbox">
								<?php
									$sql = "select * from category where module='产品中心' order by orderno asc,id desc";
									$res = mysqli_query($conn,$sql);
									while($trow = mysqli_fetch_assoc($res)){
										if($row['cate_id'] == $trow['id']){
											//查出来的trow的id等于传过来这个产品的cate_id时，就是它的分类名，给他加上selected默认值的属性就可以让它正常显示出来
											echo '<option value="'.$trow['id'].'" selected="selected">'.$trow['catename'].'</option>'; 
										}
										echo '<option value="'.$trow['id'].'">'.$trow['catename'].'</option>';
									}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>产品描述：</td>
						<td><textarea name="content" id="content" cols="60" rows="6" style="display:none;"><?php echo $row['content'];?></textarea>
						<iframe id="FCK_Frame" src="editor/editor/fckeditor.html?InstanceName=content&amp;Toolbar=Default" width="100%" height="350" frameborder="no" scrolling="no"></iframe></td>
					</tr>
					<tr>
						<td>产品图片：</td>
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