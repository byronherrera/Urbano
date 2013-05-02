$(document).ready(function () {
    //alert("Your location is: " + geoplugin_countryName() + ", " + geoplugin_region() + ", " + geoplugin_city());
    var country = getCountry();

});
//cierra document ready

function getCountry() {

    var country = geoplugin_countryName();
    console.log (country);
    $('#country').val(country);

}


