<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Melissa
 * Date: 02/05/13
 * Time: 10:54
 * To change this template use File | Settings | File Templates.
 */

include('geoLocateIp.class.php');
$ip = $_SERVER['REMOTE_ADDR'];
echo $ip;

$geo = new IPLocalizador();
$location = $geo->getData('186.4.241.38','c6e64205550e6bb37ffd2105ba7815a7c39097fad804a45df334c3b0b8c11435');
print_r( $location);

