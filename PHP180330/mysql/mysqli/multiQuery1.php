<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MsSQLi</title>
</head>
<body>
	
	<?php
	//链接数据库并打开数据库，创建一个mysqli对象
	$mysqli = new MySQLi("localhost","root","","db_01");
	//批量查询语句
	$sqls = "select * from tb_01;select * from class;";


	if ($mysqli->multi_query($sqls)) {
		
		do {
			//从mysqli链接取出第一个结果集
			$result=$mysqli->store_result();
			//循环取出每个记录
			echo "<table border='1' bordercolor='red'>";
			while($row = $result->fetch_row()){
				//一个记录用数组索引的方式循环取出
				echo "<tr>";
				foreach($row as $key => $val) {
					echo "<td>$val</td>";
				}
				echo "</tr>";
			}
			//释放$result中取出的资源
			$result->free();
			//如果$mysqli没有下一个结果集，则退出循环
			if (!$mysqli->more_results()) {
				break;
			}
			echo "</table>";
		} while ($mysqli->next_result());
		//从之前的调用mysqli::multi_query()准备下一个结果集，
		//可以通过mysqli::store_result()或mysqli::use_result()来检索。
	}else{
		echo "操作失败！";
	}
	//关闭数据库链接
	$mysqli->close();
	




	?>



</body>
</html>