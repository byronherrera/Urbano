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
if ($_POST['enviar_taller']) {
    $nombre = parseToXML($_POST['nombre_taller']);
    $apellido = parseToXML($_POST['apellido_taller']);
    $id_cedula = $_POST['id_taller'];
    $email_apoyo = $_POST['email_taller'];
    $telefono_apoyo = $_POST['telefono_taller'];
    $celular_taller = $_POST['celular_taller'];
    $modelo_taller = $_POST['modelo_taller'];
    $tipo_servicio_taller = $_POST['tipo_servicio_taller'];
    $kilometraje = $_POST['kilometraje'];
    $info_taller = parseToXML($_POST['info_taller']);
    $ciudad_taller = $_POST['ciudad_taller'];
    $taller1 = $_POST['taller'];
    $datepicker = $_POST['datepicker'];
    $hora_taller3 = $_POST['hora_taller3'];
    $taxi_taller = $_POST['taxi_taller'];

    //citas.serviciogmp@andinanet.net
    $talleres_Quito_mail = array("Escoja un taller en Quito", "citas.serviciogmp@andinanet.net", "rsolorzano@autofenix.com.ec", "ambacar_quito_sur@mazda.ec", "servicio_cliente@ecuamotors.com", "mazdacitasabc@hotmail.com", "mayala@autofenix.com.ec", "centro_colisiones@mazda.ec", "andina_talleres_gmp@mazda.ec", "mazmotors_granados@mazda.ec", "citas@lanzoty.com.ec");

    $talleres_Guayaquil_mail = array("Escoja un taller en Guayaquil", "servicio_cliente.gye@ecuamotors.com ", "ecastro@mazmotors.com.ec " /*,"citaslitoral@mazmotors.com.ec"*/);

    $talleres_Ambato_mail = array("Escoja un taller en Ambato", "ambacar_ambato@mazda.ec", "msalazar@ambamazda.com");

    $talleres_Cuenca_mail = array("Escoja un taller en Cuenca", "citas@impartes.com");

    $talleres_Ibarra_mail = array("Escoja un taller en Ibarra", "comercial_hidrobo@mazda.ec");

    $talleres_Quevedo_mail = array("Escoja un taller en Quevedo", "importadora_guzman@mazda.ec");

    $talleres_Machala_mail = array("Escoja un taller en Machala", "autofron@mazda.ec", "oroauto@mazda.ec");

    $talleres_Loja_mail = array("Escoja un taller en Loja", "citastalleres@lojacar.com.ec");

    $talleres_Manta_mail = array("Escoja un taller en Manta", "equiroz@mazmotors.com.ec");

    $talleres_Sto_Domingo_mail = array("Escoja un taller en Sto. Domingo", "mazmotors_sto_domingo@mazda.ec");

    $talleres_Riobamba_mail = array("Escoja un taller en Riobamba", "msalazar@ambamazda.com");

    $talleres_Latacunga_mail = array("Escoja un taller en Latacunga", "bcardenas@ambamazda.com");

    $talleres_Fco_de_Orellana_mail = array("Escoja un taller en Fco. de Orellana", "mazmotors_el_coca@mazda.ec");

    $talleres_14_array = array("Escoja un taller en Cayambe", "comercial_hidrobo_cayambe@mazda.ec");

    if ($ciudad_taller == 'Quito') {
        $to = $talleres_Quito_mail[$taller1];
    }

    if ($ciudad_taller == 'Guayaquil') {
        $to = $talleres_Guayaquil_mail[$taller1];
    }

    if ($ciudad_taller == 'Ambato') {
        $to = $talleres_Ambato_mail[$taller1];
    }

    if ($ciudad_taller == 'Cuenca') {
        $to = $talleres_Cuenca_mail[$taller1];
    }

    if ($ciudad_taller == 'Ibarra') {
        $to = $talleres_Ibarra_mail[$taller1];
    }

    if ($ciudad_taller == 'Quevedo') {
        $to = $talleres_Quevedo_mail[$taller1];
    }

    if ($ciudad_taller == 'Machala') {
        $to = $talleres_Machala_mail[$taller1];
    }

    if ($ciudad_taller == 'Loja') {
        $to = $talleres_Loja_mail[$taller1];
    }

    if ($ciudad_taller == 'Manta') {
        $to = $talleres_Manta_mail[$taller1];
    }

    if ($ciudad_taller == 'Sto_Domingo') {
        $to = $talleres_Sto_Domingo_mail[$taller1];
    }

    if ($ciudad_taller == 'Riobamba') {
        $to = $talleres_Riobamba_mail[$taller1];
    }

    if ($ciudad_taller == 'Latacunga') {
        $to = $talleres_Latacunga_mail[$taller1];
    }

    if ($ciudad_taller == 'Fco_de_Orellana') {
        $to = $talleres_Fco_de_Orellana_mail[$taller1];
    }

    if ($ciudad_taller == 'Cayambe') {
        $to = $talleres_14_array[$taller1];
    }
    $to .= ',vcordova@mazda.ec';
    $insert = mysql_query("INSERT INTO mazda_form_infoCitaTaller (nombre, apellido, CI, email, telefono, celular, modelo, tipoServicio, comentario, ciudad, taller, fecha, hora, transporteGratis ) VALUES ('" . $nombre . "','" . $apellido . "','" . $id_cedula . "','" . $email_apoyo . "','" . $telefono_apoyo . "','" . $celular_testdrive . "', '" . $modelo_taller . "', '" . $tipo_servicio_taller . "','" . $info_taller . "', '" . $ciudad_taller . "','" . $taller1 . "', '" . $datepicker . "','" . $hora_taller3 . "', '" . $taxi_taller . "')") or die(mysql_error());
    $query = "SELECT id  FROM mazda_form_otros order by id desc limit 1";
    $result = mysql_query($query);
    while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
        $id = $row['id'];
        $cat = 6;
    }
    $url = "http://www.mazda.com.ec/formularios2/adminInfo.php";

    $contentmsg = '<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="641">
  <tr>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="16" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="16" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="9" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="95" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="159" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="13" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="106" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="52" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="2" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="104" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="11" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="21" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="37" height="1" border="0" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
   <td rowspan="3" colspan="7"><img name="adminContactt_r1_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r1_c1.jpg" width="414" height="104" border="0" id="adminContactt_r1_c1" alt="" /></td>
   <td colspan="6"><img name="adminContactt_r1_c8" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r1_c8.jpg" width="227" height="37" border="0" id="adminContactt_r1_c8" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="37" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="6"><img name="adminContactt_r2_c8" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r2_c8.jpg" width="227" height="28" border="0" id="adminContactt_r2_c8" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="28" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="6"><img name="adminContactt_r3_c8" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r3_c8.jpg" width="227" height="39" border="0" id="adminContactt_r3_c8" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="39" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="5"><img name="adminContactt_r4_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r4_c1.jpg" width="295" height="22" border="0" id="adminContactt_r4_c1" alt="" /></td>
   <td colspan="2"><img name="adminContactt_r4_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r4_c6.jpg" width="119" height="22" border="0" id="adminContactt_r4_c6" alt="" /></td>
   <td colspan="6"><img name="adminContactt_r4_c8" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r4_c8.jpg" width="227" height="22" border="0" id="adminContactt_r4_c8" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="22" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="13"><img name="adminContactt_r5_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r5_c1.jpg" width="641" height="22" border="0" id="adminContactt_r5_c1" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="22" border="0" alt="" /></td>
  </tr>
  <tr>
   <td rowspan="7"><img name="adminContactt_r6_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r6_c1.jpg" width="16" height="184" border="0" id="adminContactt_r6_c1" alt="" /></td>
   <td colspan="3"><img name="adminContactt_r6_c2" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r6_c2.jpg" width="120" height="22" border="0" id="adminContactt_r6_c2" alt="" /></td>
   <td style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $nombre . '</td>
   <td><img name="adminContactt_r6_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r6_c6.jpg" width="13" height="22" border="0" id="adminContactt_r6_c6" alt="" /></td>
   <td colspan="2"><img name="adminContactt_r6_c7" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r6_c7.jpg" width="158" height="22" border="0" id="adminContactt_r6_c7" alt="" /></td>
   <td colspan="4" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $id_cedula . '</td>
   <td><img name="adminContactt_r6_c13" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r6_c13.jpg" width="37" height="22" border="0" id="adminContactt_r6_c13" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="22" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3"><img name="adminContactt_r7_c2" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r7_c2.jpg" width="120" height="22" border="0" id="adminContactt_r7_c2" alt="" /></td>
   <td style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $apellido . '</td>
   <td><img name="adminContactt_r7_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r7_c6.jpg" width="13" height="22" border="0" id="adminContactt_r7_c6" alt="" /></td>
   <td colspan="2"><img name="adminContactt_r7_c7" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r7_c7.jpg" width="158" height="22" border="0" id="adminContactt_r7_c7" alt="" /></td>
   <td colspan="4" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px" >' . $email_apoyo . '</td>
   <td><img name="adminContactt_r7_c13" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r7_c13.jpg" width="37" height="22" border="0" id="adminContactt_r7_c13" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="22" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3"><img name="adminContactt_r8_c2" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r8_c2.jpg" width="120" height="25" border="0" id="adminContactt_r8_c2" alt="" /></td>
   <td style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $telefono_apoyo . '</td>
   <td><img name="adminContactt_r8_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r8_c6.jpg" width="13" height="25" border="0" id="adminContactt_r8_c6" alt="" /></td>
   <td colspan="2"><img name="adminContactt_r8_c7" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r8_c7.jpg" width="158" height="25" border="0" id="adminContactt_r8_c7" alt="" /></td>
   <td colspan="4" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $celular_testdrive . '</td>
   <td><img name="adminContactt_r8_c13" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r8_c13.jpg" width="37" height="25" border="0" id="adminContactt_r8_c13" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="25" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3"><img name="adminContactt_r9_c2" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r9_c2.jpg" width="120" height="22" border="0" id="adminContactt_r9_c2" alt="" /></td>
   <td style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $modelo_taller . '</td>
   <td><img name="adminContactt_r9_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r9_c6.jpg" width="13" height="22" border="0" id="adminContactt_r9_c6" alt="" /></td>
   <td colspan="2"><img name="adminContactt_r9_c7" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r9_c7.jpg" width="158" height="22" border="0" id="adminContactt_r9_c7" alt="" /></td>
   <td colspan="4" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $tipo_servicio_taller . '</td>
   <td><img name="adminContactt_r9_c13" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r9_c13.jpg" width="37" height="22" border="0" id="adminContactt_r9_c13" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="22" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3"><img name="adminContactt_r10_c2" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r10_c2.jpg" width="120" height="24" border="0" id="adminContactt_r10_c2" alt="" /></td>
   <td style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $ciudad_taller . '</td>
   <td><img name="adminContactt_r10_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r10_c6.jpg" width="13" height="24" border="0" id="adminContactt_r10_c6" alt="" /></td>
   <td colspan="2"><img name="adminContactt_r10_c7" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r10_c7.jpg" width="158" height="24" border="0" id="adminContactt_r10_c7" alt="" /></td>
   <td colspan="4" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $taller1 . '</td>
   <td><img name="adminContactt_r10_c13" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r10_c13.jpg" width="37" height="24" border="0" id="adminContactt_r10_c13" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="24" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3"><img name="adminContactt_r11_c2" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r11_c2.jpg" width="120" height="26" border="0" id="adminContactt_r11_c2" alt="" /></td>
   <td style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $datepicker . '</td>
   <td><img name="adminContactt_r11_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r11_c6.jpg" width="13" height="26" border="0" id="adminContactt_r11_c6" alt="" /></td>
   <td colspan="2"><img name="adminContactt_r11_c7" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r11_c7.jpg" width="158" height="26" border="0" id="adminContactt_r11_c7" alt="" /></td>
   <td colspan="4" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $hora_taller3 . '</td>
   <td><img name="adminContactt_r11_c13" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r11_c13.jpg" width="37" height="26" border="0" id="adminContactt_r11_c13" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="26" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3"><img name="adminContactt_r12_c2" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r12_c2.jpg" width="120" height="43" border="0" id="adminContactt_r12_c2" alt="" /></td>
   <td style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">' . $taxi_taller . '</td>
   <td colspan="8"><img name="adminContactt_r12_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r12_c6.jpg" width="346" height="43" border="0" id="adminContactt_r12_c6" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="43" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="13"><img name="adminContactt_r13_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r13_c1.jpg" width="641" height="31" border="0" id="adminContactt_r13_c1" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="31" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="5"><img name="adminContactt_r14_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r14_c1.jpg" width="295" height="25" border="0" id="adminContactt_r14_c1" alt="" /></td>
   <td colspan="8"><img name="adminContactt_r14_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r14_c6.jpg" width="346" height="25" border="0" id="adminContactt_r14_c6" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="25" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="5"><img name="adminContactt_r15_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r15_c1.jpg" width="295" height="19" border="0" id="adminContactt_r15_c1" alt="" /></td>
   <td colspan="8"><img name="adminContactt_r15_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r15_c6.jpg" width="346" height="19" border="0" id="adminContactt_r15_c6" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="19" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3"><img name="adminContactt_r16_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r16_c1.jpg" width="41" height="152" border="0" id="adminContactt_r16_c1" alt="" /></td>
   <td colspan="8" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px; border:1px solid grey;">' . $info_taller . '</td>
   <td colspan="2"><img name="adminContactt_r16_c12" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r16_c12.jpg" width="58" height="152" border="0" id="adminContactt_r16_c12" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="152" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="5"><img name="adminContactt_r17_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r17_c1.jpg" width="295" height="43" border="0" id="adminContactt_r17_c1" alt="" /></td>
   <td colspan="8"><img name="adminContactt_r17_c6" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r17_c6.jpg" width="346" height="43" border="0" id="adminContactt_r17_c6" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="43" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="9"><img name="adminContactt_r18_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r18_c1.jpg" width="468" height="23" border="0" id="adminContactt_r18_c1" alt="" /></td>
   <td colspan="2"><a href="' . $url . "?id=" . $id . "&cat=" . $cat . '"><img name="adminContactt_r18_c10" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r18_c10.jpg" width="115" height="23" border="0" id="adminContactt_r18_c10" alt="" /></a></td>
   <td colspan="2"><img name="adminContactt_r18_c12" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r18_c12.jpg" width="58" height="23" border="0" id="adminContactt_r18_c12" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="23" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="13"><img name="adminContactt_r19_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r19_c1.jpg" width="641" height="32" border="0" id="adminContactt_r19_c1" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="32" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="2"><img name="adminContactt_r20_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r20_c1.jpg" width="32" height="41" border="0" id="adminContactt_r20_c1" alt="" /></td>
   <td colspan="8" style="font-family:Arial, Helvetica, sans-serif; font-size:8px;">*Aplican condiciones y restricciones. Productos y servicios sujetos a cambios sin previo aviso. La información de la ficha técnica, colores, modelos, imágenes, precios, otras especificaciones son meramente referenciales e ilustrativas y pueden no coincidir con los productos exhibidos y ofrecidos en los Concesionarios Mazda.
