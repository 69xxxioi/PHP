<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Interface</title>
</head>
<body>
	<?php
	//定义一个接口,接口可以有属性，但是必须是常量，
	//const A=90  调用是如：接口名::常量名。接口的方法必须是
	//公开的public（默认是public）	
	interface iUsb{
		//接口可以有属性，但是必须是常量常量没有$符，
		//前面没有修饰符修饰
		const A=90;
		public function start();
		public function stop();
	}
	//接口实现
	class Phone implements iUsb{
		public function start(){
			echo "手机开始工作。。。<br/>";
		}
		public function stop(){
			echo "手机停止工作。。。<br/>";
		}
	}
	class Camera implements iUsb{
		public function start(){
			echo "相机开始工作。。。<br/>";
		}
		public function stop(){
			echo "相机停止工作。。。<br/>";
		}
	}
	//实例化对象
	$p1= new Phone;
	$p1->start();
	$p1->stop();
	$p2=new Camera;
	$p2->start();
	$p2->stop();
	echo iUsb::A."<br/>";
	//一个接口继承多个接口
	interface test1{
		function fun1();
	}
	interface test2{
		function fun2();
	}
	//定义一个接口test3，继承多个接口test1，test2
	interface test3 extends test1,test2{
		const B=520;
	}
	class Person implements test3{
		function fun1(){
			echo "test1<br/>";
		}
		function fun2(){
			echo "test2<br/>";
		}
	}
	$p1=new Person;
	$p1->fun1();
	$p1->fun2();
	echo test3::B;

	?>
</body>
</html>