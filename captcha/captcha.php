<?php

session_start();
$codigoCaptcha = substr(md5( time()) ,0,9);

$_SESSION['captcha'] = $codigoCaptcha;

//gera a imagem criptografando o tempo (sempre diferente)

$imagemCaptcha = imagecreatefrompng("fundocaptch.png");

$fonteCaptcha = imageloadfont("anonymous.gdf");

$corCaptcha = imagecolorallocate($imagemCaptcha,255,0,0);

imagestring($imagemCaptcha,$fonteCaptcha,15,5,$codigoCaptcha,$corCaptcha);


header("Content-type: image/png");

imagepng($imagemCaptcha);

imagedestroy($imagemCaptcha);

?>