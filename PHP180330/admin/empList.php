<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>雇员信息列表</title>
</head>
<body>
	<?php
	require_once 'EmpService.class.php';
	//屏蔽因版本更新的建议提示，mysql扩展库->mysqli/PDO扩展库
	error_reporting(E_ALL ^ E_DEPRECATED);

	//创建一个FenyePage对象实例
	$fenyePage=new FenyePage();

	$fenyePage->pageNow=1;
	$fenyePage->pageSize=20;

	
	//这里我们需要根据用户的点击来修改$pageNow的的值
	//这里我们需要判断 是否有这个pageNow发送，有就使用
	//如果没有，则默认显示第一页
	if (!empty($_GET['pageNow'])) {
		$fenyePage->pageNow=$_GET['pageNow'];
	}
	$empService=new EmpService();
	$EmpService->getEmpListByPage($fenyePage);

	echo "<table width='700px' border='1' bordercolor='green' align='center' cellspacing='0' cellpadding='0'>";
	echo "<caption><h1>雇员信息列表</h1></caption>";
	echo "<tr align='center'><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th>删除用户</th><th>修改用户</th></tr>";
	/*while($row=mysql_fetch_assoc($res2)){
		echo "<tr align='center'><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td><td><a href='#'>删除用户</a></td><td><a href='#'>修改用户</a></td></tr>";
	}*/
	for ($i=0; $i < count($fenyePage->res_array); $i++) { 
		$row=$fenyePage->res_array[$i];
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
	if ($pfenyePage->pageNow>1) {
		$prePage=$pfenyePage->pageNow-1;
		echo "<a href='empList.php?pageNow=$prePage'>上一页</a>&nbsp";
	}

	$page_whole=20;
	$start=floor(($pfenyePage->pageNow-1)/$page_whole)*$page_whole+1;
	$index=$start;
	if ($pfenyePage->pageNow>10) {
		echo "&nbsp;<a href='empList.php?pageNow=$start'><<</a>&nbsp;";
	}
	for (; $start < $index+$page_whole; $start++) { 
		echo "<a href='empList.php?pageNow=$start'>[$start]</a>";
	}
	if ($pfenyePage->pageNow<$pageCount) {
		echo "&nbsp;<a href='empList.php?pageNow=$start '>>></a>&nbsp;";
	}

	if ($pfenyePage->pageNow<$pageCount) {
		$nextPage=$pfenyePage->pageNow+1;
		echo "<a href='empList.php?pageNow=$nextPage'>下一页</a>&nbsp;<br/><br/>";
	}


	?>
	<!..........................跳转到..........................>
	<form action="empList.php">
		跳转到：<input type="text" name="pageNow"/>
				<input type="submit" value="GO"/>
	</form>
	<?php
	//显示当前页和多少页
	echo "当前{$pageNow}页/共{$pageCount}页";
	echo "</center>";

	//mysql_free_result($res2);
	//mysql_close($conn)



	?>
</body>
</html>