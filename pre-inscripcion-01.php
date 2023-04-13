<?php
session_start();
require("includes/funciones.php");
$pagina='cursospresenciales';
if ($_SESSION["autentificado"] == 4040) {
  $usuario_USGacademia = $_SESSION['usuario'];
  $identificador_USGacademia = $_SESSION['idUsuario'];
}
?>
<!DOCTYPE html>
<html lang="en">
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

    <!--====MAIN====-->

    <main>

        <!--====SECCIÓN 1====-->

        <section class="container-fluid seccion_01 d-none d-lg-block">
            <div class="row">
                <div class="col-xs-12 col-lg-6 p-0">
                    <div class="contenedor-sec_01">
                    </div>
                </div>
                <div class="col-xs-12 col-lg-6 p-0 contenedor__preinscripcion">
                    <div class="contenedor-sec_02">
                    </div>
                </div>
            </div>
        </section>


        <!--====SECCIÓN 2====-->

        <section class="container-fluid seccion_02 m-0" >
            <div class="row" id="headerCurso">
                <div class="col-xs-12 col-lg-7 p-0">
                    <div class="contenedor-sec_03 d-flex flex-column flex-nowrap justify-content-center" style="padding: 2rem; padding-right: 4rem;">
                        <h4 class=" ml-5 pr-5" style="font-family: 'GothamNarrow-Bold', Arial, Helvetica, sans-serif;">
                            CURSO NIVEL BÁSICO: CONSTRUCCIÓN DE <br>MUROS Y PLAFONES USG TABLAROCA®
                            <br><img src="img/linea-titulo-academia-usg.png" class="img-fluid" alt="línea-titulos-academia-usg" loading="lazy">
                        </h4>
                        <p class="">
                           En este curso, el participante desarrollará las competencias necesarias para construir muros y plafones con el sistema USG TABLAROCA®, aplicando las mejores prácticas para un trabajo seguro.<br><br>
                           <b>DIRGIDO A:</b> Público general con el interés de aprender el método de instalación del sistema USG TABLAROCA® 
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-5 p-0 d-none">
                    <div class="contenedor-sec_04 p-0">
                    </div>
                </div>
            </div>
        </section>
        

        <!--====FORMULARIO PREINSCRIPCION====-->
        <section class="container formulario__preinscripcion mb-5" style="margin-bottom: 300px">
            <div class="row">
                <div class="col-12">
                    <h3 class="titulo_seccion-02 scroll-preinscripcion text-center mb-3" style="font-weight:bold; ">
                            PRE-REGISTRO
                        </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 columna__formulario">
                    <div class="textos__formularios text-left">
                        <h6>REGÍSTRATE</h6>
                    </div>
                    <div class="contenedor__formulario">
                        <div class="h-100">
                            <form novalidate  role="form" name="registro" action="confirmacion.php" method="post"
                enctype="multipart/form-data" id ="registro" >
                                <input type="hidden" name="curso" value="CURSO NIVEL BÁSICO: CONSTRUCCIÓN DE <br>MUROS Y PLAFONES USG TABLAROCA">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                        <p class="text-center">Selecciona la fecha para tomar el curso:</p>
                                        </div>
                                        <div class="col-12 mb-3 text-center">
                                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="img/icono-calendario.png" alt="Calendario de Cursos" loading="lazy"></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-3"><p class="text-center" id="diaSeleccionado"></p></div>
                                        <div id="diadecurso"><input type="hidden" name="diacurso" value=""></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-4 mb-3 contenedor__input">
                                            <input class="__input w-100" type="text" class="form-control" name="nombre" id="floatingNombre" placeholder="Nombre(s)" required>
                                        </div>
                                        <div class="col-12 col-lg-4 mb-3 contenedor__input">
                                            <input class="__input w-100" type="text" class="form-control" name="paterno"  placeholder="Apellido Paterno" required>
                                        </div>
                                        <div class="col-12 col-lg-4 mb-3 contenedor__input">
                                            <input class="__input w-100" type="text" class="form-control" name="materno"  placeholder="Apellidos Materno" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6 mb-3 contenedor__input">
                                            <input class="__input w-100" type="email" class="form-control" name="mail" id="floatingEmail" placeholder="Email" required>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3 contenedor__input">
                                            <input class="__input w-100" type="tel" class="form-control" name="telefono" id="floatingTel" placeholder="Teléfono (10 dígitos)" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-6 mb-3 contenedor__input">
                                            <select class="form-select __select" aria-label="Default select example" name="estado" id="selectEstado" onchange="cambiarEstado()">
                                                <option>Estado</option>
                                                <?php estadosSelect($linkconx); ?>
                                              </select>
                                        </div>
                                        <div class="col-12 col-lg-6 mb-3 contenedor__input">
                                            <select class="form-select __select" id="municipio_e" name="municipio" aria-label="Default select example"><option value="0">Municipio / Alcaldía</option></select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-3 text-center">
                                            <p class="text-center">Fecha de nacimiento:</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-lg-4 mb-3 contenedor__input">
                                            <select class="form-select __select" name="dianacimiento" aria-label="Default select example">
                                                <option selected>Día</option>
                                                <?php diaNacimiento(); ?>
                                              </select>
                                        </div>
                                        <div class="col-12 col-lg-4 mb-3 contenedor__input">
                                            <select class="form-select __select" name="mesnacimiento" aria-label="Default select example">
                                                <option selected>Mes</option>
                                                <?php mesNacimiento($mes); ?>
                                              </select>
                                        </div>
                                        <div class="col-12 col-lg-4 mb-3 contenedor__input">
                                            <select class="form-select __select" name="anionacimiento" aria-label="Default select example">
                                                <option selected>Año</option>
                                                <?php anioNacimiento($anio_servidor); ?>
                                              </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center mb-3">
                                            <div class="form-check flex-wrap">
                                                <p>
                                                    Genero:
                                                </p>
                                                <input class="" type="radio" name="genero" id="genero1" value="Masculino">
                                                <label class="form-check-label" for="genero1">
                                                    Masculino
                                                </label>
                                                <input class="" type="radio" name="genero" id="genero2" value="Femenino">
                                                <label class="form-check-label" for="genero2">
                                                    Femenino
                                                </label>
                                                <input class="" type="radio" name="genero" id="genero3" value="Otro">
                                                <label class="form-check-label" for="genero3">
                                                    Otro
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 text-center mt-4">
                                            <div class="form-check flex-wrap">
                                                <p>
                                                    ¿Desea recibir información adicional sobre productos y cursos presenciales o en línea de USG?
                                                </p>
                                                <input class="" type="radio" name="infoProductos" id="infoProductos1" value="Si">
                                                <label class="form-check-label" for="infoProductos1">
                                                    Si
                                                </label>
                                                <input class="" type="radio" name="infoProductos" id="infoProductos2" value="No">
                                                <label class="form-check-label" for="infoProductos2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mt-4 mb-3">
                                            <div class="col-12 contenedor__boton text-center">
                                                <div class="contenedor__boton__parrafo text-center">
                                                    <button type="submit" >Inscribirse</button>
                                                    <p >
                                                        Si tienes problemas con el llenado de este formulario, comunicarte al teléfono…
                                                    </p>
                                                </div>      
                                            </div>
                                        </div>
                                    </div>

                            </form>
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
  
