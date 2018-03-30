<?php

header("content-type:text/html;charset=utf-8");
//mkdir默认只有一级路径，要想多级目录就要加一个参数0777再加一个true.
/*if (!mkdir("d:/tianli")) die("创建失败！");
echo "创建成功！";*/



//创建多级目录
/*if (is_file("d:\\tianli\\file1\\file2")) die("文件已存在！");
if (!mkdir("d:/tianli/file1/file2",077,true)) die("文件创建失败！");
echo "文件创建成功！";*/


//1.删除文件夹,文件下必须为空才能删除
/*if (!rmdir("d:/tianli")) die("删除失败！");
echo "删除成功！";*/

//2.删除文件的连一个函数unlink()

if (!is_file("d:/vpn/ioi.txt")) die("文件不存在！");
if (!unlink("d:/vpn/ioi.txt")) die("文件删除失败！");
echo "文件删除成功！";






?>