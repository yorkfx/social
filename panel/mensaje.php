<?php require_once('../Connections/conectar.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Recordset1 = "-1";
if (isset($_GET['id'])) {
  $colname_Recordset1 = $_GET['id'];
}
mysql_select_db($database_conectar, $conectar);
$query_Recordset1 = sprintf("SELECT * FROM cotizaciones WHERE id = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conectar) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);


// Marcar mensaje leido
$updateSQL = sprintf("UPDATE cotizaciones SET leido=1 WHERE id = '".$row_Recordset1['id']."'");
mysql_select_db($database_conectar, $conectar);
$Result1 = mysql_query($updateSQL, $conectar) or die(mysql_error());
?>
<?php include("_header.php"); ?>
<?php include("_vars.php"); ?>
<?php


$cualid = $_SESSION['MM_UserGroup'];
?>

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
				<h3>Cotizacion #<?php echo $row_Recordset1['id']; ?></h3>
				<div class="white" style="padding:20px">
<div class="row" id="detail_msg">
	<div class="col-md-2"><small>Cliente</small> <br><i class="fa fa-user"></i> <br><?php echo $row_Recordset1['nombre']; ?></div>
	<div class="col-md-2"><small>Telefono</small> <br><i class="fa fa-phone"></i> <br><?php echo $row_Recordset1['telefono']; ?></div>
	<div class="col-md-2"><small>Fecha del evento</small><i class="fa fa-calendar"></i> <br><?php echo $row_Recordset1['fecha_evento']; ?></div>
	<div class="col-md-2"><small>No. de invitados</small> <br><i class="fa fa-users"></i> <br> <?php echo $row_Recordset1['no_invitados']; ?></div>
	<div class="col-md-2"><small>$ x invitado</small> <br><i class="fa fa-dollar"></i> <br>  $<?php echo $row_Recordset1['pr_invitados']; ?></div>
	<div class="col-md-2"><small>Presupuesto</small><i class="fa fa-money"></i> <br>  $<?php echo $row_Recordset1['pr_invitados']*$row_Recordset1['no_invitados']; ?></div>
</div>
 <div class="col-sm-2">
 </div>
 <div class="col-sm-8"><strong><?php echo $row_Recordset1['nombre']; ?> dice: </strong><p><?php echo $row_Recordset1['mensaje']; ?></p>
<form action="" class="form-group">
	<textarea name="" id="" rows="8" class="form-control"></textarea>
	<span id="helpBlock" class="help-block">El mensaje se enviara al correo electronico del cliente.</span>
	<input type="text" class="btn btn-primary pull-right" value="Responder">
</form>
 </div>
				</div>
			</div>

		</div>

	</section>

	<?php include("_footer.php"); ?>
<?php
mysql_free_result($Recordset1);
?>
