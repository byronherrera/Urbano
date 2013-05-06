<?php
include "connections/conexion.php";
include "emailService.php";

function parseToXML($htmlStr)
{
    $xmlStr = str_replace('<', '&lt;', $htmlStr);
    $xmlStr = str_replace('>', '&gt;', $xmlStr);
    $xmlStr = str_replace('"', '&quot;', $xmlStr);
    $xmlStr = str_replace("'", '&#39;', $xmlStr);
    $xmlStr = str_replace("&", '&amp;', $xmlStr);
    $xmlStr = str_replace("ñ", '&#x0F1;', $xmlStr);
    $xmlStr = str_replace("Ñ", '&#x0D1;', $xmlStr);
    $xmlStr = str_replace("á", '&#x0E1;', $xmlStr);
    $xmlStr = str_replace("é", '&#x0E9;', $xmlStr);
    $xmlStr = str_replace("í", '&#x0ED;', $xmlStr);
    $xmlStr = str_replace("ó", '&#x0F3;', $xmlStr);
    $xmlStr = str_replace("ú", '&#x0FA;', $xmlStr);
    $xmlStr = str_replace("Á", '&#x0C1;', $xmlStr);
    $xmlStr = str_replace("É", '&#x0C9;', $xmlStr);
    $xmlStr = str_replace("Í", '&#x0CD;', $xmlStr);
    $xmlStr = str_replace("Ó", '&#x0D3;', $xmlStr);
    $xmlStr = str_replace("Ú", '&#x0DA;', $xmlStr);

    return $xmlStr;
}

$mensaje = "";

