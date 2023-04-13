<?php
session_start();
// Conexion con la base de datos
include("secur-usgacademia.php");
/*----------  SET DE FECHA Y HORA  ----------*/
$rutafinal = 'https://academiausg.com.mx /';
$anio_servidor = date("Y");
$mes_servidor = date("m");
$dia_hoy = date("d");
$hora_servidor = date("H");
$hora = date("B");
$ahora = date($anio_servidor . "-" . $mes_servidor . "-" . $dia_hoy);
$mes = array("", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");

$numeroResultados = 20;

/* ----------- CONFIG SMTP ---------------- */
$Host = 'ssl://smtp.dreamhost.com';
$Username = 'noreply@academiausg.com.mx';
$Password = 'N0r3pl7$2021';
$Port = 465;
$setFrom = 'noreply@academiausg.com.mx';
$setFromNombre = 'Academia USG';
$addReplyTo = 'noreply@academiausg.com.mx';
$addReplyToNombre = 'Academia USG';

function objetoSMTP($para, $paraNombre, $emailcc, $emailccNombre, $subjet, $Host, $Username, $Password, $Port, $setFrom, $setFromNombre, $addReplyTo, $addReplyToNombre, $codigohtmlfinal, $attachmentArchivo){
  //echo 'inicio de codigo<br>';
  require('phpmailer/src/Exception.php');
  require("phpmailer/src/PHPMailer.php");
  require("phpmailer/src/SMTP.php");
  //echo 'toma clases<br>';
  //use PHPMailer/PHPMailerPHPMailer;
  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true); 
  //Server settings
  /**
   * Debug output level.
   * Options:
   * * self::DEBUG_OFF (`0`) No debug output, default
   * * self::DEBUG_CLIENT (`1`) Client commands
   * * self::DEBUG_SERVER (`2`) Client commands and server responses
   * * self::DEBUG_CONNECTION (`3`) As DEBUG_SERVER plus connection status
   * * self::DEBUG_LOWLEVEL (`4`) Low-level data output, all messages
   * @type integer
   */
  $mail->SMTPDebug = SMTP::DEBUG_OFF;   // Enable verbose debug output
  $mail->isSMTP();                      // Send using SMTP
  $mail->Host       = $Host;            // Set the SMTP server to send through
  $mail->SMTPAuth   = true;             // Enable SMTP authentication
  $mail->Username   = $Username;        // SMTP username
  $mail->Password   = $Password;        // SMTP password
  $mail->SMTPSecure = 'ssl';            // Enable TLS encryption PHPMailer::ENCRYPTION_STARTTLS; `PHPMailer::ENCRYPTION_SMTPS` also accepted
  //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
  $mail->Port       = $Port;            // TCP port to connect to
  //echo 'config<br>';
  //Recipients
  $mail->setFrom($setFrom, $setFromNombre);
  $mail->addAddress($para, $paraNombre);     // Add a recipient
  //$mail->addAddress('ellen@example.com');               // Name is optional
  $mail->addReplyTo($addReplyTo, $addReplyToNombre);
  $mail->addCC($emailcc, $emailccNombre);
  //$mail->addBCC($emailbcc, $emailbccNombre);
  // Attachments
  $mail->addAttachment($attachmentArchivo);         // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  // Content
  $mail->isHTML(true);                                  // Set email format to HTML
  //echo 'Sets<br>';
  $mail->Subject = $subjet;
  $mail->Body    = $codigohtmlfinal;
  //echo $codigohtmlfinal;
  //$mail->Body    = 'Contenido de correo';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  $mail->CharSet = 'UTF-8';
  //echo 'Previo<br>';
  if ($mail->send()) {
    //echo 'final de codigo<br>';
    //echo "<script>alert('Formulario Enviado');location.href ='index.html';</script>";
} else {
  //echo 'Error<br>';
  //echo "<script>alert('Error al enviar, intentar más tarde.');location.href ='javascript:history.back()';</script>";
}
  
  //$mail->ClearAddresses();
}

function objetoSMTPContacto($paraContacto, $paraNombrecontacto, $subjetContacto, $Host, $Username, $Password, $Port, $setFrom, $setFromNombre, $addReplyTo, $addReplyToNombre, $codigohtmlfinalcontacto){
  //echo 'inicio de codigo<br>';
  require('phpmailer/src/Exception.php');
  require("phpmailer/src/PHPMailer.php");
  require("phpmailer/src/SMTP.php");
  //echo 'toma clases<br>';
  //use PHPMailer/PHPMailerPHPMailer;
  // Instantiation and passing `true` enables exceptions
  $mail = new PHPMailer(true); 
  //Server settings
  /**
   * Debug output level.
   * Options:
   * * self::DEBUG_OFF (`0`) No debug output, default
   * * self::DEBUG_CLIENT (`1`) Client commands
   * * self::DEBUG_SERVER (`2`) Client commands and server responses
   * * self::DEBUG_CONNECTION (`3`) As DEBUG_SERVER plus connection status
   * * self::DEBUG_LOWLEVEL (`4`) Low-level data output, all messages
   * @type integer
   */
  $mail->SMTPDebug = SMTP::DEBUG_OFF;                       // Enable verbose debug output
  $mail->isSMTP();                                            // Send using SMTP
  $mail->Host       = $Host;                    // Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username   = $Username;                     // SMTP username
  $mail->Password   = $Password;                               // SMTP password
  $mail->SMTPSecure = 'ssl';         // Enable TLS encryption PHPMailer::ENCRYPTION_STARTTLS; `PHPMailer::ENCRYPTION_SMTPS` also accepted
  //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;    
  $mail->Port       = $Port;                                    // TCP port to connect to
  //echo 'config<br>';
  //Recipients
  $mail->setFrom($setFrom, $setFromNombre);
  $mail->addAddress($paraContacto, $paraNombrecontacto);     // Add a recipient
  //$mail->addAddress('ellen@example.com');               // Name is optional
  $mail->addReplyTo($addReplyTo, $addReplyToNombre);
  //$mail->addBCC($emailbcc, $emailbccNombre);
  // Attachments
  //$mail->addAttachment($attachmentArchivo);         // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
  // Content
  $mail->isHTML(true);                                  // Set email format to HTML
  //echo 'Sets<br>';
  $mail->Subject = $subjetContacto;
  $mail->Body    = $codigohtmlfinalcontacto;
  //echo $codigohtmlfinal;
  //$mail->Body    = 'Contenido de correo';
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
  $mail->CharSet = 'UTF-8';
  //echo 'Previo<br>';
  if ($mail->send()) {
    //echo 'final de codigo<br>';
    //echo "<script>alert('Formulario Enviado');location.href ='index.html';</script>";
} else {
  //echo 'Error<br>';
  //echo "<script>alert('Error al enviar, intentar más tarde.');location.href ='javascript:history.back()';</script>";
  //header("Location: https://academiausg.com.mx/pre-inscripcion-curso.php");
}
  
  //$mail->ClearAddresses();
}

