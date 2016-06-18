<?php include("_header.php"); ?>
<section id="salon-header" style="background-image: url(files/fotos/tour.jpg);">
	<div class="container">
		<div class="col-md-9">
			<div class="clear-bottom">
				<h2>Nombre del Salon</h2>
				<address><a href="#">Calle Numero <br> Colonia Municipio</a></address>
				<h3>Jardin</h3>
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
				<a href="#" class="btn-cotiza" data-toggle="modal" data-target="#modal_cotizar"> Cotiza mi evento</a>
			</div>
		</div>
	</div>
</section>
<br>

<section class="container" id="salon-details">
	<div class="col-md-8">
		<div class="white">
			<h4><i class="glyphicon glyphicon-asterisk"></i> Detalles</h4>
			<p>A bungalow is a type of building. Across the world, the meaning of the word bungalow varies. Common features of many bungalows include verandas and being low-rise. In Australia, the California bungalow was popular after the First World War. In North America and the United Kingdom a bungalow today is a residential building, normally detached, which is either single-story or has a second story built into a sloping roof, usually with dormer windows (one-and-a-half stories).</p>
		</div>

		<div class="white">
			<h4><i class="glyphicon glyphicon-leaf"></i> Servicios</h4>
			<?php
				echo '<ul class="lst_servicios">';
				foreach ($ServiciosSalon as $servicios) {
					echo '<li><i class="glyphicon glyphicon-pushpin"></i> '.$servicios['label'].'</li>';
				}
				echo '</ul>';
			?>
		</div>

		<div class="white" id="video">
			<h4><i class="glyphicon glyphicon-video"></i> Video</h4>
			<div class="embed-responsive embed-responsive-16by9">
				<iframe src="//player.vimeo.com/video/79166695" class="embed-responsive-item" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div>

		</div>

		<div class="white">
			<h4><i class="glyphicon glyphicon-camera"></i> Galeria</h4>
			<div class="row" id="gallery" style="padding:10px">
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_1.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_1.jpg" /></a></div>
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_2.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_2.jpg" /></a></div>
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_3.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_3.jpg" /></a></div>
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_4.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_4.jpg" /></a></div>
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_5.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_5.jpg" /></a></div>
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_6.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_6.jpg" /></a></div>
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_7.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_7.jpg" /></a></div>
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_8.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_8.jpg" /></a></div>
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_9.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_9.jpg" /></a></div>
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_10.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_10.jpg" /></a></div>
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_11.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_11.jpg" /></a></div>
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_12.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_12.jpg" /></a></div>
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_13.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_13.jpg" /></a></div>
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_14.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_14.jpg" /></a></div>
					<div class="col-xs-6 col-md-4 col-lg-4"><a href="files/fotos/foto_15.jpg" class="thumbnail"><img class="img-responsive" alt="" src="files/fotos/foto_15.jpg" /></a></div>
			</div>
			<div class="col-md-4 col-md-push-4">
					<a href="javascript:void(0)" class="btn btn-default btn-block" id="show_more_images"><span class="glyphicon glyphicon-chevron-down"></span> mas fotografias</a>
			</div>


		</div>
	</div>
	<div class="col-md-4">

		<div class="white">
			<h4><i class="glyphicon glyphicon-user"></i> Capacidad</h4>
			<p>50 - 300 invitados</p>
		</div>

		<div class="white">
			<h4><i class="glyphicon glyphicon-credit-card"></i> Pago</h4>
			<p>Efectivo, Tarjeta y Transferencia</p>
		</div>


		<div class="white">
			<h4><i class="glyphicon glyphicon-time"></i> Horarios</h4>
			<p>Martes a Domingo de 12:00pm a 6:00 pm</p>
		</div>

		<div class="white">
			<h4><i class="glyphicon glyphicon-gift"></i> Paquetes</h4>
			<div class="paquetes" id="paquete_1"><i class="glyphicon glyphicon-gift"></i> <a href="#" data-toggle="modal" data-target="#ver_paquete_1">Paquete 1 <strong>$100 p/p</strong> <small>minimo 300 personas</small></a> </div>
			<div class="paquetes" id="paquete_2"><i class="glyphicon glyphicon-gift"></i> <a href="#" data-toggle="modal" data-target="#ver_paquete_2">Paquete 2 <strong>$200 p/p</strong> <small>minimo 200 personas</small></a> </div>
			<div class="paquetes" id="paquete_3"><i class="glyphicon glyphicon-gift"></i> <a href="#" data-toggle="modal" data-target="#ver_paquete_3">Paquete 3 <strong>$300 p/p</strong> <small>minimo 100 personas</small></a> </div>
			<a href="paquetes.php" class="btn btn-link btn-block">Ver todos los paquetes</a>
			<br>
		</div>

		<div class="white">
			<h4><i class="glyphicon glyphicon-home"></i> Ubicación</h4>
			<div id="mapa_ubicacion">
				<a href="#"><img alt="" src="files/img/map.jpg" class="img-responsive" /></a>
				<span><a href="#"><i class="fa fa-car"></i> Como llegar</a></span>
			</div>

		</div>

	</div>
