<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mysqli</title>
</head>
<body>
	<?php
	
	//1.创建mysqli对象
	$mysqli = new mysqli("localhost","root","","db_01");

	if($mysqli->connect_error) {
		die("连接失败！".$mysqli->connect_error);
	}

	//2.连接数据库（发送sql）
	$sql="select * from tb_01";
	$res=$mysqli->query($sql);
	//var_dump($res);


	//3.处理结果 
	echo "<table border='1'>";
	while ($row=$res->fetch_row()) {
		echo "<tr>";
		foreach ($row as $key => $value) {
			echo "<td>".$value."</td>";
		}
		echo "</tr>";
	}
	echo "</table>";

	//4.关闭连接
	$res->free();
	$mysqli->close();









	?>
</body>
</html>