//Verifico el Submit
if ($_POST['enviar_info_vehiculos']) {
    $nombre = parseToXML($_POST['nombre_info_vehiculos']);
    $apellido = parseToXML($_POST['apellido_info_vehiculos']);
    $ciudad = parseToXML($_POST['ciudad_info_vehiculos']);
    $telefono_apoyo = $_POST['telefono_info_vehiculos'];
    $email_apoyo = $_POST['email_info_vehiculos'];
    $info_apoyo = parseToXML($_POST['info_info_vehiculos']);
    $insert = mysql_query("INSERT INTO mazda_form_infoVehiculos (nombre, apellido, ciudad, telefono, email, comentario) VALUES ('" . $nombre . "','" . $apellido . "','" . $ciudad . "','" . $telefono_apoyo . "','" . $email_apoyo . "','" . $info_apoyo . "')") or die(mysql_error());
    $query = "SELECT id  FROM mazda_form_infoVehiculos order by id desc limit 1";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $id = $row['id'];
        $cat = 2;

    }
    $url = "http://www.mazda.com.ec/formularios2/adminInfo.php";
    $contentmsg = '<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="641">
  <tr>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="26" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="16" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="86" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="66" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="114" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="13" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="112" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="4" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="26" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="82" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="4" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="25" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="35" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="32" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
   <td rowspan="3" colspan="5"><img name="boletinAdmin_r1_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r1_c1.jpg" width="308" height="105" border="0" id="boletinAdmin_r1_c1" alt="" /></td>
   <td colspan="9"><img name="boletinAdmin_r1_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r1_c6.jpg" width="333" height="37" border="0" id="boletinAdmin_r1_c6" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="37" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="2" colspan="4"><img name="boletinAdmin_r2_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r2_c6.jpg" width="155" height="68" border="0" id="boletinAdmin_r2_c6" alt="" /></td>
   <td colspan="4" style="font-family:Arial, Helvetica, sans-serif; color:#FFFFFF; background-color:#333333; font-size:12px">Info. Vehiculos</td>
   <td><img name="boletinAdmin_r2_c14" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r2_c14.jpg" width="32" height="24" border="0" id="boletinAdmin_r2_c14" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="24" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="4"><img name="boletinAdmin_r3_c10" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r3_c10.jpg" width="146" height="44" border="0" id="boletinAdmin_r3_c10" alt="" /></td>
   <td><img name="boletinAdmin_r3_c14" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r3_c14.jpg" width="32" height="44" border="0" id="boletinAdmin_r3_c14" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="44" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="5"><img name="boletinAdmin_r4_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r4_c1.jpg" width="308" height="20" border="0" id="boletinAdmin_r4_c1" alt="" /></td>
   <td colspan="9"><img name="boletinAdmin_r4_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r4_c6.jpg" width="333" height="20" border="0" id="boletinAdmin_r4_c6" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="20" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="14"><img name="boletinAdmin_r5_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r5_c1.jpg" width="641" height="24" border="0" id="boletinAdmin_r5_c1" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="24" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="3"><img name="boletinAdmin_r6_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r6_c1.jpg" width="26" height="69" border="0" id="boletinAdmin_r6_c1" alt="" /></td>
   <td colspan="2"><img name="boletinAdmin_r6_c2" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r6_c2.jpg" width="102" height="20" border="0" id="boletinAdmin_r6_c2" alt="" /></td>
   <td colspan="2" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $nombre . '</td>
   <td><img name="boletinAdmin_r6_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r6_c6.jpg" width="13" height="20" border="0" id="boletinAdmin_r6_c6" alt="" /></td>
   <td colspan="2"><img name="boletinAdmin_r6_c7" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r6_c7.jpg" width="116" height="20" border="0" id="boletinAdmin_r6_c7" alt="" /></td>
   <td colspan="4" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $telefono_apoyo . '</td>
   <td colspan="2"><img name="boletinAdmin_r6_c13" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r6_c13.jpg" width="67" height="20" border="0" id="boletinAdmin_r6_c13" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="20" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="2"><img name="boletinAdmin_r7_c2" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r7_c2.jpg" width="102" height="23" border="0" id="boletinAdmin_r7_c2" alt="" /></td>
   <td colspan="2" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px"> ' . $apellido . '</td>
   <td><img name="boletinAdmin_r7_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r7_c6.jpg" width="13" height="23" border="0" id="boletinAdmin_r7_c6" alt="" /></td>
   <td colspan="2"><img name="boletinAdmin_r7_c7" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r7_c7.jpg" width="116" height="23" border="0" id="boletinAdmin_r7_c7" alt="" /></td>
   <td colspan="4" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $email_apoyo . '</td>
   <td colspan="2"><img name="boletinAdmin_r7_c13" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r7_c13.jpg" width="67" height="23" border="0" id="boletinAdmin_r7_c13" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="23" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="2"><img name="boletinAdmin_r8_c2" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r8_c2.jpg" width="102" height="26" border="0" id="boletinAdmin_r8_c2" alt="" /></td>
   <td colspan="2" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $ciudad . '</td>
   <td><img name="boletinAdmin_r8_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r8_c6.jpg" width="13" height="26" border="0" id="boletinAdmin_r8_c6" alt="" /></td>
   <td colspan="2"><img name="boletinAdmin_r8_c7" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r8_c7.jpg" width="116" height="26" border="0" id="boletinAdmin_r8_c7" alt="" /></td>
   <td colspan="4" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">ISV' . $id . 'ID</td>
   <td colspan="2"><img name="boletinAdmin_r8_c13" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r8_c13.jpg" width="67" height="26" border="0" id="boletinAdmin_r8_c13" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="26" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="14"><img name="boletinAdmin_r9_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r9_c1.jpg" width="641" height="17" border="0" id="boletinAdmin_r9_c1" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="17" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="boletinAdmin_r10_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r10_c1.jpg" width="26" height="21" border="0" id="boletinAdmin_r10_c1" alt="" /></td>
   <td colspan="3"><img name="boletinAdmin_r10_c2" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r10_c2.jpg" width="168" height="21" border="0" id="boletinAdmin_r10_c2" alt="" /></td>
   <td colspan="10"><img name="boletinAdmin_r10_c5" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r10_c5.jpg" width="447" height="21" border="0" id="boletinAdmin_r10_c5" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="21" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="14"><img name="boletinAdmin_r11_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r11_c1.jpg" width="641" height="7" border="0" id="boletinAdmin_r11_c1" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="7" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="2"><img name="boletinAdmin_r12_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r12_c1.jpg" width="42" height="153" border="0" id="boletinAdmin_r12_c1" alt="" /></td>
   <td colspan="8" style="border:1px solid #333; font-family:Arial, Helvetica, sans-serif; font-size:11px;">' . $info_apoyo . '</td>
   <td colspan="4"><img name="boletinAdmin_r12_c11" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r12_c11.jpg" width="96" height="153" border="0" id="boletinAdmin_r12_c11" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="153" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="14"><img name="boletinAdmin_r13_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r13_c1.jpg" width="641" height="17" border="0" id="boletinAdmin_r13_c1" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="17" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="7"><img name="boletinAdmin_r14_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r14_c1.jpg" width="433" height="20" border="0" id="boletinAdmin_r14_c1" alt="" /></td>
   <td colspan="3" style="cursor:pointer"><a href="' . $url . "?id=" . $id . "&cat=" . $cat . '"><img name="boletinAdmin_r14_c8" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r14_c8.jpg" width="112" height="20" border="0" id="boletinAdmin_r14_c8" alt="" /></a></td>
   <td colspan="4"><img name="boletinAdmin_r14_c11" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r14_c11.jpg" width="96" height="20" border="0" id="boletinAdmin_r14_c11" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="20" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="14"><img name="boletinAdmin_r15_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r15_c1.jpg" width="641" height="35" border="0" id="boletinAdmin_r15_c1" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="35" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="boletinAdmin_r16_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r16_c1.jpg" width="26" height="41" border="0" id="boletinAdmin_r16_c1" alt="" /></td>
   <td colspan="10">&nbsp;</td>
   <td colspan="3"><img name="boletinAdmin_r16_c12" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r16_c12.jpg" width="92" height="41" border="0" id="boletinAdmin_r16_c12" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="41" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="14"><img name="boletinAdmin_r17_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/boletinAdmin_r17_c1.jpg" width="641" height="9" border="0" id="boletinAdmin_r17_c1" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="9" border="0" alt="" /></td>
  </tr>
