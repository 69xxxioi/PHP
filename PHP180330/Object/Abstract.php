<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Abxtract</title>
</head>
<body>

<?php

    abstract class Myclass{
        public $name;
        public $age;
        public function __construct($name,$age){
            $this->name=$name;
            $this->age=$age;
        }
        abstract function cry();
    }
    class Abc extends Myclass{
        public function cry(){
            echo $this->name." hello world!";
        }
    }
    $p1=new Abc("Miss",18);
    $p1->cry();










?>
</body>
</html>