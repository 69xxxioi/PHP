<?php
header("Content-Type:text/html;charset=utf-8");
try{
	$dsn = "mysql:dbname=db_01;host=127.0.0.1";
	$name = "root";
	$pwd = "";

	$pdo = new PDO($dsn, $name, $pwd);
	$pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	//关闭自动提交
	$pdo -> setAttribute(PDO::ATTR_AUTOCOMMIT,0);
	//开启错误回滚机制
	$pdo -> beginTransaction();

	$sql = "UPDATE cash SET money=money-50 WHERE username='zhangsanj'";
	$affectedRow = $pdo -> exec($sql);
	if (!$affectedRow) {
		throw new PDOException("转出失败！");
	}
	$sql = "UPDATE cash SET money=money+50 WHERE username='lisi'";
	$affectedRow = $pdo -> exec($sql);
	if (!$affectedRow) {
		throw new PDOException("转入失败！");
	}

	//事务成功：提交事务处理
	$pdo -> commit();
	echo "汇款成功！";
}catch(PDOException $e){
	//事务失败：回滚事务处理
	$pdo -> rollback();
	echo $e -> getMessage();
	echo $e -> getFile();
	echo $e -> getLine();
	echo $e -> getCode();
}
//开启自动提交
$pdo -> setAttribute(PDO::ATTR_AUTOCOMMIT,1);