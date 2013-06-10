<?php
echo '<option value="">Seleccione primero el área del problema y luego el tipo de reclamo</option>';
if( $_POST['idArea'] ){

	//Consulta al Web Service
	ini_set("soap.wsdl_cache_enabled", "0");
	try {
		$servicio="http://webservices.corpmaresa.com.ec/wsServicioCliente/ServicioCliente.asmx?WSDL"; //url del servicio

		$client = new SoapClient($servicio);

		$parametros = array();
		$parametros['idArea'] = $_POST['idArea'];
		$result = $client->paramTipoReclamo($parametros);

		$datatable = simplexml_load_string('<DataTable xmlns="http://quejas.mazda.ec/ServicioCliente/">'.$result->paramTipoReclamoResult->any.'</DataTable>')->NewDataSet;

		$tipo_reclamos = array();

		foreach ($datatable->xpath('//Table') as $reclamo){
			$tipo_reclamos[] = array( 'id' => $reclamo->idtipoReclamo, 'name' => $reclamo->strTipoReclamo, 'orden' => $reclamo->orden );
		}

		//Se ordena en base al orden
		$tipo_reclamos_ct = count($tipo_reclamos);
		for( $i = 0; $i < $tipo_reclamos_ct-1; $i++ ){
			for( $j = 1; $j < $tipo_reclamos_ct; $j++ ){
				if( $tipo_reclamos[$i]['orden'] > $tipo_reclamos[$j]['orden'] ){
					$k=$tipo_reclamos[$i];
					$tipo_reclamos[$i]=$tipo_reclamos[$j];
					$tipo_reclamos[$j]=$k;
				}
			}
		}

		foreach( $tipo_reclamos as $tipo_reclamo )
			echo '<option value="'.$tipo_reclamo['id'].'">'.$tipo_reclamo['name'].'</option>';

	} catch (SoapFault $fault) {
		//do nothing
	}

}