</table>';
    $message = '<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="641">
  <tr>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="31" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="88" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="26" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="87" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="157" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="27" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="48" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="51" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="47" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="44" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="14" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="21" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
   <td rowspan="3" colspan="4"><img name="userNotificacion_r1_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r1_c1.jpg" width="232" height="106" border="0" id="userNotificacion_r1_c1" alt="" /></td>
   <td rowspan="3"><img name="userNotificacion_r1_c5" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r1_c5.jpg" width="157" height="106" border="0" id="userNotificacion_r1_c5" alt="" /></td>
   <td rowspan="3" colspan="2"><img name="userNotificacion_r1_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r1_c6.jpg" width="75" height="106" border="0" id="userNotificacion_r1_c6" alt="" /></td>
   <td colspan="5"><img name="userNotificacion_r1_c8" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r1_c8.jpg" width="177" height="38" border="0" id="userNotificacion_r1_c8" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="38" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3" style="font-family:Arial, Helvetica, sans-serif; color:#FFFFFF; background-color:#333333;">Info Vehiculos</td>
   <td colspan="2"><img name="userNotificacion_r2_c11" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r2_c11.jpg" width="35" height="24" border="0" id="userNotificacion_r2_c11" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="24" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="5"><img name="userNotificacion_r3_c8" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r3_c8.jpg" width="177" height="44" border="0" id="userNotificacion_r3_c8" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="44" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="4"><img name="userNotificacion_r4_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r4_c1.jpg" width="232" height="21" border="0" id="userNotificacion_r4_c1" alt="" /></td>
   <td colspan="3"><img name="userNotificacion_r4_c5" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r4_c5.jpg" width="232" height="21" border="0" id="userNotificacion_r4_c5" alt="" /></td>
   <td colspan="5"><img name="userNotificacion_r4_c8" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r4_c8.jpg" width="177" height="21" border="0" id="userNotificacion_r4_c8" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="21" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3"><img name="userNotificacion_r5_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r5_c1.jpg" width="145" height="29" border="0" id="userNotificacion_r5_c1" alt="" /></td>
   <td colspan="2" style="font-family:Arial, Helvetica, sans-serif; color:#000;" >' . $nombre . ' ' . $apellido . '</td>
   <td colspan="7"><img name="userNotificacion_r5_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r5_c6.jpg" width="252" height="29" border="0" id="userNotificacion_r5_c6" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="29" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="12"><img name="userNotificacion_r6_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r6_c1.jpg" width="641" height="28" border="0" id="userNotificacion_r6_c1" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="28" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="3" colspan="2"><img name="userNotificacion_r7_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r7_c1.jpg" width="119" height="92" border="0" id="userNotificacion_r7_c1" alt="" /></td>
   <td rowspan="3" colspan="4"><img name="userNotificacion_r7_c3" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r7_c3.jpg" width="297" height="92" border="0" id="userNotificacion_r7_c3" alt="" /></td>
   <td colspan="6"><img name="userNotificacion_r7_c7" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r7_c7.jpg" width="225" height="23" border="0" id="userNotificacion_r7_c7" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="23" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="2" style="font-family:Arial, Helvetica, sans-serif; color:#0086B5;" >ISV' . $id . 'ID</td>
   <td colspan="4"><img name="userNotificacion_r8_c9" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r8_c9.jpg" width="126" height="28" border="0" id="userNotificacion_r8_c9" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="28" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="2"><img name="userNotificacion_r9_c7" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r9_c7.jpg" width="99" height="41" border="0" id="userNotificacion_r9_c7" alt="" /></td>
   <td colspan="4"><img name="userNotificacion_r9_c9" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r9_c9.jpg" width="126" height="41" border="0" id="userNotificacion_r9_c9" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="41" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="12"><img name="userNotificacion_r10_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r10_c1.jpg" width="641" height="27" border="0" id="userNotificacion_r10_c1" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="27" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="userNotificacion_r11_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r11_c1.jpg" width="31" height="39" border="0" id="userNotificacion_r11_c1" alt="" /></td>
   <td colspan="7" style="font-family:Arial, Helvetica, sans-serif; font-size:8px;">*Aplican condiciones y restricciones. Productos y servicios sujetos a cambios sin previo aviso. La informaci&oacute;n de la ficha t&eacute;cnica, colores, modelos, im&agrave;genes, precios, otras especificaciones son meramente referenciales e ilustrativas y pueden no coincidir con los productos exhibidos y ofrecidos en los Concesionarios Mazda.<br />
     Para mayor informaci&oacute;n y detalles ac&eacute;rquese al Concesionario Mazda de su preferencia.<br />
    *CRDI:Common Rail Diesel Injection</td>
   <td><img name="userNotificacion_r11_c9" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r11_c9.jpg" width="47" height="39" border="0" id="userNotificacion_r11_c9" alt="" /></td>
   <td colspan="2"><img name="userNotificacion_r11_c10" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r11_c10.jpg" width="58" height="39" border="0" id="userNotificacion_r11_c10" alt="" /></td>
   <td><img name="userNotificacion_r11_c12" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r11_c12.jpg" width="21" height="39" border="0" id="userNotificacion_r11_c12" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="39" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="12"><img name="userNotificacion_r12_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/userNotificacion_r12_c1.jpg" width="641" height="12" border="0" id="userNotificacion_r12_c1" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="12" border="0" alt="" /></td>
  </tr>
   <tr>
  	<td  colspan="12" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">Por favor no responda a este mail.</td>
  </tr>
