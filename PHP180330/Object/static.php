<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>静态变量</title>
</head>
<body>
	<?php
	class Person{

		public $name;
		public static $nums=0;
		public function __construct($name){
			$this->name=$name;
			//我是构造函数
		}
		public function join_game(){
			//第一种使用静态变量的方法-self::$变量名
			self::$nums++;
			//第二种使用静态变量的方法-类名::$变量名
			echo $this->name."第".Person::$nums."个加入堆雪人游戏！<br/>";
		}
		public function __destruct(){
			//析构函数
		}
	}
	//创建对象时通过构造方法直接给成员属性赋值
	$p1=new Person("李逵");
	$p1->join_game();
	$p2=new Person("宋江");
	$p2->join_game();
	$p3=new Person("林黛玉");
	$p3->join_game();
	//在类外部调用静态变量只有"类名::$变量名"这一种方法
	echo "一共有".Person::$nums."个加入堆雪人游戏！";
	?>
</body>
</html>