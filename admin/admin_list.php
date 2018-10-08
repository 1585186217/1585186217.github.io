<?php
	include('./header.php');
?>
	<div class="mainbox">
		<div class="note">
			<h4>管理员列表</h4>
			<!-- 搜索暂时注掉<form method="post" action="" class="search_form">
				<input type="text" name="keywords" placeholder="请输入要搜索的关键词"/>
				<input type="submit" value="搜索"/>
			</form> -->
			<table class="news_list">
				<thead>
					<tr>
						<th>ID</th>
						<th>用户名</th>
						<th>密码</th>
						<th>权限</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php
					//原来的flag是1或者2，带入数组就能显示成想要的样子
					$flag = array(1=>'超级管理员',2=>'普通管理员');
					$sql = "select * from admin order by id desc";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_assoc($res)){
						echo '<tr>';
						echo '<td>'.$row['id'].'</td>';
						echo '<td>'.$row['username'].'</td>';
						// echo '<td>'.$row['password'].'</td>';
						echo '<td>******</td>';
						echo '<td>'.$flag[$row['flag']].'</td>';
						echo '<td>';
						echo '	<a href="admin_edit.php?id='.$row['id'].'">修改</a> /';
						//被echo的''包裹之下，在""里面再用''需要使用\'\'进行转义
						echo '	<a href="admin_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定要删除该数据吗?\')">删除</a>';
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