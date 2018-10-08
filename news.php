<?php
include('./header.php');

//接收新闻分类下点击时传过来的id
$cate_id = isset($_GET['cate_id']) ? $_GET['cate_id'] : 0;



?>
		

		<div class="inbody">
			<?php
			include('./left.php');
			?>
			
			<div class="inright">
				<h3 class="intitle"><span>您当前所在位置： <a href="./">首页</a> &gt; <a href="#">新闻中心</a></span>最新新闻</h3>
				<ul class="newslist">
					<?php
						

						/*
							新闻分页条件：
							  每页显示多少条数据，	$pagesize，自己设置
							  当前第几页,			$page=$_GET['page']，获取得到
							  一共多少条数据,			$records
							新闻分页步骤：
							  获取条件（准备工作）
							  获取到当前页应当显示的数据并显示出来
							  显示出页码表
						*/
						//获取条件
						$pagesize = 5;
						//从用户选择的页面进行传值，判断在第几页，默认在第一页
						$page = isset($_GET['page']) ? $_GET['page'] : 1;
						//构造sql先查询数据  where 1就是where 1=1 为真
						//这只是为了得到总条数的查询
						$sql = "select * from news where 1 ";
						if($cate_id > 0 ){
							//如果有选择新闻分类的类型，就加条件过滤新闻列表
							$sql.= "and cate_id = $cate_id ";
						}
						//如果用$sql.="";  注意每一个语句之间要加空格分隔开
						$sql.= "order by intime desc ";
						$res = mysqli_query($conn,$sql);
						//从结果集得到新闻总条数
						$records = mysqli_num_rows($res);

						//获取到当前页应当显示的数据并显示出来
						//继续拼接上limit即可
						//页面上不会显示0页，所以需要减一，乘法后得到偏移量
						$start = ($page - 1) * $pagesize;
						$sql.= "limit $start,$pagesize";
						//需要再执行一次才能写入这个条件
						$res = mysqli_query($conn,$sql);

						while($row = mysqli_fetch_assoc($res)){
							echo '<li><em>'.date('Y-m-d',strtotime($row['intime'])).'</em><a href="content.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
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
						echo '<a href="news.php?page=1">首页</a>';
						echo '<a href="news.php?page='.($page-1).'">上一页</a>';
					}

					for($i = 1;$i <= $pagecount;$i++){
						if($i == $page){
							//class="on" 当前页时加上选中状态
							echo '<a href="news.php?page='.$i.'" class="on">'.$i.'</a>';
						}else{
							echo '<a href="news.php?page='.$i.'">'.$i.'</a>';
						}
					}
					//尾页设置，每到尾页就显示这个
					if($page < $pagecount){
						echo '<a href="news.php?page='.($page+1).'">下一页</a>';
						echo '<a href="news.php?page='.$pagecount.'">尾页</a>';
					}

					?>
				</div>
			</div>
		</div>

<?php
include('./footer.php');
?>