<?php

//Consulta al Web Service
ini_set("soap.wsdl_cache_enabled", "0");
$mensaje = "";
try {
	$servicio="http://webservices.corpmaresa.com.ec/wsServicioCliente/ServicioCliente.asmx?WSDL"; //url del servicio

	$client = new SoapClient($servicio);

	$result = $client->paramTipoSugerencia();

	$datatable = simplexml_load_string('<DataTable xmlns="http://quejas.mazda.ec/ServicioCliente/">'.$result->paramTipoSugerenciaResult->any.'</DataTable>')->NewDataSet;

	$tipo_sugerencias = array();

	foreach ($datatable->xpath('//Table') as $sugerencia){
		$tipo_sugerencias[] = array( 'id' => $sugerencia->idTipoSugerencia, 'name' => $sugerencia->strTipoSugerencia, 'orden' => $sugerencia->orden );
	}

	//Se ordena en base al orden
	$tipo_sugerencias_ct = count($tipo_sugerencias);
	for( $i = 0; $i < $tipo_sugerencias_ct-1; $i++ ){
		for( $j = 1; $j < $tipo_sugerencias_ct; $j++ ){
			if( $tipo_sugerencias[$i]['orden'] > $tipo_sugerencias[$j]['orden'] ){
				$k=$tipo_sugerencias[$i];
				$tipo_sugerencias[$i]=$tipo_sugerencias[$j];
				$tipo_sugerencias[$j]=$k;
			}
		}
	}

	//Verifico el Submit
	if( $_POST['enviar_sugerencias'] ){
		$parametros = array();
		$parametros['strIdentificacion'] = $_POST['id_sugerencias'];
		$parametros['strNombre'] = $_POST['nombre_sugerencias'];
		$parametros['strApellido'] = $_POST['apellido_sugerencias'];
		$parametros['strTelefono'] = $_POST['telefono_sugerencias'];
		$parametros['strMail'] = $_POST['email_sugerencias'];
		$parametros['intIdTipoSugerencia'] = $_POST['sugerencias'];
		$parametros['strComentario'] = $_POST['info_sugerencias'];

		//Envio al Web Service
		$response = $client->wsSugerencia($parametros);

		if( $response->wsSugerenciaResult ){
			$mensaje = '<div class="success">'.$response->wsSugerenciaResult.'</div>';
		}
	}

} catch (SoapFault $fault) {
	$mensaje = '<div class="errormessage">Ocurri&oacute; un error. Por favor, vuelva a intentar.</div>';
	//trigger_error("SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sugerencias</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	/*VALIDATION SECTION*/
	$("#f_sugerencias").validate({
            errorLabelContainer: "#alerts",
            wrapper: "li",
            onfocusout: false,
            onkeyup: false,
            rules: {
                id_sugerencias: {
					required: true
                },
				nombre_sugerencias: {
					required: true
				},
				apellido_sugerencias:{
					required: true
				},
				telefono_sugerencias:{
					digits: true,
					minlength: 9
				},
				email_sugerencias:{
					email:true
				}

            },
            messages: {
                id_sugerencias: {
					required: "No. de Identificaci&oacute;n es campo requerido"
                },
				nombre_sugerencias: {
					required: "Nombre es campo requerido"
				},
				apellido_sugerencias:{
					required: "Apellido es campo requerido"
				},
				telefono_sugerencias:{
					digits: 'El campo Tel&eacute;fono s&oacute;lo acepta d&iacute;gitos',
					minlength: 'El campo Tel&eacute;fono debe tener m&iacute;nimo 9 d&iacute;gitos'
				},
				email_sugerencias:{
					email: 'Ingrese un E-mail v&aacute;lido'
				}
            }
    });
    /*END VALIDATION SECTION*/
});
</script>
<style type="text/css">
.errormessage, .success {padding:.8em;margin-bottom:1em;border:2px solid #ddd;}
.success {background:#E6EFC2;color:#264409;border-color:#C6D880;}
.success a {color:#264409;}
.errormessage {background:#FBE3E4;color:#8a1f11;border-color:#FBC2C4;}
.errormessage a {color:#8a1f11;}
ul.alerts{
	list-style: none;
	font-weight:normal;
	background:#fdf5d7;
	border:2px solid #fee097;
	padding:.5em;
	display:none;
	color:#8a5e11;
	margin-bottom:15px;
}
</style>
</head>

<body>

<?php
	if($mensaje)
		echo $mensaje;
?>
<div>
	<ul id="alerts" class="alerts"></ul>
</div>
<FORM id="selector">
<h3>SELECCIONE UN TEMA</h3>
<SELECT ONCHANGE="location = this.options[this.selectedIndex].value;">
<OPTION VALUE="http://www.naftadigital.com/mazda/media/formularios/apoyo_tecnico.html">Apoyo técnico Mazda
<OPTION VALUE="http://www.naftadigital.com/mazda/media/formularios/sugerencias.html">Sugerencias
<OPTION VALUE="http://www.naftadigital.com/mazda/media/formularios/reclamos.html">Reclamos
<OPTION VALUE="http://www.naftadigital.com/mazda/media/formularios/info_vehiculos.html">Información sobre vehículos-modelos-versiones
<OPTION VALUE="http://www.naftadigital.com/mazda/media/formularios/info_repuestos.html">Información sobre repuestos
<OPTION VALUE="http://www.naftadigital.com/mazda/media/formularios/info_accesorios.html">Información sobre accesorios
<OPTION VALUE="http://www.naftadigital.com/mazda/media/formularios/info_taller.html">Cita taller
<OPTION VALUE="http://www.naftadigital.com/mazda/media/formularios/info_testdrive.html">Test drive
</SELECT>
</FORM>

<!--FORMULARIO SUGERENCIAS-->
<form id="f_sugerencias" name="f_sugerencias" method="post" action="">
 <table width="920px" border="0">
   <tr>
     <td><h3>SUGERENCIAS</h3></td>
   </tr>
   <tr>
     <td><input id="nombre_sugerencias" name="nombre_sugerencias" type="text" onfocus="borrarCampos('Nombre:', this)" onblur="escribirCampos('Nombre:', this)" value="Nombre:" /></td>
   </tr>
   <tr>
     <td><input id="apellido_sugerencias" name="apellido_sugerencias" type="text" onfocus="borrarCampos('Apellido:', this)" onblur="escribirCampos('Apellido:', this)" value="Apellido:" /></td>
   </tr>
   <tr>
     <td><input id="id_sugerencias" name="id_sugerencias" type="text" onfocus="borrarCampos('No. de identificación:', this)" onblur="escribirCampos('No. de identificación:', this)" value="No. de identificación:" /></td>
   </tr>
   <tr>
     <td><input id="telefono_sugerencias" name="telefono_sugerencias" type="text" onfocus="borrarCampos('Teléfono:', this)" onblur="escribirCampos('Teléfono:', this)" value="Teléfono:" /></td>
   </tr>
   <tr>
     <td><input id="email_sugerencias" name="email_sugerencias" type="text" onfocus="borrarCampos('E-mail:', this)" onblur="escribirCampos('E-mail:', this)" value="E-mail:" /></td>
   </tr>
   <tr>
     <td><select name="sugerencias" id="sugerencias">
       <option value="0" selected="selected">Seleccione un tipo de sugerencia</option>
	   <?php
			foreach( $tipo_sugerencias as $tipo_sugerencia )
				echo '<option value="'.$tipo_sugerencia['id'].'">'.$tipo_sugerencia['name'].'</option>';
	   ?>
     </select></td>
   </tr>
   <tr>
     <td><label>SUGERENCIA:</label><br />
      <p>Ingrese aquí su sugerencia:</p></td>
   </tr>
   <tr>
     <td><textarea id="info_sugerencias" name="info_sugerencias" cols="40" rows="10"></textarea></td>
   </tr>
   <tr>
     <td><input id="enviar_sugerencias" name="enviar_sugerencias" type="submit" value="enviar" /></td>
   </tr>
 </table>
 <br />
</form>


</body>
</html>
