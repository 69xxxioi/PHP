<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理员登录系统</title>
</head>
<body>
	<h1 align='center'>管理员登录系统</h1>
	<form action="loginProcess.php" method="post">
		<table align='center'>
			<tr>
				<td>用户id:</td>
				<td><input type="text" name="id"/></td>
			</tr>
			<tr>
				<td>密 &nbsp;&nbsp;码:</td>
				<td><input type="password" name="password"/></td>
			</tr>
			<tr>
				<td><input type="submit" value="用户登录"/></td>
				<td><input type="reset" value="重新填写"/></td>
			</tr>
		</table>
	</form>
	<?php
	if(!empty($_GET['errno'])){
		$errno=$_GET['errno'];
		if ($errno==1) {
			echo "<font color='red' size='2'>您的用户名或密码错误....</font>";
		}
		
	}

	?>
</body>
</html>