<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php

	//屏蔽因版本更新的建议提示，mysql扩展库->mysqli/PDO扩展库
	error_reporting(E_ALL ^ E_DEPRECATED);

	//这是一个工具类，完成对一个数据库的操作
	class SqlHelper {
		public $conn;
		public $dbname="db_01";
		public $username="root";
		public $password="";
		public $host="localhost";

		public function __construct() {
			$this->conn=mysql_connect($this->host,$this->username,$this->password);
			if (!$this->conn) {
				die("链接失败！".mysql_error());
			}
			mysql_select_db($this->dbname,$this->conn);
		} 

		//执行dql语句
		public function execute_dql($sql) {
			$res=mysql_query($sql,$this->conn) or die(mysql_error());
			return $res;
		}
		//执行dql语句，但是返回的是一个数组
		public function execute_dql2($sql) {
			$arr=array();
			$res=mysql_query($sql,$this->conn) or die(mysql_error());
			$i=0;
			while ($row=mysql_fetch_assoc($res)) {
			$arr[$i++]=$row;
			}
			
			//关闭资源
			mysql_free_result($res);
			return $arr;
		}

		//考虑分页情况查询
		public function execute_dql_fenye($sql1,$sql2,&$fenyePage) {

			$res=mysql_query($sql1) or die(mysql_error());
			$arr=array();
			while ($row=mysql_fetch_assoc($res)) {
				$arr[]=$row;
			}

			mysql_free_result($res);

			$res2=mysql_query($sql2,$this->conn) or die(mysql_error());
 			
 			if ($row=mysql_fetch_row($res2)) {
 				$fenyePage->pageCount=ceil($row[0]/$fenyePage->pageSize);
 				$fenyePage->rowCount=$row[0];
 			}
			$fenyePage->$res_array=$arr;
		}


		//执行一个dml语句
		public function execute_dml() {
			$b=mysql_query($sql,$this->conn);
			if (!$b) {
				return 0;
			}else{
				if (mysql_affected_rows($this->conn)>0) {
					return 1;//表示执行成功
				}else{
					return 2;//没有行数受到影响
				}
			}
		}

		//关闭链接的方法
		public function close_connect() {
			if (!empty($this->conn)) {
				mysql_close($this->conn);
			}
		}

	}
	?>
</body>
</html>