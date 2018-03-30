<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
	try{
		$dsn = "mysql:dbname=db_01;host=127.0.0.1";
		$name = "root";
		$pwd = "";

		$pdo = new PDO($dsn, $name, $pwd);
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo -> setAttribute(3,2);

		$sql = "INSERT INTO a (string) VALUES (?)";
		$stmt = $pdo -> prepare($sql);
		$stmt ->bindparam(1,$str);


		$fp = fopen('./zhao1.txt', 'a+') or die("文件打开失败！");
		//$str = fread($fp, filesize('./a.txt'));

		while (!feof($fp)) {
			$str = fgets($fp). "<br />";
			$stmt -> execute();
		}
		echo "数据插入成功！";
		fclose($fp);




	}catch(PDOException $e){
		echo $e -> getFile();
		echo $e -> getMessage();
		echo $e -> getLine();
		echo $e ->getCode();
	}



	?>
</body>
</html>