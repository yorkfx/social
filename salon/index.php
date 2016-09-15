<?php require_once('../Connections/conectar.php'); ?>
<?php
require_once('../files/class/functions.php');

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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "cotiza_mi_evento")) {
  $insertSQL = sprintf("INSERT INTO cotizaciones (id_cliente, fecha, nombre, correo, telefono, fecha_evento, no_invitados, pr_invitados, mensaje) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_salon'], "int"),
                       GetSQLValueString($_POST['fecha'], "date"),
                       GetSQLValueString($_POST['nombre'], "text"),
                       GetSQLValueString($_POST['correo'], "text"),
                       GetSQLValueString($_POST['telefono'], "text"),
                       GetSQLValueString($_POST['fecha_evento'], "text"),
                       GetSQLValueString($_POST['numero_invitados'], "text"),
                       GetSQLValueString($_POST['presup_invitado'], "text"),
                       GetSQLValueString($_POST['mensaje'], "text"));

  mysql_select_db($database_conectar, $conectar);
  $Result1 = mysql_query($insertSQL, $conectar) or die(mysql_error());
}
$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysql_select_db($database_conectar, $conectar);
$query_Recordset1 = sprintf("SELECT * FROM salones WHERE id_cliente = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conectar) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

$maxRows_Recordset2 = 3;
$pageNum_Recordset2 = 0;
if (isset($_GET['pageNum_Recordset2'])) {
  $pageNum_Recordset2 = $_GET['pageNum_Recordset2'];
}
$startRow_Recordset2 = $pageNum_Recordset2 * $maxRows_Recordset2;

$colname_Recordset2 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset2 = $_GET['id'];
}
mysql_select_db($database_conectar, $conectar);
$query_Recordset2 = sprintf("SELECT * FROM paquetes WHERE id_salon = %s", GetSQLValueString($colname_Recordset2, "int"));
$query_limit_Recordset2 = sprintf("%s LIMIT %d, %d", $query_Recordset2, $startRow_Recordset2, $maxRows_Recordset2);
$Recordset2 = mysql_query($query_limit_Recordset2, $conectar) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);

if (isset($_GET['totalRows_Recordset2'])) {
  $totalRows_Recordset2 = $_GET['totalRows_Recordset2'];
} else {
  $all_Recordset2 = mysql_query($query_Recordset2);
  $totalRows_Recordset2 = mysql_num_rows($all_Recordset2);
}
$totalPages_Recordset2 = ceil($totalRows_Recordset2/$maxRows_Recordset2)-1;
?>
<?php include("../_vars.php"); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php echo $row_Recordset1['nombre_salon']; ?> - Samia</title>
		<meta name="description" content="<?php echo $row_Recordset1['descripcion']; ?>">
		<meta property="og:url"           content="<?php echo 'http://'.$_SERVER["HTTP_HOST"].'/salon/'.$row_Recordset1['id_cliente'].'.html';?>" />
		<meta property="og:type"          content="Samia - hacemos que tu evento sea inolvidable" />
		<meta property="og:title"         content="<?php echo $row_Recordset1['nombre_salon']; ?> - Samia.com.mx" />
		<meta property="og:description"   content="<?php echo substr($row_Recordset1['descripcion'],0,100); ?>" />
