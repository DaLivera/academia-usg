<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Micrositio Academia</title>

    <!---===LINKS===-->
    <link rel="shortcut icon" href="img/logo-usg-favicon.png">
    <link rel="stylesheet" href="css/fuentes.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">

    <script src="js/all.min.js"></script>
    <script src="js/modernizr-custom.js"></script>

</head>
<body>
    <header>
        <nav class="container-fluid navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
            <div class="row container-fluid">
                <div class="col-md-11 col-lg-3 d-none d-lg-block">
                    <a href="index.php">
                        <img src="img/logo-academia-usg.png" loading="lazy" alt="Academia USG" class="img-fluid logo_academia">
                    </a>
                </div>
                <div class="col-10 col-md-11 col-lg-2 d-block d-lg-none">
                    <a href="#home">
                        <img src="img/logo-usg-favicon.png" loading="lazy" alt="Academia USG" class="img-fluid logo">
                    </a>
                </div>
                <button class="col-2 col-md-1 col-lg-6 navbar-toggler" type="button" style data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-3 col-lg-6 menu collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0 justify-content-md-end">
                        <li class="nav-item">
                            <a class="nav-link" href="#">¿Quiénes somos?</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cursos online </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Cursos presenciales</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Lista de miembros</a>
                        </li>
                    </ul>
                    <form class="col-lg-3 d-flex justify-content-md-end">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn" type="submit">
                            <img class="lupa" src="svgs/lupa.svg" loading="lazy" alt="Lupa Buscardor" style="color: white;">
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <!--====MAIN====-->

    <main>

        <!--====SECCIÓN 1====-->

        <section class="container-fluid seccion_01 d-none d-lg-block">
            <div class="row">
                <div class="col-xs-12 col-lg-6 p-0">
                    <div class="contenedor-sec_01">
                    </div>
                </div>
                <div class="col-xs-12 col-lg-6 p-0">
                    <div class="contenedor-sec_02">
                    </div>
                </div>
            </div>
        </section>


        <!--====SECCIÓN 2====-->

        <section class="container-fluid seccion_02">
            <div class="row">
                <div class="col-xs-12 col-lg-7 p-0">
                    <div class="contenedor-sec_03 p-0 d-flex flex-column flex-nowrap justify-content-center">
                        <h3 class="titulo_seccion-02">
                            Cursos
                            <br>presenciales
                            <br><img src="img/linea-titulo.png" alt="">
                        </h3>
                        <p class="texto_seccion-02">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus fugit natus, dolore nisi,
                            fugiat blanditiis temporibus debitis, reiciendis necessitatibus ipsam facere! Sapiente,
                            minus maiores odit exercitationem voluptas molestias fuga mollitia!
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
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-4 columna_inde">
                    <div class="contenedor_cards card_01">
                        <div class="card">
                            <div class="card-body">
                                <div class="parrafos d-flex flex-column">
                                    <p class="card-text p-0"><span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</span></p>
                                    <p class="card-text p-0"><span>Imparte:</span> Lorem ipsum amet.</p>
                                    <p class="card-text p-0"><span>Duración:</span> 00:00 hrs</p>
                                    <p class="card-text p-0"><span>Fecha(s):</span> dd/mm/aaaa</p>
                                    <p class="card-text p-0"><span>Horarios:</span> 00:00 hrs 00:00 hrs</p>
                                    <p class="card-text p-0"><span>Ubicación:</span> Lorem ipsum amet</p>
                                    <a href="#" class="btn btn-sm align-self-end">Inscribirse</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4 columna_inde">
                    <div class="contenedor_cards card_02">
                        <div class="card">
                            <div class="card-body">
                                <div class="parrafos d-flex flex-column">
                                    <p class="card-text p-0"><span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</span></p>
                                    <p class="card-text p-0"><span>Imparte:</span> Lorem ipsum amet.</p>
                                    <p class="card-text p-0"><span>Duración:</span> 00:00 hrs</p>
                                    <p class="card-text p-0"><span>Fecha(s):</span> dd/mm/aaaa</p>
                                    <p class="card-text p-0"><span>Horarios:</span> 00:00 hrs 00:00 hrs</p>
                                    <p class="card-text p-0"><span>Ubicación:</span> Lorem ipsum amet</p>
                                    <a href="#" class="btn btn-sm align-self-end">Inscribirse</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4 columna_inde">
                    <div class="contenedor_cards card_03">
                        <div class="card">
                            <div class="card-body">
                                <div class="parrafos d-flex flex-column">
                                    <p class="card-text p-0"><span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</span></p>
                                    <p class="card-text p-0"><span>Imparte:</span> Lorem ipsum amet.</p>
                                    <p class="card-text p-0"><span>Duración:</span> 00:00 hrs</p>
                                    <p class="card-text p-0"><span>Fecha(s):</span> dd/mm/aaaa</p>
                                    <p class="card-text p-0"><span>Horarios:</span> 00:00 hrs 00:00 hrs</p>
                                    <p class="card-text p-0"><span>Ubicación:</span> Lorem ipsum amet</p>
                                    <a href="#" class="btn btn-sm align-self-end">Inscribirse</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4 columna_inde">
                    <div class="contenedor_cards card_04">
                        <div class="card">
                            <div class="card-body">
                                <div class="parrafos d-flex flex-column">
                                    <p class="card-text p-0"><span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</span></p>
                                    <p class="card-text p-0"><span>Imparte:</span> Lorem ipsum amet.</p>
                                    <p class="card-text p-0"><span>Duración:</span> 00:00 hrs</p>
                                    <p class="card-text p-0"><span>Fecha(s):</span> dd/mm/aaaa</p>
                                    <p class="card-text p-0"><span>Horarios:</span> 00:00 hrs 00:00 hrs</p>
                                    <p class="card-text p-0"><span>Ubicación:</span> Lorem ipsum amet</p>
                                    <a href="#" class="btn btn-sm align-self-end">Inscribirse</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4 columna_inde">
                    <div class="contenedor_cards card_05">
                        <div class="card">
                            <div class="card-body">
                                <div class="parrafos d-flex flex-column">
                                    <p class="card-text p-0"><span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</span></p>
                                    <p class="card-text p-0"><span>Imparte:</span> Lorem ipsum amet.</p>
                                    <p class="card-text p-0"><span>Duración:</span> 00:00 hrs</p>
                                    <p class="card-text p-0"><span>Fecha(s):</span> dd/mm/aaaa</p>
                                    <p class="card-text p-0"><span>Horarios:</span> 00:00 hrs 00:00 hrs</p>
                                    <p class="card-text p-0"><span>Ubicación:</span> Lorem ipsum amet</p>
                                    <a href="#" class="btn btn-sm align-self-end">Inscribirse</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4 columna_inde">
                    <div class="contenedor_cards card_06">
                        <div class="card">
                            <div class="card-body">
                                <div class="parrafos d-flex flex-column">
                                    <p class="card-text p-0"><span>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy.</span></p>
                                    <p class="card-text p-0"><span>Imparte:</span> Lorem ipsum amet.</p>
                                    <p class="card-text p-0"><span>Duración:</span> 00:00 hrs</p>
                                    <p class="card-text p-0"><span>Fecha(s):</span> dd/mm/aaaa</p>
                                    <p class="card-text p-0"><span>Horarios:</span> 00:00 hrs 00:00 hrs</p>
                                    <p class="card-text p-0"><span>Ubicación:</span> Lorem ipsum amet</p>
                                    <a href="#" class="btn btn-sm align-self-end">Inscribirse</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer class="container-fluid footer mt-5 text-white p-0">
            <div class="row">
                <div class="col-xs-12 col-md-4 col_footer_01">
                    <p>
                        <span>¿Necesitas más informacion?</span>
                        Contáctanos a nuestros teléfonos:
                    </p>
                    <img src="img/logo-academia-usg-blanco.png" loading="lazy" class="img-fluid" alt="">
                </div>
                <div class="col-xs-12 col-md-8 col_footer_02 p-0">
                    <p class="pt-3 mb-0 px-3">
                        O bien dejanos tu contacto y con gusto te responderemos:
                    </p>
                    <form action="" class="row formulario pb-5">
                        <div class="col-xs-12 col-lg-5 py-0 px-3">
                            <div class="form-floating">
                                <input type="nombre" class="form-control nombre my-0 px-0" id="floatingInput" placeholder="nombre@ejemplo.com">
                                <label for="floatingInput">Nombre</label>
                            </div>
                            <div class="form-floating">
                                <input type="email" class="form-control correo my-0 px-0" id="floatingInput" placeholder="Correo electrónico">
                                <label for="floatingPassword">Correo electrónico</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control estado my-0 px-0" id="floatingInput" placeholder="Estado">
                                <label for="floatingPassword">¿De qué estado nos escribe?</label>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control empresa my-0 px-0" id="floatingInput" placeholder="Su empresa">
                                <label for="floatingPassword">Empresa</label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-5 py-0 px-3">
                            <div class="form-floating">
                                <textarea name="" id="" placeholder="Comentario" class="m-0"></textarea>
                            </div>
                            <div class="form-floating">
                                <input type="text" class="form-control telefono my-0 px-0" id="floatingInput" placeholder="Sus comentarios">
                                <label for="floatingInput">Teléfono de Empresa</label>
                            </div>
                            <div class="boton mb-3 my-3 d-flex justify-content-center justify-content-md-end">
                                <button class="boton" type="submit" disabled>Enviar</button>
                            </div>
                            <div>
                                <p class="aviso_privacidad">
                                    Consulte nuestro aviso de privacidad <a href="" target="_blank">Aquí</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-2 p-0">
                            <div class="iconos d-flex flex-lg-column align-items-lg-center justify-content-around justify-content-lg-between w-100 h-100 pt-2">
                                <a href="https://www.facebook.com/USGLatam/" target="_blank" class=""><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.youtube.com/user/mercadotecniausgmex" target="_blank" class=""><i class="fab fa-youtube"></i></a>
                                <a href="https://www.instagram.com/usglatam/?ref=badge" target="_blank" class=""><i class="fab fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/company/usg-mexico/" target="_blank" class=""><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://twitter.com/USGLatam" target="_blank" class=""><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row copy">
                <div class="col-12 d-flex align-items-center justify-content-center justify-content-center">
                    <p class="m-0">
                        &copy; 2021 Corporación USG. Todos los derechos reservados
                    </p>
                </div>
            </div>    
        </footer>
    </main>



    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="js/scroll_cursos.js"></script>
</body>
</html>