</table>';

//Variables for notifying
    $subjectrecep = "Tu mensaje ha sido recibido.";
    $subjectmsg = "Informacion Repuestos";

// Mail setup
    //$to = "ventasmazda@mazda.ec"; //Put your email hereventasmazda@mazda.ec
    $to = recuperaEmail(4);
    $subject = "NUEVA SOLICITUD DE INFO VEHICULOS | www.mazda.com.ec";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    $headers .= "From:  $email_apoyo  \n";

//Notify that the message was sent
    $headers2 .= "From: web@mazda.com.ec\n";
    $headers2 .= "Reply-To: $to\r\n"; //Put the email to reply
    $headers2 .= "MIME-Version: 1.0\r\n";
    $headers2 .= "Content-Type: text/html; charset=utf-8\r\n";

    //echo utf8_encode('&estado=enviado');
    mail($to, $subject, $contentmsg, $headers);
    mail($email_apoyo, $subjectrecep, $message, $headers2);

//mensaje enviado con éxito	
    $mensaje = "Su mensaje ha sido enviado con éxito, daremos respuesta a su requerimiento lo antes posible. Gracias por contactarnos.";

    /*}else{
        echo utf8_encode('&estado=ya existe');
    }*/


}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Info_Vehiculos</title>
    <link rel="stylesheet" href="../../templates/mazda/css/template.css" type="text/css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            jQuery.validator.addMethod("default_value", function (value, element, string) {
                if (value == string)
                    return false;
                return true;
            }, "Por favor ingrese un valor");


            /*VALIDATION SECTION*/
            $("#f_info_vehiculos").validate({
                errorLabelContainer:"#alerts",
                wrapper:"li",
                onfocusout:false,
                onkeyup:false,
                rules:{
                    nombre_info_vehiculos:{
                        required:true,
                        default_value:"Nombre:"
                    },
                    apellido_info_vehiculos:{
                        required:true,
                        default_value:"Apellido:"
                    },
                    ciudad_info_vehiculos:{
                        required:true,
                        default_value:"Ciudad:"
                    },
                    telefono_info_vehiculos:{
                        required:true,
                        default_value:"Teléfono:",
                        digits:true,
                        minlength:7
                    },
                    email_info_vehiculos:{
                        default_value:"E-maill:",
                        email:true
                    },
                    info_info_vehiculos:{
                        required:true
                    }

                },
                messages:{

                    nombre_info_vehiculos:{
                        required:"Nombre es campo requerido",
                        default_value:"Ingrese un valor para el campo Nombre"
                    },
                    apellido_info_vehiculos:{
                        required:"Apellido es campo requerido",
                        default_value:"Ingrese un valor para el campo Apellido"
                    },
                    ciudad_info_vehiculos:{
                        required:"Ciudad es campo requerido",
                        default_value:"Ingrese un valor para el campo Ciudad"
                    },
                    telefono_info_vehiculos:{
                        required:"Tel&eacute;fono es campo requerido",
                        default_value:"Ingrese un valor para el campo Tel&eacute;fono",
                        digits:'El campo Tel&eacute;fono s&oacute;lo acepta d&iacute;gitos',
                        minlength:'El campo Tel&eacute;fono debe tener m&iacute;nimo 7 d&iacute;gitos'
                    },
                    email_info_vehiculos:{
                        email:'Ingrese un E-mail v&aacute;lido'
                    },
                    info_info_vehiculos:{
                        required:"Informaci&oacute;n es campo requerido"
                    }
                }
            });
            /*END VALIDATION SECTION*/
        });
    </script>

    <style>
        h3 {
            font-family: 'MazdaBold';
            color: #0073A7;
            font-size: 15px;
            margin: 20px 0 10px 5px;
        }

        .select_content {
            width: 390px;
            height: 35px;
            background: url("../templates/mazda/images/btn_select.jpg") no-repeat top left;
            overflow: hidden;
            clear: both;
            margin: 0 535px 0 0;
        }

        .success {
            background: #0073A7;
            color: #FFFFFF;
            font-family: Helvetica;
            font-size: 14px;
            line-height: 18px;
            font-style: normal;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
            margin-right: 10px;
            padding: 10px 15px;
            width: 405px;
        }

        ul.alerts {
            font-weight: normal;
            background: #FCC;
            border: 1px solid #F00;
            padding: .5em;
            display: none;
            color: #F00;
            margin-bottom: 10px;
            margin-top: 5px;
            float: left;
            width: 750px;
            line-height: 15px;
        }

        ul.alerts li {
            width: 360px;
            text-indent: 20px;
            float: left;
        }

        label.error {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
            color: #FF0000;
        }
    </style>

