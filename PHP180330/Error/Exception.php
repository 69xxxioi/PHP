<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Exception</title>
</head>
<body>
	<?php
	
	/*//在try块中调用函数AddUser()函数
	try{
		AddUser("xxx");
	}catch(Exception $e){
		//在catch块中捕获AddUser()被调用是抛出的一个异常
		echo "Message:".$e->getMessage()." Error on line ".$e->getLine().$e->getFile();
	}
	function AddUser($name){
		if($name=="tianli"){
			return ture;
		}else{
			//如果不正确则抛出一个异常，供catch捕获
			throw new Exception("用户名输入错误！");
		}
	}*/
//==================================================================
	//自定义一个顶层的异常处理器
	class customException extends Exception{
		public function errorMessage(){
			//出错信息
			$errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile().': <b style="color:red">'.$this->getMessage().'</b> is not a valid E-Mail address';
			return $errorMsg;
		}
	}
	//虽然格式是对的，但是后面多一个空格，所有还是会抛出异常
	$email = "609xxxioi@gmail.com ";

	try{
		//检查是否全等
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE){
			//如果电子邮件无效，则抛出异常
			throw new customException($email);
		}
	}catch (customException $e){
		//显示自定义消息
		echo $e->errorMessage();
	}




	?>
</body>
</html>