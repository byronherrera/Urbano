$(document).ready(function () {
    var country =  getCountry ();

});//cierra document ready

//btn subir
function getCountry( ) {
    $.post("iplocation.php",  function (data) {
        console.log (data);
        if (data > 0) {
            postSelfMuro(videoId);
            $("#" + videoId + " #cuenta_votos").html(data);
        } else {
            //error que ya puso voto
        }
    });
}