function listado_cursosonline($linkconx, $mes){
  $busca = mysqli_query($linkconx, "SELECT * FROM cursos_onlineweb WHERE activo=2 ORDER BY fecha ASC");
  while ($info = mysqli_fetch_array($busca)) {

    $fechaCurso = explode("-", $info['fecha']);
    $nummes = number_format($fechaCurso[1]);

     echo '<div class="col">
                    <div class="card h-100">';
                    if ($info['foto']=='') {
                    }else{
                        echo '<img src="'.$info['foto'].'" class="card-img-top" alt="...">';
                    }
                      echo '<div class="card-body cont_cursosOnline">
                        <h5 class="card-title">'.$info['titulo'].'</h5>
                        <p class="card-text"><b>Fecha:</b> '.$fechaCurso[2].' de '.$mes[$nummes].' de '.$fechaCurso[0].'</p>
                        <p class="card-text"><b>Imparte:</b> '.$info['imparte'].'</p>
                        <p class="card-text"><b>Duración:</b> '.$info['duracion'].'</p>
                        <p class="card-text"><b>Horarios:</b> '.$info['horario'].'</p>
                        <p class="card-text"><b>Ubicación:</b> '.$info['ubicacion'].'</p>
                        <p class="card-text text-center p-0"><a href="'.$info['link_matutino'].'" target="_blank" class="btn btn-secondary btn-sm mb-4">Inscribirse matutino</a><br><a href="'.$info['link_vespertino'].'" target="_blank" class="btn btn-secondary btn-sm">Inscribirse vespertino</a></p>
                      </div>
                    </div>
                  </div>';
  }
}

function listado_cursospresenciales($linkconx, $mes){
  $busca = mysqli_query($linkconx, "SELECT * FROM cursos_presenciales WHERE activo=2 ORDER BY id DESC");
  while ($info = mysqli_fetch_array($busca)) {
    $idcurso = $info['id'];
    $buscaFechas = mysqli_query($linkconx, "SELECT * FROM fechas_cursos WHERE id_curso=$idcurso ");
    
     echo '<div class="col">
                    <div class="card h-100">';
                    if ($info['foto']=='') {
                    }else{echo '<img src="'.$info['foto'].'" class="card-img-top" alt="...">';}
                      echo '<div class="card-body cont_cursosPresenciales">
                      <h5 class="card-title">'.$info['tipo_curso'].'</h5>
                        <h5 class="card-title">'.$info['titulo'].'</h5>
                        <p class="card-text">'.$info['descripcion'].'</p>
                        <p class="card-text">'.$info['importante'].'</p>
                        <p class="card-text">'.$info['nota_1'].'</p>
                        <p class="card-text">'.$info['nota_2'].'</p>
                        <p class="card-text"><b>Fecha de inicio:<br></b> ';
                    while ($infoFechas = mysqli_fetch_array($buscaFechas)) {
                        $fechaCurso = explode("-", $infoFechas['fecha']);
                        $nummes = number_format($fechaCurso[1]);
                        echo $fechaCurso[2].' de '.$mes[$nummes].' de '.$fechaCurso[0].'<br>';
                    }
                       echo '</p><p class="card-text"><b>Imparte:</b> '.$info['imparte'].'</p>
                        <p class="card-text"><b>Duración:</b> '.$info['duracion'].'</p>
                        <p class="card-text"><b>Horarios:</b> '.$info['horario'].'</p>
                        <p class="card-text"><b>Ubicación:</b> '.$info['ubicacion'].'</p>
                        <form class="form" novalidate  role="form" action="pre-inscripcion-curso.php" method="post" enctype="multipart/form-data" >
                        <input type="hidden" name="curso" value="'.$info['id'].'">
                        <p class="card-text text-end"><button class="btn btn-block btn_inscripcion" type="submit">Inscribirse</button></p>
                        </form>
                      </div>
                    </div>
                  </div>';
  }
}

function listado_cursospresencialesEdicion($linkconx, $mes){
  $busca = mysqli_query($linkconx, "SELECT * FROM cursos_presenciales WHERE activo=2 ORDER BY id DESC");
  while ($info = mysqli_fetch_array($busca)) {
    $idcurso = $info['id'];
    $buscaFechas = mysqli_query($linkconx, "SELECT * FROM fechas_cursos WHERE id_curso=$idcurso ");
    
    $buscaFechasrows = mysqli_query($linkconx, "SELECT * FROM fechas_cursos WHERE id_curso=$idcurso ");
    $fechas_cnt = mysqli_num_rows($buscaFechasrows);

     echo '<div class="col">
                    <div class="card h-100">
                      <img src="'.$info['foto'].'" class="card-img-top" alt="...">
                      <div class="card-body cont_cursosPresenciales">
                      <form class="form" novalidate name="editarCurso" id="editarCurso" role="form" action="cursos-presenciales.php#seccion_02" method="post" enctype="multipart/form-data" >
                        <input type="hidden" name="guardar" value="3">
                        <input type="hidden" name="idCurso" value="'.$idcurso.'">
                        <p class="card-text"><input class="form-control w-100" type="text" name="tipo_curso" id="floatingTipocurso" placeholder="Tipo de curso" value="'.$info['tipo_curso'].'" required idformatocampo="3"></p>
                        <h5 class="card-title"><textarea class="form-control w-100" id="titulo" name="titulo" placeholder="Titulo" rows="4">'.$info['titulo'].'</textarea></h5>
                        <h5 class="card-title"><textarea class="form-control w-100" id="descripcion" name="descripcion" placeholder="Descripción" rows="8">'.$info['descripcion'].'</textarea></h5>
                        <h5 class="card-title"><textarea class="form-control w-100" id="importante" name="importante" placeholder="Importante" rows="4">'.$info['importante'].'</textarea></h5>
                        <h5 class="card-title"><textarea class="form-control w-100" id="nota1" name="nota1" placeholder="Nota 1" rows="4">'.$info['nota_1'].'</textarea></h5>
                        <h5 class="card-title"><textarea class="form-control w-100" id="nota_2" name="nota_2" placeholder="Nota 2" rows="4">'.$info['nota_2'].'</textarea></h5>
                        <p class="card-text"><b>Fecha de inicio:<br></b> ';
                    while ($infoFechas = mysqli_fetch_array($buscaFechas)) {
                        $fechaId = $infoFechas['id'];
                        $fechaCurso = explode("-", $infoFechas['fecha']);
                        $nummes = number_format($fechaCurso[1]);
                        echo $fechaCurso[2].' de '.$mes[$nummes].' de '.$fechaCurso[0];
                        echo ' <a href="cursos-presenciales.php?borrarfecha=si&fechaid='.$fechaId.'#seccion_02">Borrar</a><br>';
                    }
                       echo '</p><p class="card-text"><b>Agregar fecha:</b> <input type="date" id="start" name="fecha"></p><p class="card-text"><b>Imparte:</b> <input class="form-control w-100" type="text" name="imparte" id="floatingImparte" placeholder="Imparte" value="'.$info['imparte'].'" required idformatocampo="3"></p>
                        <p class="card-text"><b>Duración:</b> <input class="form-control w-100" type="text" name="duracion" id="floatingDuracion" placeholder="Duración" value="'.$info['duracion'].'" required></p>
                        <p class="card-text"><b>Horarios:</b> <input class="form-control w-100" type="text" name="horario" id="floatingHorario" placeholder="Horario" value="'.$info['horario'].'" required></p>
                        <p class="card-text"><b>Ubicación:</b> <input class="form-control w-100" type="text" name="ubicacion" id="floatingHorario" placeholder="Horario" value="'.$info['ubicacion'].'" required></p>
                        <p class="card-text"><label for="subirfoto" class="form-label"><b>Actualizar foto</b> (Estrictamente 540 px ancho, 360 px alto, 72 dpi resolución, archivo JPG)</label><input class="form-control" type="file" name="foto" id="subirfoto"></p>
                        <p class="card-text text-end mt-3 mb-3"><button class="btn btn-block btn_inscripcion" type="submit">GUARDAR CAMBIOS</button></p>
                        <p class="card-text text-end mt-3 mb-3"><a href="cursos-presenciales.php?borrarCurso=si&idcurso='.$idcurso.'"><button class="btn btn-block btn_inscripcion" type="button">BORRAR CURSO</button></a></p>
                        </form>
                        <form class="form" novalidate  role="form" action="pre-inscripcion-curso.php" method="post" enctype="multipart/form-data" >
                        <input type="hidden" name="curso" value="'.$info['id'].'">
                        <p class="card-text text-end"><a href="pre-inscripcion-curso.php"><button class="btn btn-block btn_inscripcion" type="submit">Inscribirse</button></a></p>
                        </form>                        
                      </div>
                    </div>
                  </div>';
  }
}