<?php
// Muestra imagen para compartir
$img_facebook = '../files/img_social/faceimg_'.$row_Recordset1['id_cliente'].'.jpg';
$img_google = '../files/img_social/google_'.$row_Recordset1['id_cliente'].'.jpg';
if (file_exists($img_facebook)) {
	//Imagen para compartir en Facebook y Google Plus
    echo '<meta property="og:image" content="http://'.$_SERVER["HTTP_HOST"].'/'.$img_facebook.'" />';
    echo '<meta itemprop="image" content="http://'.$_SERVER["HTTP_HOST"].'/'.$img_google.'" />';
}
else {
	//Crear imagen si no existe
	$ruta = '../files/fotos/'.$row_Recordset1["id_cliente"].'/'; // Indicar ruta
	$direc  = opendir($ruta);
	while (false !== ($nombre_archivo = readdir($direc))) {
		$archivos[] = $nombre_archivo;
	}
	$imagenface = glob("$ruta{*.gif,*.jpg,*.png}", GLOB_BRACE);

	require_once('../files/class/resize.php');
	$img = $imagenface[1];
	$face_ruta = $img;
	$resizedFile = '../files/img_social/faceimg_'.$row_Recordset1["id_cliente"].'.jpg';
	smart_resize_image($face_ruta , null, 600 , 315 , false , $resizedFile , false , false ,80 );
	smart_resize_image(null , file_get_contents($face_ruta), 600 , 315 , false , $resizedFile , false , false ,80 );

	$google_ruta = $img;
	$resizedFile = '../files/img_social/google_'.$row_Recordset1["id_cliente"].'.jpg';
	smart_resize_image($google_ruta , null, 505 , 336 , false , $resizedFile , false , false ,80 );
	smart_resize_image(null , file_get_contents($google_ruta), 505 , 336 , false , $resizedFile , false , false ,80 );
}
?>
		<meta itemprop="headline" content="<?php echo $row_Recordset1['nombre_salon']; ?>" />
		<meta itemprop="description" content="<?php echo substr($row_Recordset1['descripcion'],0,110); ?>" />
		<meta itemscope itemtype="<?php echo 'http://'.$_SERVER["HTTP_HOST"].''.$_SERVER["PHP_SELF"].'' ;?>" />

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" href="../files/css/bootstrap.min.css">
		<link rel="stylesheet" href="../files/css/bootstrap-theme.css">
		<script src="../files/js/libs/modernizr-2.6.2.min.js"></script>
		<!--[if lt IE 9]>
		<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
    </head>
    <body>
	<!--[if lt IE 7]>
	<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

<header class="container-fluid">
<nav role="navigation" class="navbar navbar-default navbar-static-top navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-target="#menutop" data-toggle="collapse" class="navbar-toggle">
				<span class="sr-only">Nav</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">samia.com.mx</a>
		</div>
		<div id="menutop" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="../index.html">Inicio</a></li>
				<li><a href="#">Mejor Precio</a></li>
				<li><a href="#">Mejor Valorado</a></li>
				<li><a href="#">Capacidad</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tipo <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<?php
						foreach ( $TipoSalon as $tipo ) {
						    echo '<li><a href="../listado.php?tipo=', $tipo['value'], '">', $tipo['label']."</a></li>";
						}
						?>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Estado <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<?php
						foreach ( $EstadosDeMexico as $estado ) {
						    echo '<li><a href="../', $estado['value'], '.html">', $estado['label']."</a></li>";
						}
						?>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="..7login.php">Login</a></li>
				<li><a href="..7registro.php">Registro</a></li>
			</ul>
		</div>
	</div>
</nav>
</header>
<?php

	$ruta = '../files/fotos/'.$row_Recordset1["id_cliente"].'/'; // Indicar ruta
	$ds  = opendir($ruta);
	while (false !== ($nombre_archivo = readdir($ds))) {
		$archivos[] = $nombre_archivo;
	}

	$imagen_cabecera = glob("$ruta{*.gif,*.jpg,*.png}", GLOB_BRACE);
?>

<section id="salon-header" style="background-image: url(<?php echo $imagen_cabecera[1]; ?>);">
	<div class="container">
		<div class="col-md-9">
			<div class="clear-bottom">
				<h2><?php echo $row_Recordset1['nombre_salon']; ?></h2>
				<address><a href="#"><?php echo $row_Recordset1['calle']; ?> <?php echo $row_Recordset1['numero']; ?> <br> <?php echo $row_Recordset1['colonia']; ?> <?php echo $row_Recordset1['municipio']; ?></a></address>
				<h3><?php echo $row_Recordset1['tipo']; ?></h3>
				<div class="calificacion">
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star"></i>
					<i class="glyphicon glyphicon-star-empty"></i>
					6 comentarios 10 Calificaciones
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="clear-bottom">
				<a href="#" class="btn" data-toggle="modal" data-target="#modal_compartir"><i class="glyphicon glyphicon-new-window"></i> Compartir</a> <a href="#" class="btn" data-toggle="modal" data-target="#modal_calificar"><i class="glyphicon glyphicon-thumbs-up"></i> Calificar</a>
				<a href="#" class="btn-cotiza" data-toggle="modal" data-target="#cotizador"> Cotiza mi evento</a>
			</div>
		</div>
	</div>
</section>
<br>



