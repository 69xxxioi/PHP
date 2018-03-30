<?php

	header("content-type:text/html;charset=utf-8");
	header("content-type: image/jpeg");


	$image_name=iconv("utf-8", "gb2312","./images/下载.jpg");
	//取得图像大小
	$image_size=getimagesize($image_name);
	//以上面的大小创建一张画布
	$im=imagecreatetruecolor($image_size["0"], $image_size["1"]);

	//由文件或 URL 创建一个新图象。返回一图像标识符，代表了从给定的文件名取得的图像。
	$res=imagecreatefromjpeg($image_name);
	//拷贝图像的一部分
	imagecopy($im, $res, 0, 0, 0, 0, $image_size["0"], $image_size["1"]);

	//以jpeg格式输出图象到浏览器或文件
	imagejpeg($im);
	//关闭图片资源
	imagedestroy($im);



?>