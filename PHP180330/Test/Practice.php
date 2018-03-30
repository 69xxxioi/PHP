<!doctype html>
<html lang="en">
<head>
	<meta charset=utf-8/>
    <!-- <meta http-equiv="refresh" content="10"/> -->
	<title>PHP基础篇</title>
</head>
<body>
    <?php
//..............................数据类型自动转换............................
    $num_1=1;
    $num_2="0";
    $result=$num_2==0?"参数不能为0":"参数正确";
    echo $result;
//..............................数据类型强制转换.............................
    $var=2.25;
    $var1="6个苹果";
    //注意：这里必须赋值给$var
    $var=(int)$var;
    //注意：这里不用赋值给$var1
    settype($var1,"int");
    echo "<br>{$var1}{$var}";

//.....................用不同的输出函数对数组进行操作事例......................
    $arr=array(9,"hello"," ","word",-6,0.6,("hello")=>"你好");
    echo "<br><br>";
    //这里的printf()函数不能输出数组的内容
    printf($arr);
    echo "<br><br>";

    print_r($arr);
    echo "<br><br>";
    //这里的print()函数不能输出数组的内容
    print($arr);
    echo "<br><br>";

    var_export($arr);
    echo "<br><br>";

    var_dump($arr);
    echo "<br><br>";
//..............................超级全局数组..................................
    //$GLOBALS数组的类容包括php中所有的超级全局数组。用var_dump函数来打印其内容
    var_dump($GLOBALS);
    echo "<br><br>";

    //var_export($GLOBALS);
    //echo "<br><br>";

    //print_r($GLOBALS);

//...................打印当前系统下$_SERVER超级全局数组的所有内容................
    while (list($var,$value)=each ($_SERVER)) {
        echo "$var => $value <br>";
    }
    echo "<br/><br/>";

//如果是用Apache 的模块方式运行 PHP,还可以用函数getallheaders()直接打印客户端HTTP
//请求头文件中的信息
    $headers = getallheaders();
    foreach ($headers as $name => $content) {
        echo "headers[$name] = $content<br>\n";
    }
    echo "<br/><br/>";

//............................脚本与变量处理....................................
    $var_name = "PHP5 变量";
    unset($var_name);
    $result = isset($var_name)?"变量未被删除！":"变量已被删除!";
    echo $result;
    echo "<br/><br/>";
    echo empty($var_name)?"此变量为空!":"此变量不为空!";
    echo "<br/><br/>";
    $var_num1=56;
    echo empty($var_num1)?"此变量为空!":"此变量不为空!";
    echo "<br/><br/>";

//............................常量的定义与引用..................................
    define(_FIRST, "hello");
    if (_FIRST) {
        echo _FIRST;
    } else{
        echo "";
    }
    echo "<br/><br/>";
    echo _FIRST?"此变量不为空!":"此变量为空!";
    echo "<br/><br/>";
    //$var_num1是前面定义的变量
    echo $var_num1.'<br/>';
    echo '$var_num1<br/>';
    echo "$var_num1"."<br/>";

//...............................PHP魔术常量.....................................
    //使用魔术(Magic)函数
    class magic_contstant {
        function showMagicConstant() {
            echo "__LINE__=".__LINE__."<br/>";//当前行数
            echo "__FILE__=".__FILE__."<br/>";//当前文件所在行数
            echo "__FUNCTION__=".__FUNCTION__."<br/>";//当前行数名称
            echo "__CLASS__=".__CLASS__."<br/>";//当前类名
            echo "__METHOD__=".__METHOD__."<br/>";//当前函数的方法名称
            echo "__DIR__=".__DIR__."<br/>";//当前文件夹路径
            echo "__NAMESPACE__=".__NAMESPACE__."<br/>";//当前名称空间
        }
    }
    magic_contstant::showMagicConstant();
