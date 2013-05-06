<?php

/* ---------------------------
Note: most servers require that one of the emails (sender or receiver) to be an email hosted by same server, 
so make sure your email is one hosted on same server.
--------------------------- */
include "conexion.php"; 

// Taking variables from FORM (name)

$nombre = $_POST["nombre_info_accesorios"];
$apellido = $_POST["apellido_info_accesorios"];
$ciudad = $_POST["ciudad_info_accesorios"];
$telefono = $_POST["telefono_info_accesorios"];
$email = $_POST["email_info_accesorios"];
$info = $_POST["info_info_accesorios"];

$contentmsg = "Nombre: ".$nombre."\nApellido: ".$apellido."\nCiudad: ".$ciudad."\nTeléfono: ".$telefono."\nE-mail: ".$email."\nMensaje del cliente: ".$info;

$message = "Gracias por contactarnos, pronto nos comunicaremos contigo!";

//Variables for notifying
$subjectrecep = "Tu mensaje ha sido recibido.";

// Mail setup
$to="camilotho@gmail.com"; //Put your email here
$subject="NUEVA SOLICITUD DE INFORMACIÓN ACCESORIOS | www.mazda.com.ec ".$subjectmsg." "; 

$headers .= "From: ".$email."\n";

//Notify that the message was sent
$headers2 .= "From: ".$to."\n";
$headers2 .= "Reply-To: camilotho@gmail.com\r\n"; //Put the email to reply 
$headers2 .= "MIME-Version: 1.0\r\n";
$headers2 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


//$insert = mysql_query("INSERT INTO nobre_tabla (nombre, apellido, email, ciudad, telefono, email, comentario) VALUES ('$nombre','$apellido','$ciudad'1,'$email','$info',)") or die(mysql_error());
	//echo utf8_encode('&estado=enviado');
	mail($to,$subject,$contentmsg,$headers);
	mail($email,$subjectrecep,$message,$headers2);
/*}else{
	echo utf8_encode('&estado=ya existe');
}*/

	include "cerrarConexion.php";
?>

<script type="text/javascript">
	//alert("El paquete ha sido reservado, Gracias!");
	window.parent.location.href = "index.php"
</script>