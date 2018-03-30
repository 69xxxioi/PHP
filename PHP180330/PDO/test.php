<?php
include("stmt.php");
try{
/*	
	$dsn = "mysql:dbname=db_01;host=127.0.0.1";
	$name = "root";
	$pwd = "";

	$pdo = new PDO($dsn, $name, $pwd);
	$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo -> setAttribute(3, 2);
	//var_dump($pdo);

	$username = "user6";
	$pwd = md5(123456);
	$email = "user6@gmail.com";

	//$sql = "INSERT INTO user(username,pwd,email) VALUE('{$username}','{$pwd}','{$email}')";
	//$pdo -> exec($sql);
	
	$sql = "SELECT * FROM user WHERE 1";
	$stmt = $pdo -> query($sql);
	foreach($stmt as $key => $v){
		echo "{$v['id']}-{$v['username']}-{$v['pwd']}-{$v['email']}<br/>";
	}
*/
	//另外一种加载数据库的方法（预处理+占位符）
	$sql = "INSERT INTO user (username, pwd, email) VALUE(?,?,?)"; //?为占位符
	$stmt = $pdo -> prepare($sql); //prepare()预处理语句
/*
	//绑定参数
	$stmt -> bindParam(1, $username);
	$stmt -> bindParam(2, $pwd);
	$stmt -> bindParam(3, $email);

	$username = "user7";
	$pwd = md5(123456);
	$email = "user7@gmail.com";

	//execute()执行预处理语句
	$stmt -> execute();
*/
	//PDO类中exexute()方法还可以直接传参执行，无需用bindParam()方法绑定参数，但是参数必须是数组
	$pwd = md5(123456);
	$stmt -> execute(array("user8",$pwd,"user8@gmail.com"));

}catch(PDOException $e){
	echo $e -> getMessage();
	echo $e -> getFile();
	echo $e -> getLine();
	echo $e -> getCode();
}