function listado_cursosonlineEdicion($linkconx, $mes){
  $busca = mysqli_query($linkconx, "SELECT * FROM cursos_onlineweb WHERE activo=2 ORDER BY id DESC");
  while ($info = mysqli_fetch_array($busca)) {
    $idcurso = $info['id'];
    $fechaCurso = explode("-", $info['fecha']);
    $nummes = number_format($fechaCurso[1]);

     echo '<div class="col">
                    <div class="card h-100">
                      <img src="'.$info['foto'].'" class="card-img-top" alt="...">
                      <div class="card-body cont_cursosOnline">
                      <form class="form" novalidate name="editarCurso" id="editarCurso" role="form" action="cursos-online.php#seccion_02" method="post" enctype="multipart/form-data" >
                      <input type="hidden" name="guardar" value="3">
                        <input type="hidden" name="idCurso" value="'.$idcurso.'">
                        <h5 class="card-title"><textarea class="form-control w-100" id="titulo" name="titulo" rows="3">'.$info['titulo'].'</textarea></h5>
                        <p class="card-text"><b>Fecha:</b> '.$fechaCurso[2].' de '.$mes[$nummes].' de '.$fechaCurso[0].' <a href="cursos-online.php?borrarfecha=si&fechaid='.$idcurso.'#seccion_02">Borrar</a></p>
                        <p class="card-text"><b>Actualizar fecha:</b> <input type="date" id="start" value="'.$info['fecha'].'" name="fecha"></p>
                        <p class="card-text"><b>Imparte:</b> <input class="form-control w-100" type="text" name="imparte" id="floatingImparte" placeholder="Imparte" value="'.$info['imparte'].'" required idformatocampo="3"></p>
                        <p class="card-text"><b>Duración:</b> <input class="form-control w-100" type="text" name="duracion" id="floatingDuracion" placeholder="Duración" value="'.$info['duracion'].'" required></p>
                        <p class="card-text"><b>Horarios:</b> <input class="form-control w-100" type="text" name="horario" id="floatingHorario" placeholder="Horario" value="'.$info['horario'].'" required></p>
                        <p class="card-text"><b>Ubicación:</b> <input class="form-control w-100" type="text" name="ubicacion" id="floatingHorario" placeholder="Ubicación" value="'.$info['ubicacion'].'" required></p>
                        <p class="card-text"><b>Link matutino:</b> <input class="form-control w-100" type="text" name="link_matutino" id="floatingMatutino" placeholder="Link Matutino" value="'.$info['link_matutino'].'" required >
                        <br><b>Link vespertino:</b> <input class="form-control w-100" type="text" name="link_vespertino" id="floatingVespertino" placeholder="Link Vespertino" value="'.$info['link_vespertino'].'" required ></p>
                        <p class="card-text"><label for="subirfoto" class="form-label"><b>Actualizar foto</b> (Estrictamente 540 px ancho, 360 px alto, 72 dpi resolución, archivo JPG)</label><input class="form-control" type="file" name="foto" id="subirfoto"></p>
                        <p class="card-text text-end mt-3 mb-3"><button class="btn btn-block btn_inscripcion" type="submit">GUARDAR CAMBIOS</button></p>
                        <p class="card-text text-end mt-3 mb-3"><a href="cursos-online.php?borrarCurso=si&idcurso='.$idcurso.'"><button class="btn btn-block btn_inscripcion" type="button">BORRAR CURSO</button></a></p>
                        </form>
                      </div>
                    </div>
                  </div>';
  }
}

function selectFechascurso($linkconx, $curso, $mes){
    $busca = mysqli_query($linkconx, "SELECT * FROM fechas_cursos WHERE id_curso='$curso' ");
    while ($info = mysqli_fetch_array($busca)) {
        $fechaCurso = explode("-", $info['fecha']);
        $nummes = number_format($fechaCurso[1]);
        echo '<option value="'.$info['id'].'">'.$fechaCurso[2].' de '.$mes[$nummes].' de '.$fechaCurso[0].'</option>';
    }
}

function listado_cursoshome($linkconx, $mes){
    //$busca = "SELECT boo.titulo, pro.titulo, boo.foto, pro.foto, boo.fecha, pro.fecha FROM cursos_onlineweb boo, cursos_presenciales pro LIMIT 3 ";

  //$busca = mysqli_query($linkconx, "SELECT A.cursos_onlineweb.titulo, B.cursos_presenciales.titulo, A.cursos_onlineweb.fecha, B.cursos_presenciales.fecha FROM A.cursos_onlineweb, B.cursos_presenciales WHERE activo=2 ORDER BY id DESC");

  $buscaweb = mysqli_query($linkconx, "SELECT * FROM cursos_onlineweb WHERE activo=2 ORDER BY id DESC LIMIT 2");

  $busca = mysqli_query($linkconx, "SELECT * FROM cursos_presenciales WHERE activo=2 ORDER BY id DESC LIMIT 2");

  while ($info = mysqli_fetch_array($busca)) {
    $fechaCurso = explode("-", $info['fecha']);
    $nummes = number_format($fechaCurso[1]);

     echo '<div class="col-12 col-md-6 col-lg-3 card text-white scroll_card-01">
                    <img src="'.$info['foto'].'" class="card-img" alt="Curso Academia" loading="lazy">
                    <div class="card-img-overlay d-flex align-items-end p-5">
                        <p class="card-title">Curso presencial<br><b>'.$info['titulo'].'</b><br>
                        Fecha: '.$fechaCurso[2].' de '.$mes[$nummes].' de '.$fechaCurso[0].'</p>
                    </div>
                </div>';
  }

  while ($infoweb = mysqli_fetch_array($buscaweb)) {
    $fechaCurso = explode("-", $infoweb['fecha']);
    $nummes = number_format($fechaCurso[1]);

     echo '<div class="col-12 col-md-6 col-lg-3 card text-white scroll_card-01">
                    <img src="'.$infoweb['foto'].'" class="card-img" alt="Curso Academia" loading="lazy">
                    <div class="card-img-overlay d-flex align-items-end p-5">
                        <p class="card-title">Curso en línea<br><b>'.$infoweb['titulo'].'</b><br>
                        Fecha: '.$fechaCurso[2].' de '.$mes[$nummes].' de '.$fechaCurso[0].'</p>
                    </div>
                </div>';
  }
}

