<?php

	header("content-type:text/html;charset=utf-8");


	/*$file_path="./test1.txt";

	//1.传统方法
	if (!file_exists($file_path))die("文件不存在！");
	$fp=fopen($file_path, "a+");
	$str="\r\nhello Mr.tian!";

	for ($i=0; $i <10 ; $i++) fwrite($fp, $str);
	echo "写入成功！";
	fclose($fp);*/

	//2.第二种方式写入文件
	$file_path="./test1.txt";
	//如果希望循环写入“哈尔滨您好”，得先拼成串以后再一次性写入
	//不建议循环写入，因为每执行一次file_put_contents函数
	//就会依次调用fopen()，fwrite() 以及 fclose() 
	$str="";
	for ($i=0; $i <10 ; $i++) $str.="\r\n哈尔滨您好！";
	//file_put_contents函数里面包括了 fopen()，fwrite() 以及 fclose() 功能一样并依次调用
	file_put_contents($file_path, $str,FILE_APPEND);
	echo "写入成功！";







	



?>