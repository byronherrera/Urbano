var urlDestino = '';
jQuery(document).ready(function () {
    inic();
    enviaMensaje();
    getCountry();

    // TAB PARA EL HOME
    jQuery(function() {
        jQuery( "#tabs" ).tabs();
    });
});
//fin document ready

function getCountry() {
    var country = geoplugin_countryName();
    if ((country == "Ecuador") || (country == "Ecuador") || (country == "Ecuador") || (country == "Ecuador")) {}
    jQuery('#country').val(country);
    //muestra o oculta destino
    muestraDestino(country)
    changedUrl(country);
}

//inicializa parametros y crea evento change del combo box el cual muestra o oculta dependiendo del pais.
function inic() {
    jQuery("#destino").hide();
    jQuery('#country').change(function () {
        muestraDestino(jQuery("#country option:selected").val())
        changedUrl(jQuery("#country option:selected").val());
    });
    jQuery('#destino').change(function () {
        changedUrl(jQuery("#country option:selected").val());
    });

}
//oculta o muestra destino dependiendo del pais que ingrese.
function muestraDestino(country) {
    if (country == 'Argentina') {
        jQuery("#destino").show('slow');
    } else {
        jQuery("#destino").hide();
    }
}

function changedUrl(pais) {
    jQuery.getJSON('forms/tracking/direcciones.json', function (data) {
        for (i = 0; i < data.data.length; i++) {
            if (pais == data.data[i].pais) {
                var selDestino = jQuery('input[name=destino]:checked').val();
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
    jQuery("form").submit(function () {
        if (jQuery("#nro_guia").val().length > 0) {
            openUrl = urlDestino + jQuery("#nro_guia").val();
            window.open(openUrl, "sharer", "toolbar=0,status=0,width=950,height=800");
        } else {
            jQuery("#mensaje").html("Campo Vacío")
        }
    }) ;
}

function cambiaLogoPais () {

}
