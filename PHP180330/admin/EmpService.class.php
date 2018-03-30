<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php

	require_once 'SqlHelper.class.php';
	//提供一个函数获取共有多少页
	class EmpService{
		function getPageCount($pageSize) {

			$sql="select count(id) from emp";
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dql($sql);
			//这样我们就可以计算$pageCount
			if ($row=mysql_fetch_row($res)) {
				$pageCount=ceil($row['0']/$pageSize);
			}
			//释放资源和关闭链接
			mysql_free_result($res);
			$sqlHelper->close_connect();
			return $pageCount;
		}
		//一个函数可以获取应当显示的雇员信息
		function getEmpListByPage($pageNow,$pageSize) {

			$sql="select * from emp limit ".($pageNow-1)*$pageSize.",".$pageSize;
			$sqlHelper=new SqlHelper();
			$res=$sqlHelper->execute_dql2($sql);
			
			return $res;
		}

		//第二种分页方法
		function getFenyePage($fenyePage) {
			$sqlHelper=new SqlHelper();
			$sql1="select * from emp limit ".($fenyePage->pageNow-1)*$fenyePage->pageSize.",".$fenyePage->pageSize;
			$sql2="select count(id)from emp";
			$sqlHelper->execute_dql_fenye($sql1,$sql2,$fenyePage);
		}
	}
	?>
</body>
</html>