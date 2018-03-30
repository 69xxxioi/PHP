<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>error</title>
</head>
<body>
	<?php
		//打开某个文件用fopen(filename,mode,[....])函数，如果
		//没有这个文件就会报错
		/*$fp=fopen("../../index.php","r");
		echo "ok";*/
		//下面我们来处理上面出现的错误
		//用file_exists()函数来检测文件或目录是否存在，
		//	参数是文件名
		if(!file_exists("../../index.php")){
			echo "文件不存在！！";
			//如果文件不存在，用exit()函数来退出运行
			exit();
		}else{
			//如果存在则打开文件
			$fp=fopen("../../index.php","r");
			echo "文件打开成功！！";
			//文件用完后，用fclose(参数名,不是文件名)函数关闭文件
			fclose($fp);
		}




	?>
</body>
</html>