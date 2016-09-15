<?php include("_vars.php");?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<div class="panel panel-default">
<!-- 		<div class="list-group" role="tab" id="cajaBusqueda">
		 <h4 class="list-group-item active" data-toggle="collapse" data-parent="#accordion" href="#collapseBusqueda" aria-expanded="true" aria-controls="collapseBusqueda">Busqueda</h4>
		</div>

		<div id="collapseBusqueda" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="cajaBusqueda">
			<div class="panel-body">
				<input type="search" class="form-control" placeholder="Busqueda">
			</div>
		</div>

		<div class="list-group" role="tab" id="cajaPrecio">
		 <h4 class="list-group-item active" data-toggle="collapse" data-parent="#accordion" href="#collapsePrecio" aria-expanded="true" aria-controls="collapsePrecio">Precio por persona </h4>
		</div>

		<div id="collapsePrecio" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="cajaPrecio">
			<div class="panel-body">
				<input type="range">
			</div>
		</div>

		<div class="list-group" role="tab" id="cajaCapacidad">
		 <h4 class="list-group-item active" data-toggle="collapse" data-parent="#accordion" href="#collapseCapacidad" aria-expanded="true" aria-controls="collapseCapacidad">Capacidad de invitados</h4>
		</div>

		<div id="collapseCapacidad" class="panel-collapse collapse in" role="tabpane2" aria-labelledby="cajaCapacidad">
			<div class="panel-body">
				<input type="range">
			</div>
		</div> -->

		<!--<div class="list-group" role="tab" id="cajaServicios">
		 <h4 class="list-group-item active" data-toggle="collapse" data-parent="#accordion" href="#collapseServicios" aria-expanded="true" aria-controls="collapseServicios">Servicios que ofrece </h4>
		</div>
		<div id="collapseServicios" class="panel-collapse collapse" role="tabpane2" aria-labelledby="cajaServicios">
			<div class="list-group">
			<?php
				foreach ( $ServiciosSalon as $servicios ) {
				    echo '<label for="'.$servicios['value'].'"><input type="checkbox" value="'.$servicios['value'].'" id="'.$servicios['value'].'">'.$servicios['label'].'</label>';
				}
			?>
			</div>
		</div> -->

		<div class="list-group" role="tab" id="cajaTipo">
		 <h4 class="list-group-item active" data-toggle="collapse" data-parent="#accordion" href="#collapseTipo" aria-expanded="true" aria-controls="collapseTipo">Tipo de Salon</h4>
		</div>

		<div id="collapseTipo" class="panel-collapse collapse in" role="tabpane2" aria-labelledby="cajaTipo">
			<div class="list-group">
				<?php
				foreach ( $TipoSalon as $tipo ) {
				    echo '<a href="listado.php?tipo=', $tipo['value'], '" class="list-group-item">', $tipo['label']."</a>";
				}
				?>
			</div>
		</div>

		<div class="list-group" role="tab" id="cajaEstados">
		 <h4 class="list-group-item active" data-toggle="collapse" data-parent="#accordion" href="#collapseEstados" aria-expanded="true" aria-controls="collapseEstados">Estados</h4>
		</div>

		<div id="collapseEstados" class="panel-collapse collapse in" role="tabpane2" aria-labelledby="cajaEstados">
			<div class="list-group">
				<?php
				foreach ( $EstadosDeMexico as $estado ) {
				    echo '<a href="listado.php?estado=', $estado['value'], '" class="list-group-item">', $estado['label']."</a>";
				}
				?>
			</div>
		</div>

	</div>
</div>

