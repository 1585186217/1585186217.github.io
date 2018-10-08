<?php
include('./header.php');

//得到产品展示点击，选择分类时传递的cate_id
$cate_id = isset($_GET['cate_id']) ? $_GET['cate_id'] : 0;

?>
		<div class="inbody">
			<?php
			include('./left.php');
			?>
			
	<div class="inright">
		<h3 class="intitle"><span>您当前所在位置： <a href="./">首页</a> &gt; 产品中心</span>产品中心</h3>
		<ul class='product'>
			<?php
			//三个条件
			$pagesize = 3;
			$page = isset($_GET['page']) ? $_GET['page'] : 1;


			$sql = "select id,productname,img from product where 1 ";
			if($cate_id > 0){
				$sql.="and cate_id=$cate_id ";
			}
			$sql.= "order by intime desc ";
			$res = mysqli_query($conn,$sql);
			//总条数
			$records = mysqli_num_rows($res);

			//当前页应当显示的数据
			$start = ($page - 1) * $pagesize;
			$sql.="limit $start,$pagesize";
			//重新查询一次
			$res = mysqli_query($conn,$sql);

			while($row = mysqli_fetch_assoc($res)){
				echo '<li>';
				echo '<div class="pic"><a href="product_show.php?id='.$row['id'].'"><img src="./files/'.$row['img'].'" alt=""/></a></div>';
				echo '<h4><a href="product_show.php?id='.$row['id'].'">'.$row['productname'].'</a></h4>';
				echo '</li>';
			}
			?>
			
			
		</ul>
		<div class="c"></div>
		<div class="page">
			<?php
			//打印页码表
			$pagecount = ceil($records/$pagesize);
			//跳转首页和上一页的设置，多余一页就显示这个
			if($page > 1){
				echo '<a href="product.php?page=1">首页</a>';
				echo '<a href="product.php?page='.($page-1).'">上一页</a>';
			}
			for($i = 1;$i <$pagecount;$i++){
				if($i == $page){
					echo '<a href="product.php?page='.$i.'" class="on">'.$i.'</a>';
				}else{
					echo '<a href="product.php?page='.$i.'">'.$i.'</a>';
				}	
			}
			//尾页设置，每到尾页就显示这个
			if($page < $pagecount){
				echo '<a href="product.php?page='.($page+1).'">下一页</a>';
				echo '<a href="product.php?page='.$pagecount.'">尾页</a>';
			}

			?>
		</div>
	</div>
</div>

<?php
include('./footer.php');
?>