Para mayor información y detalles acérquese al Concesionario Mazda de su preferencia.
*CRDI:Common Rail Diesel Injection </td>
   <td colspan="3"><img name="adminContactt_r20_c11" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r20_c11.jpg" width="69" height="41" border="0" id="adminContactt_r20_c11" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="41" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="13"><img name="adminContactt_r21_c1" src="http://www.mazda.com.ec/formularios2/mailingRequest/images/adminContactt_r21_c1.jpg" width="641" height="12" border="0" id="adminContactt_r21_c1" alt="" /></td>
   <td><img src="http://www.mazda.com.ec/formularios2/mailingRequest/images/spacer.gif" width="1" height="12" border="0" alt="" /></td>
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
   <td colspan="3" style="font-family:Arial, Helvetica, sans-serif; color:#FFFFFF; background-color:#333333;">Info. Taller</td>
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
   <td colspan="2" style="font-family:Arial, Helvetica, sans-serif; color:#0086B5;" >ICT' . $id . 'ID</td>
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
   <td colspan="7" style="font-family:Arial, Helvetica, sans-serif; font-size:8px;">*Aplican condiciones y restricciones. Productos y servicios sujetos a cambios sin previo aviso. La informaci&oacute;n de la ficha t&eacute;cnica, colores, modelos, im&aacute;genes, precios, otras especificaciones son meramente referenciales e ilustrativas y pueden no coincidir con los productos exhibidos y ofrecidos en los Concesionarios Mazda.<br />
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
    $subjectmsg = "Informacion Cita Taller";

