<header class="__header d-flex justify-content-center" id="header">
        <nav class="__navbar navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="index.php">
                <img src="img/logo-academia-usg-blanco.png" loading="lazy" alt="Academia USG" class="d-none d-lg-block logo__letras img-fluid">
                <img src="img/logo-usg-favicon.png" loading="lazy" alt="Isologo Academia USG" class="d-block d-lg-none logo__isologo img-fluid">
              </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icono__menu navbar-toggler-icon"><img src="svg/bars-solid.svg" alt="Menu Academia USG" loading="lazy"></span>
              </button>
              <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php if($pagina=='home'){echo 'active';}?> " aria-current="page" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($pagina=='cursosonline'){echo 'active';}?> " href="cursos-online.php">Cursos en línea</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($pagina=='cursospresenciales'){echo 'active';}?> " href="cursos-presenciales.php">Cursos presenciales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($pagina=='instaladores'){echo 'active';}?> " href="lista-miembros.php">Lista de miembros</a>
                    </li>
                    <?php 
                        if ($_SESSION["autentificado"] == 4040) {
                            // code...
                    echo '<li class="nav-item">
                        <a class="nav-link ';if($pagina=='cursospresencialesguardar'){echo 'active';} echo ' " href="cursos-presenciales-panel.php">Agregar curso</a>
                    </li>';
                    echo '<li class="nav-item">
                        <a class="nav-link " href="salir.php">Salir</a></li>';
                        }else{
                        }
                    ?>
                </ul>
              </div>
            </div>
          </nav>
    </header>