<?php
	include('./header.php');
?>
	<div class="mainbox">
		<div class="note">
			<h4>单页列表</h4>
			<!-- 暂时不需要搜索功能<form method="post" action="" class="search_form">
				<input type="text" name="keywords" placeholder="请输入要搜索的关键词"/>
				<input type="submit" value="搜索"/>
			</form> -->

			<table class="news_list">
				<thead>
					<tr>
						<th>ID</th>
						<th>模块名</th>
						<th>内容</th>
						<th>操作</th>
					</tr>
				</thead>
				<tbody>
					<?php
					//构造读取数据列表的SQL语句
					$sql = "select * from board order by id asc";
					$res = mysqli_query($conn,$sql);
					//通过mysqli_fetch_assoc，从结果集中读取一行数据形成关联数组，直到所有数据读取完毕才跳出while。会记录指针移动到下一行，继续读取并移动指针
					while($row = mysqli_fetch_assoc($res)){
						echo '<tr>';
						echo '<td>'.$row['id'].'</td>';
						echo '<td>'.$row['boardname'].'</td>';
						//strip_tags()，php自带函数，剔除字符串中HTML标签
						//mb_substr(xx,0,50)，mb多字节/substr截取/0,50五十个字符/'utf-8'编码/然后在整个函数后面加上...即可
						echo '<td>'.mb_substr(strip_tags($row['content']),0,50,'utf-8').'...</td>';
						echo '<td>
							<a href="page_edit.php?id='.$row['id'].'">修改</a> /
							<a href="page_delete.php?id='.$row['id'].'" onclick="return confirm(\'你确定要删除该数据吗?\')">删除</a>
						</td>';
						echo '</tr>';
					}
					//使用结果集之后释放掉
					mysqli_free_result($res);
					?>
				</tbody>
			</table>

			<!-- 暂时不需要分页<div class="page">
				<a href="#">1</a>
				<a href="#">2</a>
				<a href="#" class="on">3</a>
				<a href="#">4</a>
				<a href="#">5</a>
			</div> -->
		</div>
	</div>	
<?php
	include('./footer.php');
?>