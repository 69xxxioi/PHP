<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mysql</title>
</head>
<body>
	<?php
	//mysql扩展库操作msql数据库的步骤如下
	//1.获取连接
	$conn=mysql_connect("127.0.0.1","root");
	if (!$conn) {
		die("连接失败！".mysql_error());
	}

	//2.选择数据库
	mysql_select_db("db_01");

	//3.设置操作编码（建议有）！！！！
	//4.发送指令sql（ddl数据定义语句，dml数据操作语言 dql（select）dtl数据事务语句）

	$sql="select * from tb_01";
	//函数
	$res=mysql_query($sql,$conn);
	//var_dump($res);

	//5.接受返回的结果，并处理（显示）
	while ($row = mysql_fetch_row($res)) {
		//第一种方式打印显示
		echo "<br/>".var_dump($row);
		//第二种方式打印显示
		/*foreach($row as $key=>$value) {
			echo " array[$key]=$value ";
		}
		echo "<br/>";*/
	}
	//6.释放资源，并关闭连接
	mysql_free_result($res);








	?>
</body>
</html>