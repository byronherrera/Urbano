<?php
include "connections/conexion.php";
include "emailService.php";

mysql_set_charset("utf8");

$mensaje = "";

//Verifico el Submit
if ($_POST['enviar']) {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $empresa = $_POST['empresa'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $pais = $_POST['pais'];
    $ciudad = $_POST['ciudad'];
    $comentario = $_POST['comentario'];
    $idioma = $_POST['idioma'];

//mensaje para admin
    $adminMSG = '<div style="width:650px;margin:0 auto;background:#FFF;border:2px solid #d8001b;">
<a href="http://www.naftadigital.com/urbano" target="_blank"><img style="margin:15px 0 10px 30px;;" src="http://www.naftadigital.com/urbano/forms/images/logo.jpg" width="165" height="60" /> </a>
<table width="600" border="0" cellspacing="0" cellpadding="5" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#333;margin:0 25px 15px;">
  <tr>
    <td width="100">Nombre:</td>
    <td width="500">' . $nombre . '</td>
  </tr>
  <tr>
    <td width="100">Apellido:</td>
    <td width="500">' . $apellido . '</td>
  </tr>
  <tr>
    <td width="100">Empresa:</td>
    <td width="500">' . $empresa . '</td>
  </tr>
  <tr>
    <td width="100">Teléfono:</td>
    <td width="500">' . $telefono . '</td>
  </tr>
  <tr>
    <td width="100">E-mail:</td>
    <td width="500">' . $email . '</td>
  </tr>
  <tr>
    <td width="100">País:</td>
    <td width="500">' . $pais . '</td>
  </tr>
  <tr>
    <td width="100">Cuidad:</td>
    <td width="500">' . $ciudad . '</td>
  </tr>
  <tr>
    <td width="100">Comentario:</td>
    <td width="500">' . $comentario . '</td>
  </tr>
</table>
<div style="background:#d8001b;color:#FFF;font-family:Arial, Helvetica, sans-serif;font-size:10px;line-height:21px;text-align:right;height:20px;padding-right:25px;">copyrights&nbsp;&copy;&nbsp;2013</div>
</div>';

//notificacion para mensaje cliente
    $notificacion = "Su mensaje ha sido enviado con éxito, daremos respuesta a su requerimiento lo antes posible. <br/>Gracias por contactarnos.";
//mensaje para cliente
    $clientMSG = '<div style="width:650px;margin:0 auto;background:#FFF;border:2px solid #d8001b;">
<a href="http://www.naftadigital.com/urbano" target="_blank"><img style="margin:15px 0 20px 30px;;" src="http://www.naftadigital.com/urbano/forms/images/logo.jpg" width="165" height="60" /> </a>
<table width="600" border="0" cellspacing="0" cellpadding="5" style="font-family:Arial, Helvetica, sans-serif;font-size:12px;color:#333;margin:0 25px 20px;">
  <tr>
    <td width="65">Estimado(a)</td>
    <td>' . $nombre . '&nbsp;' . $apellido . '</td>
  </tr>
  <tr>
    <td colspan="2">' . $notificacion . '</td>
    </tr>
</table>
<div style="background:#d8001b;color:#FFF;font-family:Arial, Helvetica, sans-serif;font-size:10px;line-height:21px;text-align:right;height:20px;padding-right:25px;">copyrights&nbsp;&copy;&nbsp;2013</div>
</div>';

    switch ($pais) {
        case "Argentina":
            $idEmail = 9;
            break;
        case "Ecuador":
            $idEmail = 10;
            break;
        case "El Salvador":
            $idEmail = 11;
            break;
        case "Perú":
            $idEmail = 12;
            break;
    }

//Admin mail setup

    $to = recuperaEmail($idEmail);
    $adminSubject = "NUEVA SOLICITUD DE INFORMACIÓN CORPORATIVA | www.urbano.com";
    $adminHeaders .= "MIME-Version: 1.0\r\n";
    $adminHeaders .= "Content-Type: text/html; charset=utf-8\r\n";
    $adminHeaders .= "From: " . $email . "\n";

//Client mail setup
    $clientSubject = "Su mensaje ha sido recibido.";
    $clientHeaders .= "From: web@urbano.com\n";
    $clientHeaders .= "Reply-To: $to\r\n"; //Put the email to reply
    $clientHeaders .= "MIME-Version: 1.0\r\n";
    $clientHeaders .= "Content-Type: text/html; charset=utf-8\r\n";

//echo utf8_encode('&estado=enviado');
    mail($to, $adminSubject, $adminMSG, $adminHeaders); //mail to admin
    mail($email, $clientSubject, $clientMSG, $clientHeaders); //mail to client

//variable de idioma
    $idioma = 'esp';

//Instert to data base table
    $insert = mysql_query("INSERT INTO urba_form_infoCorporativa (nombre, apellido, empresa, telefono, email, pais, ciudad, comentario, idioma) VALUES ('" . $nombre . "','" . $apellido . "','" . $empresa . "','" . $telefono . "','" . $email . "','" . $pais . "','" . $ciudad . "','" . $comentario . "','" . $idioma . "')") or die(mysql_error());

//mensaje enviado con éxito	
    $mensaje = "Su mensaje ha sido enviado con éxito, daremos respuesta a su requerimiento lo antes posible. <br/>Gracias por contactarnos.";

}//Termina verificacion del Submit
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Información Corporativa</title>
    <link rel="stylesheet" href="../templates/gantry/css/gantry-custom.css" type="text/css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js"></script>
    <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function () {

            //cambia pais
            var country = geoplugin_countryName();
            //var country = 'Argentina';
            $('#pais').val(country);

            jQuery.validator.addMethod("default_value", function (value, element, string) {
                if (value == string)
                    return false;
                return true;
            }, "Por favor ingrese un valor");


            /*VALIDATION SECTION*/
            $("#form_urbano").validate({
                errorLabelContainer:"#alerts",
                wrapper:"li",
                onfocusout:false,
                onkeyup:false,
                rules:{
                    nombre:{
                        required:true,
                        default_value:"Nombre:"
                    },
                    apellido:{
                        required:true,
                        default_value:"Apellido:"
                    },
                    empresa:{
                        required:true,
                        default_value:"Empresa:"
                    },
                    telefono:{
                        required:true,
                        default_value:"Teléfono:",
                        digits:true,
                        minlength:7
                    },
                    email:{
                        default_value:"E-maill:",
                        email:true
                    },
                    pais:{
                        required:true,
                        default_value:"País:"
                    },
                    ciudad:{
                        required:true,
                        default_value:"Ciudad:"
                    },
                    comentario:{
                        required:true
                    }

                },

                messages:{

                    nombre:{
                        required:"Nombre es campo requerido",
                        default_value:"Ingrese un valor para el campo Nombre"
                    },
                    apellido:{
                        required:"Apellido es campo requerido",
                        default_value:"Ingrese un valor para el campo Apellido"
                    },
                    empresa:{
                        required:"Empresa es campo requerido",
                        default_value:"Ingrese un valor para el campo Empresa"
                    },
                    telefono:{
                        required:"Tel&eacute;fono es campo requerido",
                        default_value:"Ingrese un valor para el campo Tel&eacute;fono",
                        digits:'El campo Tel&eacute;fono s&oacute;lo acepta d&iacute;gitos',
                        minlength:'El campo Tel&eacute;fono debe tener m&iacute;nimo 7 d&iacute;gitos'
                    },
                    email:{
                        email:'Ingrese un E-mail v&aacute;lido'
                    },
                    pais:{
                        required:"País es campo requerido",
                        default_value:"Ingrese un valor para el campo Pa&iacute;s"
                    },
                    ciudad:{
                        required:"Ciudad es campo requerido",
                        default_value:"Ingrese un valor para el campo Ciudad"
                    },
                    comentario:{
                        required:"Comentario es campo requerido"
                    }
                }
            });
            /*END VALIDATION SECTION*/
        });
    </script>

