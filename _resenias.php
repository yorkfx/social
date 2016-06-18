 <p lang="fr">Ceci est un paragraphe.</p>


<div class="media" id="resenias">
	<a class="media-left media-middle" href="#">
		<img alt="" src="http://placehold.it/80x80/0eafff/ffffff.png" />
	</a>
	<div class="media-body">
		<h4 class="media-heading">Nombre</h4>
		<small>Mes Dia Año</small>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae provident quasi odit tenetur facilis fugiat cupiditate impedit! Vitae nostrum et, nam atque tempore molestiae officia similique. Nihil ea distinctio aliquid.</p>
	</div>
</div>
<div class="media">
	<a class="media-left media-middle" href="#">
		<img alt="" src="http://placehold.it/80x80/0eafff/ffffff.png" />
	</a>
	<div class="media-body">
		<h4 class="media-heading">Nombre</h4>
		<small>Mes Dia Año</small>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae provident quasi odit tenetur facilis fugiat cupiditate impedit! Vitae nostrum et, nam atque tempore molestiae officia similique. Nihil ea distinctio aliquid.</p>
	</div>
</div>
<br>


<a href="#" class="btn btn-block">Mas comentarios</a>
<button type="button" class="btn btn-default btn-block" data-toggle="collapse" data-target="#demo" aria-expanded="true" aria-controls="demo">Deja tu Comentario</button>
<br>
<div id="demo" class="collapse">
	If
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Deje su comentario</h4></div>
		<div class="panel-body">
			<form role="form">
				<input type="hidden" value="<?php echo date("d/m/Y")?>">
			<div class="form-group">
				<label for="nombre" class="col-sm-3 control-label">Nombre</label>
				<div class="col-sm-9">
					<input type="email" class="form-control" id="nombre" placeholder="Nombre">
				</div>
				<br>
				<br>
				<label for="correo" class="col-sm-3 control-label">Correo</label>
				<div class="col-sm-9">
					<input type="email" class="form-control" id="correo" placeholder="Correo">
				</div>
				<br>
				<br>
				<label for="comentario" class="col-sm-3 control-label">Correo</label>
				<div class="col-sm-9">
					<textarea name="comentario" id="comentario" rows="7" class="form-control"></textarea>
				</div>
				<br>
				<br>
			</div>

			<button type="submit" class="btn btn-default pull-right">Enviar comentario</button>
			</form>
		</div>
	</div>
	Else
	Login facebok


</div>
