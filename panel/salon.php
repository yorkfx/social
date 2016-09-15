<?php require_once('../Connections/conectar.php'); ?>
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form_agregar_salon")) {
  $insertSQL = sprintf("INSERT INTO salones (id_cliente, fecharegistro, nombre_salon, telefono1, telefono2, tipo, a_pagos, capacidad, precios, calle, colonia, numero, estado, municipio, lat, lng, servicios, url_web, url_video, horarios, descripcion) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_cliente'], "int"),
                       GetSQLValueString($_POST['salon_fecha'], "date"),
                       GetSQLValueString($_POST['salon_nombre'], "text"),
                       GetSQLValueString($_POST['salon_tel1'], "text"),
                       GetSQLValueString($_POST['salon_tel2'], "text"),
                       GetSQLValueString($_POST['salon_tipo'], "text"),
                       GetSQLValueString($_POST['salon_pagos'], "text"),
                       GetSQLValueString($_POST['salon_capacidad'], "text"),
                       GetSQLValueString($_POST['salon_precios'], "text"),
                       GetSQLValueString($_POST['salon_calle'], "text"),
                       GetSQLValueString($_POST['salon_colonia'], "text"),
                       GetSQLValueString($_POST['salon_num'], "text"),
                       GetSQLValueString($_POST['salon_estado'], "text"),
                       GetSQLValueString($_POST['salon_municipio'], "text"),
                       GetSQLValueString($_POST['latitud'], "double"),
                       GetSQLValueString($_POST['longitud'], "double"),
                       GetSQLValueString($_POST['salon_servicios'], "text"),
                       GetSQLValueString($_POST['salon_web'], "text"),
                       GetSQLValueString($_POST['salon_video'], "text"),
                       GetSQLValueString($_POST['salon_horarios'], "text"),
                       GetSQLValueString($_POST['salon_descripcion'], "text"));

  mysql_select_db($database_conectar, $conectar);
  $Result1 = mysql_query($insertSQL, $conectar) or die(mysql_error());

  //Crear Directorio para Galeria de Imagenes
	$nombre_carpeta = '../files/fotos/'.$_POST["id_cliente"].'';

	if(!is_dir($nombre_carpeta)){
		@mkdir($nombre_carpeta, 0700);
	}
	else{
		echo "Ya existe ese directorio\n";
	}

  $insertGoTo = "galeria.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

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
<?php include("_header.php"); ?>
<?php include("_vars.php"); ?>
	<section class="row">
		<div class="container">
			<div class="col-md-3" id="barra-lateral">
				<ul class="list-group">
					<li class="list-group-item"><a href="salon.php">Salon</a></li>
					<li class="list-group-item"><a href="galeria.php">Galeria</a></li>
					<li class="list-group-item"><a href="paquetes.php">Paquetes</a></li>
					<li class="list-group-item"><a href="calendario.php">Disponibilidad</a></li>
					<li class="list-group-item"><a href="cotizaciones.php">Cotizaciones</a> <span class="badge">3</span></li>
					<li class="list-group-item"><a href="calificaciones.php">Calificaciones</a> <span class="badge">1</span></li>
					<li class="list-group-item"><a href="facturas.php">Facturas</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				<div class="white" style="padding:20px">
				<h5>Agregar Salon</h5>
					<form action="<?php echo $editFormAction; ?>" class="form-horizontal" id="form_agregar_salon" name="form_agregar_salon" method="POST">
						<fieldset>
							<legend>Generales</legend>
						</fieldset>
						<input type="hidden" id="salon_fecha" name="salon_fecha" value="<?php echo date("Y-m-d"); ?>">
						<input type="hidden" id="salon_plan" name="salon_plan" value="<?php $plan = "F"; echo $plan; ?>">
						<input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $_SESSION['MM_UserGroup']; ?>">
						<div class="form-group">
							<label for="salon_nombre" class="col-sm-4 control-label">Nombre Salon</label>
							<div class="col-sm-8"><input type="text" id="salon_nombre" name="salon_nombre" class="form-control" required></div>
						</div>
						<div class="form-group">
							<label for="salon_web" class="col-sm-4 control-label">Sitio Web</label>
							<div class="col-sm-8"><input type="url" id="salon_web" name="salon_web" class="form-control" placeholder="http://"></div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-4 control-label">Telefono(s) *</label>
							<div class="col-sm-8">
								<div class="row">
									<div class="col-xs-6"><input type="tel" id="salon_tel1" name="salon_tel1" class="form-control" required></div>
									<div class="col-xs-6"><input type="tel" id="salon_tel2" name="salon_tel2" class="form-control"></div>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="salon_descripcion" class="col-sm-4 control-label">Descripción del Salón</label>
							<div class="col-sm-8"><textarea name="salon_descripcion" id="salon_descripcion"  rows="7" class="form-control" required></textarea></div>
						</div>

						<div class="form-group">
							<label class="col-sm-4 control-label">Tipo Salon</label>
							<div class="col-sm-8">
								<div class="col-md-4"><input type="radio" name="salon_tipo" value="Clasico" id="Clasico" required> <label for="Clasico"> Clasico</label></div>
								<div class="col-md-4"><input type="radio" name="salon_tipo" value="Infantil" id="Infantil" required> <label for="Infantil"> Infantil</label></div>
								<div class="col-md-4"><input type="radio" name="salon_tipo" value="Campestre" id="Campestre" required> <label for="Campestre"> Campestre</label></div>
								<div class="col-md-4"><input type="radio" name="salon_tipo" value="Jardin" id="Jardin" required> <label for="Jardin"> Jardín</label></div>
								<div class="col-md-4"><input type="radio" name="salon_tipo" value="Moderno" id="Moderno" required> <label for="Moderno"> Moderno</label></div>
								<div class="col-md-4"><input type="radio" name="salon_tipo" value="Club" id="Club" required> <label for="Club"> Club</label></div>
								<div class="col-md-4"><input type="radio" name="salon_tipo" value="Auditorio" id="Auditorio" required> <label for="Auditorio"> Auditorio</label></div>
								<div class="col-md-4"><input type="radio" name="salon_tipo" value="Lounge" id="Lounge" required> <label for="Lounge"> Lounge</label></div>
								<div class="col-md-4"><input type="radio" name="salon_tipo" value="Hacienda" id="Hacienda" required> <label for="Hacienda"> Hacienda</label></div>
							</div>
						</div>
						<div class="form-group">
							<label for="salon_pagos" class="col-sm-4 control-label">Acepta Pagos con:</label>
							<div class="col-sm-8">
								<div class="col-xs-12">
									<textarea name="salon_pagos" id="salon_pagos" class="form-control" required></textarea>
								</div>
							</div>
						</div>
						<br>
						<div class="form-group">
							<label for="salon_capacidad" class="col-sm-4 control-label">Capacidad </label>
							<div class="col-sm-8">
								<input id="salon_capacidad" name="salon_capacidad" type="text" required>
								<small class="help-block">Seleccione el cupo mínimo y máximo de las instalaciones</small>
							</div>
						</div>
						<br>
						<div class="form-group">
							<label for="salon_precios" class="col-sm-4 control-label">Precios</label>
							<div class="col-sm-8">
								<input id="salon_precios" name="salon_precios" type="text" required>
								<small class="help-block">Seleccione un rango de precio por persona <em>mínimo y máximo</em></small>
							</div>
						</div>
						<div class="form-group">
							<label for="salon_horarios" class="col-sm-4 control-label">Horarios</label>
							<div class="col-sm-8">
								<div class="col-xs-12">
									<textarea name="salon_horarios" id="salon_horarios" class="form-control" cols="30" rows="5" placeholder="Lunes a Viernes 14:00 a 18:00 hrs", required></textarea>
								</div>
							</div>
						</div>

						<fieldset>
							<legend>Ubicación</legend>

							<div class="form-group">
								<label for="salon_calle" class="col-sm-2 control-label">Calle</label>
								<div class="col-sm-4">
									<input type="text" id="salon_calle" name="salon_calle" class="form-control" required>
								</div>
									<label for="salon_colonia" class="col-sm-2 control-label">Colonia</label>
								<div class="col-sm-4">
									<input type="text" id="salon_colonia" name="salon_colonia" class="form-control" required>
								</div>
								<br>
								<br>
								<label for="salon_num" class="col-sm-2 control-label">Numero</label>
								<div class="col-sm-4">
									<input type="number" id="salon_num" name="salon_num" class="form-control" required>
								</div>
									<label for="salon_cp" class="col-sm-2 control-label">Codigo Postal</label>
								<div class="col-sm-4">
									<input type="number" id="salon_cp" name="salon_cp" class="form-control" placeholder="00000" required>
								</div>
								<br>
								<br>
								<label for="salon_estado" class="col-sm-2 control-label">Estado</label>
								<div class="col-sm-4">
									<select name="salon_estado" id="salon_estado" class="form-control" required>
										<option value="0">Estado</option>
									</select>
								</div>
									<label for="salon_municipio" class="col-sm-2 control-label">Municipio</label>
								<div class="col-sm-4">
									<select name="salon_municipio" id="salon_municipio" class="form-control" required>
										<option value="0">Municipio</option>
									</select>
								</div>
							</div>
							<input id="latitud" name="latitud" type="hidden" value="" />
							<input id="longitud" name="longitud" type="hidden" value="" />
							<input id="address" name="address" type="hidden" value="">
							<div id="showmap">
								<button class="btn btn-success" type="button" onclick="showAddress(form_agregar_salon.address.value); return false">Ubicar en el Mapa</button>
								<div id="mapa_ubicacion" style="width: 100%; height:460px;margin: 0;"></div>
							</div>
							<div class="clearfix"></div>
							<br>

						</fieldset>

						<fieldset>
							<legend>Caracteristicas</legend>
							<div class="form-group">
								<label for="salon_servicios" class="col-sm-4 control-label">Servicios</label>
								<div class="col-sm-8">
									<textarea class="form-control tags" name="salon_servicios" id="salon_servicios" value="Estacionamiento, Cocina integral, Area Infantil"></textarea>
									<small class="help-block">Agregue todos los servicios con los que cuenta el salon. Ejemplo: <em>Inflable, Cocina, Baños, etc.</em></small>
								</div>
							</div>

							<div class="form-group">
							<label for="salon_video" class="col-sm-4 control-label">URL video *</label>
							<div class="col-sm-8">
								<input type="text" id="salon_video" name="salon_video" class="form-control" placeholder="http://www.youtube.com/watch?v=00000000">
								<small class="help-block"> URL Video en Youtube o Vimeo</small>
							<small class="help-block"><em>*</em> Opcionales </small>
							</div>

						</div>
						</fieldset>
						<div class="form-group">
							<div class="col-sm-offset-5 col-sm-8">
								<button type="submit" class="btn btn-primary" name="form_submit">Agregar Salon</button>
							</div>
						</div>
						<input type="hidden" name="MM_insert" value="form_agregar_salon">
					</form>
				</div>

			</div>
		</div>
	</section>

