	<?php include("_vars.php"); ?>
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
				<h3>Paquetes</h3>
				<div class="white" style="padding:10px">

				<div class="col-md-4"> <!-- required for floating -->
					<ul class="nav nav-tabs tabs-left">
						<li class="active"><a href="#paquete_1" data-toggle="tab">Paquete 1</a></li>
						<li><a href="#paquete_2" data-toggle="tab">Paquete 2</a></li>
						<li><a href="#paquete_3" data-toggle="tab">Paquete 3</a></li>
						<li><a href="#paquete_4" data-toggle="tab">Paquete 4</a></li>
					</ul>
				</div>
				<div class="col-md-8">
				<div class="tab-content">
					<div class="tab-pane active" id="paquete_1">
						<h3>Paquete 1</h3>
						<table class="table">
							<tr>
								<th>Dias</th>
								<th>Precio por persona</th>
								<th>Minimo Personas</th>
							</tr>
							<tr>
								<td>Jueves y Domingos</td>
								<td>$400</td>
								<td>200</td>
							</tr>
						</table>
						<h6>Incluye:</h6>
						<ul>
							<li>Comida 3 tiempos</li>
							<li>Vallet parking</li>
							<li>Inflable 3 hrs.</li>
							<li>Lorem 4</li>
							<li>Lorem 5</li>
							<li>Lorem 6</li>
							<li>Lorem 7</li>
							<li>Lorem 8</li>
							<li>Lorem 9</li>
							<li>Lorem 9</li>
							<li>Lorem 9</li>
							<li>Lorem 10</li>
						</ul>
						<br>
						<div class="col-md-6 col-md-offset-7">
							<a href="#" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
						<a href="#" class="btn btn-warning"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
						</div>
					</div>
					<div class="tab-pane" id="paquete_2">
						<h3>Paquete 2</h3>
						ul>li{Lorem $}*10
					</div>
					<div class="tab-pane" id="paquete_3">
						<h3>Paquete 3</h3>
						ul>li{Lorem $}*10
					</div>
					<div class="tab-pane" id="paquete_4">
						<h3>Paquete 4</h3>
						ul>li{Lorem $}*10
					</div>
				</div>
				</div>


				</div>
				<h3>Agregar Paquete</h3>
				<div class="white" style="padding:20px">
					<form action="" class="form-horizontal">
						<div class="alert alert-info" role="alert"><strong>Limitado!</strong> Usted solo puede agregar 2 paquetes. Le recomendamos <a href="../planes.php" class="alert-link">cambiar de plan</a> </div>
						<div class="alert alert-warning" role="alert"><strong>Algo falta!</strong> Revise que todos los datos este completados.</div>
						<div class="alert alert-success" role="alert"><strong>Bien hecho!</strong> Su paquete se agrego su paquete correctamente.</div>

						<div class="form-group">
							<label for="" class="col-sm-3 col-md-offset-1 control-label">Nombre Paquete</label>
							<div class="col-sm-7"><input type="text" class="form-control"></div>
						</div>
<!-- 						<a href="#" class="btn btn-default btn-sm pull-right" style="margin:0 64px 10px; display: inline-block;"><i class="fa fa-calendar"></i> Programar fecha</a><br> -->
						<div class="form-group">
							<label class="col-sm-4 control-label">Tipo evento</label>
							<div class="col-sm-8">
								<div class="row">
								<?php
								foreach ( $TipoEvento as $tipo ) {
									echo '<div class="col-md-4"><input type="radio" name="tipo_evento" value="'.$tipo['value'].'" id="'.$tipo['value'].'"> <label for="'.$tipo['value'].'"> '.$tipo['label'].'</label></div>';
								}
								?>

								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="" class="col-sm-3 col-md-offset-1 control-label">Que dias</label>
							<div class="col-sm-7"><input type="text" class="form-control" placeholder="Jueves y Domingos"></div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-3 col-md-offset-1 control-label">Precio por persona</label>
							<div class="col-sm-2"><input type="text" class="form-control" placeholder="$200"></div>

							<label for="" class="col-sm-3 control-label">Minimo de Personas</label>
							<div class="col-sm-2"><input type="text" class="form-control" placeholder="50"></div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-4 control-label">Que incluye el paquete</label>
							<div class="col-sm-7">
								<textarea  rows="10" class="form-control tags" name="opciones_paquete" id="opciones_paquete"> </textarea>
								<small class="help-block">Agrege con comas lo que incluye el paquete. Ejem: <em> Cocina, Inflable, etc.</em></small>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-6 col-sm-4">
								<button type="submit" class="btn btn-primary">Agregar Paquete</button>
							</div>
						</div>


					</form>
				</div>

			</div>
		</div>
	</section>

	<?php include("_footer.php"); ?>