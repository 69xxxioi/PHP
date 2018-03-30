<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>雇员信息列表</title>
</head>
<body>
	<?php
	//屏蔽因版本更新的建议提示，mysql扩展库->mysqli/PDO扩展库
	error_reporting(E_ALL ^ E_DEPRECATED);

	$conn=mysql_connect("localhost","root","") or die(mysql_error());

	mysql_query("set name utf8");
	mysql_select_db("db_01",$conn);

	$pageSize=25;
	$rowCount=0;//要从数据库的表emp中取出的行
	$pageNow=6;//显示第几页

	//这里我们需要根据用户的点击来修改$pageNow的的值
	//这里我们需要判断 是否有这个pageNow发送，有就使用
	//如果没有，则默认显示第一页
	if (!empty($_GET['pageNow'])) {
		$pageNow=$_GET['pageNow'];
	}
	$pageCount=0;//表示一共多少页

	$sql="select count(id) from emp";
	$res1=mysql_query($sql);

	//从数据库的表emp中取出的行数
	if($row=mysql_fetch_row($res1)){
		$rowCount=$row[0];
	}

	//计算共有多少页
	$pageCount=ceil($rowCount/$pageSize);
	$sql="select * from emp limit ".($pageNow-1)*$pageSize.",".$pageSize;
	$res2=mysql_query($sql,$conn);
	echo "<table width='700px' border='1' bordercolor='green' align='center' cellspacing='0' cellpadding='0'>";
	echo "<caption><h1>雇员信息列表</h1></caption>";
	echo "<tr align='center'><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th>删除用户</th><th>修改用户</th></tr>";
	while($row=mysql_fetch_assoc($res2)){
		echo "<tr align='center'><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td><td><a href='#'>删除用户</a></td><td><a href='#'>修改用户</a></td></tr>";
	}
	echo "</table><br/>";

	//打印出页码的超链接
	/*echo "<center>";
	for ($i=1; $i <= $pageCount; $i++) { 
		echo "<a href='empList.php?pageNow=$i'>$i</a>&nbsp";
	}
	echo "</center>";*/

	//显示上一页和下一页
	echo "<center>";
	if ($pageNow>1) {
		$prePage=$pageNow-1;
		echo "<a href='empList.php?pageNow=$prePage'>上一页</a>&nbsp";
	}
	if ($pageNow>11) {
		$prePage=$pageNow-10;
		echo "<a href='empList.php?pageNow=$prePage'><<</a>";
	}
	//显示十页
	for ($i=$pageNow-5; $i <= $pageNow+5; $i++) { 
		echo "<a href='empList.php?pageNow=$i'>$i</a>&nbsp";
	}
	if ($pageNow<$pageCount-10) {
		$nextPage=$pageNow+10;
		echo "<a href='empList.php?pageNow=$nextPage'>>></a>";
	}
	if ($pageNow<$pageCount) {
		$nextPage=$pageNow+1;
		echo "<a href='empList.php?pageNow=$nextPage'>下一页</a>&nbsp";
	}

	//显示当前页和多少页
	echo "当前{$pageNow}页/共{$pageCount}页<br/><br/>";
	?>
	<!...................跳转到..........................>
	<form action="empList.php">
		跳转到：<input type="text" name="pageNow"/>
				<input type="submit" value="GO"/>
	</form>
	<?php
	echo "</center>";

	mysql_free_result($res2);
	mysql_close($conn)



	?>
</body>
</html>