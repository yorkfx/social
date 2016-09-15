<?php include("_header.php"); ?>
<?php include("_vars.php"); ?>
	<section class="row">
		<div class="container">
			<div class="col-md-3" id="barra-lateral">
				<ul class="list-group">
					<li class="list-group-item"><a href="salon.php">Salon</a></li>
					<li class="list-group-item"><a href="galeria.php">Galeria</a></li>
					<li class="list-group-item"><a href="paquetes.php">Paquetes</a></li>
					<li class="list-group-item"><a href="cotizaciones.php">Cotizaciones</a> <span class="badge">3</span></li>
					<li class="list-group-item"><a href="facturas.php">Facturas</a></li>
				</ul>
			</div>
			<div class="col-md-9">
				<h3>Cotización #1313</h3>
        Hola <?php echo $_SESSION['MM_UserGroup']; ?>


			</div>
		</div>

	</section>

	<?php include("_footer.php"); ?>