function estadosSelect($linkconx)
{
    $busca = mysqli_query($linkconx, "SELECT * FROM estados_electorales ORDER BY cve_edo ASC ");
    while ($info = mysqli_fetch_array($busca)) {
        echo '<option value="'.$info['cve_edo'].'">'.$info['estado'].'</option>';
    }
    //return $prestacion;
}

function nombreEstados($linkconx, $estado)
{
    $busca = mysqli_query($linkconx, "SELECT estado FROM estados_electorales WHERE cve_edo='$estado' ");
    $info = mysqli_fetch_array($busca);
    //echo $info['Name'];
    return $info['estado'];
}

function nombreMunicipio($linkconx, $estado, $municipio)
{
    $busca = mysqli_query($linkconx, "SELECT mpio FROM secciones_electorales WHERE cve_mpio = '$municipio' AND cve_edo='$estado' ");
    $info = mysqli_fetch_array($busca);
    //echo $info['Name'];
    return $info['mpio'];
}

function diaNacimiento(){
  $i=1;
  while($i <= 31){
    echo '<option value="'.$i.'">'.$i.'</option>';
    $i++;
  }
}

function mesNacimiento($mes){
  $i=1;
  while($i <= 12){
    echo '<option value="'.$mes[$i].'">'.$mes[$i].'</option>';
    $i++;
  }
}

function anioNacimiento($anio_servidor){
  $anio_servidor=$anio_servidor - 17;
  $limite=$anio_servidor-73;
  while($anio_servidor >= $limite){
    echo '<option value="'.$anio_servidor.'">'.$anio_servidor.'</option>';
    $anio_servidor--;
  }
}

function guardarCurso($linkconx, $tipo_curso, $titulo, $descripcion, $importante, $nota1, $nota2, $imparte, $duracion, $fecha, $horario, $ubicacion, $targetFilePath){
  mysqli_query($linkconx, "INSERT INTO cursos_presenciales (id, item, tipo_curso, titulo, descripcion, importante, nota_1, nota_2, imparte, duracion, fecha, horario, ubicacion, foto, activo) VALUES ('', '', '$tipo_curso', '$titulo', '$descripcion', '$importante', '$nota_1', '$nota_2', '$imparte', '$duracion', '$fecha', '$horario', '$ubicacion', '$targetFilePath', '2' ) ");
    
    $busca = mysqli_query($linkconx, "SELECT * FROM cursos_presenciales ORDER BY id DESC ");
    $info = mysqli_fetch_array($busca);
    $idCurso = $info['id'] + 1;

    $insertarFecha = mysqli_query($linkconx, "INSERT INTO fechas_cursos (id, id_curso, fecha) VALUES ('', '$idCurso', '$fecha') ");
    //header("Location: index.php?alert=datosguardados");
    echo "<script>alert('Curso guardado');location.href ='cursos-presenciales.php#seccion_02';</script>";
}

function guardarCursoonline($linkconx, $titulo, $descripcion, $imparte, $duracion, $fecha, $horario, $ubicacion, $targetFilePath, $link_matutino, $link_vespertino){
  mysqli_query($linkconx, "INSERT INTO cursos_onlineweb (id, item, titulo, descripcion, imparte, duracion, fecha, horario, ubicacion, foto, activo, link_matutino, link_vespertino) VALUES ('', '', '$titulo', '$descripcion', '$imparte', '$duracion', '$fecha', '$horario', '$ubicacion', '$targetFilePath', '2', '$link_matutino', '$link_vespertino' ) ");
    //header("Location: index.php?alert=datosguardados");
    echo "<script>alert('Curso guardado');location.href ='cursos-online.php#seccion_02';</script>";
}

function especialidadesSelect($linkconx)
{
    $busca = mysqli_query($linkconx, "SELECT * FROM especialidades ORDER BY id ASC ");
    while ($info = mysqli_fetch_array($busca)) {
        echo '<option value="'.$info['id'].'">'.$info['especialidad'].'</option>';
    }
    //return $prestacion;
}

function guardarEmpresas($linkconx)
{
      $buscaEstado = mysqli_query($linkconx, "SELECT * FROM estados_electorales ORDER BY cve_edo ASC ");

      $buscaEspecilidad = mysqli_query($linkconx, "SELECT * FROM especialidades ORDER BY id ASC  ");

            echo '<form novalidate name="editarEmpresas" id="editarEmpresas" action="lista-miembros-empresas.php#bloqueEmpresas" method="post" enctype="multipart/form-data" ><input type="hidden" name="guardarEmpresa" value="new"><div class="row segunda__fila" style="height: auto;"><div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                          <input type="text" name="nombre" placeholder="Nombre" value="" required>
                           <button class="btn btn-link" type="submit">Guardar Empresa</button>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                            <input type="number" name="personas" placeholder="Cantidad de personas" value="" required>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                            <input type="text" name="certificado" placeholder="Certificado" value="" required>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0"><select class="form-select __select" aria-label="Default select example" name="especialidad">
                        <option value="0">Seleccionar especialidad</option>';
                        while($infoEspecialidad = mysqli_fetch_array($buscaEspecilidad)){
                            echo '<option value="'.$infoEspecialidad['id'].'" >'.$infoEspecialidad['especialidad'].'</option>';
                        }
                        echo '</select></p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0"><input type="tel" name="telefono" placeholder="Teléfono" value="" required> <input type="email" name="email" placeholder="email" value="" required>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                            <select class="form-select __select" aria-label="Default select example" name="estado" id="selectEstadoguardar" onchange="cambiarEstadoGuardarinstaladores(0)">
                                        <option>Estado</option>';
                                     while ($infoEstado = mysqli_fetch_array($buscaEstado)) {
                                        echo '<option value="'.$infoEstado['cve_edo'].'" '; echo ' >'.$infoEstado['estado'].'</option>';
                                    }   
                                    echo '</select> <select class="form-select __select" id="municipio_eGuardar" name="municipio" aria-label="Default select example">
                                        <option value="0">Municipio / Alcaldía</option>';
                                    echo '</select>
                        </p>
                    </div>
                </div>
            </div></form>';
    //return $prestacion;
}