<section class="container" id="salon-details">
	<div class="col-md-8">
		<div class="white">
			<h4><i class="glyphicon glyphicon-asterisk"></i> Detalles</h4>
			<p><?php echo $row_Recordset1['descripcion']; ?></p>
		</div>

		<div class="white">
			<h4><i class="glyphicon glyphicon-leaf"></i> Servicios</h4>

			<ul class="lst_servicios">
			<?php
			$array = explode(",", $row_Recordset1['servicios']);
			foreach($array as $tag) {
				if(!empty($tag)) {
						echo '<li><i class="glyphicon glyphicon-pushpin"></i>'.utf8_encode($tag).'</li>';
				}
			}
			?>
		</ul>
		</div>
		<?php
		// Mostrar Video
		if ($row_Recordset1['url_video'] == NULL){
				// echo "no hay video";
		}
		else{
		?>
			<div class="white" id="video">
			<h4><i class="glyphicon glyphicon-video"></i> Video</h4>
				<div class="embed-responsive embed-responsive-16by9">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/Q0oIoR9mLwc" frameborder="0" allowfullscreen></iframe>
				<iframe src="https://www.youtube.com/embed/<?php echo parse_yturl($row_Recordset1['url_video']); ?>" class="embed-responsive-item" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div>
			</div>
			<?php
		}
		?>


		<div class="white">
			<h4><i class="glyphicon glyphicon-camera"></i> Galeria</h4>
			<div class="row" id="gallery" style="padding:10px">
			<?php
				$ruta = '../files/fotos/'.$row_Recordset1["id_cliente"].'/'; // Indicar ruta
					$ds  = opendir($ruta);
					while (false !== ($nombre_archivo = readdir($ds))) {
						$archivos[] = $nombre_archivo;
					}

					$images = glob("$ruta{*.gif,*.jpg,*.png}", GLOB_BRACE);

					foreach($images as $foto){
						echo '<a href="'.$foto.'" ><img class="img-responsive" alt="" src="'.$foto.'" width="100" height="100" /></a>';
					}
			?>
			</div>
			<div class="col-md-4 col-md-push-4">
					<!-- <a href="javascript:void(0)" class="btn btn-default btn-block" id="show_more_images"><span class="glyphicon glyphicon-chevron-down"></span> mas fotografias</a> -->
			</div>


		</div>
	</div>
	<div class="col-md-4">

	<?php if ($totalRows_Recordset2 > 0) { // Show if recordset not empty ?>
	<div class="white">
		<h4><i class="glyphicon glyphicon-gift"></i> Paquetes</h4>
		<?php do { ?>
			<div class="paquetes" id="paquete_<?php echo $row_Recordset2['id']; ?>"><i class="glyphicon glyphicon-gift"></i> <a href="#" data-toggle="modal" data-target="#ver_paquete_<?php echo $row_Recordset2['id']; ?>"><?php echo $row_Recordset2['nom_paquete']; ?><strong>$<?php echo $row_Recordset2['pre_persona']; ?> p/p</strong> <small>minimo <?php echo $row_Recordset2['min_personas']; ?> personas</small></a> </div>

<!-- Paquete <?php echo $row_Recordset2['id']; ?> -->
<div class="modal fade" id="ver_paquete_<?php echo $row_Recordset2['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="titutlo" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h5 class="modal-title" id="titutlo"><?php echo $row_Recordset2['nom_paquete']; ?></h5>
		</div>
			<div class="modal-body">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel">
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-4"><h5>Detalles:</h5></div>
									<div class="col-md-8"><a href="#" class="btn btn-default btn-sm pull-right"> <i class="fa fa-print"></i> imprimir</a> <h5>Incluye:</h5> </div>
								</div>
								<div class="detaills">
									<div>
										<small>Precio Por Persona.</small>
										<h3>$<?php echo $row_Recordset2['pre_persona']; ?></h3>
									</div>
									<div>
										<small>Minimo de personas.</small>
										<h3><?php echo $row_Recordset2['min_personas']; ?></h3>
									</div>
									<div>
										<small>Dias que aplica.</small>
										<h3><?php echo $row_Recordset2['dias']; ?></h3>
									</div>
								</div>
								<div class="list_services">
									<ul>
										<?php
											$array = explode(",", $row_Recordset2['opciones_paquete']);
											foreach($array as $opciones_paquete) {
												if(!empty($opciones_paquete)) {
														echo '<li> '.utf8_encode($opciones_paquete).'</li>';
												}
											}
										?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
			<?php } while ($row_Recordset2 = mysql_fetch_assoc($Recordset2)); ?>
			<?php
			// Si hay mas 3 Paquetes Muestra Pagina Paquetes Salon
			 if ($totalRows_Recordset2 > 3) {
				echo '<a href="paquetes.php?id='.$row_Recordset2['id_salon'].'" class="btn btn-link btn-block">Ver todos los paquetes</a>';
				}
				?>

		<br>
	</div>
	<?php } // Show if recordset not empty ?>

		<div class="white">
			<h4><i class="glyphicon glyphicon-user"></i> Capacidad</h4>
			<?php
			$total_capacidad = $row_Recordset1['capacidad'];
			$capacidad = explode(";", $total_capacidad);
			echo '<p>'.$capacidad[0].' a '.$capacidad[1].' invitados</p>';
			?>
		</div>

		<div class="white">
			<h4><i class="glyphicon glyphicon-plus"></i> Precios</h4>
			<?php
			$total_precios = $row_Recordset1['precios'];
			$precios = explode(";", $total_precios);
			echo '<p> desde $'.$precios[0].' a $'.$precios[1].' por persona</p>';
			?>
		</div>
		<div class="white">
			<h4><i class="glyphicon glyphicon-credit-card"></i> Pago</h4>
			<p><?php echo $row_Recordset1['a_pagos']; ?></p>
		</div>

		<div class="white">
			<h4><i class="glyphicon glyphicon-time"></i> Horarios</h4>
			<?php
			$array = explode(",", $row_Recordset1['horarios']);
			foreach($array as $horarios) {
				if(!empty($horarios)) {
						echo '<p> '.utf8_encode($horarios).'</p>';
				}
			}

			?>
		</div>

		<div class="white">
			<h4><i class="glyphicon glyphicon-home"></i> Ubicación</h4>
			<div id="mapa_ubicacion"></div>
			<script type='text/javascript'>
		            function loadMapScenario() {
		                var map = new Microsoft.Maps.Map(document.getElementById('mapa_ubicacion'), {
		                    credentials: 'LF30vXm7eMFdUnVHTk5Z~5M9KpI3rLzKQUumm61NXVQ~AgBfcgVVGHq66RYeM5L-CGS9bFpJjZ9WpSXK5LAJ7JQmYmaHMypETKih2ZCtbOv2',
		                    center: new Microsoft.Maps.Location(<?php echo $row_Recordset1['lat']; ?>, <?php echo $row_Recordset1['lng']; ?>),
		                    zoom: 16,
		                    showMapTypeSelector: false,
						showScalebar : false,
						disableZooming: true,
						showDashboard: false,
		                });
					var pushpin = new Microsoft.Maps.Pushpin(map.getCenter(), { color: 'purple' });
					map.entities.push(pushpin);

		            }
			</script>
        		<script type='text/javascript' src='http://www.bing.com/api/maps/mapcontrol?branch=release&callback=loadMapScenario' async defer></script>
			<?php
			// echo $row_Recordset1['lat'].' '.$row_Recordset1['lng'];
			// 	require_once 'files/class/map/class.MapBuilder.php';

			// 	$map = new MapBuilder();
			// 	try {
			// 		$pos = $map->getLatLng($row_Recordset1['nombre_salon'], MapBuilder::URL_FETCH_METHOD_SOCKETS);
			// 	} catch (MapBuilderException $ex) {
			// 		die($ex->getMessage());
			// 	}

			// 	$map->setCenter($row_Recordset1['lat'],$row_Recordset1['lng']);
			// 	$map->addMarker($row_Recordset1['lat'],$row_Recordset1['lng'],
			// 	array(
			// 	'title' => $row_Recordset1['nombre_salon'],
			// 	'defColor' => '#FA6D6D'
			// 	));

			// 	$map->setMapTypeId(MapBuilder::MAP_TYPE_ID_TERRAIN);
			// 	$map->setSize(310, 450);
			// 	$map->setZoom(15);
			// 	$map->setMapTypeControl(false);
			// 	$map->setPanControl(true);
			// 	$map->setRotateControl(false);
			// 	$map->setScaleControl(false);
			// 	$map->setStreetViewControl(false);
			// 	$map->setZoomControl(false);
			// 	$map->show();
			?>
    			<a href="https://www.google.com.mx/maps/dir//<?php echo $row_Recordset1['lat']; ?>,<?php echo $row_Recordset1['lng']; ?>/@<?php echo $row_Recordset1['lat']; ?>,<?php echo $row_Recordset1['lng']; ?>,15z" target="new" class="btn btn-primary"><i class="fa fa-car"></i> Como llegar</a>


		</div>

	</div>
