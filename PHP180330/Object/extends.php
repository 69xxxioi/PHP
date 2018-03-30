<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>类的三大特性之继承</title>
</head>
<body>
	<?php

	//php不支持直接继承多个父类，但是可以通过多次（间接）继承来达
	//到继承多个父类的方法和属性(1.	父类的 public  、protected 
	//的属性和方法被继承. private 的属性和方法没有被继承.)

	class a{
		//受保护的构造方法（函数）
		protected function __construct(){
			echo "This is a construct!<br/>";
		}
		//受保护的普通方法（函数）
		protected function abc(){
			echo "我是一个普通方法！<br/>";
		}

	}
	class b extends a{
		public function __construct(){
			echo "This is b construct!<br/>";
			//输出a类中的构造函数（方法）
			echo a:: __construct();
		}
	}
	class c extends b{
		public function __construct(){
			echo "This is c construct!<br/>";
			//输出b类中的构造函数
			echo b:: __construct();
			//可以通过这两个方法来调用父类的构造方法(函数)
			//① self::方法名② 类名::方法名
			echo c::abc();
			echo a:: __construct();

		}
	}
//如果子类中存在构造函数，默认执行子类中的构造函数，不会执行
//父类中的构造函数。如果子类中没有构造函数，
//则默认执行父类中的构造函数（方法）



	$p1=new c();
	//$p1->abc();不能直接调用受保护的函数（方法）









	?>
</body>
</html>