<?php include("_header.php"); ?>
<div class="container">
	<h2>Nuestros planes</h2>
	<p>Los precios estan moneda nacional (mxn) y el cobro se hace mensualmente a traves de paypal</p>
	<p>Seleccione el plan que mas le convenga. si tiene dudas  pude <a href="contacto">consultarnos aqui</a></p>
	<br>
<table id="table_plans">
  <tr>
    <th scope="col"><h3>Nuestros Planes</h3></th>
    <th scope="col"><h5>Plan Free</h5> <span class="price">Gratis </span></th>
    <th scope="col"><h5>Plan Silver</h5> <span class="price">$99 <small>mensual</small></span></th>
    <th scope="col"><h5>Plan Gold</h5> <span class="price">$199 <small>mensual</small></span></th>
    <th scope="col"><h5>Plan Platinum</h5> <span class="price">$299 <small>mensual</small></span></th>
  </tr>
  <tr>
    <th scope="row">Fotografias</th>
    <td>6</td>
    <td>18</td>
    <td>30</td>
    <td>60</td>
  </tr>
  <tr>
    <th scope="row">Paquetes</th>
    <td>1</td>
    <td>5</td>
    <td>10</td>
    <td>20</td>
  </tr>
  <tr>
    <th scope="row">Cotizador</th>
    <td>no</td>
    <td>si</td>
    <td>si</td>
    <td>si</td>
  </tr>
  <tr>
    <th scope="row">Video</th>
    <td>no</td>
    <td>si</td>
    <td>si</td>
    <td>si</td>
  </tr>
  <tr>
    <th scope="row">Listado</th>
    <td>no</td>
    <td>no</td>
    <td>Prioridad</td>
    <td>Prioridad</td>
  </tr>
  <tr>
    <th></th>
    <td><a href="#" class="btn btn-primary btn-block btn-lg">Seleccionar</a></td>
    <td><a href="pago.php?plan=S" class="btn btn-primary btn-block btn-lg">Contratar</a></td>
    <td><a href="pago.php?plan=G" class="btn btn-primary btn-block btn-lg">Contratar</a></td>
    <td><a href="pago.php?plan=P" class="btn btn-primary btn-block btn-lg">Contratar</a></td>
  </tr>
</table>
</div>

<?php include("_footer.php"); ?>