// Mail setup
    $to = "aguevara@maresa.com.ec"; //Put your email here
    $to = recuperaEmail(7);
    $subject = "NUEVA SOLICITUD DE CITA TALLER | www.mazda.com.ec";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    $headers .= "From: " . $email_apoyo . "\n";

//Notify that the message was sent
    $headers2 .= "From: web@mazda.com.ec\n";
    $headers2 .= "Reply-To: " . $to . "\r\n"; //Put the email to reply
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
<title>Info Taller</title>
<link rel="stylesheet" href="../../templates/mazda/css/template.css" type="text/css"/>
<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet"
      type="text/css"/>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

<script src="../../templates/mazda/js/ui/i18n/jquery.ui.datepicker-es.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $("#datepicker").datepicker();
    });
</script>

<!--para validacion jquery-->
<script src="../../templates/mazda/js/jquery.validate.js" type="text/javascript"></script>

<script type="text/javascript"><!--
$(document).ready(function () {

    jQuery.validator.addMethod("default_value", function (value, element, string) {
        if (value == string)
            return false;
        return true;
    }, "Por favor ingrese un valor");


    /*VALIDATION SECTION*/
    $("#f_taller").validate({
        errorLabelContainer:"#alerts",
        wrapper:"li",
        onfocusout:false,
        onkeyup:false,
        rules:{
            nombre_taller:{
                required:true,
                default_value:"Nombre:"
            },
            apellido_taller:{
                required:true,
                default_value:"Apellido:"
            },
            id_taller:{
                required:true,
                default_value:"No. de identificación:"
            },
            email_taller:{
                email:true
            },
            telefono_taller:{
                required:true,
                default_value:"Teléfono:",
                digits:true,
                minlength:7
            },
            celular_taller:{
                required:true,
                default_value:"Celular:",
                digits:true,
                minlength:7
            },
            modelo_taller:{
                required:true
            },
            tipo_servicio_taller:{
                required:true
            },
            info_taller:{
                required:true
            },
            ciudad_taller:{
                required:true
            },
            taller1:{
                required:true
            },
            datepicker:{
                required:true
            },
            hora_taller3:{
                required:true
            },
            taxi_taller:{
                required:true
            }

        },
        messages:{
            nombre_taller:{
                required:"Nombre es campo requerido",
                default_value:"Ingrese un valor para el campo Nombre"
            },
            apellido_taller:{
                required:"Apellido es campo requerido",
                default_value:"Ingrese un valor para el campo Apellido"
            },
            id_taller:{
                required:"No. de Identificaci&oacute;n es campo requerido",
                default_value:"Ingrese un valor para el campo No. de Identificaci&oacute;n"
            },
            email_taller:{
                email:'Ingrese un E-mail v&aacute;lido'
            },
            telefono_taller:{
                required:"Tel&eacute;fono es campo requerido",
                default_value:"Ingrese un valor para el campo Tel&eacute;fono",
                digits:'El campo Tel&eacute;fono s&oacute;lo acepta d&iacute;gitos',
                minlength:'El campo Tel&eacute;fono debe tener m&iacute;nimo 7 d&iacute;gitos'
            },
            celular_taller:{
                digits:'El campo Celular s&oacute;lo acepta d&iacute;gitos',
                minlength:'El campo Celular debe tener m&iacute;nimo 7 d&iacute;gitos'
            },

            modelo_taller:{
                required:"Modelo es campo requerido"
            },
            tipo_servicio_taller:{
                required:"Tipo de servicio es campo requerido"
            },
            info_taller:{
                required:"Que necesita  es campo requerido"
            },
            ciudad_taller:{
                required:"Ciudad  es campo requerido"
            },
            taller1:{
                required:"Taller  es campo requerido"
            },
            datepicker:{
                required:"Fecha de preferencia es campo requerido"
            },
            hora_taller3:{
                required:"Hora es campo requerido"
            },
            taxi_taller:{
                required:"Taxi es campo requerido"
            }

        }
    });
    /*END VALIDATION SECTION*/
});
// --></script>

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
        width: 650px;
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

