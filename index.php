<?php
include('./header.php');
?>

<div class="main1">
	<div class="m1_left">
		<h3 class="ltitle">
			<span><a href="product.php"><img src="images/more.jpg" alt="更多"/></a></span>
			<strong class="on"><a href="product.php">最新产品</a></strong>
		</h3>
		<div  class="m1_body c">

<div id='demo'>
	<table cellpadding='0' cellspacing='0'>
		<tr>
			<td id='demo1'>
		<table cellpadding="0" cellspacing="0">
			<tr>
				<?php
				//从产品数据表中读取最新发布的6个产品，能撑满一行(4个)就行
				$sql = "select * from product order by intime desc limit 6";
				$res = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_assoc($res)){
					echo '<td>';
					echo '<a href="product_show.php?id='.$row['id'].'" title="'.$row['productname'].'"><img src="./files/'.$row['img'].'" alt="'.$row['productname'].'"/><br/>'.$row['productname'].'</a>';
					echo '</td>';
				}

				?>
			</tr>
		</table>
			</td>
			<!-- 这里又放了一次demo1的东西，所以当产品不满足一行（4个）时，会从第一个开始复制，为了撑满一行，但是不足一行时也没有滚动效果了 -->
			<td id="demo2" valign="top"></td>
		</tr>
	</table>
</div>
<script type="text/javascript">
<!--
  var speed=15;
  demo2.innerHTML=demo1.innerHTML;
  function Marquee(){
  if(demo2.offsetWidth-demo.scrollLeft<=0)
  demo.scrollLeft-=demo1.offsetWidth;
  else{
  demo.scrollLeft++;
  }
  }
  var MyMar=setInterval(Marquee,speed);
  demo.onmouseover=function() {clearInterval(MyMar);}
  demo.onmouseout=function() {MyMar=setInterval(Marquee,speed);}
//-->
</script>
		</div>
	</div>
	<div class="m2_right">
		<h3 class="rtitle">合作媒体</h3>
		<div class="m2_body m2_body2">
			<p><img src="images/m2_pic.png" alt=""/></p>
			<p align="center"><a href="about.php?id=2">查看更多合作媒体 &gt;&gt;</a></p>
		</div>		
	</div>
	<div class="c"></div>
</div>
<div class="main1">
	<div class="m3_left">
		<div class="m3_ll">
			<h3 class="ltitle"><span><a href="about.php?id=1"><img src="images/more.jpg" alt="更多"/></a></span><strong class="on">公司简介</strong></h3>
			<div class="m1_body c">
				<?php
					//从单页模块表中读取针对首页写的公司简介
					$sql = "select * from board where id=5";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_assoc($res)){
						echo '<p>'.$row['content'].'</p>';
					}
				?>
			</div>
		</div>
		<div class="m3_lr">
			<h3 class="ltitle"><span><a href="news.php"><img src="images/more.jpg" alt="更多"/></a></span><strong class="on">新闻资讯</strong></h3>
			<ul class="m1_body c">
				<?php
					$sql = "select * from news order by intime desc limit 10";
					$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_assoc($res)){
						//字符型的时间转换为时间戳通过Y-m-d格式化，y是两位
						echo '<li><span>'.date('Y-m-d',strtotime($row['intime'])).'</span><a href="content.php?id='.$row['id'].'">'.$row['title'].'</a></li>';
					}
				?>
				
			</ul>
		</div>
		<div class="c"></div>
	</div>
	<div class="m2_right">
		<h3 class="rtitle">友情连接</h3>
		<ul class="m2_body">
			<?php
				$sql = "select * from flink order by id desc";
				$res = mysqli_query($conn,$sql);
					while($row = mysqli_fetch_assoc($res)){
						echo '<li><a href="'.$row['link_url'].'" target="_blank">'.$row['title'].'</a></li>';
					}
			?>
			
		</ul>		
	</div>
	<div class="c"></div>
</div>
<?php
include('./footer.php')
?>
