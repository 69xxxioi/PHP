<!doctype html>
<html lang="en">
<head>
	<meta charset=utf-8/>
    <!-- <meta http-equiv="refresh" content="10"/> -->
	<title>PHP����ƪ</title>
</head>
<body>
    <?php
//..............................���������Զ�ת��............................
    $num_1=1;
    $num_2="0";
    $result=$num_2==0?"��������Ϊ0":"������ȷ";
    echo $result;
//..............................��������ǿ��ת��.............................
    $var=2.25;
    $var1="6��ƻ��";
    //ע�⣺������븳ֵ��$var
    $var=(int)$var;
    //ע�⣺���ﲻ�ø�ֵ��$var1
    settype($var1,"int");
    echo "<br>{$var1}{$var}";

//.....................�ò�ͬ�����������������в�������......................
    $arr=array(9,"hello"," ","word",-6,0.6,("hello")=>"���");
    echo "<br><br>";
    //�����printf()��������������������
    printf($arr);
    echo "<br><br>";

    print_r($arr);
    echo "<br><br>";
    //�����print()��������������������
    print($arr);
    echo "<br><br>";

    var_export($arr);
    echo "<br><br>";

    var_dump($arr);
    echo "<br><br>";
//..............................����ȫ������..................................
    //$GLOBALS��������ݰ���php�����еĳ���ȫ�����顣��var_dump��������ӡ������
    var_dump($GLOBALS);
    echo "<br><br>";

    //var_export($GLOBALS);
    //echo "<br><br>";

    //print_r($GLOBALS);

//...................��ӡ��ǰϵͳ��$_SERVER����ȫ���������������................
    while (list($var,$value)=each ($_SERVER)) {
        echo "$var => $value <br>";
    }
    echo "<br/><br/>";

//�������Apache ��ģ�鷽ʽ���� PHP,�������ú���getallheaders()ֱ�Ӵ�ӡ�ͻ���HTTP
//����ͷ�ļ��е���Ϣ
    $headers = getallheaders();
    foreach ($headers as $name => $content) {
        echo "headers[$name] = $content<br>\n";
    }
    echo "<br/><br/>";

//............................�ű����������....................................
    $var_name = "PHP5 ����";
    unset($var_name);
    $result = isset($var_name)?"����δ��ɾ����":"�����ѱ�ɾ��!";
    echo $result;
    echo "<br/><br/>";
    echo empty($var_name)?"�˱���Ϊ��!":"�˱�����Ϊ��!";
    echo "<br/><br/>";
    $var_num1=56;
    echo empty($var_num1)?"�˱���Ϊ��!":"�˱�����Ϊ��!";
    echo "<br/><br/>";

//............................�����Ķ���������..................................
    define(_FIRST, "hello");
    if (_FIRST) {
        echo _FIRST;
    } else{
        echo "";
    }
    echo "<br/><br/>";
    echo _FIRST?"�˱�����Ϊ��!":"�˱���Ϊ��!";
    echo "<br/><br/>";
    //$var_num1��ǰ�涨��ı���
    echo $var_num1.'<br/>';
    echo '$var_num1<br/>';
    echo "$var_num1"."<br/>";

//...............................PHPħ������.....................................
    //ʹ��ħ��(Magic)����
    class magic_contstant {
        function showMagicConstant() {
            echo "__LINE__=".__LINE__."<br/>";//��ǰ����
            echo "__FILE__=".__FILE__."<br/>";//��ǰ�ļ���������
            echo "__FUNCTION__=".__FUNCTION__."<br/>";//��ǰ��������
            echo "__CLASS__=".__CLASS__."<br/>";//��ǰ����
            echo "__METHOD__=".__METHOD__."<br/>";//��ǰ�����ķ�������
            echo "__DIR__=".__DIR__."<br/>";//��ǰ�ļ���·��
            echo "__NAMESPACE__=".__NAMESPACE__."<br/>";//��ǰ���ƿռ�
        }
    }
    magic_contstant::showMagicConstant();
//................................PHP�������...................................
    //foreachѭ��
    /*$links = array("www.mysql.com","www.php.net","www.apache.org");
    echo "<b>PHP������Դ</b>:<br/>";
    foreach($links as $link) {
        echo "<a href=\"http://$link\">$link<\a><br/>";
    }*/
    //ʹ��foreach������������
    //����һ��ѧ���ɼ��Ĺ�������
    echo "<br/>";
    $sdudents = array("chinse"=>80,
                      "english"=>73,
                      "math"=>85);
    foreach ($sdudents as $subject => $value) {
        echo "���Ƴɼ���$subject=$value<br/>";
    }
    //ʹ��break�����ֹѭ��
    $primes = array(2,3,5,7,11,13,17,19,23,29,31,37,41,43,47);
    for ($count=0; $count < 1000; $count++) { 
        //�������1~50֮�����
        $randomNumber = rand(1,50);
        if (in_array($randomNumber, $primes)) {
            echo $randomNumber;
            //�ж�ѭ��
            break;
        }else {
            echo "<p>�� $randomNumber ������û���ҵ�����</p>";
        }
    }
