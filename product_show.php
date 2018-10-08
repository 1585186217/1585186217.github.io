<?php
include('./header.php');

//接收传递的id
$id = $_GET['id'];
$sql = "select p.*,c.catename from product p,category c where p.id = $id and p.cate_id = c.id";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res) > 0){
	$pro = mysqli_fetch_assoc($res);
}else{
	echo '没有数据';
	exit;
}
?>
		<div class="inbody">
			<?php
			include('./left.php');
			?>
			
	<div class="inright">
		<h3 class="intitle"><span>您所在的位置：<a href="./">首页</a> &gt; <a href="product.php">产品展示</a> &gt; <?php echo $pro['productname'];?></span><?php echo $pro['productname'];?></h3>
		<div class="mbody">
			<table class="proshow" cellpadding="0" cellspacing="0">
			<tr><td colspan="2"><img src="./files/<?php echo $pro['img'];?>" alt="" onload="javascript:if(this.clientWidth>300){this.style.width='300px';}"/></td></tr>
			<tr><td class="one">型　　号：</td><td class="two"><?php echo $pro['pro_no'];?></td></tr>
			<tr><td class="one">产品名称：</td><td class="two"><strong><?php echo $pro['productname'];?></strong></td></tr>
			<tr><td class="one">分　　类：</td><td class="two"><b><?php echo $pro['catename'];?></b></td></tr>
			<tr><td class="one">详情描述：</td><td class="two"><?php echo $pro['content'];?></td></tr>
			</table>
		</div>
		<h3 class="intitle">其它产品</h3>
		<ul class="product">
			<?php
			//去product表查找同类产品
			$sql = "select id,productname,img from product where cate_id = ".$pro['cate_id']." order by intime desc limit 6 ";
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

	</div>
</div>

<?php
include('./footer.php')
?>