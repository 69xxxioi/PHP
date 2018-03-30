<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理系统</title>
</head>
<body>
	<?php
	echo "<hr color='red'/>";
	echo "欢迎".$_GET['name']."登陆成功！<br/>";
	echo "<hr color='red'/>";
	?>
	<h1>主界面</h1><br/>
	<a href="empList.php">管理用户</a><br/>
	<a href="#">添加用户</a><br/>
	<a href="#">查询用户</a><br/>
	<a href="#">退出系统</a><br/>
	<a href="login.php">返回重新登录</a>'
</body>
</html>