<?php
$mail = 'byron@3w.nafta.ec';
$nombre = "Byron";
$telefono = "2805647";
$email = "byronherrera@hotmail.com";
$mensaje = "Hola Mundo";
//$thank="index.html";
$message = "
nombre:" . $nombre . "
telefono:" . $telefono . "
email:" . $email . "
mensaje:" . $mensaje . "";

if (mail($mail, "Formulario de Consulta", $message))
    echo "Email envia";
else
    echo "Email Error";

$dbhost="184.107.209.238";  // host del MySQL (generalmente localhost)
$dbusuario = "fansitef_mutual";
$dbpassword = "FkPieKc[mXSE";
$db="fansitef_mutualista";

$conexion = conectar($dbhost, $dbusuario, $dbpassword, $db);



$query = "SELECT * FROM tab_form";
$result = mysql_query($query);
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
    print_r($row);
};

function conectar($servidor, $usuario, $password, $base_datos)
{
    if (!($link = mysql_connect($servidor, $usuario, $password))) {
        echo "<br>Error base datos Conexion";
        exit();
    }
    if (!(mysql_select_db($base_datos, $link))) {
        echo "<br>Error base datos";
        exit();
    }
    echo "<br>Conexion realizada";
    return $link;
}
 
