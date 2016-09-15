<?php include("_header.php"); ?>
<?php include("_vars.php");?>


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
				<h3>Galeria</h3>

				<div class="white" style="padding:20px" id="gallery">
				<h3>Subir imagenes</h3>

					<?php
						require_once('class/class.upload/class.upload.php');

						$la_ruta = "../files/fotos/".$_SESSION['MM_UserGroup']; // Indicar ruta
						// Si no existe la carpeta
						if(!file_exists($la_ruta) && !is_dir($la_ruta)){
							echo'<div class="alert alert-success" role="alert"><strong>Upsss!</strong> Primero tiene que agregar un salón </div>';
							echo '<a href="salon.php" class="btn btn-success btn-block">Agregar Salón</a>';
						}
						// Si ya existe la carpeta
						else{

							echo '<form action="'.$_SERVER['PHP_SELF'].'" name="form" method="POST" enctype="multipart/form-data">';
							echo '<div class="form-group">';
							echo '<label class="col-sm-4 control-label">Seleccionar foto</label>';
							echo '<div class="col-sm-8"><input name="fotografia" type="file" id="imagen" class="form-control" /> <br><div class="messages"></div></div>';
							echo '</div>';
							echo '<input type="submit" class="btn btn-primary pull-right" value="Subir foto" /><br />';
							echo '</form>';
							echo '<div id="loading"> <img src="../files/img/ajax-loader.gif" alt=""> <br>Enviando imagen</div>';

							if (isset($_FILES['fotografia'])) {
								$handle1 = new upload($_FILES['fotografia'], 'es_ES');
								if ($handle1->uploaded) {
									$handle1->file_auto_rename   			= true;
									$handle1->file_safe_name 			= true;
									$handle1->image_convert	 			= 'jpg';
									$handle1->image_resize         		= true;
									$handle1->image_x              		= 980;
									$handle1->image_ratio_y        		= true;
									$handle1->file_max_size 				= '2621440'; // 2.5 MB
									$handle1->allowed 					= array('image/*');
									$handle1->process('../files/fotos/'.$_SESSION["MM_UserGroup"].'');

									if ($handle1->processed) {
										echo '<div class="alert alert-success" role="alert">La fotografía se agrego a su galería</div>';
									} else {
										echo '<div class="alert alert-warning" role="alert"> ' . $handle1->error.'</div>';
									}
								}
							}
						}
					?>
				<br>

					<?php

					$maximoFotos = array(5 => 'F', 15 => 'S', 30 => 'G', 60 => 'P');

					$salon_id = "120";

					// Free - Silver - Gold - Platinum
					$salon_plan = "S";

					$ruta = '../files/fotos/'.$_SESSION["MM_UserGroup"].'/'; // Indicar ruta

					//Cotamos cuantas fotos hay en el directorio
					$ds  = opendir($ruta);
					while (false !== ($nombre_archivo = readdir($ds))) {
						$archivos[] = $nombre_archivo;
					}

					$total_archivos = count($archivos);
					$total = $total_archivos-3;


					if ($salon_plan == 'P') {
						$MaximoImagenes = array_search('P', $maximoFotos); // Plan 60
						if ($total == 60) {
							echo '<div class="alert alert-warning" role="alert"><strong>Limite Maximo!</strong> solo pueden agregar 60 imagenes. Para agregar mas fotos <a href="../planes">cambie su plan</a>';
							echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						}
					}
					elseif ($salon_plan == 'G') {
						$MaximoImagenes = array_search('G', $maximoFotos); // Plan 30
						if ($total == 30) {
							echo '<div class="alert alert-warning" role="alert"><strong>Limite Maximo!</strong> solo pueden agregar 30 imagenes. Para agregar mas fotos <a href="../planes">cambie su plan</a>';
							echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						}
					}
					elseif ($salon_plan == 'S') {
						$MaximoImagenes = array_search('S', $maximoFotos); // Plan 15
						if ($total == 15) {
							echo '<div class="alert alert-warning" role="alert"><strong>Limite Maximo!</strong> solo pueden agregar 15 imagenes. Para agregar mas fotos <a href="../planes">cambie su plan</a>';
							echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						}
					}
					elseif ($salon_plan == 'F' && $salon_plan < 'F') {
						$MaximoImagenes = array_search('F', $maximoFotos); // Plan 5
						if ($total > 5) {
							echo '<div class="alert alert-warning" role="alert"><strong>Limite Maximo!</strong> solo pueden agregar 5 imagenes. Para agregar mas fotos <a href="../planes">cambie su plan</a>';
							echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						}
					}



					$images = glob("$ruta{*.gif,*.jpg,*.png}", GLOB_BRACE);

					foreach($images as $foto){
						echo '<figure>';
						echo '<img src="'.$foto.'" alt="" />';
						echo '<figcaption><a href="'.$foto.'" title="Ver Foto" data-toggle="tooltip" data-placement="bottom"><i class="glyphicon glyphicon-fullscreen"></i></a> <a href="delete.php?fichero='.$foto.'" title="Borrar" data-toggle="tooltip" data-placement="bottom"><i class="glyphicon glyphicon-trash"></i></a></figcaption>';
						echo '</figure>';
					}
					?>

					<br>

					<?php

					// //Cotamos cuantas fotos hay en el directorio
					// $ds  = opendir($ruta);
					// while (false !== ($nombre_archivo = readdir($ds))) {
					// 	$archivos[] = $nombre_archivo;
					// }

					// $total_archivos = count($archivos);
					// $total = $total_archivos-2;
					// echo '<br>'.$total. ' Imagenes en carpeta';
					// echo '<br>'.$maxImg. ' Maximo de imagenes';
					// $resta = $maxImg-$total;
					// echo '<br>'.$resta.' Libres';


				?>

				<br>
				</div>

				<div class="row">
					<!-- <h3>Agregar fotos</h3>
					<form action="">
						<input type="file">
					</form> -->
				</div>


			</div>
		</div>

	</section>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
$(".alert").show().delay(3000).queue(function(n) {
  $(this).fadeOut('slow'); n();
});
$(document).ready(function(){
  $('#loading').hide();
  $('form').submit(function(){
    $('#loading').show();
  });
});
	</script>
	<?php include("_footer.php"); ?>