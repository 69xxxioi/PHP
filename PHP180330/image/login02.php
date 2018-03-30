<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>验证码</title>
</head>
<body>
	<form>
		<img src="image02.php" onclick="this.src='image02.php?aa='+Math.random()" /><br/>
		验证码:<input type='text' name='checkcode'/><br/>
		<input type='submit' value='提交'/>
	</form>
</body>
</html>