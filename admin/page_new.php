<?php
	include('./header.php');
?>
	<div class="mainbox">
		<div class="note">
			<h4>新增单页</h4>
			<form action="page_new_save.php" method="post">
				<table class="news_form">
					<tr>
						<td>单页模块名：</td>
						<td><input type="text" name="boardname" class="inbox"/></td>
					</tr>
					<tr>
						<td>详情内容：</td>
						<td><textarea name="content" id="content" cols="60" rows="6" style="display:none;"></textarea>
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