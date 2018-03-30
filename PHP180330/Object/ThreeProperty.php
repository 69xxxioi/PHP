<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>类的三大特性之封装特性</title>
</head>
<body>
	<?php
	class Person{

		public $name;
		protected $age=20;
		private $sex;
		public function __construct($name,$age,$sex){
			//没报错，说明三中属性的变量都可以在类的内部使用
			$this->name=$name;
			$this->age=$age;
			$this->sex=$sex;
		}
		//如果我们在类外部想调用受保护的和私有的变量，我们可以在
		//类的内部创建一个公共的函数作为媒介，因为这两种类型的变
		//量都可以在类的内部调用
		public function pbc(){
			echo "今年".$this->age."岁了！<br/>"."性别".$this->sex;

		}
		
	}
	$p1=new Person("紫霞仙子",18,"女");
	//public类型的变量能在类外部调用，
	//而protected和private类型的变量不能在类的外部调用
	echo "我的女神".$p1->name."<br/>";
	echo $p1->pbc();









	?>
</body>
</html>