<?php require_once('Connections/conectar.php'); ?>
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

$maxRows_Recordset1 = 5;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_conectar, $conectar);
$query_Recordset1 = "SELECT * FROM salones ORDER BY id ASC";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $conectar) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
?>
<?php include("_header.php"); ?>

	<section class="row">
		<div class="container">
			<div class="col-md-4" id="barra-lateral">
				<?php include("_barra_lateral.php"); ?>
			</div>
			<div class="col-md-8">
				<ol class="breadcrumb">
					<li><a href="#">Inicio</a></li>
					<li><a href="#">México</a></li>
					<li class="active">Coacalco</li>
				</ol>

				<?php do { ?>
				<div class="media">
					<a href="#" class="media-left">
						<span title="Desde $99 pesos por persona">$99</span>
						<img alt="<?php echo $row_Recordset1['nombre_salon']; ?>" src="files/img_social/faceimg_<?php echo $row_Recordset1['id_cliente']; ?>.jpg" width="220" height="200" />
					</a>
					<div class="media-body">
						<h3 class="media-heading"><a href="salon.php?id=<?php echo $row_Recordset1['id_cliente']; ?>"><?php echo $row_Recordset1['nombre_salon']; ?></a></h3>
						<p><?php echo $row_Recordset1['descripcion']; ?> </p>
					</div>
					<div class="media-right">
						<em class="glyphicon glyphicon-map-marker"></em> <a href="#"><?php echo $row_Recordset1['municipio']; ?></a><br>
						<em class="glyphicon glyphicon-user"></em> Capacidad: <?php echo $row_Recordset1['capacidad']; ?> <br>
						<em class="glyphicon glyphicon-tag"></em> Tipo: <?php echo $row_Recordset1['tipo']; ?><br>
						<em class="glyphicon glyphicon-credit-card"></em> Pago con Tarjeta: <em class="glyphicon glyphicon-ok"></em> <?php echo $row_Recordset1['a_pagos']; ?><br>
						<a href="salon.php?id=<?php echo $row_Recordset1['id_cliente']; ?>" class="btn pull-right">Mas detalles</a>
					</div>
				</div>
					<?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
<nav>
					<ul class="pagination pagination-lg">
					    <li>
					      <a href="#" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					    <li><a href="#">1</a></li>
					    <li><a href="#">2</a></li>
					    <li><a href="#">3</a></li>
					    <li><a href="#">4</a></li>
					    <li><a href="#">5</a></li>
					    <li>
					      <a href="#" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
					  </ul>
				</nav>

			</div>
		</div>

	</section>

	<?php include("_footer.php"); ?>
<?php
mysql_free_result($Recordset1);
?>