//................................PHP控制面板...................................
    //foreach循环
    /*$links = array("www.mysql.com","www.php.net","www.apache.org");
    echo "<b>PHP在线资源</b>:<br/>";
    foreach($links as $link) {
        echo "<a href=\"http://$link\">$link<\a><br/>";
    }*/
    //使用foreach遍历关联数组
    //保存一个学生成绩的关联数组
    echo "<br/>";
    $sdudents = array("chinse"=>80,
                      "english"=>73,
                      "math"=>85);
    foreach ($sdudents as $subject => $value) {
        echo "各科成绩：$subject=$value<br/>";
    }
    //使用break语句终止循环
    $primes = array(2,3,5,7,11,13,17,19,23,29,31,37,41,43,47);
    for ($count=0; $count < 1000; $count++) { 
        //随机生成1~50之间的数
        $randomNumber = rand(1,50);
        if (in_array($randomNumber, $primes)) {
            echo $randomNumber;
            //中断循环
            break;
        }else {
            echo "<p>在 $randomNumber 数字中没有找到素数</p>";
        }
    }
//...............................包含控制语句..............................
    //引用另外一个php脚本
    include "error_code.php";
//................................函数构造.................................
    function print_table_row($bgcolor,$cell){
        $cellstring="";
        for ($i=0; $i < $cell; $i++) { 
            $cellstring.="<td>$i</td>";
        }
        $row="<tr bgcolor=\"$bgcolor\">$cellstring</tr>";
        return $row;
    }
    echo '<table border="2">';
    echo print_table_row('gray',20);
    echo print_table_row('red',20);
    echo print_table_row('grenn',20);
    echo print_table_row('pink',20);
    echo '</table>';
//①func_get_args()函数
    function getParaNum(){
        $arg_num=func_num_args();
        echo "传输的参数数量：".$arg_num."<br/>";//显示传入参数的数量
    }
    getParaNum("abc",123,"cat");
//②func_num_arg(参数)函数
    function getParaValue($a,$b){
        for ($i=0; $i < func_num_args(); $i++) { 
            $param=func_get_arg($i);
            echo "已取得参数值：$param.<br/>";//显示传入参数的数量
        }
    }
    getParaValue(1,2,3,4,5,6,7,8);
//③array func_get_arg()函数
    function getParaArray($a,$b) {
        $param=func_get_args();
        //$param内是一个一维数组，使用explode()函数分解显示
        //$param=explode(",",$param);
        //echo "取得的参数为：$param.\n";
        var_dump($param);
    }
    getParaArray(1,2,3,4,5,6,7,8);
//解决函数重名的方法
    //如果没有showMessage()函数，就创建一个showMessage()
    if (!function_exists("showMessage")) {
        function showMessage($message) {
            echo "<br/>$message";
        }
        showMessage('Test Message');
    }
    //动态创建一个函数
    $func_name=create_function('$messger','echo"你好,{$message}";');
    echo $func_name;
    $func_name1=create_function('$messger','echo"你好,{$message}";');
    echo "<br/>".$func_name1;
    $func_name2=create_function('$messger','echo"你好,{$message}";');
    echo "<br/>".$func_name2;
//............................可变变量.......................................
    $var_name='php5';
    $$var_name='php5 web开发详解';
    echo "<br/>".$php5;
    //使用可变变量
    $name='123';
    $$name='456';
    echo "<br/>${'123'}";
    //使用可变变量动态引用函数
    function myFunc($str) {
        echo "<br/>".$str;
    }
    $f='myFunc';
    $f("TEST");//将参数TEST传递给函数myFunc()h函数并输出
//.............................字符串操作....................................
    //手动转义字符串数据操作
    $name="Garfield";
    //字符串定界符是单引号，文本内容中字符有单引号，需做转义操作
    $str1='The'.$name.'cat\'s is pretty \n';
    echo "<br/>".$str1;
    //字符串定界符是双引号，里面的单引号字符不惜要转义
    $str2="This is one line\nAnd this's another line.";
    echo "<br/>".$str2;
    //转义变量名
    $var=123;
    $str3="The \$var is $var";
    echo "<br/>".$str3;
