<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ShowCart</title>
</head>
<body>
	<?php

	header("content-type:text/html;charset=utf-8");
	if (isset($_GET['PHPSESSID'])) {
		session_id($_GET['PHPSESSID']);
	}
	session_start();
	$id=session_id();


	echo "<h2>您选的书有：</h2><hr color='red'/><br/>";
	foreach ($_SESSION as $key => $value) {
		echo "书号为：".$key."&nbsp;&nbsp;书名为：".$value."<br/>";
	}

	echo "<br/><br/><br/><a href=MyHall.php?PHPSESSID=$id>返回购物大厅</a>";

	?>
</body>
</html>