</head>

<body style="background: #FFF !important;">

<div class="select_content">
    <FORM id="selector">
        <SELECT ONCHANGE="window.parent.location.href = this.options[this.selectedIndex].value;">
            <OPTION VALUE="#">Seleccione un tema
            <OPTION VALUE="/index.php/apoyo-tecnico">Apoyo técnico Mazda
            <OPTION VALUE="/index.php/sugerencias">Sugerencias
            <OPTION VALUE="/index.php/reclamos">Reclamos
            <OPTION VALUE="/index.php/informacion-vehiculos">Información sobre vehículos-modelos-versiones
            <OPTION VALUE="/index.php/informacion-repuestos">Información sobre repuestos
            <OPTION VALUE="/index.php/informacion-accesorios">Información sobre accesorios
            <OPTION VALUE="/index.php/info-taller">Cita taller
            <OPTION VALUE="/index.php/info-test-drive">Test drive
            <OPTION VALUE="/index.php/otros">Otros
        </SELECT>
    </FORM>
</div>

<!--FORMULARIO INFORMACION VEHICULOS-->
<form id="f_info_vehiculos" name="f_info_vehiculos" method="post" action="">
    <table width="920px" border="0">
        <tr>
            <td><h3>INFORMACIÓN VEHÍCULOS - MODELOS - VERSIONES</h3></td>
        </tr>
        <tr>
            <td><?php
                if ($mensaje != "") {
                    echo "<div class='success'>" . ($mensaje) . "</div>";
                }
                ?></td>
        </tr>
        <tr>
            <td><input id="nombre_info_vehiculos" name="nombre_info_vehiculos" type="text"
                       onfocus="borrarCampos('Nombre:', this)" onblur="escribirCampos('Nombre:', this)"
                       value="Nombre:"/></td>
        </tr>
        <tr>
            <td><input id="apellido_info_vehiculos" name="apellido_info_vehiculos" type="text"
                       onfocus="borrarCampos('Apellido:', this)" onblur="escribirCampos('Apellido:', this)"
                       value="Apellido:"/></td>
        </tr>
        <tr>
            <td><input id="ciudad_info_vehiculos" name="ciudad_info_vehiculos" type="text"
                       onfocus="borrarCampos('Ciudad:', this)" onblur="escribirCampos('Ciudad:', this)"
                       value="Ciudad:"/></td>
        </tr>
        <tr>
            <td><input id="telefono_info_vehiculos" name="telefono_info_vehiculos" type="text"
                       onfocus="borrarCampos('Teléfono:', this)" onblur="escribirCampos('Teléfono:', this)"
                       value="Teléfono:"/></td>
        </tr>
        <tr>
            <td><input id="email_info_vehiculos" name="email_info_vehiculos" type="text"
                       onfocus="borrarCampos('E-mail:', this)" onblur="escribirCampos('E-mail:', this)"
                       value="E-mail:"/></td>
        </tr>
        <tr>
            <td style="height: 50px;"><label>INFORMACIÓN:</label><br/>

                <p style="color: #8A8A8A;font: 10pt Arial;margin-left: 2px;">Ingrese aquí su comentario:</p></td>
        </tr>
        <tr>
            <td><textarea id="info_info_vehiculos" name="info_info_vehiculos" cols="40" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>
                <div>
                    <ul id="alerts" class="alerts"></ul>
                </div>
                <input id="enviar_info_vehiculos" name="enviar_info_vehiculos" type="submit" value="enviar"/></td>
        </tr>
    </table>
    <br/>
</form>

<!--SCRIPT PARA LABELS-->

<script type="text/javascript">
    function borrarCampos(valor, campo) {
        if (campo.value == valor) campo.value = '';
    }

    function escribirCampos(valor, campo) {
        if (campo.value == '') campo.value = valor;
    }
</script>

</body>
</html>