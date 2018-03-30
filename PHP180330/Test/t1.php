<?php
try{
	$dsn = "mysql:dbname=db;host=127.0.0.1";
	$name = "root";
	$pwd = "";

	$pdo = new PDO($dsn, $name, $pwd);
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo -> setAttribute(3,2);
	$sql = "INSERT INTO message (id,name,gender,age) VALUES (?,?,?,?)";
	$stmt = $pdo -> prepare($sql);
		
	for ($i=1;$i<=2000;$i++) {
		$k=rand(65,122);
		$name=chr($k).$i;
		$gender=($k%2)?'female':'male';
		$age=rand(1,80);
		$stmt ->bindparam(1,$i);
		$stmt ->bindparam(2,$name);
		$stmt ->bindparam(3,$gender);
		$stmt ->bindparam(4,$age);
		$stmt -> execute();
	}
	echo 'done';
}catch(PDOException $e){
	echo $e -> getFile();
	echo $e -> getMessage();
	echo $e -> getLine();
	echo $e ->getCode();
}



?>