function listadoEmpresasEdicion($linkconx)
{
    $busca = mysqli_query($linkconx, "SELECT * FROM miembros_empresas ORDER BY id DESC ");
    $fila=1;
    while ($info = mysqli_fetch_array($busca)) {
      
      $idEmpresa=$info['id'];

      $estado=$info['estado'];
      $buscaEstado = mysqli_query($linkconx, "SELECT * FROM estados_electorales ORDER BY cve_edo ASC ");

      $municipio=$info['municipio'];
      $buscaMunicipio = mysqli_query($linkconx, "SELECT cve_mpio, estado, mpio FROM secciones_electorales WHERE cve_edo='$estado' ");

      $id_especialidad=$info['especialidad'];
      $buscaEspecilidad = mysqli_query($linkconx, "SELECT * FROM especialidades ORDER BY id ASC ");

      echo '<form novalidate name="editarInstalador" id="editarInstalador" action="lista-miembros-empresas.php#bloqueEmpresas" method="post" enctype="multipart/form-data" ><input type="hidden" name="guardarEmpresa" value="si"><input type="hidden" name="idEmpresa" value="'.$idEmpresa.'"><div class="row segunda__fila" style="'; 
      if ($fila%2==0){echo 'height: auto;';}else{echo 'background-color: #efefef; height: auto;';}
      echo '">
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0"><input type="text" name="nombre" placeholder="Nombre" value="'.$info['nombre'].'" required>
                        <br>
                           <button class="btn btn-link" type="submit">Guardar Cambios</button> |  <a href="lista-miembros-empresas.php?borrarempresa=si&empresaid='.$idEmpresa.'#bloqueEmpresas">Borrar</a>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                            <input type="number" name="personas" placeholder="Número de personas" value="'.$info['personas'].'" required>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0"><select class="form-select __select" aria-label="Default select example" name="especialidad">
                        <option value="0">Seleccionar especialidad</option>';
                        while($infoEspecialidad = mysqli_fetch_array($buscaEspecilidad)){
                            echo '<option value="'.$infoEspecialidad['id'].'" '; if($infoEspecialidad['id']==$id_especialidad){echo 'selected';} echo ' >'.$infoEspecialidad['especialidad'].'</option>';
                        }
                        echo '</select>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           <input type="tel" name="telefono" placeholder="Teléfono" value="'.$info['telefono'].'" required> <input type="email" name="email" placeholder="Email" value="'.$info['email'].'" required>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0"><select class="form-select __select" aria-label="Default select example" name="estado" id="selectEstadoinstaladores'.$idEmpresa.'" onchange="cambiarEstadoEdicioninstaladores('.$idEmpresa.')">
                            <option>Estado</option>';
                while ($infoEstado = mysqli_fetch_array($buscaEstado)) {
                    echo '<option value="'.$infoEstado['cve_edo'].'" '; if($infoEstado['cve_edo']==$estado){echo 'selected';} echo ' >'.$infoEstado['estado'].'</option>';
                }   
                echo '</select> <select class="form-select __select" id="municipio_eInstaladores'.$idEmpresa.'" name="municipio" aria-label="Default select example">
                    <option value="0">Municipio / Alcaldía</option>';
                while ($infoMunicipio = mysqli_fetch_array($buscaMunicipio)) {
                    echo '<option value="' . $infoMunicipio['cve_mpio']. ' " '; if($municipio == $infoMunicipio['cve_mpio']){echo 'selected';}  echo ' >' . $infoMunicipio['mpio'] . '</option>';
                }
                    echo '</select>
                        </p>
                    </div>
                </div>
            </div></form>';
      $fila++;
    }
    //return $prestacion;
}

