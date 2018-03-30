<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>构造方法(函数)</title>
</head>
<body>
	<?php
	class Person{
		public $name;
		public $age;
		public function __construct($num1,$num2){
			$this->name=$num1;
			$this->age=$num2;	
			echo "我是构造函数！";
		}
	}
	$p1=new Person("tianli",20);
	echo $p1->name.$p1->age;




	?>
</body>
</html>