//...............................�����������..............................
    //��������һ��php�ű�
    include "error_code.php";
//................................��������.................................
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
//��func_get_args()����
    function getParaNum(){
        $arg_num=func_num_args();
        echo "����Ĳ���������".$arg_num."<br/>";//��ʾ�������������
    }
    getParaNum("abc",123,"cat");
//��func_num_arg(����)����
    function getParaValue($a,$b){
        for ($i=0; $i < func_num_args(); $i++) { 
            $param=func_get_arg($i);
            echo "��ȡ�ò���ֵ��$param.<br/>";//��ʾ�������������
        }
    }
    getParaValue(1,2,3,4,5,6,7,8);
//��array func_get_arg()����
    function getParaArray($a,$b) {
        $param=func_get_args();
        //$param����һ��һά���飬ʹ��explode()�����ֽ���ʾ
        //$param=explode(",",$param);
        //echo "ȡ�õĲ���Ϊ��$param.\n";
        var_dump($param);
    }
    getParaArray(1,2,3,4,5,6,7,8);
//������������ķ���
    //���û��showMessage()�������ʹ���һ��showMessage()
    if (!function_exists("showMessage")) {
        function showMessage($message) {
            echo "<br/>$message";
        }
        showMessage('Test Message');
    }
    //��̬����һ������
    $func_name=create_function('$messger','echo"���,{$message}";');
    echo $func_name;
    $func_name1=create_function('$messger','echo"���,{$message}";');
    echo "<br/>".$func_name1;
    $func_name2=create_function('$messger','echo"���,{$message}";');
    echo "<br/>".$func_name2;
//............................�ɱ����.......................................
    $var_name='php5';
    $$var_name='php5 web�������';
    echo "<br/>".$php5;
    //ʹ�ÿɱ����
    $name='123';
    $$name='456';
    echo "<br/>${'123'}";
    //ʹ�ÿɱ������̬���ú���
    function myFunc($str) {
        echo "<br/>".$str;
    }
    $f='myFunc';
    $f("TEST");//������TEST���ݸ�����myFunc()h���������
//.............................�ַ�������....................................
    //�ֶ�ת���ַ������ݲ���
    $name="Garfield";
    //�ַ���������ǵ����ţ��ı��������ַ��е����ţ�����ת�����
    $str1='The'.$name.'cat\'s is pretty \n';
    echo "<br/>".$str1;
    //�ַ����������˫���ţ�����ĵ������ַ���ϧҪת��
    $str2="This is one line\nAnd this's another line.";
    echo "<br/>".$str2;
    //ת�������
    $var=123;
    $str3="The \$var is $var";
    echo "<br/>".$str3;
//�Զ�ת���ַ�������
    $str="[sql]Who's Raymond?";
    echo '<br/>'.$str.'This is not safe in a database query.<br/>';
    echo addslashes($str)."This is safe in a database query.";
    echo '<br/>'.stripslashes(addslashes($str));
    $str1=addslashes($str);
    echo '<br/>'.$str1;
    echo '<br/>'.stripslashes($str1);
//�����õĺ���addcslashes()
    $str='Hello Friend,Never give up!';
    //ָ����ĳ����ĸǰ��ת���ַ�
    echo '<br/>'.addcslashes($str, "e");
    echo '<br/>'.stripslashes(addcslashes($str, 'i'));
    //��Χ��ָ��
    echo '<br/>'.addcslashes($str, 'A..Z');
    echo '<br/>'.addcslashes($str, 'a..z');
    echo '<br/>'.addcslashes($str, 'h..s');
//��ֵת���ַ���
    $var=25;
    echo '<br/>'.chr($var).'<br/>';
    for ($i=0; $i < 129; $i++) {
        echo "\n".chr($i);
        if (($i+1)%30==0) {
            echo "<br/>";
        }
    }
    //ord()����
    $str="hello";
    if (ord($str)==10) {
        echo "<br/>\$str��һ����ĸ��ASCII�벻˵10";
    } else {
        echo "<br/>\$str��һ����ĸ��ASCII����".ord($str);
    }
