<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>文件open&read</title>
</head>
<body>
	<?php

	header("conten-type:text/html;charset=utf-8");
	//指定文件的路径和文件名
	$file_path="./test1.txt";
	//1.打开文件fopen(相对路径或绝对路径，打开模式),返回一个指针，指向目标文件
	if(!$fp=fopen($file_path, "r")){
		die("文件打开失败！");
	}else{
		echo "<pre>";
		print_r($arr=fstat($fp));
		echo "</pre>文件的大小:".$arr['size']."字节<br/>";
		echo "上次访问时间/读取时间:".date("Y-m-d H:i:s",$arr['atime'])."<br/>";
		echo "上次修改时间:".date("Y-m-d H:i:s",$arr['mtime'])."<br/>";
	}
	fclose($fp);
	?>
</body>
</html>