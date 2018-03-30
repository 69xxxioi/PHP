<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MySQLi</title>
</head>
<body>


	<?php

		$mysqli = new MySQLi("localhost","root","","db_01");
		if($mysqli->connect_error) {
			die("连接失败！".$mysqli->connect->error);
		}

		$sqls = "insert into tb_01 values
		('20172354','lixingwei','165','lixingwei@qq.com','23');
		insert into tb_01 values
		('20172254','ganhan','169','gaohan@foxmail.com','46');
		insert into tb_01 values
		('20173554','huangxing','166','huangxing@gmail.com','125');";


		$res = $mysqli->multi_query($sqls);

		if (!$res) {
			echo "执行失败！".$mysqli->error;
		} else {
			echo "执行成功！";
		}


		//关闭资源
		$mysqli->close();







	?>
	
</body>
</html>