<div class="leftbar">
	<h3>新闻分类</h3>
	<ul>
		<li><a href="news.php">新闻总览</a></li>
		<?php
			$sql = "select * from category where module='新闻中心' order by orderno asc,id asc";
			$res = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($res)){
				echo '<li><a href="news.php?cate_id='.$row['id'].'">'.$row['catename'].'</a></li>';
			}

		?>
		
	</ul>
	<p><img src="images/leftbar1.jpg" alt="" width="260"/></p>
</div>