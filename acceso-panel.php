<?php
session_start();
require("includes/funciones.php");
$pagina = 0;
if ($_SESSION["autentificado"] == 4040) {
  $usuario_USG = $_SESSION['usuario'];
  $identificador_USG = $_SESSION['idUsuario'];
  $solicitud = mysqli_query($linkconx, "SELECT * FROM admin_datos WHERE activacion='$usuario_USG'");
  $resultado = mysqli_fetch_array($solicitud);
  header("Location: cursos-presenciales-panel.php");
} else {
  //header("Location: index.php");
} 
//$_REQUEST['alert'];
if ($_REQUEST['alert'] == 'seleccionarCliente') {
  $mensaje_alerta = "Debes seleccionar el Cliente.";
} elseif ($_REQUEST['alert'] == 'nohaymail') {
  $mensaje_alerta = "Debes ingresar tu correo electrónico.";
} elseif ($_REQUEST['alert'] == 'nohaypass') {
  $mensaje_alerta = "Debes ingresar tu contraseña.";
} elseif ($_REQUEST['alert'] == 'errorarea') {
  $mensaje_alerta = "Debes seleccionar el Area correcta.";
} elseif ($_REQUEST['alert'] == 'nocorrespondecliente') {
  $mensaje_alerta = "No coincide tu cuenta con el Cliente seleccionado.";
} elseif ($_REQUEST['alert'] == 'sesion_cerrada') {
  $mensaje_alerta = "Has cerrado la sesión correctamente.";
}
?>
<!DOCTYPE html>
<html lang="es">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css?v=1.6" />

    <title>Acceso Academia USG</title>
    <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/signin.css?v=1.6" rel="stylesheet">
    <link href="css/custom.css?v=1.6" rel="stylesheet">
  </head>

  <body class="text-center">
  <div aria-live="polite" aria-atomic="true" class="d-flex justify-content-center align-items-center my-3">
      <!-- Then put toasts within -->
      <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="7000">
        <div class="toast-header bg-danger">
          <span data-feather="alert-triangle" style="color: #ffffff;"></span> <strong
            class="mr-auto ml-2 text-white">Alerta</strong>
          <small></small>
          <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body">
          <?php echo $mensaje_alerta; ?>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3 my-2">
          <a href="index.php"><img class="mb-4 img-fluid" src="img/logo-academia-usg-colores-slogan.png"
              style="max-width: 300px;"></a>
          <h1 class="h3 mb-1 font-weight-normal">Acceso</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
          <form class="form-signin" role="form" name="iniciarsesionclientes" action="i-s.php" method="post"
                enctype="multipart/form-data" onsubmit="return validarSesion()" >
                <input type="email" id="usuario" name="usuario" class="form-control" placeholder="Email"
                  value="<?php if (isset($_COOKIE['recordarmail'])) {echo $_COOKIE['recordarmail']; } ?>">
                <input type="password" id="passwCliente" name="passw" class="form-control" placeholder="Password"
                  value="<?php if (isset($_COOKIE['recordarpass'])) {echo $_COOKIE['recordarpass'];} ?>">
                <div class="checkbox mb-3">
                  <label>
                    <input type="checkbox" value="1" name="remember" id="remember" <?php if (isset($_COOKIE['recordarpass'])) {echo 'checked';} ?>> Recordarme
                  </label>
                </div>
                <button class="btn btn-lg btn-danger btn-block" type="submit">Entrar</button>

              </form>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <p><a href="index.php" class="text-secondary">Regresar</a></p>
          <p class="mt-5 mb-3 text-secondary">&copy; <?php echo $anio_servidor; ?>
          </p>
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/custom.js"></script>
    <?php if ($_REQUEST['alert']) : ?>
    <script>
    $(document).ready(function() {
      $('.toast').toast('show');
    });
    </script>
    <?php else : ?>
    <script>
    $(document).ready(function() {
      $('.toast').toast('hide');
    });
    </script>
    <?php endif; ?>
  </body>
</html>