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
?>
<?php include("_header.php"); ?>
<?php include("_vars.php"); ?>
<?php


$cualid = $_SESSION['MM_UserGroup'];
mysql_select_db($database_conectar, $conectar);
$query_Recordset1 = "SELECT * FROM cotizaciones WHERE id_cliente = $cualid ORDER BY id DESC";
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
				<h3>Cotizaciones</h3>
			<div class="white" style="padding:20px">

					<table class="table table-hover">
				<?php do { ?>

						<tr onclick="window.document.location='mensaje.php?id=<?php echo $row_Recordset1['id']; ?>';"
							<?php
							if($row_Recordset1['leido'] == 0){
								echo 'class="info">';
							}
							else{
								echo 'class="none">';
							}
							?>
							<td><?php echo $row_Recordset1['nombre']; ?></td>
							<td><?php echo substr($row_Recordset1['mensaje'], 0, 50); ?></td>
							<td><?php echo $row_Recordset1['fecha']; ?></td>
						</tr>

					<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
						</table>
				</div>
			</div>

		</div>

	</section>

	<?php include("_footer.php"); ?>
<?php
mysql_free_result($Recordset1);
?>
