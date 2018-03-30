<?php

header("content-type:text/html;charset=utf-8");

//parse_ini_file()解析一个.ini配置文件，此函数将返回一个数组

$arr=parse_ini_file("./db.ini");

echo "<pre>";
print_r($arr);
echo "</pre>";






?>