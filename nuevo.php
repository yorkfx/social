	<?php include("_header.php"); ?>

	<section class="row">
		<h4 class="subheader">Agregar Salon de fiestas</h4>
			<div class="col-md-8">
				<form action="" role="form">
					<fieldset>
						<legend>Datos generales</legend>
						<div class="form-group">
							<label for="inputEmail3" class="col-sm-4 control-label">Nombre del Salon</label>
							<div class="col-sm-8">
								<input type="email" class="form-control" id="inputEmail3" placeholder="Email">
							</div>
						</div>

						<div class="form-group">
							<label for="tel1" class="col-sm-4 control-label">Telefono(s)</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="tel1" placeholder="5555-5555">
							</div>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="tel2" placeholder="5555-5555">
							</div>
						</div>

						<div class="form-group">
							<label for="correo" class="col-sm-4 control-label">Correo</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="correo" placeholder="correo@electronico.com">
							</div>
						</div>

						<div class="form-group">
							<label for="descripcion_salon" class="col-sm-4 control-label">Descripción del salon</label>
							<div class="col-sm-8">
								<textarea name="descripcion_salon" id="descripcion_salon" maxlength="500" rows="10" class="form-control" required></textarea>
							</div>
						</div>

					</fieldset>
					<fieldset>
						<legend>Tipo de salon</legend>
						<div class="row">
							<?php
							foreach ( $TipoSalon as $tipo ) {
								echo '<div class="col-md-2"><input type="radio" name="tipo_salon" value="'.$tipo['value'].'" id="'.$tipo['value'].'"> <label for="'.$tipo['value'].'"> '.$tipo['label'].'</label></div>';
							}
							?>

						</div>
					</fieldset>
					<fieldset>
						<legend>Capacidad y precios</legend>

						<div class="row">
							<div class="col-md-12">
							<legend>Capacidad minima y maxima de personas <span data-tooltip class="tip-top" title="Cual es la capacidad minima y maxima de su salon">?</span></legend>
								<br>
								<input type="text" id="capacidad" name="capacidad" value="50;5000">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-md-12">
							<legend>Cual es el precio minimo y maximo por persona <span data-tooltip class="tip-top" title="El precio minimo y maximo por persona">?</span></legend>
								<br>
								<input type="text" id="rango_precios" name="rango_precios" value="100;1500">
							</div>
						</div>
					</fieldset>

					<fieldset>
						<legend>Ubicación</legend>

						<div class="form-group">
							<label for="estado" class="col-sm-2 control-label">Estado</label>
							<div class="col-sm-4">
								<select name="estado" id="estado" class="form-control">
									<option value="">Estado</option>
								</select>
							</div>

							<label for="municipio" class="col-sm-2 control-label">Del. Municipio</label>
							<div class="col-sm-4">
								<select name="municipio" id="municipio" class="form-control">
									<option value="">Municipio</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<label for="colonia" class="col-sm-2 control-label">Colonia</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>
							<label for="estado" class="col-sm-2 control-label">Calle</label>
							<div class="col-sm-4">
								<input type="text" class="form-control">
							</div>
							<label for="numero" class="col-sm-2 control-label">Numero</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="numero">
							</div>
							<label for="postalcode" class="col-sm-2 control-label">Codigo Postal</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" id="postalcode">
							</div>
						</div>

					</fieldset>
					<fieldset class="form-group">
						<legend>Caracteristicas</legend>
						<div data-alert class="alert alert-info">
							De la siguiente lista marque las caracteristicas con las que cuenta el salón
						</div>
						<div id="lst_caracteristicas">
						<?php
							foreach ( $ServiciosSalon as $servicios ) {
							    echo '<label for="'.$servicios['value'].'"><input type="checkbox" value="'.$servicios['value'].'" id="'.$servicios['value'].'">'.$servicios['label'].'</label>';
							}
						?>
						</div>
					</fieldset>

				</form>
			</div>
			<div class="col-md-4">
				Sub
			</div>
	</section>
	<?php include("_footer.php"); ?>

