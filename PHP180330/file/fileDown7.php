<?php

	header("content-type:text/html;charset=utf-8");

	$file_name="田力.jpg";
	$file_name=iconv("utf-8", "gb2312", "$file_name");
	if (!$fp=fopen($file_name, "r")) die("文件不存在！");
	$file_size=filesize("$file_name");
	while(!feof($fp)) $res=fread($fp, $file_size);


	fclose($fp);

	//返回的文件
	header("Content-type: application/octet-stream");
	//按照字节大小返回
	header("Accept-Ranges: bytes");
	//返回文件大小
	header("Accept-Length: $file_size");
	//这里客户端的弹出对话框，对应的文件名
	header("Content-Disposition: attachment; filename=".$file_name);






?>