<?php require_once('../Connections/conectar.php'); ?>
<?php include("_header.php"); ?>
<?php include("_vars.php");?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "agregar_paquete")) {
  $insertSQL = sprintf("INSERT INTO paquetes (id_salon, nom_paquete, dias, pre_persona, min_personas, tipo_evento, opciones_paquete) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_salon'], "int"),
                       GetSQLValueString($_POST['nom_paquete'], "text"),
                       GetSQLValueString($_POST['dias'], "text"),
                       GetSQLValueString($_POST['pre_persona'], "text"),
                       GetSQLValueString($_POST['min_personas'], "int"),
                       GetSQLValueString($_POST['tipo_evento'], "int"),
                       GetSQLValueString($_POST['opciones_paquete'], "text"));

  mysql_select_db($database_conectar, $conectar);
  $Result1 = mysql_query($insertSQL, $conectar) or die(mysql_error());
}

$colname_Recordset1 = "-1";
if (isset($_SESSION['MM_UserGroup'])) {
  $colname_Recordset1 = $_SESSION['MM_UserGroup'];
}
mysql_select_db($database_conectar, $conectar);
$query_Recordset1 = sprintf("SELECT * FROM paquetes WHERE id_salon = %s", GetSQLValueString($colname_Recordset1, "int"));
$Recordset1 = mysql_query($query_Recordset1, $conectar) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

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
				<h3>Paquetes</h3>
				<div class="white" style="padding:30px">
				<!-- Inicia paquetes -->

<div class="panel-group" id="paquetes" role="tablist" aria-multiselectable="true">
	<?php do { ?>
	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="pa_<?php echo $row_Recordset1['id']; ?>">
			<h5 class="panel-title"><a role="button" data-toggle="collapse" data-parent="#paquetes" href="#paquete_<?php echo $row_Recordset1['id']; ?>" aria-expanded="true" aria-controls="paquete_<?php echo $row_Recordset1['id']; ?>"><?php echo $row_Recordset1['nom_paquete']; ?> </a></h5>
		</div>
		<div id="paquete_<?php echo $row_Recordset1['id']; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="paquete_<?php echo $row_Recordset1['id']; ?>">
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<h5>Dias</h5>
						<p><i class="glyphicon glyphicon-calendar"></i> <?php echo $row_Recordset1['dias']; ?></p>
						<h5>Precio por persona</h5>
						<p><i class="glyphicon glyphicon-usd"></i> <?php echo $row_Recordset1['pre_persona']; ?></p>
						<h5>Minimo de personas</h5>
						<p><i class="glyphicon glyphicon-user"></i> <?php echo $row_Recordset1['min_personas']; ?></p>
					</div>
					<div class="col-md-6">
						<h5>Incluye:</h5>
						<?php echo preg_replace('/[.,]/', ' - ', $row_Recordset1['opciones_paquete']); ?>
					</div>

				</div>
			</div>
			<div class="panel-footer">
				<a href="editar_paquete.php?id=<?php echo $row_Recordset1['id']; ?>" class="btn btn-success" style="margin: 0 0 0 540px"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
				<a href="eliminar_paquete.php?id=<?php echo $row_Recordset1['id']; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>
			</div>
		</div>
	</div>
	<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>


</div>


				</div>
				<h3>Agregar Paquete</h3>
				<div class="white" style="padding:20px">
					<form method="POST" action="<?php echo $editFormAction; ?>" class="form-horizontal" name="agregar_paquete" id="agregar_paquete">

						<input type="hidden" id="id_salon" name="id_salon" value="<?php echo $_SESSION['MM_UserGroup']; ?>">
						<div class="form-group">
							<label for="nom_paquete	" class="col-sm-3 col-md-offset-1 control-label">Nombre Paquete</label>
							<div class="col-sm-7"><input type="text" id="nom_paquete" name="nom_paquete" class="form-control" required></div>
						</div>
<!-- 						<a href="#" class="btn btn-default btn-sm pull-right" style="margin:0 64px 10px; display: inline-block;"><i class="fa fa-calendar"></i> Programar fecha</a><br> -->
						<div class="form-group">
							<label class="col-sm-4 control-label" for="tipo_evento">Tipo evento</label>
							<div class="col-sm-8">
								<div class="row">
								<?php
								foreach ( $TipoEvento as $tipo ) {
									echo '<div class="col-md-4"><input type="radio" name="tipo_evento" value="'.$tipo['label'].'" id="'.$tipo['value'].'"> <label for="'.$tipo['value'].'"> '.$tipo['label'].'</label></div>';
								}
								?>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="dias" class="col-sm-3 col-md-offset-1 control-label">Que dias</label>
							<div class="col-sm-7"><input type="text" name="dias" id="dias" class="form-control" placeholder="Jueves y Domingos" required></div>
						</div>
						<div class="form-group">
							<label for="pre_persona	" class="col-sm-3 col-md-offset-1 control-label">Precio por persona</label>
							<div class="col-sm-2"><input type="number" id="pre_persona" name="pre_persona" class="form-control" placeholder="$200" required></div>

							<label for="min_personas" class="col-sm-3 control-label">Minimo de Personas</label>
							<div class="col-sm-2"><input type="number" id="min_personas" name="min_personas" class="form-control" placeholder="50" required></div>
						</div>
						<div class="form-group">
							<label for="opciones_paquete" class="col-sm-4 control-label">Que incluye el paquete</label>
							<div class="col-sm-7">
								<textarea  rows="10" class="form-control tags" name="opciones_paquete" id="opciones_paquete" required> </textarea>
								<small class="help-block">Agrege con comas lo que incluye el paquete. Ejem: <em> Cocina, Inflable, etc.</em></small>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-offset-6 col-sm-4">
								<button type="submit" class="btn btn-primary">Agregar Paquete</button>
							</div>
						</div>
						<input type="hidden" name="MM_insert" value="agregar_paquete">


					</form>
				</div>

			</div>
		</div>
	</section>

	<?php include("_footer.php"); ?>
<?php
mysql_free_result($Recordset1);
?>
