<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>删除Session</title>
</head>
<body>
	<?php

	session_start();

	//删除单个键值对,删除键值为age的
	/*unset($_SESSION['age']);

	echo "<pre>";
	print_r($_SESSION);
	echo "</pre>"*/

	//销毁session文件
	session_destroy();

	echo "删除成功！";


	?>
</body>
</html>