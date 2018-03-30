<?php

	header("content-type:text/html;charset=utf-8");
	var_dump($_FILES);

	//$username=$_POST['username'];
	//$fileintro=$_POST['fileintro'];

	$file_size=$_FILES['myfile']['size'];
	if($file_size>2*1024*1024) {
		die("文件过大，文件大小不能超过2M!");
	}

	$sart_path=$_FILES['myfile']['tmp_name'];
	$target_path=$_SERVER['DOCUMENT_ROOT']."myphp/file/directory/".$_FILES['myfile']['name'];
	$file_name=iconv("utf-8", "gb2312", $_FILES['myfile']['name']);

	if(!move_uploaded_file($sart_path, $target_path)) die("上传失败！");
	echo "上传成功！";



?>