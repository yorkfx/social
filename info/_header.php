<?php include("../_vars.php"); ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Social</title>
		<meta name="description" content="">
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
			<a class="navbar-brand" href="#">samia.com.mx</a>
		</div>
		<div id="menutop" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="../">Inicio</a></li>
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
						    echo '<li><a href="../listado.php?estado=', $estado['value'], '">', $estado['label']."</a></li>";
						}
						?>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../login.php">Login</a></li>
				<li><a href="../registro.php">Registro</a></li>
			</ul>
		</div>
	</div>
</nav>
</header>