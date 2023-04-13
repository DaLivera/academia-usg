<?php
session_start();
require("includes/funciones.php");
$pagina='cursospresenciales';
if ($_SESSION["autentificado"] == 4040) {
  $usuario_USGacademia = $_SESSION['usuario'];
  $identificador_USGacademia = $_SESSION['idUsuario'];
  $guardarCurso = $_POST['guardar'];
  $borrarfecha = $_REQUEST['borrarfecha'];
  $borrarCurso = $_REQUEST['borrarCurso'];
  if($guardarCurso == 3){
    $idCurso = $_POST['idCurso'];
    $tipo_curso = $_POST['tipo_curso'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $importante = $_POST['importante'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $imparte = $_POST['imparte'];
    $duracion = $_POST['duracion'];
    $horario = $_POST['horario'];
    $ubicacion = $_POST['ubicacion'];
    $fecha = $_POST['fecha'];
    $foto = $_POST['foto'];
    $actualizar = mysqli_query($linkconx, "UPDATE cursos_presenciales SET tipo_curso='$tipo_curso', titulo='$titulo', descripcion='$descripcion', importante='$importante', nota_1='$nota1', nota_2='$nota2', imparte='$imparte', duracion='$duracion', horario='$horario', ubicacion='$ubicacion' WHERE id='$idCurso'");
    if($fecha == true){
        $insertarFecha = mysqli_query($linkconx, "INSERT INTO fechas_cursos (id, id_curso, fecha) VALUES ('', '$idCurso', '$fecha') ");
    }else{}
    if(!empty($_FILES["foto"]["name"])){
        $foto = $_FILES['foto']['name'];
        $userfile_name = $_FILES['foto']['name'];
        $userfile_tmp = $_FILES['foto']['tmp_name'];
        $userfile_size = $_FILES['foto']['size'];
        $fotodecurso = $userfile_name;
        // File path config
        // fotos_cursos/2021-11-05453background-curso-presencial-01-small.jpg
        $targetDir = "fotos_cursos/";
        $fileName = basename($_FILES["foto"]["name"]);
        $targetFilePath = $targetDir . $ahora.$hora.$fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);    
        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg');
        if(in_array($fileType, $allowTypes)){
            // Upload file to the server
            if(move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFilePath)){
                $fotodecurso = $targetFilePath;
                $buscaFoto = mysqli_query($linkconx, "SELECT foto FROM cursos_presenciales WHERE id='$idCurso' ");
                $infoFoto = mysqli_fetch_array($buscaFoto);
                unlink($infoFoto['foto']);
                $actualizarFoto = mysqli_query($linkconx, "UPDATE cursos_presenciales SET foto='$targetFilePath' WHERE id='$idCurso' ");
            }else{
            }
        }else{
            echo "<script>alert('Solo se permiten los sig formatos: JPG, JPEG, & PNG');location.href ='javascript:history.back()';</script>";
        }
    }else{}
  }
  if ($borrarfecha == 'si') {
        // code...
        $fechaid = $_REQUEST['fechaid'];
        $borrarFecha = mysqli_query($linkconx, "DELETE FROM fechas_cursos WHERE id='$fechaid' ");
    }else{}
  if ($borrarCurso == 'si') {
        // code...
        $idcurso = $_REQUEST['idcurso'];
        $buscaFoto = mysqli_query($linkconx, "SELECT foto FROM cursos_presenciales WHERE id='$idcurso' ");
        $infoFoto = mysqli_fetch_array($buscaFoto);
        unlink($infoFoto['foto']);
        $borrarfechas = mysqli_query($linkconx, "DELETE FROM fechas_cursos WHERE id_curso='$idcurso' ");
        $borrarcurso = mysqli_query($linkconx, "DELETE FROM cursos_presenciales WHERE id='$idcurso' ");
    }else{}
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
    <title>Cursos Presenciales - Academia USG</title>

    <!---===LINKS===-->
    <link rel="shortcut icon" href="img/logo-usg-favicon.png">
    <link rel="stylesheet" href="css/fuentes.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css?v=3.6">

    <!---===SCRIPTS===-->
    <script src="https://kit.fontawesome.com/eeed4bd1f5.js" crossorigin="anonymous"></script>
    <script src="js/all.min.js"></script>

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
                            Cursos
                            <br>presenciales
                            <br><img src="img/linea-titulo-academia-usg.png" class="img-fluid" alt="línea-titulos-academia-usg" loading="lazy">
                        </h3>
                        <p class="texto_seccion-02 scroll_cursos-online-parrafo">
                            Diseñados para una capacitación teórico-práctica, en donde aprenderás a instalar correctamente toda la gama  de soluciones que ofrece USG, como:<br>
                            <br>•Sistema USG TABLAROCA® y tratamiento de Juntas
                            <br>•Sistema USG DUROCK®
                            <br>•Sistema USG SECUROCK®
                            <br>•Sistema USG PLAFONES®
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

        <section class="container seccion_03 mb-5" id="seccion_02">

            <div class="row row-cols-1 row-cols-lg-3 g-4">
                <?php 
                if ($_SESSION["autentificado"] == 4040) {
                    // code...
                    listado_cursospresencialesEdicion($linkconx, $mes); 
                }else{
                   listado_cursospresenciales($linkconx, $mes);  
                }
                ?>
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
   <script type="text/javascript" src="js/general.js?v=1.1"></script>
   <script type="text/javascript" src="js/init.js?v=1.1"></script>
   <script type="text/javascript">
    $(document).ready(function() {
      initValidat();
    });
    </script>
</body>
</html>