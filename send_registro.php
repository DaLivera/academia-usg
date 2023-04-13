<?php
require("includes/funciones.php");
//echo 'Empieza variables.<br />';
$Nombre = $_POST['nombre'];
$Correo = $_POST['email'];
$Asunto = $_POST['asunto'];
$Mensaje = $_POST['mensaje'];

/*========================================
		=            ENVIO DE MAIL            =
    ========================================*/
  $para = 'contactoweb.ayh@gmail.com';
  $paraNombre = 'Haiat y Amezcua';
  $subjet = 'HAIAT & AMEZCUA . : . Contacto';
  $codigohtmlfinal =  "Nombre: $Nombre \n<br />"."Email: $Correo \n<br />"."Asunto: $Asunto \n<br />"."Mensaje: $Mensaje \n<br />";
		/*=====  End of ENVIO DE MAIL SMTP  ======*/
objetoSMTP($para, $paraNombre, $subjet, $Host, $Username, $Password, $Port, $setFrom, $setFromNombre, $addReplyTo, $addReplyToNombre, $codigohtmlfinal);
		//echo 'envio mail.<br />';
	    //header("Location: index.html");


?>