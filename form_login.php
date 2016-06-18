<?php


define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'samia');
$conectar = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


session_start();
if(isset($_POST['correo']) && isset($_POST['password'])){
	// correo and password sent from Form
	$correo=mysqli_real_escape_string($conectar,$_POST['correo']);
	//Here converting passsword into MD5 encryption.
	$password=md5(mysqli_real_escape_string($conectar,$_POST['password']));

	$result=mysqli_query($conectar,"SELECT id FROM usuarios WHERE correo='$correo' and password='$password'");
	$count=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	// If result matched $nombre and $password, table row  must be 1 row
if($count==1){
	$_SESSION['login_user']=$row['id']; //Storing user session value.
	echo $row['id'];
}
?>