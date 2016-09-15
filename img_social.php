<?php
	require_once('files/class/resize.php');

	$img = $_GET['img'];
	$dir = $_GET['dir'];

	$file = 'files/fotos/'.$dir.'/'.$img.'';
	$resizedFile = 'files/img_social/faceimg_'.$dir.'.jpg';
	smart_resize_image($file , null, 600 , 315 , false , $resizedFile , false , false ,80 );
	smart_resize_image(null , file_get_contents($file), 600 , 315 , false , $resizedFile , false , false ,80 );

	$file_g = 'files/fotos/'.$dir.'/'.$img.'';
	$g_resizedFile = 'files/img_social/googleimg_'.$dir.'.jpg';
	smart_resize_image($file_g , null, 505 , 336 , false , $g_resizedFile , false , false ,80 );
	smart_resize_image(null , file_get_contents($file_g), 505 , 336 , false , $g_resizedFile , false , false ,80 );


 ?>