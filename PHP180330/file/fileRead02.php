<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>File->Read</title>
</head>
<body>
	<?php

	header("content-type:text/html;charset=utf-8");

	$file_path="./test1.txt";
	/*if (!file_exists($file_path)) {
		die("文件打开失败！");
	}
	echo "<h1>test1.txt文件的相关信息如下</h1><hr/>";
	//第二种获取文件的信息
	echo "<br/>文件的大小：".filesize($file_path);
	echo "<br/>文件的内容上次被修改的时间：".date("Y-m-d H:i:s",filemtime($file_path));
	echo "<h3>文件内容如下</h3>";

	$fp=fopen($file_path,"a+");

	$coon=fread($fp, filesize($file_path));
	$coon=str_replace("\r\n", "<br/>", $coon);

	echo $coon;*/


	//第三种方式循环读取

	//判断文件文件存在与否
	if (!file_exists($file_path)) {
		die("文件打开失败！");
	}
	//打开文件
	$fp=fopen($file_path, "a+");
	//指定每次读文件的大小
	$buffer=1024;
	//feof() — 测试文件指针是否到了文件结束的位置
	while (!feof($fp)) {
		$coon=fread($fp,$buffer);
		$coon=str_replace("\r\n","<br/>" , $coon);
		echo $coon;
	}


	fclose($fp);

	?>
</body>
</html>