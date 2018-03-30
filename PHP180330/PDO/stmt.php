<?php
try{
	$dsn = "mysql:dbname=db_01;host=127.0.0.1";
	$name = "root";
	$pwd = "";
	
	$pdo = new PDO($dsn, $name, $pwd);
	$pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOExcetion $e){
	echo $e -> getMessage();
	echo $e -> getFile();
	echo $e -> getLine();
	echo $e -> getCode();
}