</section>

<!-- Cotizador -->
<div class="modal fade" id="cotizador" tabindex="-1" role="dialog" aria-labelledby="cotizador" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="cotizador">Cotizar mi evento en el <?php echo $row_Recordset1['nombre_salon']; ?></h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="<?php echo $editFormAction; ?>" class="form-horizontal" id="cotiza_mi_evento" name="cotiza_mi_evento">
					<input type="hidden" class="form-control" name="id_salon" value="<?php echo $row_Recordset1['id_cliente']; ?>">
					<input type="hidden" class="form-control" name="fecha" value="<?php echo date("Y-m-d"); ?>">
					<!-- <div class="form group">
						<div class="col-sm-6"><span class="btn btn-social btn-block btn-facebook" id="btn-social-facebook"><i class="fa fa-facebook"></i> Iniciar sesión con Facebook</span></div>
						<div class="col-sm-6"><span class="btn btn-social btn-block btn-google-plus" id="btn-social-google"><i class="fa fa-google"></i> Iniciar sesión con Google +</span></div>
					</div>
					<div class="clearfix"></div>
					<br> -->

				<div class="form-group">
					<div class="col-sm-6"><input type="text" class="form-control" name="nombre" placeholder="Tu Nombre" required></div>
					<div class="col-sm-6"><input type="email" class="form-control" name="correo" placeholder="Tu Correo" required></div>
				</div>
				<div class="form-group">
					<div class="col-sm-6"><input type="tel" class="form-control" name="telefono" placeholder="Telefono"></div>
					<div class="col-sm-6"><input type="text" class="form-control" id="fecha_evento" name="fecha_evento" placeholder="Fecha del evento" required></div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<h5>Numero de Invitados</h5>
						<input id="numero_invitados" name="numero_invitados">
						<small>minimo de invitados estimados</small>
					</div>
					<div class="col-sm-6">
						<h5>Presupuesto por invitado</h5>
						<input id="presup_invitado" name="presup_invitado">
						<small>Presupuesto máximo por invitado</small>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<textarea name="mensaje" id="mensaje" rows="6" class="form-control" placeholder="Cuentanos mas detalles de tu evento" required></textarea>
					</div>
				</div>

				<div class="form-group">
				<div class="col-sm-offset-8 col-sm-4">
					<button type="submit" class="btn btn-primary pull-right">Solicitar cotización</button>
				</div>
				</div>
				<input type="hidden" name="MM_insert" value="cotiza_mi_evento">
				</form>
			</div>
		</div>
	</div>
