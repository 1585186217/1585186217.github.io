<?php
include('./conn.php');
?>

<!DOCTYPE html">
<html lang="zh-CN">
	<head>
		<meta charset="utf-8"/>
		<title>成都XXXXX科技有限公司</title>
		<meta name="description" content=""/>
		<meta name="keywords" content=""/>
		<meta name="robots" content="index,follow,all"/>
		<link type="text/css" rel="stylesheet" href="./skin/index.css"/>
		<script type="text/javascript" src="./skin/jquery-1.8.0.min.js"></script>
		<script type="text/javascript" src="./skin/jquery.jslides.js"></script>
		<script type="text/javascript" src="./skin/user_index.js"></script>
	</head>
	<body>
		<div id="header_bg">
			<div id="header">
				<h1><a href="/">成都XXXXX科技有限公司</a></h1>
				<div class="dianhua">24小时咨询热线<span>028-88888888</span></div>
			</div>
		</div>
		<div id="menu">
			<ul>
				<li><a href="./" class="on">首　页</a></li>
				<li><a href="about.php?id=1">公司简介</a></li>
				<li><a href="news.php">新闻中心</a></li>
				<li>
					<div id="menu3" class="menuchild" onmouseover="showmenu(3);" onmouseout="hidemenu(3);">
						<?php
							//构造读取产品分类的sql语句
							$sql = "select id,catename from category where module ='产品中心' order by orderno asc,id asc";
							$res = mysqli_query($conn,$sql);

							while($row = mysqli_fetch_assoc($res)){
								echo '<a href="product.php?cate_id='.$row['id'].'">'.$row['catename'].'</a>';
							}
						?>
					</div>
					<a href="product.php" onmouseover="showmenu(3);" onmouseout="hidemenu(3);">产品展示</a>
				</li>
				<li><a href="guestbook.php">来宾留言</a></li>
				<li><a href="about.php?id=3">企业文化</a></li>
				<li class="menu_end"><a href="about.php?id=4">联系我们</a></li>
			</ul>
		</div>
		<div id="banner">
			<div id="full-screen-slider">
				<ul id="slides">
					<li style="background:url('images/b1.jpg') no-repeat center top;background-size:100%;"></li>
					<li style="background:url('images/b2.jpg') no-repeat center top;background-size:100%;"></li>
					<li style="background:url('images/b3.jpg') no-repeat center top;background-size:100%;"></li>
				</ul>
			</div>
		</div>
		
<div class="notice_bg">
	<div class="notice">
		<div class="share_btns">
			<!-- Baidu Button BEGIN -->
			<div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare">
			<span class="bds_more">分享到：</span>
			<a class="bds_qzone"></a>
			<a class="bds_tsina"></a>
			<a class="bds_tqq"></a>
			<a class="bds_renren"></a>
			<a class="shareCount"></a>
			</div>
			<script type="text/javascript" id="bdshare_js" data="type=tools" ></script>
			<script type="text/javascript" id="bdshell_js"></script>
			<script type="text/javascript">
			document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?t=" + new Date().getHours();
			</script>
			<!-- Baidu Button END -->
		</div>
		<b>最新公告:</b>
		<ul>
			<?php
				//在新闻表中读取分类ID是9（最新公告）的所有数据，取最新发表一条的作为最新公告显示在这
				$sql = "select * from news where cate_id=8 order by id desc limit 1";
				$res = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_assoc($res)){
					//如果看着乱，这个echo可以拆开写
					echo '<li><span>'.$row['intime'].'</span><a target="_blank" href="content.php?id='.$row['id'].'" title="'.$row['title'].'">'.$row['title'].'</a></li>';
				}
			?>
		</ul>
		<div class="c"></div>
	</div>
</div>

