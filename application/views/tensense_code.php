<?php
    /*设置不缓存*/
    header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");    // Date in the past
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");  // HTTP/1.1
    header ("Pragma: no-cache");
/**
     * 字母+数字的验证码生成
     */

    //1.创建黑色画布
    $image = imagecreatetruecolor(105, 33);

    //2.为画布定义(背景)颜色
    $bgcolor = imagecolorallocate($image, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));

    //3.填充颜色
    imagefill($image, 0, 0, $bgcolor);

    // 4.设置验证码内容

    //4.1 定义验证码的内容
    $content = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    //4.1 创建一个变量存储产生的验证码数据，便于用户提交核对
    $captcha = "";
    for ($i = 0; $i < 4; $i++) {
        // 字体大小
        $fontsize = 5;
        // 字体颜色
        $fontcolor = imagecolorallocate($image, 255, 255, 255);
        // 设置字体内容
        $fontcontent = substr($content, mt_rand(0, strlen($content)), 1);
        $captcha .= $fontcontent;
        // 显示的坐标
        $x = ($i * 100 / 5) + 18;
        $y = mt_rand(5, 10);
        // 填充内容到画布中
        imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
    }
    $this->session->set_userdata('code',$captcha);

    //4.3 设置背景干扰元素
    for ($$i = 0; $i < 20; $i++) {
        $pointcolor = imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
        imagesetpixel($image, mt_rand(0, 105), mt_rand(0, 33), $pointcolor);
    }

    //4.4 设置干扰线
    for ($i = 0; $i < 3; $i++) {
        $linecolor = imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255));
        imageline($image, mt_rand(0, 105), mt_rand(0, 33), mt_rand(0, 105), mt_rand(0, 33), $linecolor);
    }

    //5.向浏览器输出图片头信息
    header('content-type:image/jpg');

    //6.输出图片到浏览器
    imagepng($image);

    //7.销毁图片
    imagedestroy($image);
?>　
