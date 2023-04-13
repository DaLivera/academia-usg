<?php
session_start();
require("includes/funciones.php");
/** Include PHPExcel */
require('Classes/PHPExcel.php');
  //echo 'require.<br />';
  // Create new PHPExcel object
  $objPHPExcel = new PHPExcel();
  $objDrawing = new PHPExcel_Worksheet_Drawing();


// CREAR SESION UNICA
        $letras = 'Aa1Bb2Cc3Dd4Ee5Ff6Gg7Hh8Ii9Jj0Kk$LlMm1Nn2Oo3Pp4Qq5Rr6Ss7Tt8Uu9Vv0Ww$XxYyZz';
        srand((double)microtime()*1000000);
        $iSesion = 1;
        $largo_clave = 6;
        $largo = strlen($letras);
        $clave_sesion='';
        while ($iSesion <= $largo_clave) {
            $lee = rand(1, $largo);
            $clave_sesion .= substr($letras, $lee, 1);
            $iSesion++;
        }
        $clave_sesion = trim($clave_sesion);
        $yearSesion=time()+(60*60*24*365);



  //echo 'var:<br />';
    $curso = $_POST['curso'];
    $diacurso = $_POST['diacurso'];
    $nombre = $_POST['nombre'];
    $paterno = $_POST['paterno'];
    $materno = $_POST['materno'];
    $mail = $_POST['mail'];
    $telefono = $_POST['telefono'];
    $estado = $_POST['estado'];
    $municipio = $_POST['municipio'];
    $dianacimiento = $_POST['dianacimiento'];
    $mesnacimiento = $_POST['mesnacimiento'];
    $anionacimiento = $_POST['anionacimiento'];
    $genero = $_POST['genero'];
    $infoProductos = $_POST['infoProductos'];

    if ($nombre == 'John' && $mail == 'test@email.com' || $mail == 'test@email.com') {
        header("Location: index.php");
    } else {

    }

    $buscaFechas = mysqli_query($linkconx, "SELECT fecha FROM fechas_cursos WHERE id=$diacurso ");
    $infoFechas = mysqli_fetch_array($buscaFechas);
    $fechaCurso = explode("-", $infoFechas['fecha']);
    $nummes = number_format($fechaCurso[1]);
    $fechadeCurso = $fechaCurso[2].' de '.$mes[$nummes].' de '.$fechaCurso[0].'<br>';

    $curso = strtoupper($curso);
    $fechadeCurso = strtoupper($fechadeCurso);
    $mail = strtoupper($mail);
    $dianacimiento = strtoupper($dianacimiento);
    $genero = strtoupper($genero);
    $infoProductos = strtoupper($infoProductos);

    $nombreAlumno= strtoupper($nombre.' '.$paterno.' '.$materno);
    $nombre_p = 'registro_'.$clave_sesion;

    $nombreEstado = nombreEstados($linkconx, $estado);
    $nombreMunicipio = nombreMunicipio($linkconx, $estado, $municipio);

  //echo 'Set document properties<br>';
  $objPHPExcel->getProperties()->setCreator("Academia USG / Rinoceronte Agencia Digital")
    ->setLastModifiedBy("Academia USG")
    ->setTitle("Registro en Cursos Presenciales Academia USG")
    ->setSubject("Academia USG México")
    ->setDescription("Archivo excel generado con la herramienta en línea de Academia USG, programación por Rinoceronte Agencia Digital.")
    ->setKeywords("USG, Tablaroca, Academia USG")
    ->setCategory("USG Tablaroca");
  $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(24);
  //echo 'Properties.<br />';
  $objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'NOMBRE:')
    ->setCellValue('A2', $nombreAlumno)
    ->setCellValue('B1', 'CURSO:')
    ->setCellValue('B2', $curso)
    ->setCellValue('C1', 'DIA SELECCIONADO:')
    ->setCellValue('C2', $fechadeCurso)
    ->setCellValue('D1', 'EMAIL:')
    ->setCellValue('D2', $mail)
    ->setCellValue('E1', 'TELEFONO:')
    ->setCellValue('E2', $telefono)
    ->setCellValue('F1', 'ESTADO:')
    ->setCellValue('F2', $nombreEstado)
    ->setCellValue('G1', 'MUNICIPIO:')
    ->setCellValue('G2', $nombreMunicipio)
    ->setCellValue('H1', 'FECHA DE NACIMIENTO:')
    ->setCellValue('H2', $dianacimiento. ' de ' .$mesnacimiento .' de '. $anionacimiento)
    ->setCellValue('I1', 'GENERO:')
    ->setCellValue('I2', $genero)
    ->setCellValue('J1', 'DESEA RECIBIR INFORMACION ADICIONAL:')
    ->setCellValue('J2', $infoProductos)
    ->setCellValue('K1', 'COBERTURA NACIONAL');

  // Add some data
  $style = array(
    'alignment' => array(
      'vertical' => PHPExcel_Style_Alignment::VERTICAL_TOP,
    )
  );
  $objPHPExcel->getDefaultStyle()->applyFromArray($style);

  $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(60);
  $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
  $objPHPExcel->getActiveSheet()->getStyle('B1:B' . $objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setWrapText(true);

  //echo 'While End.<br />';
  //echo 'objet getActiveSheet.<br />';
  // Rename worksheet
  //$objPHPExcel->getActiveSheet()->setTitle($nombre_p);

  //echo 'setActiveSheetIndex.<br />';
  // Set active sheet index to the first sheet, so Excel opens this as the first sheet
  $objPHPExcel->setActiveSheetIndex(0);
  //echo 'Shett.<br />';
  /*
  // If you're serving to IE 9, then the following may be needed
  header('Cache-Control: max-age=1');

  // If you're serving to IE over SSL, then the following may be needed
  header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
  header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
  header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
  header('Pragma: public'); // HTTP/1.0
  */

  //echo 'PHPExcel_IOFactory.<br />';
  $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

  $objWriter->save('descargables/' . $nombre_p . '.xlsx');
  $attachmentArchivo = 'descargables/' . $nombre_p . '.xlsx';
  //readfile('descargables/USG_' . $nombre_p . '.xlsx');
  

/*========================================
        =            ENVIO DE MAIL            =
    ========================================*/
    //echo 'Var Mail:<br>';

  $para = 'academia_cdmx@usg.com.mx';
  //$para = 'mike@rinoceronte.mx';
  $paraNombre = 'Academia CDMX';
  //$paraNombre = 'Mike';
  $emailcc = $mail;
  $emailccNombre = $nombre;

  $subjet = 'Registro en Academia USG';
  $codigohtmlfinal = "Curso: $curso \n<br />"."Día seleccionado: $fechadeCurso \n<br />"."Nombre: $nombre \n<br />"."Apellido Paterno: $paterno \n<br />"."apellido Materno: $materno \n<br />"."Email: $mail \n<br />"."Teléfono: $telefono \n<br />"."Estado: $nombreEstado \n<br />"."Municipio: $nombreMunicipio \n<br />"."Fecha de nacimiento: $dianacimiento de $mesnacimiento de $anionacimiento \n<br />"."Genero: $genero \n<br />"."Desea recibir información adicional: $infoProductos \n<br />";
objetoSMTP($para, $paraNombre, $emailcc, $emailccNombre, $subjet, $Host, $Username, $Password, $Port, $setFrom, $setFromNombre, $addReplyTo, $addReplyToNombre, $codigohtmlfinal, $attachmentArchivo);
//echo 'Send<br />';

unlink('descargables/' . $nombre_p . '.xlsx');
//header("Location: index.html");
//echo 'Unlink.<br />';
$pagina='confirmacion';
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
    <title>Confirmación de inscripción a curso presencial - Academia USG</title>

    <!---===LINKS===-->
    <link rel="shortcut icon" href="img/logo-usg-favicon.png">
    <link rel="stylesheet" href="css/fuentes.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css?v=3.5">

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

    <!--==MAIN==-->
    <main>

        <!--==CONFIRMACIÓN==-->
        <section class="mensaje__confirmacion" id="mensaje__confirmacion">
            <div class="container confirmacion" id="titulo">
                <div class="row">
                    <div class="col-12 contenedor__titulo-confirfacion d-flex align-items-center">
                        <h5 class="titulos__grises scroll_formulario">
                            Formulario
                            <br>de registro
                            <br><img src="img/linea-titulo-academia-usg.png" class="img-fluid" alt="línea-titulos-academia-usg" loading="lazy">
                        </h5>
                    </div>
                </div>
            </div>
    
            <article class="container">
                <div class="row">
                    <div class="col-6 d-none d-lg-block columna__foto__mensaje">
                        
                    </div>
                    <div class="col-12 col-lg-6 columna__mensaje__confirmacion">
                        <div class="d-block contenedor__mensaje__confirmacion d-flex align-items-center flex-wrap p-3" style="bottom: 17%; left: -10%">
                            <div>
                                <h6>
                                    &iexcl;Has completado tu Pre-registro
                                    <br>con éxito!
                                </h6>
                                <p>Te esperamos el <span><?php echo $fechadeCurso; ?></span> en <span>Academia USG, CDMX*</span> <br>en el horario de: <span>9:00 hrs am</span>
                                </p>
                                <p>
                                    Favor de presentarse con los siguientes documentos o información:
                                </p>
                                <ul>
                                    <li>CURP (No se requiere que esté impreso)</li>
                                    <li>Identificación oficial con fotografía en original (INE, Licencia de conducir, pasaporte, cédula profesional)</li>
                                    <li>Copia de comprobante o número vigente de IMSS, ISSSTE, INSABI (antes seguro popular) o Seguro de gastos médicos personal</li>
                                    <li>** Sólo para cursos de certificación: 2 fotografías tamaño infantil a color (fondo blanco, sin lentes, actualizada con camisa o blusa que no sea color blanco)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </section>


        <!--==FIN CONFIRMACION==-->


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