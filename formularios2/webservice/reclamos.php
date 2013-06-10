<?php

//Consulta al Web Service
ini_set("soap.wsdl_cache_enabled", "0");
$mensaje = "";
try {
	$servicio="http://webservices.corpmaresa.com.ec/wsServicioCliente/ServicioCliente.asmx?WSDL"; //url del servicio

	$client = new SoapClient($servicio);

	//Obtengo las Areas
	$result = $client->paramArea();

	$datatable = simplexml_load_string('<DataTable xmlns="http://quejas.mazda.ec/ServicioCliente/">'.$result->paramAreaResult->any.'</DataTable>')->NewDataSet;

	$tipo_areas = array();

	foreach ($datatable->xpath('//Table') as $area){
		$tipo_areas[] = array( 'id' => $area->idArea, 'name' => $area->strArea, 'orden' => $area->orden );
	}

	//Se ordena en base al orden
	$tipo_areas_ct = count($tipo_areas);
	for( $i = 0; $i < $tipo_areas_ct-1; $i++ ){
		for( $j = 1; $j < $tipo_areas_ct; $j++ ){
			if( $tipo_areas[$i]['orden'] > $tipo_areas[$j]['orden'] ){
				$k=$tipo_areas[$i];
				$tipo_areas[$i]=$tipo_areas[$j];
				$tipo_areas[$j]=$k;
			}
		}
	}
	

	//Obtengo los Concesionarios
	$result = $client->paramConcesionarios();

	$datatable = simplexml_load_string('<DataTable xmlns="http://quejas.mazda.ec/ServicioCliente/">'.$result->paramConcesionariosResult->any.'</DataTable>')->NewDataSet;

	$tipo_concesionarios = array();

	foreach ($datatable->xpath('//Table') as $concesionario){
		$tipo_concesionarios[] = array( 'id' => $concesionario->idConcesionario, 'name' => $concesionario->strConcesionario, 'orden' => $concesionario->orden );
	}

	//Se ordena en base al orden
	$tipo_concesionarios_ct = count($tipo_concesionarios);
	for( $i = 0; $i < $tipo_concesionarios_ct-1; $i++ ){
		for( $j = 1; $j < $tipo_concesionarios_ct; $j++ ){
			if( $tipo_concesionarios[$i]['orden'] > $tipo_concesionarios[$j]['orden'] ){
				$k=$tipo_concesionarios[$i];
				$tipo_concesionarios[$i]=$tipo_concesionarios[$j];
				$tipo_concesionarios[$j]=$k;
			}
		}
	}

	//Obtengo los Modelos
	$result = $client->paramModelo();

	$datatable = simplexml_load_string('<DataTable xmlns="http://quejas.mazda.ec/ServicioCliente/">'.$result->paramModeloResult->any.'</DataTable>')->NewDataSet;

	$tipo_modelos = array();

	foreach ($datatable->xpath('//Table') as $modelo){
		$tipo_modelos[] = array( 'id' => $modelo->idFamiliaModelo, 'name' => $modelo->strFamiliaModelo, 'orden' => $modelo->orden );
	}

	//Se ordena en base al orden
	$tipo_modelos_ct = count($tipo_modelos);
	for( $i = 0; $i < $tipo_modelos_ct-1; $i++ ){
		for( $j = 1; $j < $tipo_modelos_ct; $j++ ){
			if( $tipo_modelos[$i]['orden'] > $tipo_modelos[$j]['orden'] ){
				$k=$tipo_modelos[$i];
				$tipo_modelos[$i]=$tipo_modelos[$j];
				$tipo_modelos[$j]=$k;
			}
		}
	}


	//Verifico el Submit
	if( $_POST['enviar_reclamos'] ){
		$parametros = array();
		$parametros['strModelo'] = $_POST['modelos'];
		$parametros['strIdentificacion'] = $_POST['id_reclamos'];
		$parametros['strNombreDueno'] = $_POST['nombre_reclamos'];
		$parametros['strApellidoDueno'] = $_POST['apellido_reclamos'];
		$parametros['strTelefono'] = $_POST['telefono_principal_reclamos'];
		$parametros['strTelefono2'] = $_POST['telefono_adicional_reclamos'];
		$parametros['strMail'] = $_POST['email_reclamos'];
		$parametros['intIdConcesionario'] = $_POST['concesionario'];
		$parametros['strObservacion'] = $_POST['info_reclamos'];
		$parametros['intIdAreaResolutor'] = $_POST['area'];
		$parametros['intIdTipoReclamo'] = $_POST['tipo'];

		//Envio al Web Service
		$response = $client->wsSolicitudQR($parametros);


		if( $response->wsSolicitudQRResult ){
			$mensaje = '<div class="success">'.$response->wsSolicitudQRResult.'</div>';
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
<title>Reclamos</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
<script type="text/javascript">

function loadTipoReclamos(idArea){
	$('#tipo').load("loadTipoReclamos.php", {
		idArea: idArea
	});
}

$(document).ready(function(){

	$("#area").bind("change", function(e){
		$('#tipo').html('');
		loadTipoReclamos($(this).val());
	});

	/*VALIDATION SECTION*/
	$("#f_reclamos").validate({
            errorLabelContainer: "#alerts",
            wrapper: "li",
            onfocusout: false,
            onkeyup: false,
            rules: {
                id_reclamos: {
					required: true
                },
				nombre_reclamos: {
					required: true
				},
				apellido_reclamos:{
					required: true
				},
				telefono_principal_reclamos:{
					required: true,
					digits: true,
					minlength: 9
				},
				telefono_adicional_reclamos:{
					digits: true,
					minlength: 9
				},
				email_reclamos:{
					email:true
				},
				modelos: {
					required: true
                },
				concesionario: {
					required: true
                },
				area: {
					required: true
                },
				tipo: {
					required: true
                },
				info_reclamos: {
					required: true
                }

            },
            messages: {
                id_reclamos: {
					required: "No. de Identificaci&oacute;n es campo requerido"
                },
				nombre_reclamos: {
					required: "Nombre es campo requerido"
				},
				apellido_reclamos:{
					required: "Apellido es campo requerido"
				},
				telefono_principal_reclamos:{
					required: "Tel&eacute;fono Principal es campo requerido",
					digits: 'El campo Tel&eacute;fono Principal s&oacute;lo acepta d&iacute;gitos',
					minlength: 'El campo Tel&eacute;fono Principal debe tener m&iacute;nimo 9 d&iacute;gitos'
				},
				telefono_adicional_reclamos:{
					digits: 'El campo Tel&eacute;fono Adicional s&oacute;lo acepta d&iacute;gitos',
					minlength: 'El campo Tel&eacute;fono Adicional debe tener m&iacute;nimo 9 d&iacute;gitos'
				},
				email_reclamos:{
					email: 'Ingrese un E-mail v&aacute;lido'
				},
				modelos: {
					required: "Modelo es campo requerido"
                },
				concesionario: {
					required: "Concesionario es campo requerido"
                },
				area: {
					required: "&Aacute;rea del Problema es campo requerido"
                },
				tipo: {
					required: "Tipo de Reclamo es campo requerido"
                },
				info_reclamos: {
					required: "Observaci&oacute;n es campo requerido"
                }
            }
    });
    /*END VALIDATION SECTION*/
});
</script>
<style type="text/css">
.success {padding:.8em;margin-bottom:1em;border:2px solid #ddd;}
.success {background:#E6EFC2;color:#264409;border-color:#C6D880;}
.success a {color:#264409;}
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

<!--FORMULARIO RECLAMOS-->
<form id="f_reclamos" name="f_reclamos" method="post" action="">
 <table width="920px" border="0">
   <tr>
     <td><h3>RECLAMOS</h3></td>
   </tr>
   <tr>
     <td><input id="nombre_reclamos" name="nombre_reclamos" type="text" onfocus="borrarCampos('Nombre:', this)" onblur="escribirCampos('Nombre:', this)" value="Nombre:" /></td>
   </tr>
   <tr>
     <td><input id="apellido_reclamos" name="apellido_reclamos" type="text" onfocus="borrarCampos('Apellido:', this)" onblur="escribirCampos('Apellido:', this)" value="Apellido:" /></td>
   </tr>
   <tr>
     <td><input id="id_reclamos" name="id_reclamos" type="text" onfocus="borrarCampos('No. de identificación:', this)" onblur="escribirCampos('No. de identificación:', this)" value="No. de identificación:" /></td>
   </tr>
   <tr>
     <td><input id="telefono_principal_reclamos" name="telefono_principal_reclamos" type="text" onfocus="borrarCampos('Teléfono principal:', this)" onblur="escribirCampos('Teléfono principal:', this)" value="Teléfono principal:" /></td>
   </tr>
   <tr>
     <td><input id="telefono_adicional_reclamos" name="telefono_adicional_reclamos" type="text" onfocus="borrarCampos('Teléfono adicioinal:', this)" onblur="escribirCampos('Teléfono adicional:', this)" value="Teléfono adicional:" /></td>
   </tr>
   <tr>
     <td><input id="email_reclamos" name="email_reclamos" type="text" onfocus="borrarCampos('E-mail:', this)" onblur="escribirCampos('E-mail:', this)" value="E-mail:" /></td>
   </tr>
   <tr>
     <td><label for="modelos">modelos</label>
       <select name="modelos" id="modelos">
         <option value="">Seleccione un modelo</option>
        <?php
			foreach( $tipo_modelos as $tipo_modelo )
				echo '<option value="'.$tipo_modelo['id'].'">'.$tipo_modelo['name'].'</option>';
		?>
      </select></td>
   </tr>
   <tr>
     <td><label for="concesionario">concesionario</label>
       <select name="concesionario" id="concesionario">
         <option value="">Seleccione un concesionario</option>
        <?php
			foreach( $tipo_concesionarios as $tipo_concesionario )
				echo '<option value="'.$tipo_concesionario['id'].'">'.$tipo_concesionario['name'].'</option>';
		?>
      </select></td>
   </tr>
   <tr>
     <td><label for="area">área del problema</label>
       <select name="area" id="area" <!--onchange="cambia_tipo()"-->>
		   <option value="" selected="selected">Seleccione un área</option>
		<?php
			foreach( $tipo_areas as $tipo_area )
				echo '<option value="'.$tipo_area['id'].'">'.$tipo_area['name'].'</option>';
		?>
      </select></td>
   </tr>
   <tr>
     <td><label for="tipo">Tipo de reclamo</label>
     	<select name="tipo" id="tipo">
       <option value="">Seleccione primero el área del problema y luego el tipo de reclamo</option>
     </select></td>
   </tr>
   <tr>
     <td><label>Observación:</label><br />
      <p>Describa aquí su inconveniente:</p></td>
   </tr>
   <tr>
     <td><textarea id="info_reclamos" name="info_reclamos" cols="40" rows="10"></textarea></td>
   </tr>
   <tr>
     <td><input id="enviar_reclamos" name="enviar_reclamos" type="submit" value="enviar" /></td>
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

