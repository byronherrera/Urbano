<?php
include "connections/conexion.php";
include "../forms/emailService.php";
mysql_set_charset("utf8");
function parseToXML($htmlStr)
{
        $xmlStr=str_replace('<','&lt;',$htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    $xmlStr=str_replace("ñ",'&#x0F1;',$xmlStr);
    $xmlStr=str_replace("Ñ",'&#x0D1;',$xmlStr);
    $xmlStr=str_replace("á",'&#x0E1;',$xmlStr);
    $xmlStr=str_replace("é",'&#x0E9;',$xmlStr);
    $xmlStr=str_replace("í",'&#x0ED;',$xmlStr);
    $xmlStr=str_replace("ó",'&#x0F3;',$xmlStr);
    $xmlStr=str_replace("ú",'&#x0FA;',$xmlStr);
    $xmlStr=str_replace("Á",'&#x0C1;',$xmlStr);
    $xmlStr=str_replace("É",'&#x0C9;',$xmlStr);
    $xmlStr=str_replace("Í",'&#x0CD;',$xmlStr);
    $xmlStr=str_replace("Ó",'&#x0D3;',$xmlStr);
    $xmlStr=str_replace("Ú",'&#x0DA;',$xmlStr);
   
    return $xmlStr;
}
    $array [0] = "";
    $array [1] = "urba_form_infoCorporativa";
    $array [2] = "urba_form_servCliente";
    $array [3] = "urba_form_trabajaNosotros";
 	 
	$id=$_GET['id'];
    			$cat=$_GET['cat'];
    if (isset($_POST['enviar'])){
		$nombreAp=parseToXML($_POST['nombAp']);
		$emailUsr=parseToXML($_POST['e-mail']);
		$paisUsr=parseToXML($_POST['nombPais']);
		$respuesta=parseToXML($_POST['respuestaAdmin']);
		
	
	$contentmsg='<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="641">
  <tr>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="30" height="1" border="0" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="29" height="1" border="0" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="4" height="1" border="0" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="92" height="1" border="0" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="47" height="1" border="0" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="135" height="1" border="0" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="100" height="1" border="0" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="118" height="1" border="0" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="47" height="1" border="0" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="10" height="1" border="0" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="29" height="1" border="0" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="1" height="1" border="0" alt="" /></td>
  </tr>

  <tr>
   <td rowspan="3" colspan="7"><img name="adminContactAnswer_r1_c1" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r1_c1.jpg" width="437" height="92" border="0" id="adminContactAnswer_r1_c1" alt="" /></td>
   <td colspan="4"><img name="adminContactAnswer_r1_c8" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r1_c8.jpg" width="204" height="38" border="0" id="adminContactAnswer_r1_c8" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="1" height="38" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3" style="background-color:#333333;"></td>
   <td><img name="adminContactAnswer_r2_c11" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r2_c11.jpg" width="29" height="23" border="0" id="adminContactAnswer_r2_c11" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="1" height="23" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="4"><img name="adminContactAnswer_r3_c8" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r3_c8.jpg" width="204" height="31" border="0" id="adminContactAnswer_r3_c8" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="1" height="31" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="7"><img name="adminContactAnswer_r4_c1" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r4_c1.jpg" width="437" height="39" border="0" id="adminContactAnswer_r4_c1" alt="" /></td>
   <td colspan="4"><img name="adminContactAnswer_r4_c8" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r4_c8.jpg" width="204" height="39" border="0" id="adminContactAnswer_r4_c8" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="1" height="39" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="4"><img name="adminContactAnswer_r5_c1" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r5_c1.jpg" width="155" height="26" border="0" id="adminContactAnswer_r5_c1" alt="" /></td>
   <td colspan="2" style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-size:12px;">'.$nombreAp.'</td>
   <td><img name="adminContactAnswer_r5_c7" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r5_c7.jpg" width="100" height="26" border="0" id="adminContactAnswer_r5_c7" alt="" /></td>
   <td colspan="4"><img name="adminContactAnswer_r5_c8" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r5_c8.jpg" width="204" height="26" border="0" id="adminContactAnswer_r5_c8" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="1" height="26" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="3"><img name="adminContactAnswer_r6_c1" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r6_c1.jpg" width="63" height="27" border="0" id="adminContactAnswer_r6_c1" alt="" /></td>
   <td colspan="2"><img name="adminContactAnswer_r6_c4" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r6_c4.jpg" width="139" height="27" border="0" id="adminContactAnswer_r6_c4" alt="" /></td>
   <td style="font-family:Arial, Helvetica, sans-serif; color:#0086B5; font-size:12px; text-align:center;">'.$cat.''.$id.'ID</td>
   <td><img name="adminContactAnswer_r6_c7" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r6_c7.jpg" width="100" height="27" border="0" id="adminContactAnswer_r6_c7" alt="" /></td>
   <td colspan="4"><img name="adminContactAnswer_r6_c8" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r6_c8.jpg" width="204" height="27" border="0" id="adminContactAnswer_r6_c8" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="1" height="27" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="11"><img name="adminContactAnswer_r7_c1" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r7_c1.jpg" width="641" height="22" border="0" id="adminContactAnswer_r7_c1" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="1" height="22" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="2"><img name="adminContactAnswer_r8_c1" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r8_c1.jpg" width="59" height="109" border="0" id="adminContactAnswer_r8_c1" alt="" /></td>
   <td colspan="7" style="font-family:Arial, Helvetica, sans-serif; color:#333333; font-size:12px; vertical-align:text-top; padding-top:8px; padding-left:8px; border:1px solid #333333;">'.$respuesta.'</td>
   <td colspan="2"><img name="adminContactAnswer_r8_c10" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r8_c10.jpg" width="39" height="109" border="0" id="adminContactAnswer_r8_c10" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="1" height="109" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="11"><img name="adminContactAnswer_r9_c1" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r9_c1.jpg" width="641" height="34" border="0" id="adminContactAnswer_r9_c1" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="1" height="34" border="0" alt="" /></td>
  </tr>
  <tr>
   <td><img name="adminContactAnswer_r10_c1" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r10_c1.jpg" width="30" height="39" border="0" id="adminContactAnswer_r10_c1" alt="" /></td>
   <td colspan="7" style="font-family:Arial, Helvetica, sans-serif; font-size:6px; color:#333333;">Aplican condiciones y restricciones. Productos y servicios sujetos a cambios sin previo aviso. La informaci&oacute;n de la ficha t&eacute;cnica, colores, modelos, im&aacute;genes, precios, otras especificaciones son meramente referenciales e ilustrativas y pueden no coincidir con los productos exhibidos y ofrecidos en los Concesionarios Mazda.
Para mayor información y detalles acérquese al Concesionario Mazda de su preferencia.
*CRDI:Common Rail Diesel Injection</td>
   <td colspan="3"><img name="adminContactAnswer_r10_c9" src="'.$rutaBase.'s2/mailingRequest/images/adminContactAnswer_r10_c9.jpg" width="86" height="39" border="0" id="adminContactAnswer_r10_c9" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="1" height="39" border="0" alt="" /></td>
  </tr>
  <tr>
   <td colspan="11"><img name="adminContactAnswer_r11_c1" src="'.$rutaBase.'formularios2/mailingRequest/images/adminContactAnswer_r11_c1.jpg" width="641" height="9" border="0" id="adminContactAnswer_r11_c1" alt="" /></td>
   <td><img src="'.$rutaBase.'formularios2/mailingRequest/images/spacer.gif" width="1" height="9" border="0" alt="" /></td>
  </tr>
  <tr>
  <td colspan="12" style="font-family:Arial, Helvetica, sans-serif; color:#333;font-size:12px">Por favor no responda a este mail.</td>
  </tr>
</table>';
	
	//Variables for notifying
	$subjectrecep = "Tu mensaje ha sido recibido.";
	$subjectmsg="Informacion Cita Taller";
	

    $headers2 = "";
	$subject="TU SOLICITUD HA SIDO PROCESADA | URBANO"; 
	//Notify that the message was sent
	$headers2 .= "From: web@urbano.com.ec\n";
	$headers2 .= "MIME-Version: 1.0\r\n";
	$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	mail($emailUsr,$subject,$contentmsg,$headers2); //enviaalUsuario
        $query = "UPDATE $array[$cat] SET estadoMensaje='Respondido', respuestaAdministrador='$respuesta' , fecharespuesta = NOW() WHERE id='$id'";
        $result =  mysql_query($query);

	header('Location: adminInfo.php?cat='.$cat.'&pais='.$paisUsr);
	include "connections/cerrarConexion.php";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<link rel="stylesheet" href="css/template.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Respuesta Administrador Urbano</title>
</head>
<body>
<div id="top-bar">
	</div>
	
    <div id="main-wrapper"> <!--start wrapper widht: 1000px-->
    
        <div id="top-menu">
        </div>        
        <div id="main-menu">
         <div id="back" style="color:#FFFFFF; font-family: UrbanoRegular; float:right; margin-top:11px; margin-right:25px; text-transform:uppercase;"><?php echo('Administrador de Contactos'); ?> </div>
	  </div>
        
        <div id="logo-wrapper">
        	<div id="logo">
        	<h1></h1>
            </div>
		</div>

<div id="answerAdmin" style="margin-left:180px;">
<table width="700" border="0">
<?php
    include "connections/conexion.php";

    $query  = "SELECT * FROM  $array[$cat]  WHERE id='$id';";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		if ($row['respuestaAdministrador']==""){
		echo '<tr > <form method="post" action="">';
		echo '<td style="width:80px; font-family:UrbanoRegular; font-weight:bold;"> Nombre:</td>';
			echo '<td style="width:80px;"><input type=text name="nombAp" style="width:250px !important;" value="'.$row['nombre'].' '.$row['apellido'].'"></td>';
		echo '</tr>';
		echo '<tr>';
			echo '<td style="width:80px; font-family:UrbanoRegular; font-weight:bold;">Fecha:</td>';
			echo '<td><input type=text style="width:250px !important;" value="'.$row['fechaMensaje'].'"></td>';
		echo '</tr>';				 
		echo '<tr>';
			echo '<td style="width:80px; font-family:UrbanoRegular; font-weight:bold;">Ciudad:</td>';
			echo '<td><input type=text style="width:250px !important;" value="'.$row['ciudad'].'"></td>';
		echo '</tr>';

        echo '<tr>';
        echo '<td style="width:80px; font-family:UrbanoRegular; font-weight:bold;">País:</td>';
        echo '<td><input name="nombPais" type=text style="width:250px !important;" value="'.$row['pais'].'"></td>';
        echo '</tr>';

		echo '<tr>';
			echo '<td style="width:80px;  font-family:UrbanoRegular; font-weight:bold;">Telefono:</td>';
			echo '<td align="left"><input type=text style="width:250px !important;" value="'.$row['telefono'].'"></td>';
		echo '</tr>';
        echo '<tr>';
        echo '<td style="width:80px;  font-family:UrbanoRegular; font-weight:bold;">E-mail:</td>';
        echo '<td align="left"><input name="e-mail" type=text style="width:250px !important;" value="'.$row['email'].'"></td>';
        echo '</tr>';
		echo '<tr>';
			echo '<td style="width:80px; font-family:UrbanoRegular; font-weight:bold;">Comentario:</td>';
		echo '</tr>';
		echo '<tr>';
			echo '<td colspan="2" style="width:250px !important; color:#797979; border:1px solid #ccc; line-height:14px; padding-top:5px; padding-bottom:5px; padding-left:5px; padding-rigth:5px; background-color:#fff;">'.$row['comentario'].'</td>';
		echo '</tr>';
		echo'<tr><td style="width:80px; font-family:UrbanoRegular; font-weight:bold;">Administrador:</td></tr>';
		echo'<tr>';
			echo '<td colspan="2" ><textarea rows="20" cols="9" style="width:720px; height:180px;" name="respuestaAdmin"></textarea></td>';
		echo '<tr>'; 
				echo '<td><a href="adminInfo.php?id='.$row['id'].'&cat='.$cat.'&pais='.$row['pais'].'" style="color: #333; font-weight:bold;  font-family:UrbanoRegular; font-size: 15px; border-radius: 3px; -ms-border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px; -khtml-border-radius: 3px; background: #0093D0; border: none; width: 120px !important; height: 30px !important; cursor: pointer;  margin: 10px 0; float: right;
}">< Volver</a></td>';
				echo '<td><input type="submit" name="enviar" value="Responder" style="width:180px !important;"/></td>';
			
			echo '</form></tr>'; 
				}
	
		else
		{
			echo '<tr>';
				echo '<td style="width:200px; font-family:UrbanoRegular; font-weight:bold;">Fecha:</td>';
				echo '<td style="width:250px; color:#484848;"	>'.$row['fechaMensaje'].'</td>';
			echo '</tr>';
            echo '<tr>';
            echo '<td style="width:200px; font-family:UrbanoRegular; font-weight:bold;">Fecha Respuesta:</td>';
            echo '<td style="width:250px; color:#484848;"	>'.$row['fecharespuesta'].'</td>';
            echo '</tr>';
			echo '<tr>';
				echo '<td style="width:200px; font-family:UrbanoRegular; font-weight:bold;">Nombre:</td>';
				echo '<td style="width:250px; color:#484848;">'.$row['nombre'].' '.$row['apellido'].'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:200px; font-family:UrbanoRegular; font-weight:bold;">E-mail:</td>';
				echo '<td style="color:#484848;">'.$row['email'].'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:200px; font-family:UrbanoRegular; font-weight:bold;">Ciudad:</td>';
				echo '<td style="color:#484848;">'.$row['ciudad'].'</td>';
			echo '</tr>';
            echo '<tr>';
				echo '<td style="width:200px; font-family:UrbanoRegular; font-weight:bold;">País:</td>';
				echo '<td style="color:#484848;">'.$row['pais'].'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:200px; font-family:UrbanoRegular; font-weight:bold;">Telefono:</td>';
				echo '<td style="color:#484848;">'.$row['telefono'].'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:200px; font-family:UrbanoRegular; font-weight:bold;">Ciudad:</td>';
				echo '<td style="color:#484848;">'.$row['ciudad'].'</td>';
			echo '</tr>';
			echo '<tr>';
				echo '<td style="width:200px; font-family:UrbanoRegular; font-weight:bold;">Comentario:</td>';
				echo '<td style="color:#484848;">'.$row['comentario'].'</td>';
			echo '</tr>';	
			echo '<tr>';
				echo '<td style="width:200px; font-family:UrbanoRegular; font-weight:bold;">Administrador:</td>';
				echo '<td style="color:#484848;">'.$row['respuestaAdministrador'].'</td>';
			echo '</tr>';	
			echo '<tr>';
			echo '<td colspan="6"><a href="adminInfo.php?id='.$row['id'].'&cat='.$cat.'&pais='.$row['pais'].'" style="color: #333; font-weight:bold;  font-family:UrbanoRegular; font-size: 15px; border-radius: 3px; -ms-border-radius: 3px; -moz-border-radius: 3px; -webkit-border-radius: 3px; -khtml-border-radius: 3px; background: #0093D0; border: none; width: 120px !important; height: 30px !important; cursor: pointer;  margin: 10px 0; float: right;
}">< Volver</a></td>';
			echo '</tr>';
	

		};
	}

?>

</table>
</div>
 <div id="footer">
        	<div class="dashed_line">Todos los derechos reservados</div>
      </div>

</div>
</body>
</html>