<footer>
<!-- 		<div id="lvl_1">
			<div class="container">
				Prefooter
			</div>
		</div> -->
		<div id="lvl_2">
			<div class="container">
				<div class="col-md-6">1</div>
				<div class="col-md-3">
					<h5>Nosotros</h5>
					<ul>
						<li><a href="#">Ayuda</a></li>
						<li><a href="#">Contacto</a></li>
						<li><a href="#">Terminos</a></li>
						<li><a href="#">Aviso Legal</a></li>
						<li><a href="#">Aviso de privacidad</a></li>
					</ul>
				</div>
				<div class="col-md-3">
					<h5>Siguenos</h5>
					<ul>
						<li><a href="#">Facebook</a></li>
						<li><a href="#">Twitter</a></li>
						<li><a href="#">Google +</a></li>
						<li><a href="#">Instangram</a></li>
						<li><a href="#">Youtube</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="lvl_3">
			<div class="container">
				<div class="col-md-9"> Copyright samia © 2014. Todos los derechos reservados </div>
				<div class="col-md-3">iconos redes</div>
			</div>
		</div>
	</footer>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../files/js/jquery.min.js"><\/script>')</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script>window.jQuery || document.write('<script src="../files/js/bootstrap.min.js"><\/script>')</script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>


	<script src="js/municipios.js"></script>
	<script src="js/mapaubicacion.js"></script>
	<script src="../files/js/libs/jquery.tagsinput.min.js"></script>
	<script src="../files/js/libs/ion.rangeSlider.min.js"></script>

	<script src="http://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
	<script>

