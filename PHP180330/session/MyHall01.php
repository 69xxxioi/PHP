<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MyHall</title>
</head>
<body>
	<?php



	//其中一种方法是：直接配置php.ini文件的session.use_trans_sid=0设为1(在href action header会自动加SID,但是js的跳转不会自动加)要重新启动apache
	//当客户端禁止coocie以后，下面是解决的方法  SID
	header("content-type:text/html;charset=utf-8");
	if (isset($_GET['PHPSESSID'])) {
		session_id($_GET['PHPSESSID']);
	}
	session_start();
	$id=session_id();

	echo "<h1>欢迎购买！</h1><hr color='red'/>";
	echo "<h3>书单列表</h3>";
	echo "<a href='ShopProcess.php?bookid=sn001&bookname=天龙八部&SID'>天龙八部</a><br/>";
	echo "<a href='ShopProcess.php?bookid=sn002&bookname=红龙梦&SID'>红龙梦</a><br/>";
	echo "<a href='ShopProcess.php?bookid=sn003&bookname=西游记&SID'>西游记</a><br/>";
	echo "<a href='ShopProcess.php?bookid=sn004&bookname=水浒传&SID'>水浒传</a><br/>";
	echo "<br/><br/>看看都选了些什么！<a href='ShowCart.php?SID'>购物车</a><br/>";

	?>
</body>
</html>