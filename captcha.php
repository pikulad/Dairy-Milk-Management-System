<?php
/**
 * Created by PhpStorm.
 * User: priyank
 * Date: 10/02/19
 * Time: 10:37 AM
 */

session_start();
create_image();

function create_image()
{
    // Generating Random Code
    $_SESSION['captcha']="";
    $captcha_num = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ12345678900987654321abcdefghijklmnopqrstuvwxyz';
    $captcha_num = substr(str_shuffle($captcha_num), 0, 6);

    //$md5_hash = md5(rand(0,999));
    //$captcha = substr($md5_hash, 15,5);
    $captcha=$captcha_num;

    $_SESSION['captcha'] = $captcha;

    $width = 400;
    $height = 60;

    $image = ImageCreate($width,$height);

    // Colours
    $white = imagecolorallocate($image, 255, 255, 255);
    $black = imagecolorallocate($image, 0, 0, 0);
    $green = imagecolorallocate($image, 0, 255, 0);
    $brown = imagecolorallocate($image, 139, 69, 19);
    $orange = imagecolorallocate($image, 255, 69, 0);
    $grey = imagecolorallocate($image, 204, 204, 204);
    $systemcolor=imagecolorallocate($image, 255, 197, 5);

    // lines


    // Making Background
    imagefill($image, 0, 0, $systemcolor);

    // Carving Text into the image


    $font= "font.ttf";
    imagettftext($image, 25, 3, 125, 38, $white, $font, $captcha);
    for ($i=0;$i<rand(10,50);$i++){
        imageline($image, rand(100,300), rand(0,20), rand(200,250), rand(0,50), $systemcolor);
    }
    // Informing Browser there is a jpeg image file is coming
    header("Content-Type: image/jpeg");

    //Converting Image into JPEG
    imagejpeg($image);
    // Clearing Cache
    imagedestroy($image);
}
?>