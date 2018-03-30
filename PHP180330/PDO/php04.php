<?php
include("stmt.php");
try{
	$sql = "INSERT INTO user(username,pwd,email) VALUE(:username,:pwd,:email)";//别名方式占位
	$stmt = $pdo ->prepare($sql);
/*
	//参数绑定
	$stmt -> bindParam(":username",$username);
	$stmt -> bindParam(":pwd",$pwd);
	$stmt -> bindParam(":email",$email);

	$username = "user9";
	$pwd = md5(123456);
	$email = "user9@gmail.com";

	$stmt -> execute();
*/
	//另外一种传参的方法
	$pwd = md5(123456);
	$arr = array("username"=>"user10","pwd"=>$pwd,"email"=>"user10@gmail.com");
	$stmt -> execute($arr);
}catch(PDOException $e){
	echo $e -> getMessage();
	echo $e -> getFile();
	echo $e -> getLine();
	echo $e -> getCode();
}