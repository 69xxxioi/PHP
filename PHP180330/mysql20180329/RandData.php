<?php
	header("content-type:text/html;charset=utf-8");
	try{
		$dsn = "mysql:dbname=db;host=127.0.0.1";
		$name = "root";
		$pwd = "";

		$pdo = new PDO($dsn, $name, $pwd);
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo -> setAttribute(3,2);
		$pdo->query("SET NAMES utf8");

		$sql = "INSERT INTO message VALUES (?,?,?,?,?)";
		$stmt = $pdo -> prepare($sql);
		$id = 'null';
		$stmt -> bindparam(1,$id);
		$stmt -> bindparam(2,$name);
		$stmt -> bindparam(3,$number);
		$stmt -> bindparam(4,$gender);
		$stmt -> bindparam(5,$age);

		for ($i=0; $i < 200; $i++) { 
			$name = chr(rand(65,90)).chr(rand(97,122));
			$str = (rand(0,20)%2)?'2015':'2016';
			$number = $str.rand(1000,9999);
			$gender = (rand(0,100)%2)?'男':'女';
			$age = rand(0,99);
			$stmt -> execute();
		}
		echo "数据插入成功！";
	}catch(PDOException $e){
		echo $e -> getFile();
		echo $e -> getMessage();
		echo $e -> getLine();
		echo $e ->getCode();
	}
	?>