//自动转义字符串数据
    $str="[sql]Who's Raymond?";
    echo '<br/>'.$str.'This is not safe in a database query.<br/>';
    echo addslashes($str)."This is safe in a database query.";
    echo '<br/>'.stripslashes(addslashes($str));
    $str1=addslashes($str);
    echo '<br/>'.$str1;
    echo '<br/>'.stripslashes($str1);
//很有用的函数addcslashes()
    $str='Hello Friend,Never give up!';
    //指定在某个字母前加转义字符
    echo '<br/>'.addcslashes($str, "e");
    echo '<br/>'.stripslashes(addcslashes($str, 'i'));
    //范围性指定
    echo '<br/>'.addcslashes($str, 'A..Z');
    echo '<br/>'.addcslashes($str, 'a..z');
    echo '<br/>'.addcslashes($str, 'h..s');
//数值转换字符串
    $var=25;
    echo '<br/>'.chr($var).'<br/>';
    for ($i=0; $i < 129; $i++) {
        echo "\n".chr($i);
        if (($i+1)%30==0) {
            echo "<br/>";
        }
    }
    //ord()函数
    $str="hello";
    if (ord($str)==10) {
        echo "<br/>\$str第一个字母的ASCII码不说10";
    } else {
        echo "<br/>\$str第一个字母的ASCII码是".ord($str);
    }
//字符串序列化
    $s="php";
    echo "<br/>".serialize($s);
    //对数组数据序列化
    $ar=array('php','$key'=>'serialize');
    echo "<br/>".serialize($ar);
    //unserialize()函数是反序列化
    $arry=Array("cats","drop","fur","everywhere");
    echo "原数组内容：<pre>";
    print_r($arry);
    echo "</pre>序列化后的数组：<br/><pre>";
    $string2=serialize($arry);
    print_r($string2);
    echo "</pre>反序列化后的数组：<br/><pre>";
    $arry2=unserialize($string2);
    print_r($arry2);
    echo "</pre>";
//清理字符串中的空格和格式控制符
    $Name=trim($_POST["Name"]);
    $Email=ltrim($_POST["Email"]);
    $Feedback=rtrim($_POST["Feedback"]);
    //格式化字符串,nl2br()与wordwrap()
    $string="Hello\nWorld\nHow are you?\n\n";
    echo nl2br($string);
    $textblock="See spot run,run spot run.See spot roll,run spot roll!";
    echo wordwrap($textblock,20,"<br/>");
    //改变字符串的大小写
    $astring="Hello world";
    echo "<br/>".strtolower($astring);//将字符串全部转换成小写
    echo "<br/>".strtoupper($astring);//将字符串全部转换成大写
    echo "<br/>".ucfirst($astring);//转换首写字符大写
    echo "<br/>".ucwords($astring);//转换单词首字符大写
    //字符串切分
    $email="webmaster@php.net";
    $email_array=explode("@", $email);
    print_r($email_array);
    echo "<br/>";
    $url_array=explode("/", $_SERVER['REQUEST_URI']);
    print_r($url_array);
    //字符串截取
    $test="Your programing ability is excellent";
    echo "<br/>".substr($test,1);
    echo "<br/>".substr($test,-9);
    echo "<br/>".substr($test,0,4);
    echo "<br/>".substr($test,4,-13);
    echo "<br/>".strlen($test);
    echo "<br/>".mb_strlen($test);
    //echo "<br/>".strlen<$test>;//错误格式
    //计算字符串的长度
    define("MAXLENGTH",10);
    if(mb_strlen("hello world!")>MAXLENGTH) {
        echo "<br/>您输入的已经超过了系统定义的长度：".MAXLENGTH."请重新输入";
    } else {
        //此处可以插入数据到数据库的语句块
        echo "<br/>输入数据正确!";
    }
    $text=<<<TEXT
    测试：programing is art! wahaha
