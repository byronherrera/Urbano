
var urlDestino = '';
// JavaScript Document
$(document).ready(function() {

//focus/blur default values
	$('input[type=text]').each(function() { 
	$(this).focus(function() {
	  if($(this).val() == this.defaultValue)
		$(this).val("");
	  });
	  $(this).blur(function() {
		if($(this).val() == "")
		  $(this).val(this.defaultValue);
	  });
	});

// You need to specify the size of your background image here (could be done automatically by some PHP code)
    var FullscreenrOptions = {  width: 1024, height: 749, bgID: '#bgimg' };
    // This will activate the full screen background!
    jQuery.fn.fullscreenr(FullscreenrOptions);


    //boton enviar
    getCountry();
    enviaMensaje();

    function getCountry() {
        var country = geoplugin_countryName();
        if ((country == "Ecuador") || (country == "Argentina") || (country == "Peru") || (country == "El Salvador")) {
            jQuery('#pais').val(country);
        } else {
            country =  "Ecuador";
            jQuery('#pais').val(country);
        }
        
        //muestra o oculta destino

        changedUrl(country);
    }


    function changedUrl(pais) {
        jQuery.getJSON('direcciones.json', function (data) {
            for (i = 0; i < data.data.length; i++) {

                if (pais == data.data[i].pais) {
                        urlDestino = data.data[i].direccion;
                }
            }
        });
    }

    function enviaMensaje() {
        jQuery("#enviar").click(function () {
            if ((jQuery("#user").val().length > 0)  && (jQuery("#pass").val().length > 0)){


                urlDestino=urlDestino.replace("%%%",jQuery("#user").val());
                urlDestino=urlDestino.replace("$$$",jQuery("#pass").val());
                console.log (urlDestino);
                openUrl = urlDestino ;
                window.open(openUrl, "sharer", "toolbar=0,status=0,width=950,height=800");
            } else {
                jQuery("#mensaje").html("Campo Vacío")
            }
        }) ;
    }


	
});//end document ready