//�ַ������л�
    $s="php";
    echo "<br/>".serialize($s);
    //�������������л�
    $ar=array('php','$key'=>'serialize');
    echo "<br/>".serialize($ar);
    //unserialize()�����Ƿ����л�
    $arry=Array("cats","drop","fur","everywhere");
    echo "ԭ�������ݣ�<pre>";
    print_r($arry);
    echo "</pre>���л�������飺<br/><pre>";
    $string2=serialize($arry);
    print_r($string2);
    echo "</pre>�����л�������飺<br/><pre>";
    $arry2=unserialize($string2);
    print_r($arry2);
    echo "</pre>";
//�����ַ����еĿո�͸�ʽ���Ʒ�
    $Name=trim($_POST["Name"]);
    $Email=ltrim($_POST["Email"]);
    $Feedback=rtrim($_POST["Feedback"]);
    //��ʽ���ַ���,nl2br()��wordwrap()
    $string="Hello\nWorld\nHow are you?\n\n";
    echo nl2br($string);
    $textblock="See spot run,run spot run.See spot roll,run spot roll!";
    echo wordwrap($textblock,20,"<br/>");
    //�ı��ַ����Ĵ�Сд
    $astring="Hello world";
    echo "<br/>".strtolower($astring);//���ַ���ȫ��ת����Сд
    echo "<br/>".strtoupper($astring);//���ַ���ȫ��ת���ɴ�д
    echo "<br/>".ucfirst($astring);//ת����д�ַ���д
    echo "<br/>".ucwords($astring);//ת���������ַ���д
    //�ַ����з�
    $email="webmaster@php.net";
    $email_array=explode("@", $email);
    print_r($email_array);
    echo "<br/>";
    $url_array=explode("/", $_SERVER['REQUEST_URI']);
    print_r($url_array);
    //�ַ�����ȡ
    $test="Your programing ability is excellent";
    echo "<br/>".substr($test,1);
    echo "<br/>".substr($test,-9);
    echo "<br/>".substr($test,0,4);
    echo "<br/>".substr($test,4,-13);
    echo "<br/>".strlen($test);
    echo "<br/>".mb_strlen($test);
    //echo "<br/>".strlen<$test>;//�����ʽ
    //�����ַ����ĳ���
    define("MAXLENGTH",10);
    if(mb_strlen("hello world!")>MAXLENGTH) {
        echo "<br/>��������Ѿ�������ϵͳ����ĳ��ȣ�".MAXLENGTH."����������";
    } else {
        //�˴����Բ������ݵ����ݿ������
        echo "<br/>����������ȷ!";
    }
    $text=<<<TEXT
    ���ԣ�programing is art! wahaha
TEXT;
    $words=str_word_count($text);
    echo "<br/>��������Ϊ��".$words."<br/>";
    $text=<<<text
    To be pure PHP developer, PHP is simple,
    PHP is good web script.
    building our web site.
text;
    $words=str_word_count($text,2);
    //ʹ��array_count_values()������$words��ͳ�ƺ�����һ��������
    $count_array=array_count_values($words);
    echo "<pre>";
    print_r($count_array);
    echo "</pre>";
    //�ַ������ҡ���ʽ��strstr($string,"keyword");
    $string="this is a demo string";
    if (strstr($string,"demo")) {
        echo "�и��Ӵ�";
    } else {
        echo "û�и��Ӵ�";
    }
    //�����Ӵ���λ��strpos()
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
    //�ַ����ظ�str_repeat()
    echo str_repeat("<br/>php",10);
    //�����Ӵ����ֵĴ���substr_count()
    $ints=str_repeat("PHP5", 1024);
    $counter=substr_count($ints,"PHP5");
    echo "<br/>�ַ���PHP5�ַ�һ������".$counter."��"; 
