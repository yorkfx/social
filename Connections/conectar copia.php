<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conectar = "localhost";
$database_conectar = "samia";
$username_conectar = "root";
$password_conectar = "root";

$conectar = mysql_pconnect($hostname_conectar, $username_conectar, $password_conectar) or trigger_error(mysql_error(),E_USER_ERROR); 
?>