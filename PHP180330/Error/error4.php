<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>错误日志</title>
</head>
<body>
	<?php
	//php中的错误日志保存
	function my_error(){
		$reminder="怼你！";
		echo "您的输入有误！！";
		error_log(date("Y-m-d h-m-s").$reminder."\r\n",3,"error.txt");
	}
	//更改默认错误触发函数
	set_error_handler("my_error");
	$test=2;
	if ($test>1) {
		trigger_error("您的输入有误！！");
	}
	



	?>
</body>
</html>