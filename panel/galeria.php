	<?php include("_header.php"); ?>

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

					<?php
					$maximoFotos = array(5 => 'F', 15 => 'S', 30 => 'G', 60 => 'P');

					$salon_id = "120";

					// Free - Silver - Gold - Platinum
					$salon_plan = "S";

					$ruta = '../files/fotos/'.$salon_id.'/'; // Indicar ruta

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
					elseif ($salon_plan == 'F') {
						$MaximoImagenes = array_search('F', $maximoFotos); // Plan 5
						if ($total == 5) {
							echo '<div class="alert alert-warning" role="alert"><strong>Limite Maximo!</strong> solo pueden agregar 5 imagenes. Para agregar mas fotos <a href="../planes">cambie su plan</a>';
							echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
						}
					}



					$images = glob("$ruta{*.gif,*.jpg,*.png}", GLOB_BRACE);

					foreach($images as $foto){
						echo '<figure>';
						echo '<img src="'.$foto.'"/>';
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

	<?php include("_footer.php"); ?>