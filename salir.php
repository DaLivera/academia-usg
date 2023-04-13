<?php
session_start();
require("includes/funciones.php");

$ahora = date($anio_servidor . "-" . $mes_servidor . "-" . $dia_hoy . " " . $hora_servidor . ":i:s");

//$correo=$_SESSION['mail'];
$activacion = $_SESSION['usuario'];
$resultado = mysqli_query($linkconx, "UPDATE admin_datos SET sesion='1', ultima_sesion='$ahora' WHERE activacion='$activacion'");

unset($_SESSION['usuario']);
unset($_SESSION['autentificado']);
unset($_SESSION['idUsuario']);
unset($_SESSION['nombreUsuario']);
unset($_SESSION['mailUsuario']);
unset($_SESSION['permisos']);

//session_destroy();
header("Location: index.php");