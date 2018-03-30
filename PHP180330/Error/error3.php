<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>自定义错误处理器</title>
</head>
<body>
	<?php
/*	//自定义了一个处理错误的函数
	function my_error($errno, $errstr){
		echo "<b>Error:</b> [$errno] $errstr<br/>";
 		echo "Ending Script";
 		die();
	}
	$age=700;
	if($age>120){
		my_error(E_USER_ERROR,"Your age is incorrect!");
	}

//--------------------------------------------------------------------------
	   //定义了一个函数（我用于处理错误的函数）
       function my_error1($errno,$errmes){
              echo "<font size='5' color='red'>$errno</font><br/>";
              echo "错误信息是:";
              exit();
       }
       //改写set_error_handler处理器
       //下面这句话的含义是 ： 如果出现了 E_WARNING这个级别的错误,就去调用my_error函数.
       set_error_handler("my_error1",E_WARNING);
       $fp=fopen("aa.txt","r");
//--------------------------------------------------------------------
    //error handler function
	function customError($errno, $errstr)
		 { 
		 	echo "<b>Error:</b> [$errno] $errstr";
		 }

	//set error handler
	set_error_handler("customError");

	//trigger error
	//$test变量没有定义，这里会调用set_error_handler()函数，这个函数覆盖了自定义的错误出发函数函数
	echo($test);
//--------------------------------------------------------------------------------
	//错误触发
	$test=2;
	if ($test>1){
		//系统的错误触发函数
		//如果不满足小于等于二就调用trigger_error()并打印Value must be 1 or below
		trigger_error("Value must be 1 or below");
	}*/
//--------------------------------综合案例-------------------------------------------
	//error handler function
	function customError($errno,$errstr){ 
		echo "<b>Error:</b> [$errno] $errstr<br />";
		echo "Webmaster has been notified";
		error_log("Error: [$errno] $errstr",1,"someone@example.com","From: webmaster@example.com");
	}

	//set error handler
	set_error_handler("customError",E_USER_WARNING);

	//trigger error
	$test=2;
	if ($test>1){

		trigger_error("Value must be 1 or below",E_USER_WARNING);
	}


	?>
</body>
</html>