<?php

//print_r($_GET);exit;

$image = imagecreatefrompng("/sbac_web/views/img/aluno/card.png");

	$titlColor = imagecolorallocate($image, 255,255,255);
	
	$gray = imagecolorallocate($image, 255,255,255);
	
	
	
	$fonte = "/sbac_web/views/img/aluno/fonts/verdana-4.ttf";
	
	imagettftext($image, 34,0, 897, 490,$titlColor,$fonte,base64_decode($_GET['nome']));
	imagettftext($image, 34,0, 890, 649,$titlColor,$fonte,base64_decode($_GET['turma']));
	imagettftext($image, 34,0, 990,805,$titlColor,$fonte,base64_decode($_GET['matricula']));
	
	
	header("Content-Type: image/png");
	
	imagepng($image);
	
	imagedestroy($image);