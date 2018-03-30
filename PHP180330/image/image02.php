<?php





//验证码

header("content-type:text/html;charset=utf-8");
header("content-type:image/jpeg");

//新建一个真彩色图像(画布)
$w=150;
$h=40;
$str="";
$im=imagecreatetruecolor($w, $h);

//产生一个和画布一样大的被填充的矩形
imagefilledrectangle($im, 0, 0, $w, $h, imagecolorallocate($im, rand(100,255), rand(100,255), rand(100,255)));


//每循环一次产生一个随机数并0-9绘在画布上，并将四次产生的数保存在$str中，以备验证
/*for ($i=0; $i < 4; $i++) { 
	$res=rand(0,9);
	$str.=$res;
	imagettftext ( $im , rand(20,30) , rand(-35,35) , $i*30+rand(10,40), rand(25,35) , imagecolorallocate($im, rand(1,150), rand(1,150), rand(1,150)), "./fonts/".rand(1,13).".ttf" , $res );
}*/


//每循环一次产生一个随机数并(0-9,A-Z,a-z)绘在画布上，并将四次产生的数保存在$str中，以备验证
$chars = array(  
        'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o',
        'p','q','r','s','t','u','v','w','x','y','z','A','B','C','D',
        'E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S',
        'T','U','V','W','X','Y','Z','0','1','2','3','4','5','6','7',
        '8','9');
for ($i=0; $i < 4; $i++) { 
	$res=$chars[mt_rand(0,61)];
	$str.=$res;
	imagettftext ( $im , rand(20,25) , rand(-35,35) , $i*25+rand(0,25)+10, 30 , imagecolorallocate($im, rand(1,150), rand(1,150), rand(1,150)), "./fonts/".rand(1,13).".ttf" , $res );
}


//随机产生4条直线
for ($i=0; $i < 4; $i++) { 
	imageline($im, rand(0,75), rand(0,40), rand(75,150), rand(0,40), imagecolorallocate($im, rand(100,256), rand(100,256), rand(100,256)));
}


//随机产生1300个像素点
for ($i=0; $i < 300; $i++) { 
	imagesetpixel($im, rand(0,150), rand(0,45), imagecolorallocate($im, rand(0,256), rand(0,256), rand(0,256)));
}



imagejpeg($im);
imagedestroy($im);










?>