<?php
require("includes/funciones.php");
//echo 'Empieza variables.<br />';
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$telefono = $_POST['telefono'];
$mail = $_POST['mail'];
$pais = $_POST['pais'];
$programa = $_POST['programa'];

/*========================================
		=            ENVIO DE MAIL            =
    ========================================*/
  $para = 'academia_cdmx@usg.com.mx';
  //$para = 'mike@rinoceronte.mx';
  $paraNombre = 'Academia CDMX';
  //$paraNombre = 'Mike';
  $subjet = 'Contacto Academia USG';
  $codigohtmlfinal =  "Nombre: $nombre \n<br />"."Apellidos: $apellidos \n<br />"."Teléfono: $telefono \n<br />"."Email: $mail \n<br />"."País: $pais \n<br />"."Programa de interes: $programa \n<br />";

  if ($nombre == 'John' && $mail == 'test@email.com' || $mail == 'test@email.com') {
        header("Location: index.php");
    } else {
        objetoSMTPContacto($para, $paraNombre, $subjet, $Host, $Username, $Password, $Port, $setFrom, $setFromNombre, $addReplyTo, $addReplyToNombre, $codigohtmlfinal);
    }

		/*=====  End of ENVIO DE MAIL SMTP  ======*/

		//echo 'envio mail.<br />';
	    //header("Location: index.html");


?>