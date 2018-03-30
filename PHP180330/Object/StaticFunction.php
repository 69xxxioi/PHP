<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>静态方法</title>
</head>
<body>
	<?php
	class Person{

		public $name;
		public static $age=20;
		public function __construct($name){
			$this->name=$name;
			echo $this->name;
		}
		//静态方法在类内部有两种调用方式，
		//①类名::函数名②self::函数名
		//静态方法只能操作静态变量
		public static function stc(){
			self::$age++;
			echo "的年龄是=".Person::$age."<br/>";

		}
	}
	$p1=new Person('田力');
	//静态方法在类外部也有两种调用方式，
	//①类名::函数名 如：Person::stc   ②$对象名->函数名
	$p1->stc();
	//第二次再访问静态函数中的静态变量时,在上一次访问的基础上加一
	$p2=new Person("韩顺平");
	Person::stc();
	?>
</body>
</html>