<?php
session_start();
require("includes/funciones.php");
$pagina='cursospresencialesguardar';
if ($_SESSION["autentificado"] == 4040) {
  $usuario_USGacademia = $_SESSION['usuario'];
  $identificador_USGacademia = $_SESSION['idUsuario'];
} else {
  header("Location: index.php");
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
    <script type="text/javascript">
        document.getElementById('guardarcurso').reset();
    </script>
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
                <div class="col-xs-12 col-lg-6 p-0 contenedor__presenciales">
                    <div class="contenedor-sec_02">
                    </div>
                </div>
            </div>
        </section>


        <!--====SECCIÓN 2====-->

        <section class="container-fluid seccion_02 m-0">
            <div class="row">
                <div class="col-xs-12 col-lg-7 p-0">
                    <div class="contenedor-sec_03 d-flex flex-column flex-nowrap justify-content-center" style="padding: 2rem 0;">
                        <h3 class="titulo_seccion-02 scroll_cursos-online">
                            Alta de cursos
                            <br><img src="img/linea-titulo-academia-usg.png" class="img-fluid" alt="línea-titulos-academia-usg" loading="lazy">
                        </h3>
                        <p class="texto_seccion-02 scroll_cursos-online-parrafo">
                            Aquí podrás guardar nuevos cursos.
                        </p>

                    </div>
                </div>
                <div class="col-xs-12 col-lg-5 p-0 d-none">
                    <div class="contenedor-sec_04 p-0">
                    </div>
                </div>
            </div>
        </section>
        

        <!--====SECCIÓN 2====-->

        <section class="container seccion_03" id="seccion_02">

            <div class="row row-cols-1 row-cols-lg-2 g-4 mb-5">

                <div class="col">
                    <h3 class="h3">Dar de alta curso presencial</h3>
                    <div class="card h-100">
                      <div class="card-body cont_cursosPresenciales">
        <form class="form" novalidate  role="form" name="curso" action="guardar_curso.php" method="post" enctype="multipart/form-data" id="guardarcurso" >
            <input type="hidden" name="tipoCurso" value="presencial">
                        <h5 class="card-title"><input type="text" class="form-control" id="tipo_curso" name="tipo_curso" placeholder="Tipo de curso"></h5>
                            <h5 class="card-title"><input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo"></h5>
                            <p class="card-text"><textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" rows="3"></textarea></p>
                            <p class="card-text"><textarea class="form-control" id="importante" name="importante" placeholder="Importante" rows="3"></textarea></p>
                            <p class="card-text"><textarea class="form-control" id="nota1" name="nota1" placeholder="Nota 1" rows="3"></textarea></p>
                            <p class="card-text"><textarea class="form-control" id="nota2" name="nota2" placeholder="Nota 2" rows="3"></textarea></p>
                            <p class="card-text"><input type="text" class="form-control" name="imparte" id="imparte" placeholder="Imparte"></p>
                            <p class="card-text"><input type="text" class="form-control" name="duracion" id="duracion" placeholder="Duración"></p>
                            <p class="card-text"><label for="fecha" class="form-label">Fecha de curso</label> <input type="date" id="start" name="fecha" value=""></p>
                            <p class="card-text"><input type="text" class="form-control" name="horario" id="horario" placeholder="Horarios"></p>
                            <p class="card-text"><input type="text" class="form-control" name="ubicacion" id="ubicacion" placeholder="Ubicación"></p>
                            <p class="card-text"><label for="subirfoto" class="form-label">Foto de curso (Estrictamente 540 px ancho, 360 px alto, 72 dpi resolución, archivo JPG)</label><input class="form-control" type="file" name="foto" id="subirfoto"></p>
                            <p class="card-text text-end"><a href="pre-inscripcion-01.php"><button class="btn btn-block btn_inscripcion" type="submit">Guardar</button></a></p>
                        </form>
                      </div>
                    </div>
                </div>

                <div class="col">
                    <h3 class="h3">Dar de alta curso online</h3>
                    <div class="card h-100">
                      <div class="card-body cont_cursosOnline">
        <form class="form" novalidate  role="form" name="curso" action="guardar_curso.php" method="post" enctype="multipart/form-data" id="guardarcursoonline" >
            <input type="hidden" name="tipoCurso" value="online">
                            <h5 class="card-title"><input type="text" class="form-control" id="titulo" name="tituloonline" placeholder="Titulo"></h5>
                            <p class="card-text"><textarea class="form-control" id="descripciononline" name="descripciononline" placeholder="Descripción" rows="3"></textarea></p>
                            <p class="card-text"><input type="text" class="form-control" name="imparteonline" id="imparte" placeholder="Imparte"></p>
                            <p class="card-text"><input type="text" class="form-control" name="duraciononline" id="duracion" placeholder="Duración"></p>
                            <p class="card-text"><label for="fecha" class="form-label">Fecha de curso</label> <input type="date" id="start" name="fechaonline" value=""></p>
                            <p class="card-text"><input type="text" class="form-control" name="horarioonline" id="horario" placeholder="Horarios"></p>
                            <p class="card-text"><input type="text" class="form-control" name="ubicaciononline" id="ubicacion" placeholder="Ubicación"></p>
                            <p class="card-text"><b>Link matutino:</b> <input class="form-control w-100" type="text" name="link_matutino" id="floatingMatutino" placeholder="Link Matutino" value="" required >
                        <br><b>Link vespertino:</b> <input class="form-control w-100" type="text" name="link_vespertino" id="floatingVespertino" placeholder="Link Vespertino" value="" required ></p>
                            <p class="card-text"><label for="subirfoto" class="form-label">Foto de curso (Estrictamente 540 px ancho, 360 px alto, 72 dpi resolución, archivo JPG)</label><input class="form-control" type="file" name="fotoonline" id="subirfoto"></p>
                            <p class="card-text text-end"><a href="pre-inscripcion-01.php"><button class="btn btn-block btn_inscripcion" type="submit">Guardar</button></a></p>
                        </form>
                      </div>
                    </div>
                </div>

            </div>

            <div class="row mt-4"><div class="col-12 text-center"><p><a href="salir.php"><button class="btn btn-lg btn-secondary btn-block" type="button">Salir</button></a></p></div></div>
        </section>
        
        <!--==FOOTER==-->
        <?php include("includes/footer.php");?>
       <!--==FIN FOOTER==-->

   </main>
   <!--==FIN MAIN==-->

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

   <script src="js/jquery-3.6.0.min.js"></script>
   <script src="js/popper.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <script src="https://unpkg.com/scrollreveal"></script>
   <script src="js/scroll.js"></script>
   <script src="js/custom.js?v=1.2"></script>
   <script type="text/javascript">
    $(document).ready(function() {
      tinymce.init({
        selector: '#descripcion',
        width: 600,
        height: 300
        });
    });
       
   </script>
</body>
</html>