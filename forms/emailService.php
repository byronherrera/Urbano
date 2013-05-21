<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Melissa
 * Date: 24/04/13
 * Time: 11:14
 * To change this template use File | Settings | File Templates.
 */

$rutaBase = "http://desarrollo.urbano.com.ec/";
$rutaPrincipal  = $rutaBase . "forms/";

function recuperaEmail($idEmail)
{
 //   return "postventamazda@mazda.ec";
    $query = "SELECT email, copiaemail FROM urba_form_email where id = $idEmail";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result, MYSQL_ASSOC);
        if ((isset($row['copiaemail'])) and (ltrim($row['copiaemail']) != '' )) {
            return $row['email'] . ",  ".$row['copiaemail'];
        }
    return $row['email'];
};