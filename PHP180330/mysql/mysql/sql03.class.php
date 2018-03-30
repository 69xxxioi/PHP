<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>mysql_CRUD</title>
</head>
<body>
	<?php
	
	class sqlTool {

		private $conn;
		private $host="localhost";
		private $user="root";
		private $password="";
		private $db="db_01";

		function sqlTool() {
			$this->conn=mysql_connect($this->host,$this->user,$this->password);
			if (!$this->conn) {
				die("连接数据库失败！".mysql_error());
			}
			mysql_select_db($this->db,$this->conn);
			mysql_query("set names utf8");
		}
		function execute_dql($sql) {
			$b=mysql_query($sql,$this->conn);
			if (!$b) {
				return 0;//失败
			} else {
				if (mysql_affected_rows($this->conn)>0) {
					return 1;//表示成功
				} else {
					return 2;//表示失败
				}
				
			}
			
		}
	}

	?>
</body>
</html>