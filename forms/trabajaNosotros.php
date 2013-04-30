<?php
include "connections/conexion.php";
mysql_set_charset("utf8");

//mensaje vacío para comprobación en el envío
$mensaje = "";

//Verifico el Submit
	if( $_POST['enviar'] ){
		
		//subir archivo
		if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
		$ruta = "adjuntos/";
		copy($_FILES['archivo']['tmp_name'], $ruta. $_FILES['archivo']['name']);
		$subido = true;
		}
		if($subido) {
		$mensajeArchivo =  "<br /><br />Su hoja de vida ha sido recibida con éxito";
		} else {
		$mensajeArchivo = "<p><strong>Error:</strong>El formato del archivo no es correcto y no puede ser enviado,<br /> utilice los formatos permitidos</p>";
		}
		//fin subir archivo
		
		
		$rutaCurriculum= "http://www.naftadigital.com/urbano/forms/".$ruta. $_FILES['archivo']['name'];
		
		$nombre= $_POST['nombre'];
		$apellido= $_POST['apellido'];
		$empresa= $_POST['empresa'];
		$telefono= $_POST['telefono'];
		$email= $_POST['email'];
		$pais= $_POST['pais'];
		$ciudad= $_POST['ciudad'];
		$comentario= $_POST['comentario'];
		$idioma= $_POST['idioma'];

//mensaje para admin
$adminMSG ='<div style="width:650px;margin:0 auto;background:#FFF;border:2px solid #d8001b;">
<a href="http://www.naftadigital.com/urbano" target="_blank"><img style="margin:15px 0 10px 30px;;" src="http://www.naftadigital.com/urbano/forms/images/logo.jpg" width="165" height="60" /> </a>
<table width="600" border="0" cellspacing="0" cellpadding="5" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#333;margin:0 25px 15px;">
  <tr>
    <td width="100">Hoja de Vida:</td>
    <td width="500"><a style="color:#d8001b;text-decoration:none" href="'.$rutaCurriculum.'" target="_blank">Click aquí</a>&nbsp;para descargar el documento</td>
  </tr>
  <tr>
    <td width="100">Nombre:</td>
    <td width="500">'.$nombre.'</td>
  </tr>
  <tr>
    <td width="100">Apellido:</td>
    <td width="500">'.$apellido.'</td>
  </tr>
  <tr>
    <td width="100">Empresa:</td>
    <td width="500">'.$empresa.'</td>
  </tr>
  <tr>
    <td width="100">Teléfono:</td>
    <td width="500">'.$telefono.'</td>
  </tr>
  <tr>
    <td width="100">E-mail:</td>
    <td width="500">'.$email.'</td>
  </tr>
  <tr>
    <td width="100">País:</td>
    <td width="500">'.$pais.'</td>
  </tr>
  <tr>
    <td width="100">Cuidad:</td>
    <td width="500">'.$ciudad.'</td>
  </tr>
  <tr>
    <td width="100">Comentario:</td>
    <td width="500">'.$comentario.'</td>
  </tr>
</table>
<div style="background:#d8001b;color:#FFF;font-family:Arial, Helvetica, sans-serif;font-size:10px;line-height:21px;text-align:right;height:20px;padding-right:25px;">copyrights&nbsp;&copy;&nbsp;2013</div>
</div>';

//notificacion para mensaje cliente
$notificacion = "Su mensaje ha sido enviado con éxito, daremos respuesta a su aplicación de trabajo lo antes posible. <br/>Gracias por preferirnos para trabajar con nosotros.";
//mensaje para cliente
$clientMSG = '<div style="width:650px;margin:0 auto;background:#FFF;border:2px solid #d8001b;">
<a href="http://www.naftadigital.com/urbano" target="_blank"><img style="margin:15px 0 20px 30px;;" src="http://www.naftadigital.com/urbano/forms/images/logo.jpg" width="165" height="60" /> </a>
<table width="600" border="0" cellspacing="0" cellpadding="5" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#333;margin:0 25px 20px;">
  <tr>
    <td width="65">Estimado(a)</td>
    <td>'.$nombre.'&nbsp;'.$apellido.'</td>
  </tr>
  <tr>
    <td colspan="2">'.$notificacion.'</td>
    </tr>
</table>
<div style="background:#d8001b;color:#FFF;font-family:Arial, Helvetica, sans-serif;font-size:10px;line-height:21px;text-align:right;height:20px;padding-right:25px;">copyrights&nbsp;&copy;&nbsp;2013</div>
</div>';

