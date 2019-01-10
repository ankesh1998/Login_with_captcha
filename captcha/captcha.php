<?php
//staring session
session_start();

//Initializing PHP variable with string
$captchanumber = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';

//Getting first 6 word after shuffle
$captchanumber = substr(str_shuffle($captchanumber), 0, 6);

//Initializing session variable with above generated sub-string
$_SESSION["code"] = $captchanumber;

//Generating CAPTCHA
$font_size=25;
$image = imagecreatefromjpeg("bj.jpg");
$foreground = imagecolorallocate($image, 40, 19, 20); //font color
imagestring($image, 5, 50, 13, $captchanumber, $foreground);
header('Content-type: image/png');
imagepng($image);
?>

