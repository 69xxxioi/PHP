<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AdminService</title>
</head>
<body>
	<?php

	require_once 'SqlHelper.class.php';
	//该类是一个义务逻辑处理类，主要完成对admin表的操作
	class AdminService {
		//提供一个验证用户是否合法的方法
		public function chekcAdmin($id,$password) {
			$sql="select password,name from admin where id=$id";
			//创建一个sqlHelper对象
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dql($sql);
			if ($row=mysql_fetch_assoc($res)) {
				if ($password==$row['password']) {
					return $row['name'];
				}
				//关闭资源
				mysql_free_result($res);
				//关闭链接
				$sqlHelper->close_connect();
				return false;
			}
		}
	}
	?>
</body>
</html>