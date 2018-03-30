<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>final/const</title>
</head>
<body>
	<?php
	//如果不希望一个类被继承, 可以使用关键字final来修饰类
	final class A{

	}
	//如果希望一个方法不被子类重写，可以使用final来修饰方法
	class B{
		//如果你不希望一个属性被修改，可以用关键字const来修饰变量
		//定义成一个常量,常量是公共的而不能被其它修饰符修饰,
		//在类内部访问常量方式  self::常量名
		const num=23;
		final function fun(){
			echo "我不能被重写！".self::num;
		}
	}
	//此处会报错
	/*class C extends A{

	}*/
	class C extends B{
		//此处报错，不能重写被final修饰的方法
		/*function fun(){
			echo "hello world!";
		}*/
	}
	$p1=new C;
	$p1->fun();
	//类外部访问常量的方法一，类名::常量名
	echo C::num;
	//类外部访问常量的方法二，对象名::常量名
	echo $p1::num;




	?>
</body>
</html>