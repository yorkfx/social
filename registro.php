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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_registro")) {
  $insertSQL = sprintf("INSERT INTO usuarios (nombre, correo, password) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['correo'], "text"),
                       GetSQLValueString($_POST['password'], "text"));

  mysql_select_db($database_conectar, $conectar);
  $Result1 = mysql_query($insertSQL, $conectar) or die(mysql_error());

  $insertGoTo = "login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<?php include("_header.php"); ?>
	<section class="row">
		<div class="container white">
			<div class="col-md-6 col-md-offset-1">
			<h4>Únete ahora totalmente Gratis!</h4>
			<form method="POST" action="<?php echo $editFormAction; ?>"  class="form-horizontal" name="form_registro" id="form_registro">
			<!--<div id="status"></div>
			<a href="https://www.facebook.com/dialog/oauth?client_id=625899147555995&redirect_uri=http://localhost:8888/social/registro.php&scope=publish_stream,email" onlogin="checkLoginState();" class="btn btn-social btn-block btn-facebook" id="btn-social-facebook"><i class="fa fa-facebook"></i> Registrame con mi cuenta de Facebook</a>
			<span class="btn btn-social btn-block btn-google-plus" id="btn-social-google"><i class="fa fa-google"></i> Registrame con mi cuenta de Google +</span> -->
			<span id="ajax"></span>

				<p class="text-center">Registro</p>
				<div id="notification"></div>

				  <div class="form-group">
				    <label for="nombre" class="col-sm-4 control-label">Nombre</label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="correo" class="col-sm-4 control-label">Correo</label>
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="password" class="col-sm-4 control-label">Contraseña</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label for="password_r" class="col-sm-4 control-label">Repetir Contraseña</label>
				    <div class="col-sm-8">
				      <input type="password" class="form-control" id="password_r" name="password_r" placeholder="Contraseña" required>
				    </div>
				  </div>
			      <small class="help-block text-right">Al registrarme <a href="#">acepto los términos y condiciones del sitio</a>.</small>
				<input type="submit" class="btn btn-default pull-right" value="Registrame" />
				<input type="hidden" name="MM_insert" value="form_registro">
				</form>
			</div>
			<div class="col-md-4 col-md-offset-1">
				<h4>¿Ya tienes una cuenta?</h4>
				<a href="login.php" class="btn btn-block btn-success btn-lg"> Iniciar sesión</a>
				<h4>Regístrate ahora para:</h4>
				<ul>
					<li>Agregar tu Salón</li>
					<li>Agregar Fotografias</li>
					<li>Agregar Paquetes</li>
					<li>Cotizar eventos</li>
					<li>Evalua tus eventos</li>
					<li>Evalua tus servicios</li>
					<li>Interactua con tus clientes</li>
				</ul>
				<p>Agrega tu Salon de fiestas ¡es gratis!</p>
			</div>
		</div>
	</section>

<?php include("_footer.php"); ?>
