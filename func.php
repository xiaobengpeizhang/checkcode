<?php
/**
 * Created by PhpStorm.
 * User: chinnsyoukich
 * Date: 2017/4/19
 * Time: 10:38
 */


/*
 * checkcode()是一个创建验证码的函数
 * @参数width代表图片长度，参数heigth代表图片高度，codelength代表验证码个数，blackcircle代表是否需要黑色边框
 * @使用之前需要先引入函数库，打开session
 */
function checkcode($_width = 75,$_height = 25,$codelength = 4,$blackcircle = true){
    //创建随机验证码
    $checkcode = "";

    for($i=0;$i<$codelength;$i++){
        $checkcode .= dechex(mt_rand(0,15));
    }
    $_SESSION["code"] = $checkcode;

//echo $_SESSION['code'];

//创建一个图像


    $img=imagecreatetruecolor($_width,$_height);

//白色背景
    $white = imagecolorallocate($img,255,255,255);
    imagefill($img,0,0,$white);

//黑色边框

    if($blackcircle){
        $black = imagecolorallocate($img,0,0,0);
        imagerectangle($img,0,0,$_width-1,$_height-1,$black);
    }


//随机划线
    for($i=0;$i<4;$i++){
        $unknowcolor = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        imageline($img,mt_rand(0,$_width),mt_rand(0,$_height),mt_rand(0,$_width),mt_rand(0,$_height),$unknowcolor);
    }
//随机打雪花
    for($i=0;$i<30;$i++){
        $unknowcolor = imagecolorallocate($img,mt_rand(0,255),mt_rand(0,255),mt_rand(0,255));
        imagestring($img,1,mt_rand(0,$_width),mt_rand(0,$_height),".",$unknowcolor);
    }

//输出验证码
    for($i=0;$i<strlen($checkcode);$i++){
        $unknowcolor = imagecolorallocate($img,mt_rand(0,100),mt_rand(0,100),mt_rand(0,100));
        imagestring($img,5,$i*$_width/$codelength+mt_rand(1,10),mt_rand(1,$_height/2),$checkcode[$i],$unknowcolor);

    }

//输出图像
    header("Content-type: image/png");
    imagepng($img);

//销毁图像
    imagedestroy($img);
}
?>