//...............................�ַ�������..............................
    //1.�ַ����滻str_replace()
    $text_1="Welcome to Beijing";
    $text_2="China";
    $text_3=str_replace("Beijing",$text_2,$text_1);
    echo "<br/>$text_3";
    //2.�ַ�����תstrrev()
    $string="abcdefg12345";
    echo "<br/>".strrev($string)."<br/>";
    //2.ת��HTMLʵ��
    $str='<a href="http://www.google.cn" title="Google China">Google �й�</a>';
    echo htmlspecialchars($str);
    //echo htmlspecialchars($str,ENT_QUOTES);
    echo "<br/>";
    echo '<a href="http://www.google.cn" title="Google China">Google �й�</a>';
    $str='<a href="http://www.google.cn">Google �й�</a>';
    echo htmlspecialchars($str,ENT_COMPAT);
    echo "<br/>";
    echo htmlspecialchars($str,ENT_QUOTES);
    echo "<br/>";
    echo htmlspecialchars($str,ENT_NOQUOTES);
    echo "<br/>";
    echo htmlspecialchars($str,ENT_COMPAT,"UTF-8");
    //ʹ��htmllentites()��html_entity_decode()
    $str="<a href='http://www.google.cn'>Google �й�</a>";
    echo "<br/>";
    echo htmlentities($str,ENT_COMPAT,"iso-8859-1");
    echo "<br/>";
    //��ָ���ı��뻹ԭ��ת����HTMLʵ���ַ�
    echo html_entity_decode(htmlentities($str,ENT_COMPAT,"utf-8"),ENT_COMPAT,"iso-8859-1");
    echo "<br/>";
    echo htmlentities($str,ENT_COMPAT,"utf-8");
    echo "<br/>";
    echo html_entity_decode(htmlentities($str,ENT_COMPAT,"utf-8"),ENT_COMPAT,"utf-8");
    //���HTML��ǩstrp_tags()
    $string="Email:<a href='http://www.21cto.com'>spam@21cto.com</a>";
    echo "<br/>ԭʼ�ַ���=".$string."<br/>";
    echo "Ŀ¼�ַ���=".strip_tags($string);
    $string="��ӭ����<a href='http://www.21cto.com/'>˼������</a><b>��������ȫ�������</b>!";
    echo "<br/>ԭʼ��=".$string."<br/>";
    echo "Ŀ�괮=".strip_tags($string,"<a>");
    //�ַ����Ƚ�strcmp()��strncmp()
    $stringone="my story";
    $stringtwo="my story";
    if (strcmp($stringone,$stringtwo)==0) {
        //�ȼ���if ($stringone==$stringtwo){}
        echo "<br/>���ַ�����ͬ��<br/>";
    }
    //�Ƚ�ǰ�����ַ�
    if (strncmp("php developer","php",3)==0) {
        echo "���ַ���ǰ�����ַ���ͬ��<br/>";
    }
    //�ַ������� strtok()
    $text='Hello, Welcome to PHP5 world';
    echo strpbrk($text,'W');
    echo "<br/>";
    echo strpbrk($text,'w')."<br/>";
    //strpn()������strcspn()
    echo strspn("hello","oleh")."<br/>";
    $array1=range(0,9);
    $array2=range("a","z");
    $chars=implode("",$array1).implode("",$array2);
    $username="raymond!";
    echo "�û�������ʹ�õĺϷ��ַ�����$chars<br/>";
    if (($n=strspn($username,$chars))!=strlen($username)) {
        echo "����$n���ַ�\"$username\".��һ���Ƿ����û���<br/>";
    }
    //strcspn($str1,$str2)����str1�а���str2����û���ַ��ĵ�һ���ֵĳ���
    echo strcspn("hello","by")."<br/>";
//...............................������ʱ��..................................
    echo "��ǰ��ʱ�����:".time();
    //���ں���
    //����Ĭ��ʱ��Ϊ�й�ʱ��
    date_default_timezone_set('PRC');
    $time=time();
    //��date�������Խ��ܵĲ������������У�Ȼ��������ʾ��ͬ������ʱ���ʽ
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
        //������ʾ
        echo "<p><b>$format</b>:".date($format)."</p>\n";
    }
    //date����
    date_default_timezone_set('prc');
    echo date("Y-m-d G:i:s")."<br/>";
    echo date('y-n-j')."<br/>";
    echo "������".date(l)."<br/>";
    echo "������".date("l",time()-86400)."<br/>";
    //getdate()����
    $now=time();//��ǰʱ������ɻ�Ϊ�����Ϸ���ʱ���
    $array=getdate($now);
    echo "<pre>";
    print_r($array);
    echo "</pre><br/>";
    //checkdate()�������ڼ��һ�����ڸ�ʽ�Ƿ���ȷ
    $m=2;
    $d=27;
    $y=2009;
    echo "{$m}��{$d}��{$y}��<br/>";
    if (!checkdate($m,$d,$y)) {
        echo '��������ڴ���'."<br/>";
    }else{
        echo '�����������ȷ'."<br/>";
    }
    //time()����
    $now=time();
    if (($now%2)==0) {
        echo "ż����<br/>";
    } else {
        echo "������<br/>";
    }
    $tomorrow=time()+86400;
    echo "�������ڣ�".date("Y��m��d��",$tomorrow)."<br/>";
    //mkdate()����
    //����ʱ���
    echo mktime(0,0,0,9,9,2009)."<br/>";
    echo date("t",mktime(0,0,0,date("9"),1,date("2010")));
    //strtotime()����
    //����Ĭ��ʱ��Ϊ�й�ʱ��
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