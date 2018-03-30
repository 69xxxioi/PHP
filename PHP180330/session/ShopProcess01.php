<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ShopProcess</title>
</head>
<body>
	<?php

	//当客户端禁止coocie以后，下面是解决的方法  SID
	header("content-type:text/html;charset=utf-8");
	if (isset($_GET['PHPSESSID'])) {
		session_id($_GET['PHPSESSID']);
	}
	session_start();
	$id=session_id();

	//拿到书的id和书名
	$bookid=$_GET["bookid"];
	$bookname=$_GET["bookname"];

	//保存到seesion中
	$_SESSION["$bookid"]=$bookname;

	echo "<h1>已成功加入购物车</h1>";
	echo "<h2><a href=MyHall.php?PHPSESSID=$id>返回商店</h2></a>";
	echo "<br/><br/>看看都有啥！<a href='ShowCart.php?SID'>购物车</a><br/>";


	?>
</body>
</html>