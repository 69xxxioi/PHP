<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mysql_CRUD</title>
</head>
<body>
	<?php
/*	//mysql扩展库操作msql数据库的步骤如下
	//1.获取连接
	$conn = mysql_connect("localhost","root","");
	if(!$conn) {
		die("连接失败！".mysql_error());
	}

	mysql_select_db("db_01",$conn) or die(mysql_error());

	mysql_query("set names utf8");

	//insert into tb_01 values('20144520','weilongyun','180','weilongyun@foxmial.com','128')
	//delete from tb_01 where password='weilongyun'
    $sql="delete from tb_01 where password='fd'";
	$res=mysql_query($sql,$conn);
	if(!$res){
		die("插入失败！".mysql_error());
	}
	//看看有几天记录受影响
	if(mysql_affected_rows($conn)>0){
		echo "插入操作成功！";
	}else{
		echo "记录没受影响！";
	}

	mysql_close($conn);*/

 	//将上面的代码封装成一个类，放在指定的文件中sql01.class.php


 	require_once "sql03.class.php";

 	$sql="insert into tb_01 values('20144520','weilongyun','180','weilongyun@foxmial.com','128')";

 	$sele= new sqlTool;
 	$res=$sele->execute_dql($sql);
 	if ($res==0) {
 		die("失败");
 	} else if($res==1) {
 		echo "成功";
 	} else if ($res==2) {
 		echo "没有行数影响";
 	}



	?>
</body>
</html>