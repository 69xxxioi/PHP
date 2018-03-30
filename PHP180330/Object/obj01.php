<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
	<body>
	<?php
	class Person{
		public $name;
		public $age;
		public function js($num1,$num2){

				$res=$num1+$num2;
				return $res;
			}
		}
	$p1=new Person();
	$p1->name="田力";
	$p1->age=20;
	echo $p1->name."的年龄是".$p1->age."<br/>";
	echo $p1->js(20,11);





	?>
</body>
</html>