<div class="select_contentTaller">
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

<!--FORMULARIO CITA TALLER-->
<form id="f_taller" name="f_taller" method="post" action="">
    <table width="920" border="0">
        <tr>
            <td><h3>CITA TALLER</h3></td>
            <td colspan="2"><?php
                if ($mensaje != "") {
                    echo "<div class='success'>" . ($mensaje) . "</div>";
                }
                ?></td>
        </tr>
        <tr>
            <td style="width:410px;"><input id="nombre_taller" class="required" name="nombre_taller" type="text"
                                            onfocus="borrarCampos('Nombre:', this)"
                                            onblur="escribirCampos('Nombre:', this)" value="Nombre:"/></td>
            <td colspan="2" style="width:410px;"><input id="apellido_taller" class="required" name="apellido_taller"
                                                        type="text" onfocus="borrarCampos('Apellido:', this)"
                                                        onblur="escribirCampos('Apellido:', this)" value="Apellido:"/>
            </td>
        </tr>
        <tr>
            <td style="width:410px;"><input id="id_taller" class="required" name="id_taller" type="text"
                                            onfocus="borrarCampos('No. de identificación:', this)"
                                            onblur="escribirCampos('No. de identificación:', this)"
                                            value="No. de identificación:"/></td>
            <td colspan="2" style="width:410px;"><input id="email_taller" class="required" name="email_taller"
                                                        type="text" onfocus="borrarCampos('E-mail:', this)"
                                                        onblur="escribirCampos('E-mail:', this)" value="E-mail:"/></td>
        </tr>
        <tr>
            <td style="width:410px;"><input id="telefono_taller" class="required" name="telefono_taller" type="text"
                                            onfocus="borrarCampos('Teléfono:', this)"
                                            onblur="escribirCampos('Teléfono:', this)" value="Teléfono:"/></td>
            <td colspan="2" style="width:410px;"><input id="celular_taller" class="required" name="celular_taller"
                                                        type="text" onfocus="borrarCampos('Celular:', this)"
                                                        onblur="escribirCampos('Celular:', this)" value="Celular:"/>
            </td>
        </tr>
        <tr>
            <td style="width:410px;"><label for="modelo_taller">modelo</label>

                <div class="select_contentTaller">
                    <select name="modelo_taller" id="modelo_taller">
                        <option value="0">Seleccione un modelo</option>
                        <option value="B-SERIES">B-SERIES</option>
                        <option value="BT-50 GASOLINA">BT-50 GASOLINA</option>
                        <option value="BT-50 DIESEL">BT-50 DIESEL</option>
                        <option value="Allegro">Allegro</option>
                        <option value="Mazda 2">Mazda 2</option>
                        <option value="Mazda 3">Mazda 3</option>
                        <option value="Mazda 5">Mazda 5</option>
                        <option value="Marda 6">Marda 6</option>
                        <option value="CX-7">CX-5</option>
                        <option value="CX-7">CX-7</option>
                        <option value="CX-9">CX-9</option>
                        <option value="TRIBUTE">TRIBUTE</option>
                    </select></div>
            </td>
            <td style="width:410px;"><label for="Tipo de Servicio">Tipo de Servicio</label>

                <div class="select_contentTaller">
                    <select name="tipo_servicio_taller" id="tipo_servicio_taller" onchange="mantenimiento()">
                        <option value="0">Motivo de la visita</option>
                        <option value="Mantenimiento preventivo">Mantenimiento preventivo</option>
                        <option value="Reparación mecánica">Reparación mecánica</option>
                        <option value="Servicio de enderezada y/o pintura">Servicio de enderezada y/o pintura</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>
            </td>
            <td><label>&nbsp;</label>

                <div class="select_content_mini" id="combo_km" style="display:none;">
                    <select id="kilometraje" size="1" name="kilometraje">
                        <option value="0">Kilometraje</option>
                        <option value="1000 km">1000 km</option>
                        <option value="5000 km">5000 km</option>
                        <option value="10000 km">10000 km</option>
                        <option value="15000 km">15000 km</option>
                        <option value="20000 km">20000 km</option>
                        <option value="25000 km">25000 km</option>
                        <option value="30000 km">30000 km</option>
                        <option value="35000 km">35000 km</option>
                        <option value="40000 km">40000 km</option>
                        <option value="45000 km">45000 km</option>
                        <option value="50000 km">50000 km</option>
                        <option value="55000 km">55000 km</option>
                        <option value="60000 km">60000 km</option>
                        <option value="65000 km">65000 km</option>
                        <option value="70000 km">70000 km</option>
                        <option value="75000 km">75000 km</option>
                        <option value="80000 km">80000 km</option>
                        <option value="85000 km">85000 km</option>
                        <option value="90000 km">90000 km</option>
                        <option value="95000 km">95000 km</option>
                        <option value="100000 km">100000 km</option>
                    </select></div>
            </td>
        </tr>
        <tr>
            <td colspan="3"><label>INFORMACIÓN:</label>
                <br/>

                <p>¿Qué necesita?</p></td>
        </tr>
        <tr>
            <td colspan="3"><textarea name="info_taller" cols="40" rows="3" id="info_taller"></textarea></td>
        </tr>
        <tr>
            <td><label for="ciudad_taller">Ciudad</label>

                <div class="select_contentTaller">
                    <select name="ciudad_taller" id="ciudad_taller" onchange="cambia_taller()">
                        <option value="0" selected="selected">Seleccione una ciudad</option>
                        <option value="Quito">Quito</option>
                        <option value="Guayaquil">Guayaquil</option>
                        <option value="Ambato">Ambato</option>
                        <option value="Cuenca">Cuenca</option>
                        <option value="Ibarra">Ibarra</option>
                        <option value="Quevedo">Quevedo</option>
                        <option value="Machala">Machala</option>
                        <option value="Loja">Loja</option>
                        <option value="Manta">Manta</option>
                        <option value="Sto_Domingo">Sto. Domingo</option>
                        <option value="Riobamba">Riobamba</option>
                        <option value="Latacunga">Latacunga</option>
                        <option value="Fco_de_Orellana">Fco. de Orellana</option>
                        <option value="Cayambe">Cayambe</option>
                    </select></div>
            </td>
            <td colspan="2">
                <label for="taller">Taller</label>

                <div class="select_contentTaller">
                    <select name="taller" id="taller1">
                        <option value="-">Seleccione primero una ciudad y luego escoja un taller</option>
                    </select></div>
            </td>
        </tr>
        <tr>
            <td><label for="fecha_taller2">Fecha de preferencia</label>
                <input class="input_dobles" type="text" name="datepicker" id="datepicker"/></td>
            <td colspan="2"><label for="hora_taller3">Hora</label>

                <div class="select_contentTaller">
                    <select name="hora_taller3" id="hora_taller3">
                        <option value="0" selected="selected">Escoja una hora</option>
                        <option value="08:00">08:00</option>
                        <option value="08:30">08:30</option>
                        <option value="09:00">09:00</option>
                        <option value="09:30">09:30</option>
                        <option value="10:00">10:00</option>
                        <option value="10:30">10:30</option>
                        <option value="11:00">11:00</option>
                        <option value="11:30">11:30</option>
                        <option value="12:00">12:00</option>
                        <option value="12:30">12:30</option>
                        <option value="13:00">13:00</option>
                        <option value="13:30">13:30</option>
                        <option value="14:00">14:00</option>
                        <option value="14:30">14:30</option>
                        <option value="15:00">15:00</option>
                        <option value="15:30">15:30</option>
                        <option value="16:00">16:00</option>
                        <option value="16:30">16:30</option>
                        <option value="17:00">17:00</option>
                    </select></div>
            </td>
        </tr>
        <tr>
            <td><label>Transporte Gratuito Mazda.</label>

                <p>¿Le podemos ayudar con un Taxi?</p></td>
            <td colspan="2">
                <div class="select_content_mini">
                    <select name="taxi_taller" id="taxi_taller">
                        <option value="No">No</option>
                        <option value="Si">Si</option>
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div>
                    <ul id="alerts" class="alerts"></ul>
                </div>
                <input id="enviar_taller" name="enviar_taller" type="submit" value="enviar"/></td>
        </tr>
    </table>

