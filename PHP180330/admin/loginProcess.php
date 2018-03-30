<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php

	require_once 'AdminService.class.php';
	$id=$_POST['id'];
	$password=$_POST['password'];

	$adminService=new AdminService();
	$name=$adminService->chekcAdmin($id,$password);
	if ($name!="") {
		header("Location:empManage.php?name=$name");
		exit();
	} else {
		header("Location:login.php?errno=1");
		exit();
	}
	
	?>
</body>
</html>