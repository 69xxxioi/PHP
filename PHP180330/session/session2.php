<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Session</title>
</head>
<body>
	<?php

	//引入文件session1.php文件才能加载$obj对象
	require_once "session1.php";
	//由于引入的文件session1.php中已经创建session会画，就无需在引入
	//session_start();


	//删除session
	unset($_SESSION['name']);

	echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";

	

/*	class Test{
		private $name;
		private $hobby;
		private $age;
		function __construct($name,$hobby,$age){
			$this->name=$name;
			$this->hobby=$hobby;
			$this->age=$age;
		}
		public function getName(){
			echo $this->name;
		}
	}
	$obj=new Test("田力","绘画",18);
	$_SESSION['obj']=$obj;*/

	$tianli=$_SESSION['obj'];
	echo $tianli->getName();
	//通过key来指定获取某个值
	echo "的爱好是:".$_SESSION['hobby']."<br/>";



	?>
</body>
</html>