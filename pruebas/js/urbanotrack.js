var urlDestino = '';
$(document).ready(function () {
    //alert("Your location is: " + geoplugin_countryName() + ", " + geoplugin_region() + ", " + geoplugin_city());
    inic();
    enviaMensaje();
    getCountry();
});
//fin document ready

function getCountry() {
    // var country = geoplugin_countryName();
    var country = 'Argentina';
    $('#country').val(country);
    //muestra o oculta destino
    muestraDestino(country)
    changedUrl(country);
}

//inicializa parametros y crea evento change del combo box el cual muestra o oculta dependiendo del pais.
function inic() {
    $("#destino").hide();
    $('#country').change(function () {
        muestraDestino($("#country option:selected").val())
        changedUrl($("#country option:selected").val());
    });
    $('#destino').change(function () {
        changedUrl($("#country option:selected").val());
    });

}
//oculta o muestra destino dependiendo del pais que ingrese.
function muestraDestino(country) {
    if (country == 'Argentina') {
        $("#destino").show('slow');
    } else {
        $("#destino").hide();
    }
}

function changedUrl(pais) {
    $.getJSON('direcciones.json', function (data) {
        for (i = 0; i < data.data.length; i++) {
            if (pais == data.data[i].pais) {
                var selDestino = $('input[name=destino]:checked').val();
                if (data.data[i].locacion != undefined) {
                    if (data.data[i].locacion == selDestino) {
                        urlDestino = data.data[i].direccion;
                    }
                } else {
                    urlDestino = data.data[i].direccion;
                }
            }
        }
    });
}
;


function envio() {
}

function enviaMensaje() {
    $("form").submit(function () {
        if ($("#nro_guia").val().length > 0) {
            openUrl = urlDestino + $("#nro_guia").val();
            window.open(openUrl, "sharer", "toolbar=0,status=0,width=950,height=800");
        } else {
            $("#mensaje").html("Campo Vacío")
        }
    }) ;
}