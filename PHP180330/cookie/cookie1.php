<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>cookie</title>
</head>
<body>
	<?php

	//设置时区
	date_default_timezone_set("Asia/Chongqing");

	setcookie("name","tianli",time()+3600);
	setcookie("password",md5("6920a!"),time()+3600);
	setcookie("city","哈尔滨",time()+3600);
	
	if (!empty($_COOKIE['lastdate'])) {
		//如果有上次登录的记录，打印出上次登录的时间
		echo "您上次登录的时间是：".$_COOKIE['lastdate']."<hr/>";
		//更新登录时间，将当前登录的时间保存到cookie中，
		setcookie("lastdate",date('Y-m-d H-i-s'),time()+3600);
	} else {
		echo "您是第一次登录！";
		//如果没有上次登录的时间，则保存当前登录的时间到cookie
		setcookie("lastdate",date('Y-m-d H-i-s'),time()+3600);
	}
	//打印超全局变量中的所有信息
	print_r($_COOKIE);
	?>
</body>
</html>