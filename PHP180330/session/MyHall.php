<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MyHall</title>
</head>
<body>
	<?php

	header("content-type:text/html;charset=utf-8");
	if (isset($_GET['PHPSESSID'])) {
		session_id($_GET['PHPSESSID']);
	}
	session_start();
	$id=session_id();

	echo "<h1>欢迎购买！</h1><hr color='red'/>";
	echo "<h3>书单列表</h3>";
	echo "<a href='ShopProcess.php?bookid=sn001&bookname=天龙八部&PHPSESSID=$id'>天龙八部</a><br/>";
	echo "<a href='ShopProcess.php?bookid=sn002&bookname=红龙梦&PHPSESSID=$id'>红龙梦</a><br/>";
	echo "<a href='ShopProcess.php?bookid=sn003&bookname=西游记&PHPSESSID=$id'>西游记</a><br/>";
	echo "<a href='ShopProcess.php?bookid=sn004&bookname=水浒传&PHPSESSID=$id'>水浒传</a><br/>";
	echo "<br/><br/>看看都选了些什么！<a href='ShowCart.php?PHPSESSID=$id'>购物车</a><br/>";

	?>
</body>
</html>