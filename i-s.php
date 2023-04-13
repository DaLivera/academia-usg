<?php
session_start();
require("includes/funciones.php");
/*====================================================
=            ACCIONES DE INICIO DE SESION            =
====================================================*/
if (empty($_POST['usuario'])) {
  //mysqli_close($linkconx);
  //header("Location: admin.php?alert=usuario_incorrecto");
  header("Location: index.php?alert=nohaymail");
  //session_destroy();
  exit(0);
} else {
  $usuario = $_POST['usuario'];
  if (empty($_POST['passw'])) {
    //mysqli_close($linkconx);
    //header("Location: admin.php?alert=usuario_incorrecto");
    header("Location: index.php?alert=nohaypass");
    //session_destroy();
    exit(0);
  } else {
    $contra = $_POST['passw'];
    // Buscamos al usuario
    $busca = mysqli_query($linkconx, "SELECT * FROM admin_datos WHERE correo_mail='$usuario'");

    if (!$res = mysqli_fetch_array($busca)) { // VERIFICAMOS EXISTENCIA DE USUARIO
      //mysql_close($link);
      //header("Location: admin.php?alert=usuario_incorrecto"); // NO EXISTE USUARIO
      header("Location: index.php?alert=noexisteusuario"); // NO EXISTE USUARIO
      //session_destroy();
      exit(0);
    } else { // EXISTE USUARIO

      $pass_guardado = $res['pass_contra'];
      if (password_verify($contra, $pass_guardado)) {
        $contravalida = 2;
        //echo 'La contraseña es válida.';
      } else {
        $contravalida = 1;
        //echo 'La contraseña no es válida.';
      }

      if ($contravalida == 2) { 
        // Verificamos que el password es correcto
        $pagina_atras = $_SERVER['HTTP_REFERER'];
        ini_set("session.use_only_cookies", "1");
        $_SESSION['usuario'] = $res['activacion'];
          if ($res['atributos'] == 1) {
            # ADMINISTRADOR
            $_SESSION["autentificado"] = 4040;
          } else {
            $_SESSION["autentificado"] = 1010;
            header("Location: index.php?alert=accesodenegado&tipo=permisos"); // ATRIBUTOS DENEGADOS
            //session_destroy();
            exit(0);
          }
        //ini_set("session.use_trans_sid","0");   
        //Iniciamos la sesion
        session_set_cookie_params(0, "/", $HTTP_SERVER_VARS["HTTP_HOST"], 0);
        //cambiamos la duracion a la cookie de la sesion 
        if ($_POST['remember'] == "1") {
          setcookie("recordarmail", $_POST['usuario'], time() + (60 * 60 * 24 * 365), "/");
          setcookie("recordarpass", $_POST['passw'], time() + (60 * 60 * 24 * 365), "/");
        } else {
          setcookie("recordarmail", "", time() - 1000, "/");
          setcookie("recordarpass", "", time() - 1000, "/");
        }
        if ($res["temporal"] == "1") {
          $_SESSION['temporal'] = 'noactivada';
          header("Location: index.php?alert=cuentasinactivar");
        } else {
          //defino la sesion que demuestra que el usuario esta autorizado
          $ingreso = date($anio_servidor . "-" . $mes_servidor . "-" . $dia_hoy . " " . $hora_servidor . ":i:s");
          //defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss
          $hora = date($hora_servidor . ":i:s");
          $usuarioActivacion = $res['activacion'];
          $resultado = mysqli_query($linkconx, "UPDATE admin_datos SET sesion='2', ingreso='$ingreso', ultima_actividad='$ingreso' WHERE correo_mail='$usuario'");
          // Variables de la sesion
          $_SESSION['idUsuario'] = $res['identificador'];
          $_SESSION['nombreUsuario'] = $res['nombre'];
          $_SESSION['mailUsuario'] = $usuario;
          $_SESSION['permisos'] = $res['atributos'];
          if ($res['atributos'] == 1) {
            //header("Location: cursos-presenciales-panel.php");
            header("Location: inicio.php");
          }
          
        }
      } elseif ($contravalida == 1) {
        //mysql_close($link);
        //header("Location: admin.php?alert=usuario_incorrecto"); // PASSWORD INCORRECTO
        header("Location: index.php?alert=passincorrecto"); // PASSWORD INCORRECTO
        //session_destroy();
        exit(0);
      }
    } //EXISTE USUARIO
  }
}