<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<?php
		foreach ($_GET['pagos'] as $acepta_pagos){
			echo $acepta_pagos.",";
		}
	?>

</body>
</html>