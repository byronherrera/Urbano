// JavaScript Document
jQuery.noConflict();
if (typeof(jQuery) == 'undefined')
    var jQuery = jQuery;
	var valorActual;

jQuery(document).ready(function () {

//Centrar Slider Superior dinamicamente
    centrarImagenSuperior();
    jQuery(window).resize(function() {
		centrarImagenSuperior(1550);
    });
	
//Centrar Modulos Inferiores Home dinamicamente
    centrarModulos(960);
    jQuery(window).resize(function() {
	centrarModulos(960);
    });
	
//Animar rollover botones slider
	jQuery('#prev98, #next98').mouseover(function() {
		jQuery(this).css({marginTop: '-70px'}, 100);
	}).mouseleave(function () {
		jQuery(this).css({marginTop: '0px'}, 100);
            
	});
	

});//----------------------- CIERRA (document).ready ------------------------------

function centrarImagenSuperior(ancho) {
//DETECTA EL ANCHO DE LA PANTALLA BASADO EN EL BODY
    var body_ancho = jQuery("body").width();
//CALCULA EL MARGEN NECESARIO PARA CENTRAR EL SLIDER EN ENTEROS
    console.log (body_ancho)
    var margen = parseInt((body_ancho - ancho) / 2);
//CALCULA EL ANCHO NECESARIO, RESTA EL MARGEN DEL ANCHO DEL BODY
    var slider_ancho = parseInt(body_ancho - margen);
//SOBREESCRIBE EL ANCHO Y EL MARGIN-LEFT DEL CONTENEDOR DEL SLIDER
	var slider_alto = jQuery("#rt-feature img").height();
	jQuery('#rt-feature').css({height:(slider_alto)});
	if(slider_alto = 330){
    	jQuery('#rt-feature').css({marginTop:-163 });
	}
	if(body_ancho >= ancho){
    	jQuery('#rt-feature .rt-block').css({marginLeft:0 });
	}else{
		jQuery('#rt-feature .rt-block').css({marginLeft:(margen)});
		
	}
}


function centrarModulos(ancho) {
    var body_ancho = jQuery("body").width();
    var margen = parseInt((body_ancho - ancho) / 2);
    var slider_ancho = parseInt(body_ancho - margen);
	jQuery('#rt-maintop').css({left:(margen) });
}