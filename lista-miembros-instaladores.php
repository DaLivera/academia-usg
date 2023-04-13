<?php
session_start();
require("includes/funciones.php");
$pagina='instaladores';
if ($_SESSION["autentificado"] == 4040) {
  $usuario_USGacademia = $_SESSION['usuario'];
  $identificador_USGacademia = $_SESSION['idUsuario'];

  $guardarInstalador = $_POST['guardarInstalador'];
  $borrarinstalador = $_REQUEST['borrarinstalador'];

  if($guardarInstalador=='si'){
    $idInstalador = $_POST['idInstalador'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $certificado = $_POST['certificado'];
    $especialidad = $_POST['especialidad'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $actualizar = mysqli_query($linkconx, "UPDATE miembros_individuos SET nombre='$nombre', paterno='$paterno', materno='$materno', certificado='$certificado', especialidad='$especialidad', telefono='$telefono', email='$email', estado='$estado', municipio='$municipio' WHERE id='$idInstalador'");
  }elseif($guardarInstalador=='new'){
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $certificado = $_POST['certificado'];
    $especialidad = $_POST['especialidad'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    mysqli_query($linkconx, "INSERT INTO miembros_individuos (id, certificado, nombre, paterno, materno, especialidad, estado, municipio, telefono, email) VALUES ('', '$certificado', '$nombre', '$paterno', '$materno', '$especialidad', '$estado', '$municipio', '$telefono', '$email') ");
  }
  if($borrarinstalador=='si'){
    $instaladorid = $_REQUEST['instaladorid'];
    mysqli_query($linkconx, "DELETE FROM miembros_individuos WHERE id='$instaladorid' ");
  }

} else {
  //header("Location: index.php");
}
$busqueda = 1;
$busqueda = $_POST['busqueda'];
if ($busqueda > 1) {
    // code...
    $busquedaespecialidad = $_POST['especialidad'];
    $busquedaestado = $_POST['estado'];
    $busquedamunicipio = $_POST['municipio'];
}else{}
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
    <link rel="stylesheet" href="css/estilos.css?v=3.6">

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
        <section class="container-fluid lista__miembros" id="lista__miembros">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="contenedor__titulo__lista__miembro d-flex flex-nowrap">
                            <img src="img/icono-lista-instaladores.png" class="icono-lista-instaladores" loading="lazy">
                            <h5 class="h5 titulos__grises" style="margin-left: 1rem;">
                                Lista
                                <br>Instaladores
                                <br><img src="img/linea-titulo-academia-usg.png" class="img-fluid" alt="línea-titulos-academia-usg" loading="lazy">
                            </h5>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="contenedor__parrafo__lista__miembro">
                            <p class="parrafos__grises p-0 m-0 mb-2">
                                En este apartado podrás conectar tanto con instaladores profesionales, como con empresas con personal certificado por ACADEMIA USG®.
                            </p>
                            <p class="parrafos__grises p-0 m-0">
                                Localiza y contacta a nuestros miembros, filtrándolos por su especialidad y ubicación.
                            </p>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 col-sm-6 d-flex justify-content-center justify-content-sm-end">
                                <div class="contenedor__boton_miembros">
                                    <button class="scroll-btn-01">INSTALADORES</button>
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

        <section class="container formulario__miembros" id="formulario__miembros">
            <div class="row">
                <div class="col">
                    <div class="contenedor__formulario-miembros">
                        <form novalidate  role="form" name="busqueda_instaladores" action="lista-miembros-instaladores.php" method="post"
                enctype="multipart/form-data" id ="busqueda_instaladores" >
                <input type="hidden" name="busqueda" value="2">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-6 mb-3 contenedor__input d-none">
                                    <input class="__input w-100" type="text" class="form-control" id="floatingNombre" placeholder="Nombre Completo">
                                </div>
                                <div class="col-12 col-md-12 col-lg-6 mb-3 contenedor__input d-none">
                                    <input class="__input w-100" type="text" class="form-control" id="floatingCertificado" placeholder="Nº de Certificado">
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 mb-3 contenedor__input">
                                    <select class="form-select __select" aria-label="Default select example" name="especialidad">
                                        <option selected>Especialidad</option>
                                        <?php especialidadesSelect($linkconx); ?>
                                      </select>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 mb-3 contenedor__input">
                                    <select class="form-select __select" aria-label="Default select example" name="estado" id="selectEstado" onchange="cambiarEstado()">
                                        <option>Estado</option>
                                        <?php estadosSelect($linkconx); ?>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12 col-lg-3 mb-3 contenedor__input">
                                    <select class="form-select __select" id="municipio_e" name="municipio" aria-label="Default select example">
                                        <option value="0">Municipio / Alcaldía</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row text-center">
                                <div class="col-12 text-center">
                                    <button type="submit" class="btn btn-secondary">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section class="container tabla__lista__miembros" style="padding-bottom: 10%;" id="bloqueInstaladores">
            <div class="row primera__fila">
                <div class="col">
                    <div class="d-flex justify-content-center flex-wrap tabla__contenedor__txt">
                        <p class="text-center">
                            <img src="img/instaladores.png" alt="Empresa" class="img-fluid mb-2 tabla__icono">
                            <br>Nombre completo
                            <br><img src="img/linea-titulo-tabla.png" alt="" class="img-fluid">
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center flex-wrap tabla__contenedor__txt">
                        <p class="text-center">
                            <img src="img/personas-certificadas.png" alt="Personas Certificadas" class="img-fluid mb-2 tabla__icono">
                            <br>No. de Certificado
                            <br><img src="img/linea-titulo-tabla.png" alt="" class="img-fluid">
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center flex-wrap tabla__contenedor__txt">
                        <p class="text-center">
                            <img src="img/certificados.png" alt="Certificados" class="img-fluid mb-2 tabla__icono">
                            <br>Especialidad
                            <br><img src="img/linea-titulo-tabla.png" alt="" class="img-fluid">
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center flex-wrap tabla__contenedor__txt">
                        <p class="text-center">
                            <img src="img/contacto.png" alt="Contacto" class="img-fluid mb-2 tabla__icono">
                            <br>Contacto
                            <br><img src="img/linea-titulo-tabla.png" alt="" class="img-fluid">
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex justify-content-center flex-wrap tabla__contenedor__txt">
                        <p class="text-center">
                            <img src="img/ubicacion.png" alt="Ubicación" class="img-fluid mb-2 tabla__icono">
                            <br>Ubicación
                            <br>(Estado / Municipio)
                            <br><img src="img/linea-titulo-tabla.png" alt="" class="img-fluid">
                        </p>
                    </div>
                </div>
            </div>

            <?php 
            if ($busqueda > 1) {
                
                if ($_SESSION["autentificado"] == 4040) {
                  busquedaInstaladoresEdicion($linkconx, $busquedaespecialidad, $busquedaestado, $busquedamunicipio); 
                } else {
                  busquedaInstaladores($linkconx, $busquedaespecialidad, $busquedaestado, $busquedamunicipio);
                }
            }else{
                if ($_SESSION["autentificado"] == 4040) {
                  guardarInstaladores($linkconx);
                  listadoInstaladoresEdicion($linkconx); 
                } else {
                  listadoInstaladores($linkconx); 
                }
            }
            ?>

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
    <script src="js/custom.js?v=2.3"></script>
</body>
</html>