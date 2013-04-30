<?
$dbhost="localhost";  // host del MySQL (generalmente localhost)
$dbusuario = "naftadig_3wnafta"; //usuario base de datos
$dbpassword = "3wnafta123"; //password usuario base de datos
$db="naftadig_urbano";//nombre base de datos
$conexion = mysql_connect($dbhost, $dbusuario, $dbpassword);
mysql_select_db($db, $conexion);

?>
