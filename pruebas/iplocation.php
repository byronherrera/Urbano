<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Melissa
 * Date: 02/05/13
 * Time: 10:54
 * To change this template use File | Settings | File Templates.
 */

include('geoLocateIp.class.php');

$geo = new IPLocalizador();

//Obtener IP:
$_SERVER["HTTP_CLIENT_IP"]!=""?$ip=$_SERVER["HTTP_CLIENT_IP"]:$ip=$_SERVER["REMOTE_ADDR"];
//Función de obtención de IP (basado en la web de webhosting.info)

//obtención de código de país:
$pais = strtolower($geo->getCountry ($ip));

echo json_encode(array(
    "pais" => $pais
));