</div>


<!-- Compartir -->
<div class="modal fade" id="modal_compartir" tabindex="-1" role="dialog" aria-labelledby="cotizador" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Compartir en Redes Sociales</h4>
			</div>
			<div class="modal-body">
				<?php $url_share = 'http://'.$_SERVER["HTTP_HOST"].''.$_SERVER["PHP_SELF"].'?id='.$row_Recordset1["id_cliente"].''; ?>
				<a href="javascript:void();" class="btn btn-social btn-facebook" title="Compartir en Facebook" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo $url_share;?>','_blank', 'width=600, height=400');"><i class="fa fa-facebook"></i> Facebook</a>
				<a href="javascript:void();" class="btn btn-social btn-twitter" title="Compartir en Twitter" onclick="window.open('http://twitter.com/share?url=<?php echo $url_share;?>&amp;text=Quiero crear mi envento en el <?php echo $row_Recordset1['nombre_salon']; ?>&via=samia','_blank', 'width=600, height=400');"><i class="fa fa-twitter"></i> Twitter</a>
				<a href="javascript:void();" class="btn btn-social btn-google-plus" title="Compartir en Google +" onclick="window.open('https://plus.google.com/share?url=<?php echo $url_share;?>','_blank', 'width=600, height=400');"><i class="fa fa-google"></i> Google +</a>
				<a class="btn btn-social btn-default" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-send"></i>  Por correo</a>
				<div class="collapse" id="collapseExample">
					<form action="" class="form-horizontal form-group" id="share_friend">
						<fieldset>
							<h4 class="modal-title" id="myModalLabel" style="margin:10px 0">Enviar a un amigo</h4>
							<div class="form-group">
								<div class="col-sm-6"><input type="text" class="form-control" required placeholder="Tu Nombre"></div>
								<div class="col-sm-6"><input type="email" class="form-control" required placeholder="Tu Correo"></div>
							</div>
							<div class="form-group">
								<div class="col-sm-6"><input type="text" class="form-control" required placeholder="Nombre de tu amigo"></div>
								<div class="col-sm-6"><input type="email" class="form-control" required placeholder="Correo de tu amigo"></div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<textarea name="" id="" rows="6" class="form-control" required placeholder="Mensaje"></textarea> <br>
									<input type="submit" value="Enviar" class="btn btn-primary pull-right">
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

