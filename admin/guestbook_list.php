<?php
	include('./header.php');
?>
	<div class="mainbox">
		<div class="note">
			<h4>留言列表</h4>
			<!-- 搜索暂时注掉<form method="post" action="" class="search_form">
				<input type="text" name="keywords" placeholder="请输入要搜索的关键词"/>
				<input type="submit" value="搜索"/>
			</form> -->
			<table class="news_list">
				<thead>
					<tr>
						<th>ID</th>
						<th>用户名</th>
						<th>留言内容</th>
						<th>留言时间</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php

					//分页步骤一：三大条件
					//每页显示多少条数据（自己设置）
					$pagesize = 10;
					//当前页，三元运算符
					$page = isset($_GET['page']) ? $_GET['page'] : 1;
					//当前总条数，查询数据库可得
					$sql = "select * from guestbook";
					$res = mysqli_query($conn,$sql);
					$records = mysqli_num_rows($res);

					//步骤二：当前页显示哪些数据
					$start = ($page -1) * $pagesize;
					//改成联合查询，否则产品分类是数字格式，得到p的select *和分类表的名称
					$sql = "select * from guestbook order by intime desc limit $start,$pagesize";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_assoc($res)){
						echo '<tr>';
						echo '<td>'.$row['id'].'</td>';
						echo '<td>'.$row['username'].'</td>';
						echo '<td>'.mb_substr(strip_tags($row['content']),0,50).'...</td>';
						echo '<td>'.$row['intime'].'</td>';
						echo '<td>';
						echo '	<a href="guestbook_edit.php?id='.$row['id'].'">修改</a> /';
						//被echo的''包裹之下，在""里面再用''需要使用\'\'进行转义
						echo '	<a href="guestbook_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定要删除该数据吗?\')">删除</a>';
						echo '</td>';
						echo '</tr>';
					}

					?>
					
				</tbody>
			</table>

			<div class="page">
				<?php
					//步骤三：打印页码表
					//计算总页数,ceil向上取整
					$pagecount = ceil($records/$pagesize);
					for($i = 1; $i <= $pagecount; $i++){
						if($page == $i){
							echo "<a href='guestbook_list.php?page=$i' class='on'>$i</a>"; //class=on选中状态
						}else{
							//这个href不能直接写page=$i，会丢失路径
						echo "<a href='guestbook_list.php?page=$i'>$i</a>";
						}
					}
				?>

			</div>
		</div>
	</div>	
<?php
	include('./footer.php');
?>