<?php

header("content-type:image/png");

$im=imagecreatetruecolor(800, 600);

//指定画布的颜色，背景色
imagefill($im, 0, 0, imagecolorallocate($im, 213,226,237));


$red=imagecolorallocate($im, 255,0,0);
$darkred=imagecolorallocate($im, 134,13,13);
$green=imagecolorallocate($im, 0,255,0);
$darkgreen=imagecolorallocate($im, 21,139,21);
$blue=imagecolorallocate($im, 0,0,255);
$darkblue=imagecolorallocate($im, 8,8,121);


for ($i=360; $i > 301; $i--) { 
	imagefilledarc($im, 400, $i, 600, 200, 0, 45, $darkblue, IMG_ARC_PIE);
	imagefilledarc($im, 400, $i, 600, 200, 45, 101, $darkgreen, IMG_ARC_PIE);
	imagefilledarc($im, 400, $i, 600, 200, 100, 360, $darkred, IMG_ARC_PIE);
}


imagefilledarc($im, 400, 300, 600, 200, 0, 45, $blue, IMG_ARC_PIE);
imagefilledarc($im, 400, 300, 600, 200, 45, 101, $green, IMG_ARC_PIE);
imagefilledarc($im, 400, 300, 600, 200, 100, 360, $red, IMG_ARC_PIE);




imagepng($im);
imagedestroy($im);




?>