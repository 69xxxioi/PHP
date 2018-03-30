<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mysqli扩展库</title>
</head>
<body>
	<?php
	$mysqli = new MySQLi("localhost","root","","db_01");
	if ($mysqli->connect_error) {
		die("连接失败！".$mysqli->connect_error);

	}
	//将提交设为false
	$mysqli->autocommit(false);

	$sql1 = "update tb_02 set balance=balance-20 where id=3";
	$sql2 = "update tb_02 set balance=balance+20 where id=0";

	$b1=$mysqli->query($sql1);
	$b2=$mysqli->query($sql2);

	if (!$b1 || !$b2) {
		die("操作失败！".$mysqli->error);
		//回滚
		$mysqli->rollback();
	}else{
		//提交
		echo "操作成功！";
		$mysqli->commit();

	}
	$mysqli->close();





	?>
</body>
</html>