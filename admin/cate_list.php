<?php
	include('./header.php');
?>
	<div class="mainbox">
		<div class="note">
			<h4>分类列表</h4>
			<!-- 搜索暂时注掉<form method="post" action="" class="search_form">
				<input type="text" name="keywords" placeholder="请输入要搜索的关键词"/>
				<input type="submit" value="搜索"/>
			</form> -->
			<table class="news_list">
				<thead>
					<tr>
						<th>ID</th>
						<th>分类名</th>
						<th>所属板块</th>
						<th>排序号</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php
					//如果排序号有相同的，就按id倒序排列
					$sql = "select * from category order by orderno asc,id desc";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_assoc($res)){
						echo '<tr>';
						echo '<td>'.$row['id'].'</td>';
						echo '<td>'.$row['catename'].'</td>';
						echo '<td>'.$row['module'].'</td>';
						echo '<td>'.$row['orderno'].'</td>';
						echo '<td>';
						echo '	<a href="cate_edit.php?id='.$row['id'].'">修改</a> /';
						//被echo的''包裹之下，在""里面再用''需要使用\'\'进行转义
						echo '	<a href="cate_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定要删除该数据吗?\')">删除</a>';
						echo '</td>';
						echo '</tr>';
					}
					
					?>
				</tbody>
			</table>
		</div>
	</div>	
<?php
	include('./footer.php');
?>