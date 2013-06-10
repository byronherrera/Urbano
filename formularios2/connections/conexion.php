<?
$dbhost="127.0.0.1:8889";  // host del MySQL (generalmente localhost)
$dbusuario = "root"; //usuario base de datos
$dbpassword = "000"; //password usuario base de datos
$db="gymbotim_urbano";//nombre base de datos
$conexion = mysql_connect($dbhost, $dbusuario, $dbpassword);
mysql_select_db($db, $conexion);