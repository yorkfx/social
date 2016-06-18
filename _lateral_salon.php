<div id="panelsalon" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ul>
    <a href="#" data-target="#panelsalon" data-slide-to="0">General</a>
    <a href="#" data-target="#panelsalon" data-slide-to="1">Ubicacion</a>
    <a href="#" data-target="#panelsalon" data-slide-to="2">Servicios</a>
  </ul>

  <!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox">
		<!-- Inicia Panel Detalles -->
		<div class="item active">

			<div class="list-group">
				<div class="list-group-item">
					<a href="#" class="list-group-item-plus" data-toggle="modal" data-target="#paquetes"><em class="glyphicon glyphicon-star"></em> Mas Paquetes</a>
					<h4 class="list-group-item-heading">Paquetes</h4>
					<p class="list-group-item-text"><em class="glyphicon glyphicon-glass"></em> Desde $99 por persona</p>
				</div>
				<div class="list-group-item">
					<h4 class="list-group-item-heading">Capacidad</h4>
					<p class="list-group-item-text"><em class="glyphicon glyphicon-user"></em>  50 - 300 invitados</p>
				</div>
				<div class="list-group-item">
					<h4 class="list-group-item-heading">Horario de atención</h4>
					<p class="list-group-item-text"><em class="glyphicon glyphicon-time"></em> Martes a Domingo de 12:00pm a 6:00 pm</p>
				</div>
				<div class="list-group-item">
					<h4 class="list-group-item-heading">Valoración de los clientes</h4>
					<p class="list-group-item-text"><em class="glyphicon glyphicon-star"></em> 9 <a href="#resenias" class="btn btn-xs">comentarios de los clientes</a></p>

				</div>
				<div class="list-group-item">
					<h4 class="list-group-item-heading"> Sitio web</h4>
					<p class="list-group-item-text"><em class="glyphicon glyphicon-globe"></em> <a href="#">wwww.sitioweb.com <em class="glyphicon glyphicon-new-window"></em></a></p>
				</div>
				<div class="list-group-item">
					<h4 class="list-group-item-heading">Acepta pagos</h4>
					<p class="list-group-item-text"><em class="glyphicon glyphicon-credit-card"></em> Efectivo, Tarjeta y Transferencia Interbancaria</p>
				</div>
				<div class="list-group-item">
					<h4 class="list-group-item-heading">Compartir</h4>
					<p class="list-group-item-text"><em class="glyphicon glyphicon-share"></em>  <a href="#">Facebook</a> - <a href="#">Twitter</a> - <a href="#">Google +</a></p>
				</div>
			</div>


		</div>
		<!-- Inicia Panel Detalles -->

		<!-- Inicia Panel Contacto -->
		<div class="item">
			<a href="#"><img src="http://maps.googleapis.com/maps/api/staticmap?center=-15.800513,-47.91378&zoom=11&size=360x430&sensor=false"></a>
			<a href="#" class="btn btn-primary btn-block btn-lg" style="margin:5px 0">¿Como llegar?</a>
		</div>
		<!-- Inicia Panel Contacto -->

		<!-- Inicia Panel Ubicacion -->
		<div class="item">
			<?php
				echo '<ul class="lst_servicios">';
				foreach ($ServiciosSalon as $servicios) {
					echo '<li><i class="glyphicon glyphicon-pushpin"></i> '.$servicios['label'].'</li>';
				}
				echo '</ul>';
			?>
		</div>
		<!-- Inicia Panel Ubicacion -->
	</div>
  </div>
</div>

