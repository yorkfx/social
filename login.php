<?php require_once('Connections/conectar.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['correo'])) {
  $loginUsername=$_POST['correo'];
  $password=$_POST['password'];
  $MM_fldUserAuthorization = "id";
  $MM_redirectLoginSuccess = "panel/";
  $MM_redirectLoginFailed = "login.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conectar, $conectar);
  	
  $LoginRS__query=sprintf("SELECT correo, password, id FROM usuarios WHERE correo=%s AND password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $conectar) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'id');
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<?php include("_header.php"); ?>
<br>

	<section class="row">
		<div class="container white">
			<div class="col-md-5 col-md-offset-1">
			<h4>Iniciar Sesión</h4>
				<div id="box">
					<form class="form-horizontal" action="<?php echo $loginFormAction; ?>" method="POST" id="form_login">
					<!-- <div id="status"></div>
					<a href="https://www.facebook.com/dialog/oauth?client_id=625899147555995&redirect_uri=http://localhost:8888/social/registro.php&scope=publish_stream,email" onlogin="checkLoginState();" class="btn btn-social btn-block btn-facebook" id="btn-social-facebook"><i class="fa fa-facebook"></i> Registrame con mi cuenta de Facebook</a>
					<span class="btn btn-social btn-block btn-google-plus" id="btn-social-google"><i class="fa fa-google"></i> Registrame con mi cuenta de Google +</span> -->

					<p class="text-center">Identificate</p>

					<div id="error"></div>

					<div class="form-group">
						<label for="correo" class="col-sm-5 control-label">Correo Electronico</label>
						<div class="col-sm-7">
							<input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
						</div>
					</div>

					<div class="form-group">
						<label for="password" class="col-sm-5 control-label">Contraseña</label>
						<div class="col-sm-7">
							<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
						</div>
					</div>
 					<input type="submit" class="btn btn-default pull-right" value="Entrar" id="btn_login"/>
					</form>
				</div>
			</div>
			<div class="col-md-4 col-md-offset-1">
				<h4>¿No tienes una cuenta?</h4>
				<a href="registro.php" class="btn btn-block btn-success btn-lg">Registro</a>
				<h4>¿Problemas para acceder?</h4>
				<ul class="list-group">
					<li class="list-group-item"><a href="#">Olvidé mi contraseña.</a></li>
					<li class="list-group-item"><a href="#">Olvidé mi nombre de usuario.</a></li>
					<li class="list-group-item"><a href="#">No me llegó el email de confirmación.</a></li>
				</ul>
			</div>
		</div>
	</section>

<?php include("_footer.php"); ?>
