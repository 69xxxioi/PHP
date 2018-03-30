<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>方法重载</title>
</head>
<body>
	<?php

	class Person{
		public function test1($arr){
			echo "传入一个参数  test1<br/>";
		}
		public function test2($arr){
			echo "传入两个参数  test2<br/>";
		}
		public function __call($p,$arr){
			if($p=="test"){
				if(count($arr)==1){
					$this->test1($arr);
				}else if(count($arr)==2){
					$this->test2($arr);
				}
			}
			
		}


	}
	$p1=new Person;
	$p1->test(1);
	$p1->test(2,3);







	?>
</body>
</html>