TEXT;
    $words=str_word_count($text);
    echo "<br/>单词总数为：".$words."<br/>";
    $text=<<<text
    To be pure PHP developer, PHP is simple,
    PHP is good web script.
    building our web site.
text;
    $words=str_word_count($text,2);
    //使用array_count_values()函数对$words作统计后生成一个新数组
    $count_array=array_count_values($words);
    echo "<pre>";
    print_r($count_array);
    echo "</pre>";
    //字符串查找。格式：strstr($string,"keyword");
    $string="this is a demo string";
    if (strstr($string,"demo")) {
        echo "有该子串";
    } else {
        echo "没有该子串";
    }
    //查找子串的位置strpos()
    function checkBrowser() {
        if (strpos($_SERVER['HTTP_USER_AGENT'],'MSIE')){
            if (strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 6')) {
                return "MSIT 6";
            }else if(strpos($_SERVER['HTTP_USER_AGENT'],'MSIE 7')) {
                return "MSIE 7";
            }else if(strpos($_server['HTTP_USER_AGENT'],'MSIE 8')) {
                return "MSIE 8";
            }
        }else if(strpos($_server['HTTP_USER_AGENT'],'Firefox')) {
            return "Firefox";
        }
    }
    echo checkBrowser();
    echo "<br/>".strpos("hello world!",'!',4);
    //字符串重复str_repeat()
    echo str_repeat("<br/>php",10);
    //查找子串出现的次数substr_count()
    $ints=str_repeat("PHP5", 1024);
    $counter=substr_count($ints,"PHP5");
    echo "<br/>字符串PHP5字符一共出现".$counter."次"; 
//...............................字符串处理..............................
    //1.字符串替换str_replace()
    $text_1="Welcome to Beijing";
    $text_2="China";
    $text_3=str_replace("Beijing",$text_2,$text_1);
    echo "<br/>$text_3";
    //2.字符串翻转strrev()
    $string="abcdefg12345";
    echo "<br/>".strrev($string)."<br/>";
    //2.转换HTML实体
    $str='<a href="http://www.google.cn" title="Google China">Google 中国</a>';
    echo htmlspecialchars($str);
    //echo htmlspecialchars($str,ENT_QUOTES);
    echo "<br/>";
    echo '<a href="http://www.google.cn" title="Google China">Google 中国</a>';
    $str='<a href="http://www.google.cn">Google 中国</a>';
    echo htmlspecialchars($str,ENT_COMPAT);
    echo "<br/>";
    echo htmlspecialchars($str,ENT_QUOTES);
    echo "<br/>";
    echo htmlspecialchars($str,ENT_NOQUOTES);
    echo "<br/>";
    echo htmlspecialchars($str,ENT_COMPAT,"UTF-8");
    //使用htmllentites()和html_entity_decode()
    $str="<a href='http://www.google.cn'>Google 中国</a>";
    echo "<br/>";
    echo htmlentities($str,ENT_COMPAT,"iso-8859-1");
    echo "<br/>";
    //按指定的编码还原被转换的HTML实体字符
    echo html_entity_decode(htmlentities($str,ENT_COMPAT,"utf-8"),ENT_COMPAT,"iso-8859-1");
    echo "<br/>";
    echo htmlentities($str,ENT_COMPAT,"utf-8");
    echo "<br/>";
    echo html_entity_decode(htmlentities($str,ENT_COMPAT,"utf-8"),ENT_COMPAT,"utf-8");
    //清除HTML标签strp_tags()
    $string="Email:<a href='http://www.21cto.com'>spam@21cto.com</a>";
    echo "<br/>原始字符串=".$string."<br/>";
    echo "目录字符串=".strip_tags($string);
    $string="欢迎光临<a href='http://www.21cto.com/'>思技创想</a><b>互联网完全解决方案</b>!";
    echo "<br/>原始串=".$string."<br/>";
    echo "目标串=".strip_tags($string,"<a>");
    //字符串比较strcmp()与strncmp()
    $stringone="my story";
    $stringtwo="my story";
    if (strcmp($stringone,$stringtwo)==0) {
        //等价于if ($stringone==$stringtwo){}
        echo "<br/>两字符串相同。<br/>";
    }
    //比较前三个字符
    if (strncmp("php developer","php",3)==0) {
        echo "两字符串前三个字符相同！<br/>";
    }
    //字符串解析 strtok()
    $text='Hello, Welcome to PHP5 world';
    echo strpbrk($text,'W');
    echo "<br/>";
    echo strpbrk($text,'w')."<br/>";
    //strpn()函数与strcspn()
    echo strspn("hello","oleh")."<br/>";
    $array1=range(0,9);
    $array2=range("a","z");
    $chars=implode("",$array1).implode("",$array2);
    $username="raymond!";
    echo "用户名可以使用的合法字符串：$chars<br/>";
    if (($n=strspn($username,$chars))!=strlen($username)) {
        echo "长度$n的字符\"$username\".是一个非法的用户名<br/>";
    }
    //strcspn($str1,$str2)返回str1中包含str2中所没有字符的第一部分的长度
    echo strcspn("hello","by")."<br/>";
