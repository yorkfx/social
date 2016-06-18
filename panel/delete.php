
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Borrar</title>
</head>
<body>
	<?php
if (!unlink($_GET['fichero'])){

}
	echo "<script>window.open('galeria.php','_self')</script>";
?>


</body>
</html>