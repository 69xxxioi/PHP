<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mysqli</title>
</head>
<body>
	<?php
	$mysqli = new MySQLi("localhost","root","","db_01");

	if ($mysqli->connect_error) {
		die("链接失败！".$mysqli->connect_error);
	}


	$sql1 = "update tb_02 set balance=balance-20 where id=3";
	$sql2 = "update tb_02 set balance=balance+20 where id=1";

	$bool1 = $mysqli->query($sql1) or die("修改失败！".$mysqli->error);
	$bool2 = $mysqli->query($sql2) or die("修改失败！".$mysqli->error);

	if(!$bool1 || !$bool2) {
		echo "失败！";
	}else{
		echo "成功！";
	}
	$mysqli->close();









	?>
</body>
</html>