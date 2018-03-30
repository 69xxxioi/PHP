<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>析构方法(函数)</title>
</head>
<body>
	<?php
	class Person{
		public $name;
		public $age;
		public function __construct($num1,$num2){
			$this->name=$num1;
			$this->age=$num2;
			//echo $this->name."hello!我是构造方法(函数)...<br/>";
		}
		public function __destruct(){
			echo $this->name."hello!<br/>";
		}
	}
	$p1=new Person("田力&nbsp&nbsp&nbsp",20);
	$p4=$p1;
	$p1=NULL;
	$p2=new Person("韩顺平",35);
	$p3=new Person("宋江&nbsp&nbsp&nbsp",33);


	?>
</body>
</html>