<!-- Calificar -->
<div class="modal fade" id="modal_calificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Calificar </h4>
			</div>
			<div class="modal-body" id="calificar">
				<div class="row">
					<div class="col-md-7">
						<h5>Su Mensaje</h5>
							<form class="form-horizontal">
								<button class="btn btn-social btn-block btn-facebook"><i class="fa fa-facebook"></i> Iniciar sesión con Facebook</button>
								<button class="btn btn-social btn-block btn-google-plus"><i class="fa fa-google"></i> Iniciar sesión con Google +</button>
								<!-- <div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Nombre</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" id="inputEmail3" placeholder="Su Nombre">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail3" class="col-sm-3 control-label">Correo</label>
									<div class="col-sm-9">
										<input type="email" class="form-control" id="inputEmail3" placeholder="Su Correo">
									</div>
								</div> -->
								<label for="inputEmail3" class="control-label">Mensaje</label>
								<br>
								<div class="form-group">
									<div class="col-sm-12">
										<textarea name="" id="" rows="8" class="form-control"></textarea>
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-7 col-sm-9">
										<button type="submit" class="btn btn-primary">Enviar y Calificar</button>
									</div>
								</div>
							</form>
					</div>
					<div class="col-md-5">
						<h5>Como calificaria</h5>
						<hr>
						<h6>Servicio del personal</h6>
						<input type="hidden" class="rating" data-filled="fa fa-star fa-2x fa-filled" data-empty="fa fa-star-o fa-2x fa-empty"/>
						<h6>Instalaciones</h6>
						<input type="hidden" class="rating" data-filled="fa fa-star fa-2x fa-filled" data-empty="fa fa-star-o fa-2x fa-empty"/>
						<h6>Comida</h6>
						<input type="hidden" class="rating" data-filled="fa fa-star fa-2x fa-filled" data-empty="fa fa-star-o fa-2x fa-empty"/>
						<h6>Luz y Sonido</h6>
						<input type="hidden" class="rating" data-filled="fa fa-star fa-2x fa-filled" data-empty="fa fa-star-o fa-2x fa-empty"/>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>



<footer>
<!-- 		<div id="lvl_1">
			<div class="container">
				Prefooter
			</div>
		</div> -->
		<div id="lvl_2">
			<div class="container">
				<div class="col-md-6">
					<img src="../files/img/logo_footer.png" alt="" id="logo_footer">
				</div>
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
				<div class="col-md-9"> Copyright samia.com © 2014. Todos los derechos reservados </div>
				<div class="col-md-3">iconos redes</div>
			</div>
		</div>
	</footer>


	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="../files/js/jquery.min.js"><\/script>')</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
	<script>window.jQuery || document.write('<script src="../files/js/bootstrap.min.js"><\/script>')</script>
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.min.js"></script>

	<script src="../files/js/libs/bootstrap-rating.min.js"></script>
	<script src="../files/js/libs/jquery.lightbox-0.5.min.js"></script>
	<script src="../files/js/libs/ion.rangeSlider.min.js"></script>
<script async defer
         src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAcyxaHyHR5VXTQnIrBVO4bhPfe5XCLsVk&signed_in=true&callback=initMap">
    </script>

<script>

	$("#cotiza_mi_evento").validate();
	$("#share_friend").validate();

	$("#numero_invitados").ionRangeSlider({
		grid: true,
		min: <? echo $capacidad[0];?>,
		max: <? echo $capacidad[1];?>,
		step: 50,
	});

	$("#presup_invitado").ionRangeSlider({
		grid: true,
		min: <? echo $precios[0];?>,
		max: <? echo $precios[1];?>,
		prefix: "$",
		step: 50,
	});

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


$(function() {
	$('#gallery a').lightBox({
		overlayBgColor: '#FFF',
		overlayOpacity: 0.6,
		imageLoading: '../files/img/ajax-loader.gif',
		imageBtnClose: '../files/img/lightbox-btn-close.gif',
		imageBtnPrev: '../files/img/prev.gif',
		imageBtnNext: '../files/img/next.gif',
		containerResizeSpeed: 350
	});
});


</script>
	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
	<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-XXXXX-X');ga('send','pageview');
	</script>

</body>
</html>
<?php
mysql_free_result($Recordset1);

mysql_free_result($Recordset2);
?>