<!-- Modal Cotizador -->
			<form action="" class="form-horizontal">
						<input type="text" class="form-control" id="su_nombre"  required placeholder="Nombre *">
						<input type="email" class="form-control" id="su_correo"  required placeholder="Correo electronico *">
						<input type="tel" class="form-control" id="su_telefono" placeholder="Teléfono">
						<input list="celebraciones" placeholder="Tipo de evento *" id="tipo_evento" required>
						<datalist id="celebraciones">
							<option value="XV Años"></option>
							<option value="Boda"></option>
							<option value="Bautizo"></option>
							<option value="Cumpleaños"></option>
							<option value="Reunion"></option>
							<option value="Junta"></option>
							<option value="Congreso"></option>
							<option value="Negocios"></option>
							<option value="Otro"></option>
						</datalist>
					<div class="row">
						<div class="col-xs-6">
							<input type="text" min="100" max="300" step="10" class="form-control" id="datepicker" required placeholder="Fecha del evento *">
						</div>
						<div class="col-xs-6">
							<input type="number" min="100" max="300" step="10" class="form-control" id="numasistentes" required placeholder="Numero de Invitados *">
						</div>
					</div>
					<textarea name="detalles_evento" id="detalles_evento" rows="7" class="form-control" required placeholder="Cuentanos mas detalles sobre tu evento"></textarea>
					<span class="help-block">Los campos marcados con * son obligatorios.</span>
					<input type="submit" value="Solicitar una cotización" class="btn btn-primary btn-block btn-lg" style="margin:8px 0">
			</form>

<!-- Modal Paquetes-->
<div class="modal fade" id="paquetes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Paquetes</h4>
      </div>
      <div class="row">
		<div class="col-xs-3"> <!-- required for floating -->
		    <!-- Nav tabs -->
		    <ul class="nav nav-tabs tabs-left">
		      <li class="active"><a href="#paquete1" data-toggle="tab">Paquete 1</a></li>
		      <li><a href="#paquete2" data-toggle="tab">Paquete 2</a></li>
		      <li><a href="#paquete3" data-toggle="tab">Paquete 3</a></li>
		      <li><a href="#paquete4" data-toggle="tab">Paquete 4</a></li>
		      <li><a href="#paquete4" data-toggle="tab">Paquete 5</a></li>
		      <li><a href="#paquete4" data-toggle="tab">Paquete 6</a></li>
		      <li><a href="#paquete4" data-toggle="tab">Paquete 7</a></li>
		    </ul>
		</div>

		<div class="col-xs-9">
		    <!-- Tab panes -->
		    <div class="tab-content">
		      <div class="tab-pane active" id="paquete1">
		      	<div class="row">
		      		<div class="col-md-4"><span>5 Hrs.</span> de servicio del salon </div>
		      		<div class="col-md-4"><span>300</span> mínimo de personas</div>
		      		<div class="col-md-4"><span>$300</span> por asistente (incluye niños)</div>
		      	</div>
		      	<ul>
					<li>1/2 Hrs de Recepción</li>
					<li>1/2 Hrs. para Desalojar</li>
					<li>Luz y sonido</li>
					<li>Mesas, sillas, Manteles</li>
					<li>Personal de Recepcion</li>
					<li>Seguridad para Autos</li>
					<li>Personal en la Barra de Servicio</li>
					<li>Meseros y Capitan</li>
					<li>Cena a Tres Tiempos</li>
					<li>Maestro de Ceremonias</li>
					<li>Refresco y hielo el Necesario</li>
					<li>Show carnaval</li>
					<li>Vajilla y Cristaleria</li>
					<li>Montaje Frances</li>
					<li>Arreglo de Flores </li>
					<li>Arreglo de globos</li>
					<li>Pantallas Gigantes</li>
					<li>Coordinadora de Evento</li>
					<li>Cafe para el Pastel</li>
					<li>Area de Juegos infantiles</li>
		      	</ul>
		      	<div class="clearfix"></div>
		      	<a href="#" data-toggle="modal" data-target="#preguntar" class="btn btn-default btn-block" style="margin:4px; width: 97%; padding: 10px;">Preguntar por este paquete</a>
		      </div>
		      <div class="tab-pane" id="paquete2">Detalles Paquete 2</div>
		      <div class="tab-pane" id="paquete3">Detalles Paquete 3</div>
		      <div class="tab-pane" id="paquete4">Detalles Paquete 4</div>
		      <div class="tab-pane" id="paquete5">Detalles Paquete 5</div>
		      <div class="tab-pane" id="paquete6">Detalles Paquete 6</div>
		      <div class="tab-pane" id="paquete7">Detalles Paquete 7</div>
		    </div>
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="preguntar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Preguntar por este paquete</h4>
			</div>
			<div class="modal-body">
				asdasda
			</div>
			<div class="modal-footer">
				 <button type="button" class="btn btn-primary">Enviar Pregunta</button>
			</div>
		</div>
	</div>
</div>