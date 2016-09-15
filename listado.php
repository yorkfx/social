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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Recordset1 = 5;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

if(isset($_GET['estado'])){
        $estado     = $_GET['estado'];
    }
    if(isset($_GET['tipo'])){
        $tipo         = $_GET['tipo'];
    }
  $consulta="";
    //Consulta para Tipo de Salon
    if(!empty($tipo)){
        if($consulta==""){
            $consulta.="tipo LIKE '$tipo'";
        }
    }//fin consulta tipo salon

    //Consultas para Estado
    if(!empty($estado)){
        if($consulta==""){
            $consulta.="estado LIKE '$estado'";
        }
    }//fin consulta Estado

    if($consulta!=""){
        $consulta = $consulta;
    }

mysql_select_db($database_conectar, $conectar);
$query_Recordset1 = "SELECT * FROM salones WHERE $consulta ORDER BY id DESC";
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

$queryString_Recordset1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset1") == false &&
        stristr($param, "totalRows_Recordset1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset1 = sprintf("&totalRows_Recordset1=%d%s", $totalRows_Recordset1, $queryString_Recordset1);



?>


<?php include("_header.php"); ?>

	<section class="row">
		<div class="container">
      <br>
			<div class="col-md-4" id="barra-lateral">
				<?php include("_barra_lateral.php"); ?>
			</div>

			<div class="col-md-8">
				<!-- <ol class="breadcrumb">
					<li><a href="#">Inicio</a></li>
					<li><a href="#">México</a></li>
					<li class="active">Coacalco</li>
				</ol> -->
<?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
					<div class="media">
					<h3>Aun no tenemos Salones en esta sección</h3>
					<p>Vuelve pronto estamos creciendo rapido =) </p>
					</div>
	<?php } // Show if recordset empty ?>
<?php if ($totalRows_Recordset1 > 0) { // Show if recordset not empty ?>

<?php
    do {
            echo '<div class="media">';
            echo '<a href="salon/'.$row_Recordset1['id_cliente'].'.html" class="media-left">';

            $precios = $row_Recordset1['precios'];
						$cadena = explode(";", $precios);
						echo '<span title="Desde $'.$cadena[0].' pesos por persona">$'.$cadena[0].'</span>';
					  echo '<img alt="'.$row_Recordset1['nombre_salon'].'" src="files/img_social/faceimg_'.$row_Recordset1['id_cliente'].'.jpg" width="220" height="200" />';
            echo '</a>';
            echo '<div class="media-body">';
						echo '<h3 class="media-heading"><a href="salon/'.$row_Recordset1['id_cliente'].'.html">'.$row_Recordset1['nombre_salon'].'</a></h3>';
						echo '<p>'.substr($row_Recordset1['descripcion'], 0, 210).'</p>';
            echo '</div>';
            echo '<div class="media-right">';
            echo '<em class="glyphicon glyphicon-map-marker"></em> <a href="?estado='.$row_Recordset1['estado'].'">'.$row_Recordset1['municipio'].'</a><br>';

            $capacidad = $row_Recordset1['capacidad'];
						$cadena = explode(";", $capacidad);
						echo '<em class="glyphicon glyphicon-user"></em> Capacidad: '.$cadena[1].'</em> <br>';
						echo '<em class="glyphicon glyphicon-tag"></em> Tipo: <a href="?tipo='.$row_Recordset1['tipo'].'">'.$row_Recordset1['tipo'].'</a><br>';
						echo '<em class="glyphicon glyphicon-credit-card"></em> Pago con: '.substr($row_Recordset1['a_pagos'],0, 25).'<br>';
						echo '<a href="salon/'.$row_Recordset1['id_cliente'].'.html" class="btn pull-right">Mas detalles</a>';
            echo '</div>';
            echo '</div>';
    } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>

	<?php } // Show if recordset not empty ?>
    <nav>
        <ul class="pagination pagination-lg">
          <?php if ($pageNum_Recordset1 > 0) { // Show if not first page ?>
          <li><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, max(0, $pageNum_Recordset1 - 1), $queryString_Recordset1); ?>"  class="navpagina" style="float:left"><span aria-hidden="true">&laquo;</span> Anterior</a></li>
            <?php } // Show if not first page ?>
          <?php
          // $total_paginas = round($totalRows_Recordset1/$maxRows_Recordset1);
          // if ($total_paginas > 1){
          //   for ($i=1;$i<=$total_paginas;$i++){
          //       if ($pagina == $i){
          //         	 echo $pagina;
          //       }
          //       else
          //       echo '<a href="?pageNum_Recordset1='.max(0,$i -1).'&totalRows_Recordset1=11"  class="navpagina"> '.$i.' </a>';
          //   }
          // }
           ?>

          <?php if ($pageNum_Recordset1 < $totalPages_Recordset1) { // Show if not last page ?>
          <li><a href="<?php printf("%s?pageNum_Recordset1=%d%s", $currentPage, min($totalPages_Recordset1, $pageNum_Recordset1 + 1), $queryString_Recordset1); ?>" class="navpagina" style="float:right">Siguiente <span aria-hidden="true">&raquo;</span></a></li>
          <?php } // Show if not last page ?>
        </ul>
				</nav>

			</div>
		</div>

	</section>

	<?php include("_footer.php"); ?>
<?php
mysql_free_result($Recordset1);
?>
