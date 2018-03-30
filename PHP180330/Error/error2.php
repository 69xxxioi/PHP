<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>error</title>
</head>
<body>
	<?php

	if(!file_exists("../../index.php")){
		//如果文件不存在,die()函数将结束运行,并打印出函数中的参数
		die("文件不存在！！");
	}else{
		//如果文件存在就打开文件
		$fp=fopen("../../index.php","r");
	}
	echo "ok<br/>";
	//更简便的的方法
	file_exists("index.php") or die("文件不存在！！");	
	?>
</body>
</html>