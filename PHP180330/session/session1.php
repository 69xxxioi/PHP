<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Session</title>
</head>
<body>
	<?php
	//1.初始化session
	session_start();
	//2.保存数据
	$_SESSION['name']="tianli";
	//保存基本数据类型
	$_SESSION['age']=18;
	$_SESSION['hobby']="绘画";

	//保存数组

	$arr=array("黑龙江大学","哈尔滨","电子工程学院",20156585);
	$_SESSION['arr']=$arr;

	//保存对象
	class Test{
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
	$_SESSION['obj']=$obj;


	echo "Session保存成功！";

	?>
</body>
</html>