//Admin mail setup
$to="camilo@3w.nafta.ec"; //Put your email here
$adminSubject="NUEVA SOLICITUD DE TRABAJE CON NOSOTROS | www.urbano.com"; 
$adminHeaders .= "MIME-Version: 1.0\r\n";
$adminHeaders .= "Content-Type: text/html; charset=utf-8\r\n";
$adminHeaders .= "From: ".$email."\n";

//Client mail setup
$clientSubject = "Su aplicación de trabajo ha sido recibida.";
$clientHeaders .= "From: web@urbano.com\n";
$clientHeaders .= "Reply-To: camilo@3w.nafta.ec\r\n"; //Put the email to reply 
$clientHeaders .= "MIME-Version: 1.0\r\n";
$clientHeaders .= "Content-Type: text/html; charset=utf-8\r\n";

//echo utf8_encode('&estado=enviado');
mail($to,$adminSubject,$adminMSG,$adminHeaders);//mail to admin
mail($email,$clientSubject,$clientMSG,$clientHeaders);//mail to client

//variable de idioma
$idioma = 'esp';

//Instert to data base table
$insert = mysql_query("INSERT INTO urba_form_trabajaNosotros (rutaCurriculum, nombre, apellido, empresa, telefono, email, pais, ciudad, comentario, idioma) VALUES ('".$rutaCurriculum."','".$nombre."','".$apellido."','".$empresa."','".$telefono."','".$email."','".$pais."','".$ciudad."','".$comentario."','".$idioma."')") or die(mysql_error());

//mensaje enviado con éxito	
$mensaje = "Hemos recibido su aplicación de trabajo y le daremos respuesta lo antes posible.<br />Gracias por elegirnos para trabajar con nosotros.";

}//Termina verificacion del Submit
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Información Corporativa</title>
<link rel="stylesheet" href="../templates/gantry/css/gantry-custom.css" type="text/css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

	$.validator.addMethod("default_value", function(value, element, string) {
		if( value == string )
			return false;
		return true;
	}, "Por favor ingrese un valor");
	
	$.validator.addMethod('filesize', function(value, element, param) {
    // param = size (en bytes) 
    // element = element to validate (<input>)
    // value = value of the element (file name)
    return this.optional(element) || (element.files[0].size <= param) 
	});


	/*VALIDATION SECTION*/
	$("#form_urbano").validate({
            errorLabelContainer: "#alerts",
            wrapper: "li",
            onfocusout: false,
            onkeyup: false,
            rules: {
				
				archivo:{
					required: true,
					accept: "pdf|doc?x",
					filesize: 3048576,
				},
                nombre: {
					required: true,
					default_value: "Nombre:"
                },
				apellido: {
					required: true,
					default_value: "Apellido:"
				},
				empresa:{
					required: true,
					default_value: "Empresa:"
				},
				telefono:{
					required: true,
					default_value: "Teléfono:",
					digits: true,
					minlength: 7
				},
				email:{
					default_value: "E-maill:",
					email:true
				},
				pais:{
					required: true,
					default_value: "País:"
				},
				ciudad:{
					required: true,
					default_value: "Ciudad:"
				},
				comentario:{
					required:true
				}

            },
			

            messages: {
                archivo: {
					required: "Subir hoja de vida es campo requerido",
					accept: "Formato no permitido, use solo: .pdf, .doc, .docx",
					filesize: "Archivo muy grande, solo archivos de hasta 3Mb."
				},
				nombre: {
					required: "Nombre es campo requerido",
					default_value: "Ingrese un valor para el campo Nombre"
				},
				apellido:{
					required: "Apellido es campo requerido",
					default_value: "Ingrese un valor para el campo Apellido"
				},
				empresa:{
					required: "Empresa es campo requerido",
					default_value: "Ingrese un valor para el campo Empresa"
				},
				telefono:{
					required: "Tel&eacute;fono es campo requerido",
					default_value: "Ingrese un valor para el campo Tel&eacute;fono",
					digits: 'El campo Tel&eacute;fono s&oacute;lo acepta d&iacute;gitos',
					minlength: 'El campo Tel&eacute;fono debe tener m&iacute;nimo 7 d&iacute;gitos'
				},
				email:{
					email: 'Ingrese un E-mail v&aacute;lido'
				},
				pais:{
					required: "País es campo requerido",
					default_value: "Ingrese un valor para el campo Pa&iacute;s"
				},
				ciudad:{
					required: "Ciudad es campo requerido",
					default_value: "Ingrese un valor para el campo Ciudad"
				},
				comentario: {
					required: "Comentario es campo requerido"
                }
            }
    });
    /*END VALIDATION SECTION*/
	
});
</script>

