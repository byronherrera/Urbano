$(document).ready(function () {
    //alert("Your location is: " + geoplugin_countryName() + ", " + geoplugin_region() + ", " + geoplugin_city());
    inic()
    getCountry();
});
//fin document ready


function getCountry() {
    var country = geoplugin_countryName();
    $('#country').val(country);
    //muestra o oculta destino
    muestraDestino (country)
}
//inicializa parametros y crea evento change del combo box el cual muestra o oculta dependiendo del pais.
function inic() {
    $("#destino").hide();
    $('#country').change(function() {
        muestraDestino ($("#country option:selected").val())
    });

}



//oculta o muestra destino dependiendo del pais que ingrese.
function muestraDestino (country){
    if (country == 'Ecuador') {
        $("#destino").show('slow');
    } else {
        $("#destino").hide();
    }
}

/*WEBSERVICE EXTERNO NACIONAL
http://200.0.230.246/plugins/plugin/getPluginShipper/?cli_codigo=EB330956048&shi_codigo=000506

    WEBSERVICE EXTERNO INTERNACIONAL
http://clientes.urbano.com.ar/urbano3/intranet_arg/html/internacional/?nro_guia=010-725445*/