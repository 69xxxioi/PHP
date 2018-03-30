<?php
include("stmt.php");
try{
	$sql = "INSERT INTO user(username,pwd,email) VALUE(?,?,?)";  //?是占位符
	$stmt = $pdo -> prepare($sql);    //prepare()准备语句

	/*
	//bindParam()绑定参数，其中有三个变量
	//第一个参数：第几个占位符
	//第一个参数：要绑定的变量
	//第一个参数：变量的类型，一般不用写
	$stmt -> bindParam(1,$username);
	$stmt -> bindParam(2,$pwd);
	$stmt -> bindParam(3,$email);

	$username = "user3";
	$pwd = md5(123456);
	$email = "user3@admin.com";

	$return = $stmt -> execute();
	echo $return;

	$username = "user4";
	$pwd = md5(123456);
	$email = "user4@admin.com";
	$stmt -> execute();      //执行预处理语句
	*/

	$pwd = md5(123456);
	$stmt -> execute(array("user5",$pwd,"user5@admin.com"));
	//execute()可以用这个方法直接传参，不需要使用绑定参数的方法
}catch(PDOException $e){
	echo $e -> getMessage();
	echo $e -> getFile();
	echo $e -> getLine();
	echo $e -> getCode();
}