//...............................日期与时间..................................
    echo "当前的时间戳是:".time();
    //日期函数
    //设置默认时区为中国时区
    date_default_timezone_set('PRC');
    $time=time();
    //把date函数可以接受的参数放在数组中，然后依次显示不同的日期时间格式
    $formats=array(
        'U',
        'r',
        'c',
        'l,F js,Y,g:i A',
        'H:i:s D d M y',
        'm/j/y g:i:s a o (T)',
        'Y-m-d H:i:s'
        );
    foreach($formats as $format) {
        //依次显示
        echo "<p><b>$format</b>:".date($format)."</p>\n";
    }
    //date函数
    date_default_timezone_set('prc');
    echo date("Y-m-d G:i:s")."<br/>";
    echo date('y-n-j')."<br/>";
    echo "今天是".date(l)."<br/>";
    echo "昨天是".date("l",time()-86400)."<br/>";
    //getdate()函数
    $now=time();//当前时间戳，可换为其他合法的时间戳
    $array=getdate($now);
    echo "<pre>";
    print_r($array);
    echo "</pre><br/>";
    //checkdate()函数用于检测一个日期格式是否正确
    $m=2;
    $d=27;
    $y=2009;
    echo "{$m}年{$d}月{$y}日<br/>";
    if (!checkdate($m,$d,$y)) {
        echo '输入的日期错误'."<br/>";
    }else{
        echo '输入的日期正确'."<br/>";
    }
    //time()函数
    $now=time();
    if (($now%2)==0) {
        echo "偶数秒<br/>";
    } else {
        echo "奇数秒<br/>";
    }
    $tomorrow=time()+86400;
    echo "明天日期：".date("Y年m月d日",$tomorrow)."<br/>";
    //mkdate()函数
    //返回时间戳
    echo mktime(0,0,0,9,9,2009)."<br/>";
    echo date("t",mktime(0,0,0,date("9"),1,date("2010")));
    //strtotime()函数
    //设置默认时区为中国时区
    date_default_timezone_set('PRC');
    echo "<table border='1'>";
    $dateArray=array(
        "now","today","tomorrow","yesterday",
        "thursday","this Thursday","last Thursday",
        "+2 hours","-1 month","+10 minutes",
        "30 seconds","+2 yrars","2 weeks ago",
        "next Friday"
        );
    foreach($dateArray as $mydate) {
        echo "<tr><td width=200>$mydate:</td><td width=250>".date('Y-m-d H:I:s',strtotime($mydate)).
        "</td></tr><br/>";
    }
        echo "</table>";












    echo "<br/><br/><br/><br/><br/>";
    ?>
</body>
</html>