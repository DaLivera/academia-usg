<?php
session_start();
//require("includes/funciones.php");
$pagina='instaladores';
if ($_SESSION["autentificado"] == 4040) {
  $usuario_USGacademia = $_SESSION['usuario'];
  $identificador_USGacademia = $_SESSION['idUsuario'];
} else {
  //header("Location: index.php");
} 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia USG</title>

    <!---===LINKS===-->
    <link rel="shortcut icon" href="img/logo-usg-favicon.png">
    <link rel="stylesheet" href="css/fuentes.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css?v=3.5">

    <!---===SCRIPTS===-->
    <script src="https://kit.fontawesome.com/eeed4bd1f5.js" crossorigin="anonymous"></script>
    <script src="js/all.min.js"></script>
</head>
<body>

    <!--==BLOG CALCULADORA==-->
    <?php include("includes/pleca-blog.php");?>
    <!--==FIN BLOG CALCULADORA==-->

    <!--==HEADER==-->
    <?php include("includes/header.php");?>
    <!--==FIN HEADER==-->

    <!--==MAIN==-->
    <main>
        
        <!--==CONFIRMACIÓN==-->
        <section class="container-fluid lista__miembros" id="lista__miembros" style="padding-bottom: 20%;">
            <div class="container">
                <div class="row">
                    <div class="col-12 ">
                        <div class="contenedor__parrafo__lista__miembro">
                            <p class="parrafos__grises text-center p-0 m-0 mb-2">
                                En este apartado podrás conectar tanto con instaladores profesionales, como con empresas con personal certificado por ACADEMIA USG®.
                            </p>
                            <p class="parrafos__grises text-center p-0 m-0">
                                Localiza y contacta a nuestros miembros, filtrándolos por su especialidad y ubicación.
                            </p>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 col-sm-6 d-flex justify-content-center justify-content-sm-end">
                                <div class="contenedor__boton_miembros">
                                    <a href="lista-miembros-instaladores.php" rel="noopener noreferrer"><button class="scroll-btn-01">INSTALADORES</button></a>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 d-flex justify-content-center justify-content-sm-start">
                                <div class="contenedor__boton_miembros">
                                    <a href="lista-miembros-empresas.php" rel="noopener noreferrer"><button class="scroll-btn-02">EMPRESAS</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--==FOOTER==-->
         <?php include("includes/footer.php");?>
        <!--==FIN FOOTER==-->

    </main>
    <!--==FIN MAIN==-->


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/scroll.js"></script>
</body>
</html>