$(document).ready(function() {
	$("#salon_capacidad").ionRangeSlider({
		type: "double",
		grid: true,
		min: 100,
		max: 1000,
		step: 50,
	});

	$("#salon_precios").ionRangeSlider({
		type: "double",
		grid: true,
		min: 50,
		max: 500,
		from: 200,
		to: 800,
		prefix: "$",
		step: 50,
	});

	$('#salon_servicios').tagsInput({
		'width':'486px',
		'height': 'auto'
	});

	$('#salon_horarios').tagsInput({
		'width':'470px',
		'height': 'auto',
		'defaultText':'Agregar horarios'
	});

	$('#salon_pagos').tagsInput({
		'width':'470px'
	});
	$('#salon_pagos').importTags('Efectivo,Tarjeta,Transferencia, Cheque');

    jQuery.extend(jQuery.validator.messages, {
        required: "Este campo es obligatorio.",
        remote: "Por favor, rellena este campo.",
        email: "Por favor, escribe una dirección de correo válida",
        url: "Por favor, escribe una URL válida.",
        date: "Por favor, escribe una fecha válida.",
        dateISO: "Por favor, escribe una fecha (ISO) válida.",
        number: "Por favor, escribe un número entero válido.",
        digits: "Por favor, escribe sólo dígitos.",
        creditcard: "Por favor, escribe un número de tarjeta válido.",
        equalTo: "No coninciden las contraseñas.",
        accept: "Por favor, escribe un valor con una extensión aceptada.",
        maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
        minlength: jQuery.validator.format("Debe tener al menos {0} caracteres."),
        rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
        range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
        max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
        min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
    });



});
	</script>
	<script>
	jQuery(function() {
	  var youtubePattern = /^http:\/\/(?:www\.)?youtube.com\/watch\?(?=.*v=\w+)(?:\S+)?$/i;

	  jQuery.validator.addMethod("youtubeVideo", function(value) {
	    return youtubePattern.test(value);
	  }, "Debe ser un video de Youtube válida");
	});
		//Validar formulario
		$("#form_agregar_salon").validate();

		// Desactivar envio con enter
		function anular(e) {
	          tecla = (document.all) ? e.keyCode : e.which;
	          return (tecla != 13);
	     }

	     // Agregar Dirección al campo #adress
		function displayVals() {
		    var calleValues = $("#salon_calle").val();
		    var coloniaValues = $("#salon_colonia").val();
		    var estadoValues = $("#salon_estado option:selected").text();
		    var municipioValues = $("#salon_municipio option:selected").text();
		        $("#address" ).val("" + calleValues + ", " + coloniaValues + ", " + municipioValues + ", " + estadoValues );
		    }
		    $("select").change(displayVals);
		    displayVals();
	</script>
</body>
</html>