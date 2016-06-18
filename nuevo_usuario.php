
<?php

if($_POST['correo']!=""){
	mysql_connect("localhost","root","root");
	mysql_select_db("samia");
	error_reporting(E_ALL && ~E_NOTICE);

	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$password = $_POST['password'];

	$sql = "INSERT INTO usuarios(nombre,correo,password) VALUES ('$nombre','$correo','$password')";

	$resultado = mysql_query($sql);
	if($resultado){
		// setcookie("msg","You have been successfully subscribed.",time()+5,"/");
		// header("location:login.php");
		echo "Form Submitted succesfully";
    	}
	if(!$sql)
	die(mysql_error());
		mysql_close();
	}

?>