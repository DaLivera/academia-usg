<?php
session_start();
require("includes/funciones.php");
$pagina='home';
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


    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="css/mapa.css" rel="stylesheet">
    <script>
        //https://www.google.com/maps/place/Av.+Marina+Nacional+150,+Tacuba,+Miguel+Hidalgo,+11410+Ciudad+de+México,+CDMX/@19.4557407,-99.1903934,17z/data=!3m1!4b1!4m5!3m4!1s0x85d1f89fbe0f4df5:0x380b586b84df8e8b!8m2!3d19.4557407!4d-99.1882047
    function initMap() {
      var macc = {lat: 19.4557407, lng: -99.1882047};
      var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 17, center: macc});
      var marker = new google.maps.Marker({position: macc, map: map});
    }
 </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlCQwGWkDu5MY1QoqwAHi3diQbPNhKkfU&callback=initMap">
    </script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-E0LF7EBDXF"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-E0LF7EBDXF');
</script>

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

        <!--==SECTION HOME==-->
        <section class="__home container-fluid" id="__home">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4 col-xl-4 order-1 order-md-0 align-items-center justify-content-center scroll_for py-5">
                    <div class="col-lg-2 justify-content-center contenedor__formulario">
                        <h5 class="mb-4 text-center">
                            Para más información escríbenos
                        </h5>
                        <div class="h-100">
                            <form novalidate  role="form" name="contacto" action="send_contacto.php" method="post" enctype="multipart/form-data" id ="contacto" onsubmit="return validarContacto()">
                                <div class="row d-flex align-content-around justify-content-center">
                                    <div class="col-sm-12 col-lg-10 mb-3 contenedor__input nombre">
                                        <input class="__input w-100" type="text" class="form-control" name="nombre" id="floatingNombre" placeholder="Nombre">
                                    </div>
                                    <div class="col-sm-12 col-lg-10 mb-3 contenedor__input apellidos">
                                        <input class="__input w-100" type="text" class="form-control" name="apellidos" id="floatingApellidos" placeholder="Apellidos">
                                    </div>
                                    <div class="col-sm-12 col-lg-10 mb-3 contenedor__input telefono">
                                        <input class="__input w-100" type="tel" class="form-control" name="telefono" id="floatingTel" placeholder="Teléfono">
                                    </div>
                                    <div class="col-sm-12 col-lg-10 mb-3 contenedor__input mail">
                                        <input class="__input w-100" type="email" class="form-control" name="mail" id="floatingEmail" placeholder="Correo Electrónico">
                                    </div>
                                    <div class="col-sm-12 col-lg-10 mb-3 contenedor__input pais">
                                        <input class="__input w-100" type="text" class="form-control" name="pais" id="floatingApellidos" placeholder="País">
                                    </div>
                                    <div class="col-sm-12 col-lg-10 mb-3 contenedor__input programa">
                                        <select class="form-select __select" name="programa" aria-label="Default select example">
                                            <option value="0" selected>Selecciona el Programa de tu interés</option>
                                            <optgroup label="Introducción a los sistemas constructivos">
                                                <option value="Portafolio USG">Portafolio USG</option>
                                                <option value="USG TABLAROCA® / USG SHEETROCK®">USG TABLAROCA® / USG SHEETROCK®</option>
                                                <option value="USG DUROCK®">USG DUROCK®</option>
                                                <option value="USG PLAFONES® / USG CEILINGS®">USG PLAFONES® / USG CEILINGS®</option>
                                                <option value="USG SECUROCK®">USG SECUROCK®</option>
                                            </optgroup>
                                            <optgroup label="Especificación por sector de construcción">
                                                <option value="Residencial">Residencial</option>
                                                <option value="Corporativo">Corporativo</option>
                                                <option value="Salud">Salud</option>
                                                <option value="Turismo">Turismo</option>
                                                <option value="Comercial y entretenimiento">Comercial y entretenimiento</option>
                                                <option value="Educativo">Educativo</option>
                                            </optgroup>
                                            <optgroup label="Con enfoque al desempeño">
                                                <option value="Fuego">Fuego</option>
                                                <option value="Acústica">Acústica</option>
                                                <option value="Sustentabilidad">Sustentabilidad</option>
                                                <option value="Sismos">Sismos</option>
                                            </optgroup>
                                            <optgroup label="Instalación y supervisión">
                                                <option value="USG TABLAROCA® / USG SHEETROCK®">USG TABLAROCA® / USG SHEETROCK®</option>
                                                <option value="USG DUROCK®">USG DUROCK®</option>
                                            </optgroup>
                                          </select>


                                    </div>
                                    <div class="col-12 col-md-10 col-lg-8 mb-3">
                                        <div class="form-check checkAdP">
                                            <input class="form-check-input" name="checkAdP" type="checkbox" value="2" id="checkAdP" onclick="valdarAdP()">
                                            <label class="label__check form-check-label" for="checkAdP">
                                                He leído y acepto que mis datos serán tratados conforme al aviso de privacidad que se encuentra aquí.
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-10 col-lg-8 mb-3 p-0">
                                        <div class="d-grid gap-2 col-12 m-0">
                                            <button type="submit" id="btn_contacto" style="display: none">CONTACTAR</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-10 mb-3">
                                        <div>
                                            <p style="font-size: 0.7rem; line-height: 0.7rem; margin: 0 2rem;">
                                                Si tienes problemas con el llenado de este formulario escríbenos a: academia_cdmx@usg.com.mx</p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4 col-xl-4 d-none d-md-block"></div>
                <div class="col-12 col-md-4 col-lg-4 col-xl-4 order-0 order-md-0 contenedor__cursos-online">
                    <div class="align-items-right contenedor__tituloh1 p-5 pt-0">
                        <div class="pleca-titulo-bienvenidos p-2 mb-4 ">
                            <h1 class="h1 text-white text-center">
                            <b>Bienvenidos</b>
                        </h1>
                        </div>
                        <p class="p" style="color:#333333; text-align: justify;">Academia USG es el primer Centro de Capacitación enfocado en el conocimiento teórico y práctico de los sistemas ligeros de construcción USG, así como en el impulso del crecimiento profesional y la contribución a la mejora de las condiciones de vida y trabajo de los instaladores y asistentes en general, a través de cursos y talleres que ayuden a desarrollar sus habilidades y competencias.</p>
                    </div>
                </div>
            </div>
        </section>
        <!--==FIN SECTION HOME==-->

        <!--==SECTION QUÉ ES USG==-->
        <section class="que__es__academiausg container-flluid" id="que__es__academiausg">
            <div class="row m-0">
                <div class="col-12 col-lg-10 offset-lg-1">
                    <div class="row">
                        <div class="col-md-6 d-none d-md-inline align-self-end">
                            <img src="img/que-es-academia-usg-hombre.png" alt="Estudiante" class="img-fluid scroll_img-hombre" loading="lazy">
                        </div>
                        <div class="col-md-6 col-12 m-0 contenedor__tituloh2">
                            <h2 class="titulos__grises titulo__h2">MISIÓN
                                <br><img src="img/linea-titulo-academia-usg.png" class="img-fluid" alt="línea-titulos-academia-usg" loading="lazy">
                            </h2>
                            <p class="parrafos__grises" style="text-align: right">Fomentar el crecimiento profesional y contribuir a la mejora de las condiciones de vida y trabajo de los instaladores y asistentes en general, por medio de cursos y talleres que ayuden a desarrollar sus habilidades y competencias en la instalación de los sistemas ligeros de construcción.
                            </p>
                            <h2 class="titulos__grises titulo__h2 mt-5">VISIÓN
                                <br><img src="img/linea-titulo-academia-usg.png" class="img-fluid" alt="línea-titulos-academia-usg" loading="lazy">
                            </h2>
                            <p class="parrafos__grises" style="text-align: right">Ser el principal impulsor y promotor del uso adecuado de los sistemas ligeros de construcción en la industria, así como del portafolio de soluciones USG, generando lealtad y sentido de pertenencia, convirtiendo así a los participantes en embajadores de la marca y de sus productos.
                            </p>
                        </div>
                    </div>
                    
                </div>
                <div class="col-12 col-lg-4 columna__cursos" style="display: none;">
                    <div class="row fila__cursos d-flex justify-content-center">
                        <div class="col-xs-12 col-sm-10 col-lg-12 d-md-none d-lg-block contenedor__cursos">
                            <h3 class="titulos__blancos text-center">
                                Cursos
                            </h3>
                            <ul class="p-0 mb-5">
                                <li class="mb-2 m-0">Tableros</li>
                                <li class="mb-2 m-0">Plafones</li>
                                <li class="mb-2 m-0">Sistemas de Suspensión</li>
                                <li class="mb-2 m-0">Perfiles Metálicos</li>
                                <li class="mb-2 m-0">Adhesivos</li>
                                <li class="mb-2 m-0">Complementos</li>
                                <li class="mb-2 m-0">Tornillería</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--==FIN SECTION QUÉ ES USG==-->


        <!--==SECTION DÓNDE SE IMPARTEN LOS CURSOS?==-->
        <section class="donde__cursos container" id="donde__cursos" style="margin-top: 4rem;">
            <article class="row">
                <div class="col-lg-4 offset-lg-1 d-flex aligm-items-center justify-content-end">
                    <div class="contenedor__titulo d-flex justify-content-end flex-wrap">
                        <h2 class="titulos__grises scroll_donde">
                            ¿A quién va dirigido?
                            <br><img src="img/linea-titulo-academia-usg.png" class="img-fluid" loading="lazy">
                        </h2>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 d-flex align-items-center">
                    <div class="contenedor__parrafo scroll_donde-parrafo">
                        <p>&bull; Profesionales de la construcción que busquen conocer más sobre soluciones constructivas para el diseño arquitectónico con sistemas ligeros.<br>
                            &bull; Instaladores y trabajadores del sector que deseen perfeccionar sus competencias y habilidades, mejorando sus técnicas de instalación en sistemas ligeros de construcción.<br>
                            &bull;  A todas las personas, mayores de 18 años, que deseen aprender un nuevo oficio.
                        </p>
                    </div>
                </div>
            </article>
        </section>
         <!--==FIN SECTION DÓNDE SE IMPARTEN LOS CURSOS?==-->

        <!--==SECTION DÓNDE SE IMPARTEN LOS CURSOS?==-->
        <section class="donde__cursos container" id="donde__cursos" style="margin-top: 2rem;">
            <article class="row">
                <div class="col-lg-4 offset-lg-1 d-flex aligm-items-center justify-content-end">
                    <div class="contenedor__titulo d-flex justify-content-end flex-wrap">
                        <h2 class="titulos__grises scroll_donde">
                            Acerca de USG
                            <br><img src="img/linea-titulo-academia-usg.png" class="img-fluid" loading="lazy">
                        </h2>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 d-flex align-items-center">
                    <div class="contenedor__parrafo scroll_donde-parrafo">
                        <p>Somos la empresa líder mundial en la fabricación de Sistemas Ligeros de Construcción con más de 115 años de presencia global. Llegamos a México hace más de 50 años con la introducción al mercado de la marca USG TABLAROCA® así como de innovadoras soluciones de alto desempeño que integran muros interiores, fachadas, entrepisos, yesos y plafones fabricados en 5 plantas de manufactura ubicadas en Puebla, Nuevo León, Coahuila, San Luis Potosí y Colima, las cuales abastecen de nuestros sistemas a México, Centroamérica, El Caribe, Sudamérica y Asia. <a href="https://www.usg.com/content/usgcom/spanish/about-usg/company-overview.html" target="_blank">Conoce más aquí</a>
                        </p>
                    </div>
                </div>
            </article>
        </section>
         <!--==FIN SECTION DÓNDE SE IMPARTEN LOS CURSOS?==-->

        <!--==SECTION PRÓXIMOS CURSOS==-->
        <div class="proximos__eventos-02 card text-white p-0 d-block d-lg-none" id="proximos__eventos">
            <img src="img/bg-proximos-eventos-academia-usg-02.png" class="card-img" alt="Proximos eventos en Academia USG" loading="lazy">
            <div class="card-img-overlay d-flex align-content-center flex-wrap">
                <div class="contenedor__eventos-02"></div>
                <h5 class="card-title scroll_proxi-eventos">Próximos <br>Eventos</h5>
                <p class="card-text scroll_proxi-eventos-parrafo">Utiliza nuestro buscador para poder encontrar las Academias más cercanas y averigua que cursos se imparten. Por el momento nos encontramos solo en CDMX.</p>
            </div>
        </div>
        <div class="proximos__eventos card text-white p-0 d-none d-lg-block" id="proximos__eventos">
            <img src="img/bg-proximos-eventos-academia-usg.png" class="card-img" alt="Proximos eventos en Academia USG" loading="lazy">
            <div class="card-img-overlay d-flex align-content-center flex-wrap">
                <div class="contenedor__eventos">
                    <h5 class="card-title scroll_proxi-eventos">
                        Próximos
                        <br>Cursos
                    </h5>
                    <p class="card-text scroll_proxi-eventos-parrafo">
                    </p>
                </div>
            </div>
        </div>
        <!--==FIN SECTION PRÓXIMOS CURSOS==-->

                <!--==SECTION CURSOS==-->
        <section class="ejemplos__cursos container" id="__cursos">
            <div class="row contenedor__ejemplos-cursos w-100 d-flex justify-content-center">
                <?php listado_cursoshome($linkconx, $mes); ?>
            </div>
        </section>
        <!--==SECTION CURSOS==-->
    

         <!--==SECTION UBICACION MAPA==-->
         <section class="ubica__sede container" id="ubica__sede" style="margin-bottom: 3rem;">
            <div class="row">
                <div class="col-lg-4 offset-lg-1">
                    <div class="contenedor__titulo__ubi d-flex justify-content-end flex-wrap">
                        <h4 class="titulos__grises scroll_ubicacion text-right">Localiza <br>
                            Academia USG<br><img src="img/linea-titulo-academia-usg.png" class="img-fluid" alt="línea-titulos-academia-usg">
                        </h4>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 d-flex align-items-center">
                    <div class="contenedor__parrafo__ubi">
                        <p>Utiliza el navegador para ver nuestra ubicación 
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 order-md-0 order-1 col-md-7 offset-md-1">
                    <div class="contenedor__mapa__iframe">
                        <div id="map"></div>
                    </div>
                </div>
                <div class="col-12 order-md-1 d-none d-md-block col-md-4">
                    <aside class="contenedor__parrafo__mapa">
                        <p>CDMX
                        </p>
                        <p>Av. Marina Nacional #150  Col. Tacuba, Alcaldía Miguel Hidalgo Ciudad de México C.P. 11410 
                        </p>
                    </aside>
                </div>
            </div>
        </section>


        <div class="container-fluid contenedor__acerca__usg d-none" id="acerca__usg">
            <div class="row">
                <div class="col">
                    <p class="acerca__usg">Acerca de USG: Somos la empresa líder mundial en la fabricación de Sistemas Ligeros de Construcción con más de 115 años de presencia global. Llegamos a México hace más de 50 años con la introducción al mercado de la marca USG TABLAROCA® así como de innovadoras soluciones de alto desempeño que integran muros interiores, fachadas, entrepisos, yesos y plafones fabricados en 5 plantas de manufactura ubicadas en Puebla, Nuevo León, Coahuila, San Luis Potosí y Colima, las cuales abastecen de nuestros sistemas a México, Centroamérica, El Caribe, Sudamérica y Asia. <a href="https://www.usg.com/content/usgcom/spanish/about-usg/company-overview.html" target="_blank">Conoce más aquí</a>
                    </p>
                </div>
            </div>
        </div>
        <!--==FIN SECTION UBICACION MAPA==-->


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
    <script src="js/custom.js"></script>
    <script>
    function valdarAdP() {
      var checkBox = document.getElementById("checkAdP");
      var btn_contacto = document.getElementById("btn_contacto");
      if (checkBox.checked == true){
        btn_contacto.style.display = "block";
      } else {
         btn_contacto.style.display = "none";
      }
    }
    </script>
</body>
</html>