<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>HTTP协议</title>
</head>
<body>
	<?php


	if(isset($_SERVER['HTTP_REFERER'])){
		if(stripos($_SERVER['HTTP_REFERER'],"http://localhost/myphp/HTTP")==0){
			echo "这是您要的资料吗？";
		}else{
			echo "您没有访问权限！";
		}
	}else{
		echo "您没有访问权限！";
	}

	?>
</body>
</html>