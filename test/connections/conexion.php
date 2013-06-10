<?
$dbhost="localhost";  // host del MySQL (generalmente localhost)
$dbusuario = "urbano"; //usuario base de datos
$dbpassword = "mayo$$2013"; //password usuario base de datos
$db="urbanodb";//nombre base de datos
$conexion = mysql_connect($dbhost, $dbusuario, $dbpassword);
mysql_select_db($db, $conexion);

?>
