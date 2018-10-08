<?php
include('./header.php');

?>
		<div class="inbody">
			<?php
			include('./left.php');
			?>
			
			<div class="inright">
				<h3 class="intitle"><span>您当前所在位置： <a href="./">首页</a> &gt; <a href="guestbook.php">来宾留言</a></span>最新留言</h3>
				<ul class="newslist">
					<?php

						$pagesize = 10;

						$page = isset($_GET['page']) ? $_GET['page'] : 1;

						$sql = "select * from guestbook order by intime desc ";
						$res = mysqli_query($conn,$sql);

						$records = mysqli_num_rows($res);

						$start = ($page - 1) * $pagesize;
						$sql.= "limit $start,$pagesize";
						//需要再执行一次才能写入这个条件
						$res = mysqli_query($conn,$sql);

						while($row = mysqli_fetch_assoc($res)){
							echo '<li><em>'.date('Y-m-d',strtotime($row['intime'])).'</em>'.$row['username'].'：'.$row['content'].'</li>';
						}
					?>

				</ul>
				<div class="page">
					<?php
					//显示出页码表
					//得到总页数 $pagecount
					$pagecount = ceil($records/$pagesize);
					//跳转首页和上一页的设置，多余一页就显示这个
					if($page > 1){
						echo '<a href="guestbook.php?page=1">首页</a>';
						echo '<a href="guestbook.php?page='.($page-1).'">上一页</a>';
					}

					for($i = 1;$i <= $pagecount;$i++){
						if($i == $page){
							//class="on" 当前页时加上选中状态
							echo '<a href="guestbook.php?page='.$i.'" class="on">'.$i.'</a>';
						}else{
							echo '<a href="guestbook.php?page='.$i.'">'.$i.'</a>';
						}
					}
					//尾页设置，每到尾页就显示这个
					if($page < $pagecount){
						echo '<a href="guestbook.php?page='.($page+1).'">下一页</a>';
						echo '<a href="guestbook.php?page='.$pagecount.'">尾页</a>';
					}

					?>
				</div>
				<!-- 留言的form表单 -->
				<h3 class="intitle">我要留言</h3>
				<form action="guestbook_save.php" method="post">
					<p>昵称：<input type="text" name="username"/></p>
					<p>留言：<textarea name="content" cols="60" rows="6"></textarea></p>
					<p><input type="submit" name="" value="立即留言"/></p>
				</form>
				
			</div>
		</div>

<?php
include('./footer.php');
?>