<!-- Modal -->
    <div class="modal bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body" data-bs-dismiss="modal"><img src="img/calendario-vista.png" class="img-fluid" alt=""></div>
            </div>
        </div>
    </div>
</div>

<!--=============== MODAL ===============-->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content calendar">
                    <div class="modal-header d-flex justify-content-between flex-nowrap">
                            <div class="calendar__prev" id="prev-month"><</div>
                                <div class="d-flex flex-nowrap">
                                    <div class="calendar__month" id="month"></div>
                                    &nbsp;
                                    <div class="calendar__year" id="year"></div>
                                </div>
                            <div class="calendar__next" id="next-month">></div>
                    </div>
                    <div class="container__days-week">
                        <div class="modal-body calendar__week text-center">
                            <div class="calendar__day calendar__item">Lun</div>
                            <div class="calendar__day calendar__item">Mar</div>
                            <div class="calendar__day calendar__item">Mié</div>
                            <div class="calendar__day calendar__item">Jue</div>
                            <div class="calendar__day calendar__item">Vie</div>
                            <div class="calendar__day calendar__item">Sab</div>
                            <div class="calendar__day calendar__item">Dom</div>
                        </div>
    
                        <div class="calendar__dates" id="dates"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--===============FIN MODAL ===============-->

    <script src="js/calendario_curso01.js"></script>
   <script src="js/jquery-3.6.0.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="https://unpkg.com/scrollreveal"></script>
   <script src="js/scroll.js"></script>
   <script src="js/custom.js"></script>


    <script type="text/javascript">
      $(document).ready(function(e) {
        $("#galeria-modal").modal();
      });
    </script>
</body>
</html>