</form>

<!--SCRIPT PARA FUNCTION CAMBIA_TALLER-->

<script type="text/javascript">
    var talleres_Quito = new Array("Escoja un taller en Quito", "AUTOMOTORES ANDINA (GMP)", "AUTOFENIX SAN RAFAEL", "AMBACAR QUITO SUR", "ECUAMOTORS QUITO", "ABC AUTOMOTRIZ", "AUTOFENIX CUMBAYÁ", "CENTRO DE COLISIONES MAZDA (AUTO LOOK)", "ANDINA - TALLERES GMP", "MARESACENTER GRANADOS", "LANZOTY (TECNOMUNDO)")

    var talleres_Guayaquil = new Array("Escoja un taller en Guayaquil", "ECUAMOTORS GUAYAQUIL", "MARESACENTER CJA (NIKKEI)")

    var talleres_Ambato = new Array("Escoja un taller en Ambato", "AMBACAR AMBATO (AUTOMECANO)", "AMBANDINE")

    var talleres_Cuenca = new Array("Escoja un taller en Cuenca", "IMPARTES")


    var talleres_Ibarra = new Array("Escoja un taller en Ibarra", "COMERCIAL HIDROBO")

    var talleres_Quevedo = new Array("Escoja un taller en Quevedo", "IMPORTADORA GUZMÁN")

    var talleres_Machala = new Array("Escoja un taller en Machala", "AUTOFRON (AUTOCAM)", "OROAUTO (AUTOTALLERES)")

    var talleres_Loja = new Array("Escoja un taller en Loja", "LOJACAR")

    var talleres_Manta = new Array("Escoja un taller en Manta", "MARESACENTER MANTA")

    var talleres_Sto_Domingo = new Array("Escoja un taller en Sto. Domingo", "MARESACENTER SANTO DOMINGO")

    var talleres_Riobamba = new Array("Escoja un taller en Riobamba", "AMBANDINE RIOBAMBA")

    var talleres_Latacunga = new Array("Escoja un taller en Latacunga", "AMBANDINE LATACUNGA")

    var talleres_Fco_de_Orellana = new Array("Escoja un taller en Fco. de Orellana", "MARESACENTER EL COCA")

    var talleres_14 = new Array("Escoja un taller en Cayambe", "COMERCIAL HIDROBO CAYAMBE")

    function cambia_taller() {
        //tomo el valor del select de la ciudad elegida
        var ciudad_taller
        ciudad_taller = document.f_taller.ciudad_taller[document.f_taller.ciudad_taller.selectedIndex].value
        //miro a ver si la ciudad está definida
        if (ciudad_taller != 0) {
            //si estaba definida, entonces coloco las opciones del tipo de reclamo correspondiente.
            //selecciono el array del taller adecuado
            mis_talleres = eval("talleres_" + ciudad_taller)
            //calculo el numero de talleres
            num_talleres = mis_talleres.length
            //marco el número de talleres en el select
            document.f_taller.taller.length = num_talleres
            //para cada tipo del array, la introduzco en el select
            for (i = 0; i < num_talleres; i++) {
                document.f_taller.taller.options[i].value = i;
                document.f_taller.taller.options[i].text = mis_talleres[i]
            }
        } else {
            //si no había tipo seleccionado, elimino los talleres del select
            document.f_taller.taler.length = 1
            //coloco un guión en la única opción que he dejado
            document.f_taller.taller.options[0].value = "-"
            document.f_taller.taller.options[0].text = "-"
        }
        //marco como seleccionada la opción primera de taller
        document.f_taller.taller.options[0].selected = true
    }
</script>
<!--SCRIPT PARA LABELS-->
<script type="text/javascript">
    function borrarCampos(valor, campo) {
        if (campo.value == valor) campo.value = '';
    }

    function escribirCampos(valor, campo) {
        if (campo.value == '') campo.value = valor;
    }
</script>
<!--SCRIPT PARA VISIBLE/HIDDEN-->
<script language="JavaScript">
        function mantenimiento() {
            var klm = document.f_taller.tipo_servicio_taller[document.f_taller.tipo_servicio_taller.selectedIndex].value;
            if (klm == "Mantenimiento preventivo") {
                document.getElementById("combo_km").style.display = "block";
            }
            else {
                document.getElementById("combo_km").style.display = "none";
            }
        }
</script>
</body>
</body>
</html>
