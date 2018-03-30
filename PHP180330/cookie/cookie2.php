<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>DropCookie</title>
</head>
<body>
	<?php
	//删除上次登录保存到cookie中的时间
	setcookie("lastdate","",time()-10);
	//删除cookie --> $_COOKIE['name']="tianli"
	if (setcookie("name","",time()-10)) {
		echo "删除成功！";
	} 
	
	?>
</body>
</html>