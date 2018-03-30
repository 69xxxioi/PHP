<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>方法重载</title>
</head>
<body>
	<?php

	class Animal{
		public $name;
		public $age;
		//
		protected function cry(){
			echo "某某动物叫唤！";
		}
	}
	class Dog extends Animal{
		//重写要求函数（方法）的名字和参数的个数必须一致，参数名
		//可以不相同，修饰符的作用范围必须比父类的大，而且还不能
		//重写private（私有的）方法，因为私有的方法不能继承

		//重写方法，从而覆盖父类中相同的方法
		public function cry(){
			echo "狗狗汪汪叫......<br/>";
			echo Animal::cry()."<br/>";
		}
	}
	class Pig extends Animal{
		//重写方法，从而覆盖父类中相同的方法
		public function cry(){
			echo "猪猪哼哼叫......<br/>";
			echo parent::cry()."<br/>";
		}
	}
	$p1=new Dog;
	$p1->cry();
	$p2=new Pig;
	$p2->cry();






	?>
</body>
</html>