function listadoEmpresas($linkconx)
{
    $busca = mysqli_query($linkconx, "SELECT * FROM miembros_empresas ORDER BY id DESC ");
    $fila=1;
    while ($info = mysqli_fetch_array($busca)) {
        //echo '<option value="'.$info['id'].'">'.$info['especialidad'].'</option>';
      $estado=$info['estado'];
      $buscaEstado = mysqli_query($linkconx, "SELECT estado FROM estados_electorales WHERE cve_edo='$estado' ");
      $infoEstado = mysqli_fetch_array($buscaEstado);

      $municipio=$info['municipio'];
      $buscaMunicipio = mysqli_query($linkconx, "SELECT estado, mpio FROM secciones_electorales WHERE cve_edo='$estado' AND cve_mpio='$municipio' ");
      $infoMunicipio = mysqli_fetch_array($buscaMunicipio);

      $id_especialidad=$info['especialidad'];
      $buscaEspecilidad = mysqli_query($linkconx, "SELECT especialidad FROM especialidades WHERE id='$id_especialidad' ");
      $infoEspecialidad = mysqli_fetch_array($buscaEspecilidad);

      if ($info['estado']==0) {
        // code...
        $nombreEstado='Nacional';
      }else{
        $nombreEstado=$infoEstado['estado'];
      }
      echo '<div class="row segunda__fila" style="'; 
      if ($fila%2==0){echo 'height: auto;';}else{echo 'background-color: #efefef; height: auto;';}
      echo '">
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           '.$info['nombre'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                            '.$info['personas'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           '.$infoEspecialidad['especialidad'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           '.$info['telefono'].' / '.$info['email'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                            '.$nombreEstado.' / '.$infoMunicipio['mpio'].'
                        </p>
                    </div>
                </div>
            </div>';
      $fila++;
    }
    //return $prestacion;
}

function listadoInstaladores($linkconx)
{
    $busca = mysqli_query($linkconx, "SELECT * FROM miembros_individuos ORDER BY id DESC ");
    $fila=1;
    while ($info = mysqli_fetch_array($busca)) {
        //echo '<option value="'.$info['id'].'">'.$info['especialidad'].'</option>';
      $estado=$info['estado'];
      $buscaEstado = mysqli_query($linkconx, "SELECT estado FROM estados_electorales WHERE cve_edo='$estado' ");
      $infoEstado = mysqli_fetch_array($buscaEstado);

      $municipio=$info['municipio'];
      $buscaMunicipio = mysqli_query($linkconx, "SELECT estado, mpio FROM secciones_electorales WHERE cve_edo='$estado' AND cve_mpio='$municipio' ");
      $infoMunicipio = mysqli_fetch_array($buscaMunicipio);

      $id_especialidad=$info['especialidad'];
      $buscaEspecilidad = mysqli_query($linkconx, "SELECT especialidad FROM especialidades WHERE id='$id_especialidad' ");
      $infoEspecialidad = mysqli_fetch_array($buscaEspecilidad);
      if ($info['estado']==0) {
        // code...
        $nombreEstado='Nacional';
      }else{
        $nombreEstado=$infoEstado['estado'];
      }
      echo '<div class="row segunda__fila" style="'; 
      if ($fila%2==0){echo 'height: auto;';}else{echo 'background-color: #efefef; height: auto;';}
      echo '">
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           '.$info['nombre'].' '.$info['paterno'].' '.$info['materno'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                            '.$info['certificado'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           '.$infoEspecialidad['especialidad'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           '.$info['telefono'].' / '.$info['email'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                            '.$nombreEstado.' / '.$infoMunicipio['mpio'].'
                        </p>
                    </div>
                </div>
            </div>';
      $fila++;
    }
    //return $prestacion;
}

function listadoInstaladoresEdicion($linkconx)
{
    $busca = mysqli_query($linkconx, "SELECT * FROM miembros_individuos ORDER BY id DESC ");
    $fila=1;
    while ($info = mysqli_fetch_array($busca)) {
        //echo '<option value="'.$info['id'].'">'.$info['especialidad'].'</option>';

      $idInstalador=$info['id'];

      $estado=$info['estado'];
      $buscaEstado = mysqli_query($linkconx, "SELECT * FROM estados_electorales ORDER BY cve_edo ASC ");

      $municipio=$info['municipio'];
      $buscaMunicipio = mysqli_query($linkconx, "SELECT cve_mpio, estado, mpio FROM secciones_electorales WHERE cve_edo='$estado' ");

      $id_especialidad=$info['especialidad'];
      $buscaEspecilidad = mysqli_query($linkconx, "SELECT * FROM especialidades ORDER BY id ASC  ");
      if ($info['estado']==0) {
        // code...
        $nombreEstado='Nacional';
      }else{
        $nombreEstado=$infoEstado['estado'];
      }

        
      echo '<form novalidate name="editarInstalador" id="editarInstalador" action="lista-miembros-instaladores.php#bloqueInstaladores" method="post" enctype="multipart/form-data" ><input type="hidden" name="guardarInstalador" value="si"><input type="hidden" name="idInstalador" value="'.$idInstalador.'"><div class="row segunda__fila" style="'; 
      if ($fila%2==0){echo 'height: auto;';}else{echo 'background-color: #efefef; height: auto;';}
      echo '"><div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                        <input type="text" name="nombre" placeholder="Nombre" value="'.$info['nombre'].'" required>
                        <input type="text" name="paterno" placeholder="Paterno" value="'.$info['paterno'].'" required>
                        <input type="text" name="materno" placeholder="Materno" value="'.$info['materno'].'" required><br>
                           <button class="btn btn-link" type="submit">Guardar Cambios</button> |  <a href="lista-miembros-instaladores.php?borrarinstalador=si&instaladorid='.$idInstalador.'#bloqueInstaladores">Borrar</a>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                        <input type="text" name="certificado" placeholder="Certificado" value="'.$info['certificado'].'" required>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0"><select class="form-select __select" aria-label="Default select example" name="especialidad">
                        <option value="0">Seleccionar especialidad</option>'; 
                        while($infoEspecialidad = mysqli_fetch_array($buscaEspecilidad)){
                            echo '<option value="'.$infoEspecialidad['id'].'" '; if($infoEspecialidad['id']==$id_especialidad){echo 'selected';} echo '>'.$infoEspecialidad['especialidad'].'</option>';
                        }    
                    echo '</select>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           <input type="tel" name="telefono" placeholder="Teléfono" value="'.$info['telefono'].'" required> <input type="email" name="email" placeholder="Email" value="'.$info['email'].'" required>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0"><select class="form-select __select" aria-label="Default select example" name="estado" id="selectEstadoinstaladores'.$idInstalador.'" onchange="cambiarEstadoEdicioninstaladores('.$idInstalador.')">
                                        <option>Estado</option>';
                                     while ($infoEstado = mysqli_fetch_array($buscaEstado)) {
                                        echo '<option value="'.$infoEstado['cve_edo'].'" '; if($infoEstado['cve_edo']==$estado){echo 'selected';} echo ' >'.$infoEstado['estado'].'</option>';
                                    }   
                                    echo '</select> <select class="form-select __select" id="municipio_eInstaladores'.$idInstalador.'" name="municipio" aria-label="Default select example">
                                        <option value="0">Municipio / Alcaldía</option>';
                                        while ($infoMunicipio = mysqli_fetch_array($buscaMunicipio)) {
                                            echo '<option value="' . $infoMunicipio['cve_mpio']. ' " '; if($municipio == $infoMunicipio['cve_mpio']){echo 'selected';}  echo ' >' . $infoMunicipio['mpio'] . '</option>';
                                        }
                                    echo '</select>
                        </p>
                    </div>
                </div>
            </div></form>';
      $fila++;
    }
    //return $prestacion;
}

function guardarInstaladores($linkconx)
{
      $buscaEstado = mysqli_query($linkconx, "SELECT * FROM estados_electorales ORDER BY cve_edo ASC ");

      $buscaEspecilidad = mysqli_query($linkconx, "SELECT * FROM especialidades ORDER BY id ASC  ");
        
      echo '<form novalidate name="editarInstalador" id="editarInstalador" action="lista-miembros-instaladores.php#bloqueInstaladores" method="post" enctype="multipart/form-data" ><input type="hidden" name="guardarInstalador" value="new"><div class="row segunda__fila" style="height: auto;">
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                        <input type="text" name="nombre" placeholder="Nombre" value="" required>
                        <input type="text" name="paterno" placeholder="Paterno" value="" required>
                        <input type="text" name="materno" placeholder="Materno" value="" required><br>
                           <button class="btn btn-link" type="submit">Guardar Instalador</button>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                        <input type="text" name="certificado" placeholder="Certificado" value="" required>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0"><select class="form-select __select" aria-label="Default select example" name="especialidad">
                        <option value="0">Seleccionar especialidad</option>'; 
                        while($infoEspecialidad = mysqli_fetch_array($buscaEspecilidad)){
                            echo '<option value="'.$infoEspecialidad['id'].'" '; echo '>'.$infoEspecialidad['especialidad'].'</option>';
                        }    
                    echo '</select>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           <input type="tel" name="telefono" placeholder="Teléfono" value="" required> <input type="email" name="email" placeholder="Email" value="" required>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0"><select class="form-select __select" aria-label="Default select example" name="estado" id="selectEstadoguardar" onchange="cambiarEstadoGuardarinstaladores(0)">
                                        <option>Estado</option>';
                                     while ($infoEstado = mysqli_fetch_array($buscaEstado)) {
                                        echo '<option value="'.$infoEstado['cve_edo'].'" '; echo ' >'.$infoEstado['estado'].'</option>';
                                    }   
                                    echo '</select> <select class="form-select __select" id="municipio_eGuardar" name="municipio" aria-label="Default select example">
                                        <option value="0">Municipio / Alcaldía</option>';
                                    echo '</select>
                        </p>
                    </div>
                </div>
            </div></form>';
    //return $prestacion;
}

function busquedaInstaladores($linkconx, $busquedaespecialidad, $busquedaestado, $busquedamunicipio)
{
    if($busquedaespecialidad == 0 AND $busquedaestado > 0 AND $busquedamunicipio == 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_individuos WHERE estado='$busquedaestado' ");
    }elseif($busquedaespecialidad == 0 AND $busquedaestado > 0 AND $busquedamunicipio > 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_individuos WHERE estado='$busquedaestado' AND municipio='$busquedamunicipio' ");
    }elseif($busquedaespecialidad > 0 AND $busquedaestado == 0 AND $busquedamunicipio == 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_individuos WHERE especialidad='$busquedaespecialidad' ");
    }elseif($busquedaespecialidad > 0 AND $busquedaestado > 0 AND $busquedamunicipio == 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_individuos WHERE especialidad='$busquedaespecialidad' AND estado='$busquedaestado' ");
    }elseif($busquedaespecialidad > 0 AND $busquedaestado > 0 AND $busquedamunicipio > 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_individuos WHERE especialidad='$busquedaespecialidad' AND estado='$busquedaestado' AND municipio='$busquedamunicipio' ");
    }
    
    $fila=1;
    while ($info = mysqli_fetch_array($busca)) {
        //echo '<option value="'.$info['id'].'">'.$info['especialidad'].'</option>';
      $estado=$info['estado'];
      $buscaEstado = mysqli_query($linkconx, "SELECT estado FROM estados_electorales WHERE cve_edo='$estado' ");
      $infoEstado = mysqli_fetch_array($buscaEstado);

      $municipio=$info['municipio'];
      $buscaMunicipio = mysqli_query($linkconx, "SELECT estado, mpio FROM secciones_electorales WHERE cve_edo='$estado' AND cve_mpio='$municipio' ");
      $infoMunicipio = mysqli_fetch_array($buscaMunicipio);

      $id_especialidad=$info['especialidad'];
      $buscaEspecilidad = mysqli_query($linkconx, "SELECT especialidad FROM especialidades WHERE id='$id_especialidad' ");
      $infoEspecialidad = mysqli_fetch_array($buscaEspecilidad);
      if ($info['estado']==0) {
        // code...
        $nombreEstado='Nacional';
      }else{
        $nombreEstado=$infoEstado['estado'];
      }
      echo '<div class="row segunda__fila" style="'; 
      if ($fila%2==0){echo 'height: auto;';}else{echo 'background-color: #efefef; height: auto;';}
      echo '">
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           '.$info['nombre'].' '.$info['paterno'].' '.$info['materno'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                            '.$info['certificado'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           '.$infoEspecialidad['especialidad'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           '.$info['telefono'].' / '.$info['email'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                            '.$nombreEstado.' / '.$infoMunicipio['mpio'].'
                        </p>
                    </div>
                </div>
            </div>';
      $fila++;
    }
    //return $prestacion;
}

function busquedaInstaladoresEdicion($linkconx, $busquedaespecialidad, $busquedaestado, $busquedamunicipio)
{
    if($busquedaespecialidad == 0 AND $busquedaestado > 0 AND $busquedamunicipio == 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_individuos WHERE estado='$busquedaestado' ");
    }elseif($busquedaespecialidad == 0 AND $busquedaestado > 0 AND $busquedamunicipio > 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_individuos WHERE estado='$busquedaestado' AND municipio='$busquedamunicipio' ");
    }elseif($busquedaespecialidad > 0 AND $busquedaestado == 0 AND $busquedamunicipio == 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_individuos WHERE especialidad='$busquedaespecialidad' ");
    }elseif($busquedaespecialidad > 0 AND $busquedaestado > 0 AND $busquedamunicipio == 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_individuos WHERE especialidad='$busquedaespecialidad' AND estado='$busquedaestado' ");
    }elseif($busquedaespecialidad > 0 AND $busquedaestado > 0 AND $busquedamunicipio > 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_individuos WHERE especialidad='$busquedaespecialidad' AND estado='$busquedaestado' AND municipio='$busquedamunicipio' ");
    }
    
    $fila=1;
    while ($info = mysqli_fetch_array($busca)) {
        //echo '<option value="'.$info['id'].'">'.$info['especialidad'].'</option>';
       $idInstalador=$info['id'];

      $estado=$info['estado'];
      $buscaEstado = mysqli_query($linkconx, "SELECT * FROM estados_electorales ORDER BY cve_edo ASC ");

      $municipio=$info['municipio'];
      $buscaMunicipio = mysqli_query($linkconx, "SELECT cve_mpio, estado, mpio FROM secciones_electorales WHERE cve_edo='$estado' ");

      $id_especialidad=$info['especialidad'];
      $buscaEspecilidad = mysqli_query($linkconx, "SELECT * FROM especialidades ORDER BY id ASC  ");
      if ($info['estado']==0) {
        // code...
        $nombreEstado='Nacional';
      }else{
        $nombreEstado=$infoEstado['estado'];
      }

        
      echo '<form novalidate name="editarInstalador" id="editarInstalador" action="lista-miembros-instaladores.php#bloqueInstaladores" method="post" enctype="multipart/form-data" ><input type="hidden" name="guardarInstalador" value="si"><input type="hidden" name="idInstalador" value="'.$idInstalador.'"><div class="row segunda__fila" style="'; 
      if ($fila%2==0){echo 'height: auto;';}else{echo 'background-color: #efefef; height: auto;';}
      echo '"><div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                        <input type="text" name="nombre" placeholder="Nombre" value="'.$info['nombre'].'" required>
                        <input type="text" name="paterno" placeholder="Paterno" value="'.$info['paterno'].'" required>
                        <input type="text" name="materno" placeholder="Materno" value="'.$info['materno'].'" required><br>
                           <button class="btn btn-link" type="submit">Guardar Cambios</button> |  <a href="lista-miembros-instaladores.php?borrarinstalador=si&instaladorid='.$idInstalador.'#bloqueInstaladores">Borrar</a>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                        <input type="text" name="certificado" placeholder="Certificado" value="'.$info['certificado'].'" required>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0"><select class="form-select __select" aria-label="Default select example" name="especialidad">
                        <option value="0">Seleccionar especialidad</option>'; 
                        while($infoEspecialidad = mysqli_fetch_array($buscaEspecilidad)){
                            echo '<option value="'.$infoEspecialidad['id'].'" '; if($infoEspecialidad['id']==$id_especialidad){echo 'selected';} echo '>'.$infoEspecialidad['especialidad'].'</option>';
                        }    
                    echo '</select>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           <input type="tel" name="telefono" placeholder="Teléfono" value="'.$info['telefono'].'" required> <input type="email" name="email" placeholder="Email" value="'.$info['email'].'" required>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0"><select class="form-select __select" aria-label="Default select example" name="estado" id="selectEstadoinstaladores'.$idInstalador.'" onchange="cambiarEstadoEdicioninstaladores('.$idInstalador.')">
                                        <option>Estado</option>';
                                     while ($infoEstado = mysqli_fetch_array($buscaEstado)) {
                                        echo '<option value="'.$infoEstado['cve_edo'].'" '; if($infoEstado['cve_edo']==$estado){echo 'selected';} echo ' >'.$infoEstado['estado'].'</option>';
                                    }   
                                    echo '</select> <select class="form-select __select" id="municipio_eInstaladores'.$idInstalador.'" name="municipio" aria-label="Default select example">
                                        <option value="0">Municipio / Alcaldía</option>';
                                        while ($infoMunicipio = mysqli_fetch_array($buscaMunicipio)) {
                                            echo '<option value="' . $infoMunicipio['cve_mpio']. ' " '; if($municipio == $infoMunicipio['cve_mpio']){echo 'selected';}  echo ' >' . $infoMunicipio['mpio'] . '</option>';
                                        }
                                    echo '</select>
                        </p>
                    </div>
                </div>
            </div></form>';
      $fila++;
    }
    //return $prestacion;
}

function busquedaEmpresas($linkconx, $busquedaespecialidad, $busquedaestado, $busquedamunicipio)
{
    if($busquedaespecialidad == 0 AND $busquedaestado > 0 AND $busquedamunicipio == 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_empresas WHERE estado='$busquedaestado' ");
    }elseif($busquedaespecialidad == 0 AND $busquedaestado > 0 AND $busquedamunicipio > 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_empresas WHERE estado='$busquedaestado' AND municipio='$busquedamunicipio' ");
    }elseif($busquedaespecialidad > 0 AND $busquedaestado == 0 AND $busquedamunicipio == 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_empresas WHERE especialidad='$busquedaespecialidad' ");
    }elseif($busquedaespecialidad > 0 AND $busquedaestado > 0 AND $busquedamunicipio == 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_empresas WHERE especialidad='$busquedaespecialidad' AND estado='$busquedaestado' ");
    }elseif($busquedaespecialidad > 0 AND $busquedaestado > 0 AND $busquedamunicipio > 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_empresas WHERE especialidad='$busquedaespecialidad' AND estado='$busquedaestado' AND municipio='$busquedamunicipio' ");
    }


    $fila=1;
    while ($info = mysqli_fetch_array($busca)) {
        //echo '<option value="'.$info['id'].'">'.$info['especialidad'].'</option>';
      $estado=$info['estado'];
      $buscaEstado = mysqli_query($linkconx, "SELECT estado FROM estados_electorales WHERE cve_edo='$estado' ");
      $infoEstado = mysqli_fetch_array($buscaEstado);

      $municipio=$info['municipio'];
      $buscaMunicipio = mysqli_query($linkconx, "SELECT estado, mpio FROM secciones_electorales WHERE cve_edo='$estado' AND cve_mpio='$municipio' ");
      $infoMunicipio = mysqli_fetch_array($buscaMunicipio);

      $id_especialidad=$info['especialidad'];
      $buscaEspecilidad = mysqli_query($linkconx, "SELECT especialidad FROM especialidades WHERE id='$id_especialidad' ");
      $infoEspecialidad = mysqli_fetch_array($buscaEspecilidad);
      
      if ($info['estado']==0) {
        // code...
        $nombreEstado='Nacional';
      }else{
        $nombreEstado=$infoEstado['estado'];
      }
      echo '<div class="row segunda__fila" style="'; 
      if ($fila%2==0){echo 'height: auto;';}else{echo 'background-color: #efefef; height: auto;';}
      echo '">
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           '.$info['nombre'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                            '.$info['personas'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           '.$infoEspecialidad['especialidad'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           '.$info['telefono'].' / '.$info['email'].'
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                            '.$nombreEstado.' / '.$infoMunicipio['mpio'].'
                        </p>
                    </div>
                </div>
            </div>';
      $fila++;
    }
    //return $prestacion;
}

function busquedaEmpresasedicion($linkconx, $busquedaespecialidad, $busquedaestado, $busquedamunicipio)
{
    if($busquedaespecialidad == 0 AND $busquedaestado > 0 AND $busquedamunicipio == 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_empresas WHERE estado='$busquedaestado' ");
    }elseif($busquedaespecialidad == 0 AND $busquedaestado > 0 AND $busquedamunicipio > 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_empresas WHERE estado='$busquedaestado' AND municipio='$busquedamunicipio' ");
    }elseif($busquedaespecialidad > 0 AND $busquedaestado == 0 AND $busquedamunicipio == 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_empresas WHERE especialidad='$busquedaespecialidad' ");
    }elseif($busquedaespecialidad > 0 AND $busquedaestado > 0 AND $busquedamunicipio == 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_empresas WHERE especialidad='$busquedaespecialidad' AND estado='$busquedaestado' ");
    }elseif($busquedaespecialidad > 0 AND $busquedaestado > 0 AND $busquedamunicipio > 0){
        $busca = mysqli_query($linkconx, "SELECT * FROM miembros_empresas WHERE especialidad='$busquedaespecialidad' AND estado='$busquedaestado' AND municipio='$busquedamunicipio' ");
    }


    $fila=1;
    while ($info = mysqli_fetch_array($busca)) {
        //echo '<option value="'.$info['id'].'">'.$info['especialidad'].'</option>';
      $idEmpresa=$info['id'];

      $estado=$info['estado'];
      $buscaEstado = mysqli_query($linkconx, "SELECT * FROM estados_electorales ORDER BY cve_edo ASC ");

      $municipio=$info['municipio'];
      $buscaMunicipio = mysqli_query($linkconx, "SELECT cve_mpio, estado, mpio FROM secciones_electorales WHERE cve_edo='$estado' ");

      $id_especialidad=$info['especialidad'];
      $buscaEspecilidad = mysqli_query($linkconx, "SELECT * FROM especialidades ORDER BY id ASC ");

      echo '<form novalidate name="editarInstalador" id="editarInstalador" action="lista-miembros-empresas.php#bloqueEmpresas" method="post" enctype="multipart/form-data" ><input type="hidden" name="guardarEmpresa" value="si"><input type="hidden" name="idEmpresa" value="'.$idEmpresa.'"><div class="row segunda__fila" style="'; 
      if ($fila%2==0){echo 'height: auto;';}else{echo 'background-color: #efefef; height: auto;';}
      echo '">
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0"><input type="text" name="nombre" placeholder="Nombre" value="'.$info['nombre'].'" required>
                        <br>
                           <button class="btn btn-link" type="submit">Guardar Cambios</button> |  <a href="lista-miembros-empresas.php?borrarempresa=si&empresaid='.$idEmpresa.'#bloqueEmpresas">Borrar</a>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                            <input type="number" name="personas" placeholder="Número de personas" value="'.$info['personas'].'" required>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0"><select class="form-select __select" aria-label="Default select example" name="especialidad">
                        <option value="0">Seleccionar especialidad</option>';
                        while($infoEspecialidad = mysqli_fetch_array($buscaEspecilidad)){
                            echo '<option value="'.$infoEspecialidad['id'].'" '; if($infoEspecialidad['id']==$id_especialidad){echo 'selected';} echo ' >'.$infoEspecialidad['especialidad'].'</option>';
                        }
                        echo '</select>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0">
                           <input type="tel" name="telefono" placeholder="Teléfono" value="'.$info['telefono'].'" required> <input type="email" name="email" placeholder="Email" value="'.$info['email'].'" required>
                        </p>
                    </div>
                </div>
                <div class="col">
                    <div class="d-flex align-items-center justify-content-center flex-wrap h-100">
                        <p class="text-left m-0"><select class="form-select __select" aria-label="Default select example" name="estado" id="selectEstadoinstaladores'.$idEmpresa.'" onchange="cambiarEstadoEdicioninstaladores('.$idEmpresa.')">
                            <option>Estado</option>';
                while ($infoEstado = mysqli_fetch_array($buscaEstado)) {
                    echo '<option value="'.$infoEstado['cve_edo'].'" '; if($infoEstado['cve_edo']==$estado){echo 'selected';} echo ' >'.$infoEstado['estado'].'</option>';
                }   
                echo '</select> <select class="form-select __select" id="municipio_eInstaladores'.$idEmpresa.'" name="municipio" aria-label="Default select example">
                    <option value="0">Municipio / Alcaldía</option>';
                while ($infoMunicipio = mysqli_fetch_array($buscaMunicipio)) {
                    echo '<option value="' . $infoMunicipio['cve_mpio']. ' " '; if($municipio == $infoMunicipio['cve_mpio']){echo 'selected';}  echo ' >' . $infoMunicipio['mpio'] . '</option>';
                }
                    echo '</select>
                        </p>
                    </div>
                </div>
            </div></form>';
      $fila++;
    }
    //return $prestacion;
}



?>