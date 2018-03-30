<?php
date_default_timezone_set('Asia/beijing');//设置时区
//返回自从 Unix 纪元（格林威治时间 1970 年 1 月 1 日 00:00:00）到当前时间的秒数
//返回当前时间戳time()
var_dump(time());
//取得指点时间的时间戳，如2014年1月10日0时0分0秒的时间戳
mktime(0,0,0,10,1,2014);

?>