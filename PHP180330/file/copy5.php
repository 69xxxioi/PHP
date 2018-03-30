<?php

	header("conten-type:text/html;charset=utf-8");

	//填写路径是，如果是用反斜杠‘\’就用两个‘\\’，如果是用正斜杠‘/’就用一个就行
	if (!copy("C:/wamp/www/test.php", "C:/wamp/www/myphp/test.php"))
	die("Copies of the failure!");
    echo "Copy success!";



?>