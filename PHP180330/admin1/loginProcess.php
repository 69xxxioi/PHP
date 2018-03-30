<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	$id=$_POST['id'];
	$password=$_POST['password'];

	$conn=mysql_connect("localhost","root","");
	if (!$conn) {
		die("链接失败！".mysql_error());
	}
	mysql_query("set names utf8",$conn) or die(mysql_errno());
	mysql_select_db("db_01",$conn) or die(mysql_errno());
	$sql="select password,name from admin where id=$id";

	$res=mysql_query($sql,$conn);

	if ($row=mysql_fetch_assoc($res)) {
		if ($row['password']==$password) {
			$name=$row['name'];
			header("Location:empManage.php?name=$name");
			exit();
		}
	}
	header("Location:login.php?errno=1");
	exit();

	mysql_free_result($res);
	mysql_close($conn)
	

	/*if ($id=="100"&&$password=="123") {
		header("Location:empManage.php");
		exit();
	}else{
		header("location:login.php?errno=1");
	}*/
	?>
</body>
</html>