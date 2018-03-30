<?php
include("stmt.php");
try{
	$sql = "SELECT * FROM user WHERE id > :id";
	$stmt = $pdo -> prepare($sql);
	$stmt ->execute($_GET);

	//$user = $stmt -> fetch(PDO::FETCH_ASSOC);
	//var_dump($user);
	$users = $stmt -> fetchAll(PDO::FETCH_NUM);
	var_dump($stmt -> rowcount($users));
}catch(PDOException $e){
	echo $e -> getMessage();
	echo $e -> getFile();
	echo $e -> getLine();
	echo $e -> getCode();
}