</head>
<body style="background: #FFF;width:635px;margin:0 auto">

<div class="select_content">
<FORM id="selector">
<SELECT ONCHANGE="window.parent.location.href = this.options[this.selectedIndex].value;">
<OPTION VALUE="#">Seleccione el tipo de requerimiento:
<OPTION VALUE="http://www.naftadigital.com/urbano/contacto/submenu/informacion-corporativa.html">Información Corporativa
<OPTION VALUE="http://www.naftadigital.com/urbano/contacto/submenu/servicio-al-cliente.html">Servicio al Cliente
<OPTION VALUE="http://www.naftadigital.com/urbano/contacto/submenu/trabaja-con-nosotros.html">Trabaje con Nosotros
</SELECT>
</FORM>
</div>

<!--FORMULARIO INFORMACION VEHICULOS-->
<form id="form_urbano" name="form_urbano" method="post" action="" enctype="multipart/form-data">
 <table width="700px" border="0">
   <tr>
     <td><h3>TRABAJE CON NOSOTROS</h3></td>
   </tr>
   <tr>   
      <td><?php 
if ($mensaje!=""){
	echo "<div class='success'>".$mensaje.$mensajeArchivo."</div>";
	}
?></td>
   </tr>
   <tr>
     <td><div class="subir-archivo">Suba su hoja de vida aquí:</div><input id="archivo" name="archivo" type="file" onfocus="borrarCampos('Subir hoja de vida:', this)" onblur="escribirCampos('Subir hoja de vida:', this)" value="Subir hoja de vida:" /></td>
   </tr>
   <tr>
    <td><div class="subir-archivo">Puede subir archivos en formato PDF (.pdf) o WORD (.doc, .docx)</div><br /><br /></td>
   </tr>
   <tr>
     <td><input id="nombre" name="nombre" type="text" onfocus="borrarCampos('Nombre:', this)" onblur="escribirCampos('Nombre:', this)" value="Nombre:" /></td>
   </tr>
   <tr>
     <td><input id="apellido" name="apellido" type="text" onfocus="borrarCampos('Apellido:', this)" onblur="escribirCampos('Apellido:', this)" value="Apellido:" /></td>
   </tr>
    <tr>
     <td><input id="empresa" name="empresa" type="text" onfocus="borrarCampos('Empresa:', this)" onblur="escribirCampos('Empresa:', this)" value="Empresa:" /></td>
   </tr>
   <tr>
     <td><input id="telefono" name="telefono" type="text" onfocus="borrarCampos('Teléfono:', this)" onblur="escribirCampos('Teléfono:', this)" value="Teléfono:" /></td>
   </tr>
   <tr>
     <td><input id="email" name="email" type="text" onfocus="borrarCampos('E-mail:', this)" onblur="escribirCampos('E-mail:', this)" value="E-mail:" /></td>
   </tr>
    <tr>
     <td><input id="pais" name="pais" type="text" onfocus="borrarCampos('País:', this)" onblur="escribirCampos('País:', this)" value="País:" /></td>
   </tr>
    <tr>
     <td><input id="ciudad" name="ciudad" type="text" onfocus="borrarCampos('Ciudad:', this)" onblur="escribirCampos('Ciudad:', this)" value="Ciudad:" /></td>
   </tr>
   <tr>
     <td><span style="color: #666;font: 10pt Arial;margin-left: 2px;">Ingrese aquí su comentario:</span></td>
   </tr>
   <tr>
     <td><textarea id="comentario" name="comentario" cols="40" rows="5"></textarea></td>
   </tr>
   <tr>
     <td>
      <div>
		<ul id="alerts" class="alerts"></ul>
	</div>
     <input id="enviar" name="enviar" type="submit" value="enviar" /></td>
   </tr>
 </table>
 <br />
</form>



<!--SCRIPT PARA LABELS-->

<script type="text/javascript">
function borrarCampos(valor, campo){
			if (campo.value==valor) campo.value='';	
		}
		
		function escribirCampos(valor, campo){
			if (campo.value=='') campo.value=valor;	
		}
</script>

</body>
</html>