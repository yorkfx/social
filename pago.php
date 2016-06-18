<?php include("_header.php"); ?>
<?php include("sdk/openpay/Openpay.php"); ?>

<?php

if ($_GET["plan"] == "S") {
	$planNombre = "Silver";
	$idPlanOpenpay = "axapgwwolofnckfui2wx";
	$idButtonPaypal = "RYUDURG2MC7EN";
	$planPrecio = "$99";
	$plan_incluye = array(
		array('fotos' => '18', 'paquetes' => '5', 'cotizador' => 'No', 'video' => 'si	', 'listado' => 'No'),
	);
}
elseif ($_GET["plan"] == "G") {
	$planNombre = "Gold";
	$idPlanOpenpay = "axapgwwolofnckfui2wx";
	$idButtonPaypal = "BVHJNTLARDZ7C";
	$planPrecio = "$199";
	$plan_incluye = array(
		array('fotos' => '30', 'paquetes' => '10', 'cotizador' => 'si	', 'video' => 'si	', 'listado' => 'si	'),
	);
}
elseif ($_GET["plan"] == "P") {
	$planNombre = "Platinum";
	$idPlanOpenpay = "axapgwwolofnckfui2wx";
	$idButtonPaypal = "DMLJJDWUZ49X8";
	$planPrecio = "$299";
	$plan_incluye = array(
		array('fotos' => '60', 'paquetes' => '20', 'cotizador' => 'si	', 'video' => 'si	', 'listado' => 'si	'),
	);
}

?>
<div class="container">
	<div class="col-md-9">
	<div class="panel-group" id="panel_pago" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
			<h3 data-toggle="collapse" data-parent="#panel_pago" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><span class="pull-right"><?= "Plan - ".$planNombre ?></span><i class="fa fa-credit-card"></i>  Pago con Tarjeta</h3>
		</div>
		<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			<form action="" class=""style="padding:20px" id="processCard" name="processCard">
				<div class="row" >
					<div class="col-xs-4">
						<h5>Tarjetas de crédito</h5>
						<img src="files/img/payment/tarjetas.png" alt="">
					</div>
					<div class="col-xs-8">
						<h5>Tarjetas de débito</h5>
						<img src="files/img/payment/bancos.png" alt="">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6">
						<div class="form-group">
							<label for="holder_name">Nombre del Titular</label>
							<input type="text" data-openpay-card="holder_name" id="holder_name" class="form-control"  placeholder="Como aparece en la tarjeta">
						</div>
						<div class="form-group">
							<label>Fecha de Expiración</label>
							<div class="row">
								<div class="col-xs-4"><input type="text" class="form-control" data-openpay-card="expiration_month" placeholder="Mes"></div>
								<div class="col-xs-4"><input type="text" class="form-control" data-openpay-card="expiration_year" placeholder="Año"></div>
							</div>
						</div>
					</div>
					<div class="col-xs-6">
						<div class="form-group">
							<label for="card_number">Número de tarjeta</label>
							<input type="text" data-openpay-card="card_number" id="card_number" name="card_number" class="form-control" id="exampleInputEmail1">
						</div>
						<div class="form-group">
							<label for="cvv2">Código de seguridad</label>
							<div class="row">
								<div class="col-xs-5"><input type="text" data-openpay-card="cvv2" id="cvv2" class="form-control" placeholder="3 Digitos"></div>
								<div class="col-xs-4">
									<a href="#" data-toggle="modal" data-target="#info_cvc"><img src="files/img/payment/cvc.png" alt=""></a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-md-offset-4">
							<small>Transacciones realizadas vía:</small>
							<img src="files/img/payment/logo_openpay.png" alt="">
						</div>
						<div class="col-xs-1">
							<img src="files/img/payment/seguridad.png" alt="" style="margin:0 auto; display:block">
						</div>
						<div class="col-xs-4">
							<small>Tus pagos se realizan de forma segura con encriptación de 256 bits.</small>
						</div>
					</div>
				</div>
				<input type="submit" class="btn btn-lg btn-success pull-right" value="Pagar">
				<div class="clearfix"></div>
			</form>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="headingTwo">
		<h3 data-toggle="collapse" data-parent="#panel_pago" href="#pago_otros" aria-expanded="false" aria-controls="pago_otros"><i class="fa fa-paypal"></i> Otros métodos de pago</h3>
	</div>
		<div id="pago_otros" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
			<div class="row">
				<div class="col-md-4">
					<img src="files/img/payment/logo_paypal.jpg" alt="">
					<h2><?= $planPrecio ?></h2>
					<small>Mensuales</small>
					<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="<?= $idButtonPaypal ?>">
						<button class="btn btn-primary btn-block" style="margin:20px; display:block">Pagar con Paypal</button>
						<img alt="" border="0" src="https://www.paypalobjects.com/es_XC/i/scr/pixel.gif" width="1" height="1">
					</form>
				</div>
				<div class="col-md-4">
					<img src="files/img/payment/logo_banamex.jpg" alt="">
					<h2><?= $planPrecio ?></h2>
					<small>Mensuales</small>
					<a href="#" class="btn btn-primary" style="margin:20px; display:block">Detalles</a>
				</div>
				<div class="col-md-4">
					<img src="files/img/payment/logo_oxxo.jpg" alt="">
					<h2><?= $planPrecio ?></h2>
					<small>Mensuales</small>
					<a href="#" class="btn btn-primary" style="margin:20px; display:block">Pagar</a>
				</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-3">
		<div class="white">
			<h4>Tu plan <strong><?= $planNombre ?></strong> incluye:</h4>
			<?php
			echo '<dl class="contuplan">';
				foreach ( $plan_incluye as $incluye ) {
				    echo "<dt>Fotos: </dt><dd>".$incluye['fotos']." <small>Usted puede agregar hasta: ".$incluye['fotos']." fotos</small></dd>";
				    echo "<dt>Paquetes: </dt><dd>".$incluye['paquetes']." <small>Usted puede agregar hasta: ".$incluye['paquetes']." paquetes</small></dd>";
				    echo "<dt>Cotizador: </dt><dd>".$incluye['cotizador']."<small>El Cliente ".$incluye['cotizador']." puede usar el cotizador</small></dd>";
				    echo "<dt>Video: </dt><dd>".$incluye['video']."<small>Usted ".$incluye['cotizador']." puede agregar video a su salon</small></dd>";
				    echo "<dt>Listado: </dt><dd>".$incluye['listado']."<small>Su salon ".$incluye['cotizador']." aparecera en los primeros resulatados en el listado</small></dd>";
				}
			echo "</dl>";
			?>
			<a href="planes.php" class="btn btn-success btn-block" style="margin:10px; width: 90%;">Ver Todos los Planes</a>
		</div>
	</div>

</div>


<!-- Modal -->
<div class="modal fade" id="info_cvc" tabindex="-1" role="dialog" aria-labelledby="inf_cvc" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="inf_cvc">Código de seguridad o de verificación de la tarjeta</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-6">
      			<img src="files/img/payment/cvc-visa.png" alt="" style="display:block; margin:10px auto">
      			<p>En las tarjetas MasterCard, Visa, Visa Electron y Discover este código lo constituyen los trés últimos digitos del número que aparece en el espacio reservado para la firma en el dorso de la tarjeta</p>
      		</div>
      		<div class="col-md-6">
      			<img src="files/img/payment/cvc-amer.png" alt="" style="display:block; margin:10px auto">
      			<p>En las tarjetas American Express, el código CVC es el número de cuatro dígitos que aparece a la derecha en la parte frontal de la tarjeta</p>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<?php include("_footer.php"); ?>

