<?php 
use yii\helpers\Html;

$session = \Yii::$app->session;
$assets  = \Yii::$app->params['frontend_assets']; 
?>

<?php $this->beginPage() ?>

<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="<?= $assets.'css/' ?>nav.css">
	<link rel="stylesheet" type="text/css" href="<?= $assets.'css/' ?>index.css">
	<link rel="stylesheet" href="<?= $assets.'css/' ?>ideal-image-slider.css">
    <link rel="stylesheet" href="<?= $assets.'css/' ?>default.css">
</head>
<body>
<?php $this->beginBody() ?>
	<div class="topHead">
	    <a href="intro.html" class="manager">暨南大学勤工助学管理委员会市场部</a>
	    <ul>
	    	<li><a href="connect.html">联系我们</a></li>
	    	<li>|</li>
	    	<li><a href="question.html">常见问题</a></li>
	    	<li>|</li>
	    	<li><a href="index.html">登录</a></li>
	    </ul>
	</div>
	<div class="head">
		<div class="logo">
			<img src="<?= $assets.'images/' ?>headlogo.png">
		</div>
		<div class="mainnav">
		    <ul>
			    <li><a class="active" href="index.html">首页</a></li>
			    <li><a href="teach.html">家教</a></li>
			    <li><a href="partime.html">兼职</a></li>
			    <li><a href="teacher.html">教员库</a></li>
			    <li><a href="tips.html">家教指南</a></li>
			    <li><a href="news.html">新闻动态</a></li>
		    </ul>
		</div>
	</div>

	<div class="content">

	<!-- ====================================================== -->

        <?= $content ?>

    <!-- ====================================================== -->

	</div>
	<div class="clear"></div>
	<div class="footer">
		<table>
			<tr>
				<td>QQ：648650200</td>
				<td>电话：020-85221538</td>
				<td>邮箱：648650200@qq.com</td>
				<td>邮编：510632 </td>
			</tr>
			<tr><td colspan="4">地址：广州市天河区黄埔大道西601号暨南大学羊城苑15栋；南校区：校医室3楼</td></tr>
			<tr><td colspan="4">copyright © 2015-2016 暨大家教</td></tr>
			
		</table>
	</div>
	<script src="<?= $assets.'js/' ?>ideal-image-slider.min.js"></script>
	<script src="<?= $assets.'js/' ?>iis-bullet-nav.js"></script>
    <script>
    var slider = new IdealImageSlider.Slider('#slider');
    slider.addBulletNav();
    slider.start();
    </script>
     <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>