</section>

<!-- Cotizador -->
<div class="modal fade" id="modal_cotizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Cotizar mi evento en el Salon Chrisoly </h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal">
					<div class="form group">
						<div class="col-sm-6"><span class="btn btn-social btn-block btn-facebook" id="btn-social-facebook"><i class="fa fa-facebook"></i> Iniciar sesión con Facebook</span></div>
						<div class="col-sm-6"><span class="btn btn-social btn-block btn-google-plus" id="btn-social-google"><i class="fa fa-google"></i> Iniciar sesión con Google +</span></div>
					</div>
					<div class="clearfix"></div>
					<br>
				<div class="form-group">
					<div class="col-sm-6"><input type="text" class="form-control" placeholder="Tu Nombre"></div>
					<div class="col-sm-6"><input type="email" class="form-control" placeholder="Tu Correo"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-6"><input type="tel" class="form-control" placeholder="Telefono"></div>
					<div class="col-sm-6"><input type="date" class="form-control" placeholder="Fecha del evento"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-6">
						<h5>Numero de Invitados</h5>
						<input id="numero_invitados" name="numero_invitados" data-slider-id="ex1Slider" type="text" data-slider-min="50" data-slider-max="850" data-slider-step="50" data-slider-value="100">
						<small>minimo de invitados estimados</small>
					</div>
					<div class="col-sm-6">
						<h5>Presupuesto por invitado</h5>
						<input id="numero_invitados" name="numero_invitados" data-slider-id="ex1Slider" type="text" data-slider-min="100" data-slider-max="900" data-slider-step="50" data-slider-value="100">
						<small>Presupuesto máximo por invitado</small>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<textarea name="" id="" rows="6" class="form-control" placeholder="Cuentanos mas detalles de tu evento"></textarea>
					</div>
				</div>

				<div class="form-group">
				<div class="col-sm-offset-8 col-sm-4">
					<button type="submit" class="btn btn-primary pull-right">Solicitar cotización</button>
				</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>


<!-- Compartir -->
<div class="modal fade" id="modal_compartir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Compartir en Redes Sociales</h4>
			</div>
			<div class="modal-body">
				<a href="#" class="btn btn-social btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
				<a href="#" class="btn btn-social btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
				<a href="#" class="btn btn-social btn-google-plus"><i class="fa fa-google"></i> Google +</a>
				<a class="btn btn-social btn-default" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-send"></i>  Por correo</a>
				<div class="collapse" id="collapseExample">
					<form action="" class="form-horizontal form-group">
						<fieldset>
							<h5>Enviar a un amigo</h5>
							<div class="form-group">
								<div class="col-sm-6"><input type="text" class="form-control" placeholder="Tu Nombre"></div>
								<div class="col-sm-6"><input type="text" class="form-control" placeholder="Tu Correo"></div>
							</div>
							<div class="form-group">
								<div class="col-sm-6"><input type="text" class="form-control" placeholder="Nombre de tu amigo"></div>
								<div class="col-sm-6"><input type="text" class="form-control" placeholder="Correo de tu amigo"></div>
							</div>
							<div class="form-group">
								<div class="col-sm-12"><textarea name="" id="" rows="4" class="form-control" placeholder="Mensaje"></textarea></div>
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



<!-- Paquete 1 -->
<div class="modal fade" id="ver_paquete_1" tabindex="-1" role="dialog" aria-labelledby="titutlo" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="titutlo">Paquete 1</h4>
		</div>
			<div class="modal-body">
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel">
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
								<div class="row">
									<div class="col-md-4"><h4>Detalles:</h4></div>
									<div class="col-md-8"><a href="#" class="btn btn-default btn-sm pull-right"> <i class="fa fa-print"></i> imprimir</a> <h4>Incluye:</h4> </div>
								</div>
								<div class="detaills">
									<div>
										<small>Precio Por Persona.</small>
										<h3>$100</h3>
									</div>
									<div>
										<small>Minimo de personas.</small>
										<h3>100</h3>
									</div>
									<div>
										<small>Dias que aplica.</small>
										<h3>Jueves y Domingos</h3>
									</div>
								</div>
								<div class="list_services">
									<ul>
										<li>Servicio 1</li>
										<li>Servicio 2</li>
										<li>Servicio 3</li>
										<li>Servicio 4</li>
										<li>Servicio 5</li>
										<li>Servicio 6</li>
										<li>Servicio 7</li>
										<li>Servicio 8</li>
										<li>Servicio 9</li>
										<li>Servicio 10</li>
										<li>Servicio 11</li>
										<li>Servicio 12</li>
										<li>Servicio 13</li>
										<li>Servicio 14</li>
										<li>Servicio 15</li>
										<li>Servicio 16</li>
										<li>Servicio 17</li>
										<li>Servicio 18</li>
										<li>Servicio 19</li>
										<li>Servicio 20</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="panel">
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
								formulario informes

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">Pedir Inforfmes</button>
			</div>
		</div>
	</div>
</div>
<?php include("_footer.php"); ?>