</head>
<body style="background: #FFF;width:635px;margin:0 auto">

<div class="select_content">
    <FORM id="selector">
        <SELECT ONCHANGE="window.parent.location.href = this.options[this.selectedIndex].value;">
            <OPTION VALUE="#">Seleccione el tipo de requerimiento:
            <OPTION VALUE="http://www.naftadigital.com/urbano/contacto/submenu/informacion-corporativa.html">Información
                Corporativa
            <OPTION VALUE="http://www.naftadigital.com/urbano/contacto/submenu/servicio-al-cliente.html">Servicio al
                Cliente
            <OPTION VALUE="http://www.naftadigital.com/urbano/contacto/submenu/trabaja-con-nosotros.html">Trabaje con
                Nosotros
        </SELECT>
    </FORM>
</div>

<!--FORMULARIO INFORMACION VEHICULOS-->
<form id="form_urbano" name="form_urbano" method="post" action="">
    <table width="700px" border="0">
        <tr>
            <td><h3>INFORMACIÓN CORPORATIVA</h3></td>
        </tr>
        <tr>
            <td><?php
                if ($mensaje != "") {
                    echo "<div class='success'>" . ($mensaje) . "</div>";
                }
                ?></td>
        </tr>
        <tr>
            <td>
                <div class="select_content2">
                    <select id="pais" name="pais">
                        <option value="">Seleccione país
                        <option value="Argentina">Argentina
                        <option value="Ecuador">Ecuador
                        <option value="El Salvador">El Salvador
                        <option value="Perú"> Perú
                    </select>
                </div>
            </td>
        </tr>
        <tr>
            <td><input id="nombre" name="nombre" type="text" onfocus="borrarCampos('Nombre:', this)"
                       onblur="escribirCampos('Nombre:', this)" value="Nombre:"/></td>
        </tr>
        <tr>
            <td><input id="apellido" name="apellido" type="text" onfocus="borrarCampos('Apellido:', this)"
                       onblur="escribirCampos('Apellido:', this)" value="Apellido:"/></td>
        </tr>
        <tr>
            <td><input id="empresa" name="empresa" type="text" onfocus="borrarCampos('Empresa:', this)"
                       onblur="escribirCampos('Empresa:', this)" value="Empresa:"/></td>
        </tr>
        <tr>
            <td><input id="telefono" name="telefono" type="text" onfocus="borrarCampos('Teléfono:', this)"
                       onblur="escribirCampos('Teléfono:', this)" value="Teléfono:"/></td>
        </tr>
        <tr>
            <td><input id="email" name="email" type="text" onfocus="borrarCampos('E-mail:', this)"
                       onblur="escribirCampos('E-mail:', this)" value="E-mail:"/></td>
        </tr>

        <tr>
            <td><input id="ciudad" name="ciudad" type="text" onfocus="borrarCampos('Ciudad:', this)"
                       onblur="escribirCampos('Ciudad:', this)" value="Ciudad:"/></td>
        </tr>
        <tr>
            <td><span style="color: #666;font: 10pt Arial;margin-left: 2px;">Ingrese aquí su comentario:</span></td>
        </tr>
        <tr>
            <td><textarea id="comentario" name="comentario" cols="40" rows="10"></textarea></td>
        </tr>
        <tr>
            <td>
                <div>
                    <ul id="alerts" class="alerts"></ul>
                </div>
                <input id="enviar" name="enviar" type="submit" value="enviar"/></td>
        </tr>
    </table>
    <br/>
</form>

<!--SCRIPT PARA LABELS-->

<script type="text/javascript">
    function borrarCampos(valor, campo) {
        if (campo.value == valor) campo.value = '';
    }

    function escribirCampos(valor, campo) {
        if (campo.value == '') campo.value = valor;
    }
</script>

</body>
</html>