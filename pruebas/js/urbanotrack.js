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

