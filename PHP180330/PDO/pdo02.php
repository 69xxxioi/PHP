<?php

try{
	$dsn = "mysql:dbname=db_01;host=127.0.0.1";
	$name = "root";
	$pwd = "";

	$pdo = new PDO($dsn, $name, $pwd);
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//echo $pdo -> getAttribute(PDO::ATTR_ERRMODE);
	$username = "tl";
	$pwd = md5(123456);
	$email = 'tl@sohu.com';
	//$sql = "INSERT INTO user (username,pwd,email) VALUE('{$username}','{$pwd}','{$email}')";
	//exce()执行对表有影响行数的语句
	//$affected = $pdo -> exec($sql);
	//var_dump($affected);
	$sql = "SELECT * FROM user WHERE 1";
	//query()方法方法执行对表有返回结果的语句
	$stmt = $pdo -> query($sql);
	//var_dump($stmt);
	foreach ($stmt as $v) {
		echo "{$v['id']}-{$v['username']}-{$v['pwd']}-{$v['email']}<br/>";
	}
}catch(PDOException $e){
	echo $e -> getMessage();
	echo $e -> getFile();
	echo $e -> getLine();
	echo $e -> getCode();
}


?>