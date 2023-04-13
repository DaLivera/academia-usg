<?php
require("includes/funciones.php");
//echo 'Empieza variables.<br />';
$tipoCurso = $_POST['tipoCurso'];

if ($tipoCurso == 'presencial') {
    $tipo_curso = $_POST['tipo_curso'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $importante = $_POST['importante'];
    $nota1 = $_POST['nota1'];
    $nota2 = $_POST['nota2'];
    $imparte = $_POST['imparte'];
    $duracion = $_POST['duracion'];
    $fecha = $_POST['fecha'];
    $horario = $_POST['horario'];
    $ubicacion = $_POST['ubicacion'];
    $foto = $_FILES['foto']['name'];
    $userfile_name = $_FILES['foto']['name'];
    $userfile_tmp = $_FILES['foto']['tmp_name'];
    $userfile_size = $_FILES['foto']['size'];
    $fotodecurso = $userfile_name;
     if(!empty($_FILES["foto"]["name"])){
                    
                    // File path config
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
                        }else{

                        }
                    }else{
                        echo "<script>alert('Solo se permiten los sig formatos: JPG, JPEG, & PNG');location.href ='cursos-presenciales-panel.php#seccion_02';</script>";
                    }
                } else {
                    echo "<script>alert('Debes agregar una foto de curso');location.href ='cursos-presenciales-panel.php#seccion_02';</script>";
                }
    guardarCurso($linkconx, $tipo_curso, $titulo, $descripcion, $importante, $nota1, $nota2, $imparte, $duracion, $fecha, $horario, $ubicacion, $targetFilePath);
}elseif ($tipoCurso == 'online'){
    $titulo = $_POST['tituloonline'];
    $descripcion = $_POST['descripciononline'];
    $imparte = $_POST['imparteonline'];
    $duracion = $_POST['duraciononline'];
    $fecha = $_POST['fechaonline'];
    $horario = $_POST['horarioonline'];
    $ubicacion = $_POST['ubicaciononline'];
    $link_matutino = $_POST['link_matutino'];
    $link_vespertino = $_POST['link_vespertino'];
    $foto = $_FILES['fotoonline']['name'];
    $userfile_name = $_FILES['fotoonline']['name'];
    $userfile_tmp = $_FILES['fotoonline']['tmp_name'];
    $userfile_size = $_FILES['fotoonline']['size'];
    $fotodecurso = $userfile_name;
     if(!empty($_FILES["fotoonline"]["name"])){
                    
                    // File path config
                    $targetDir = "fotos_cursos/online/";
                    $fileName = basename($_FILES["fotoonline"]["name"]);
                    $targetFilePath = $targetDir . $ahora.$hora.$fileName;
                    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
                    
                    // Allow certain file formats
                    $allowTypes = array('jpg', 'png', 'jpeg');
                    if(in_array($fileType, $allowTypes)){
                        // Upload file to the server
                        if(move_uploaded_file($_FILES["fotoonline"]["tmp_name"], $targetFilePath)){
                            $fotodecurso = $targetFilePath;
                        }else{

                        }
                    }else{
                        echo "<script>alert('Solo se permiten los sig formatos: JPG, JPEG, & PNG');location.href ='cursos-presenciales-panel.php#seccion_02';</script>";
                    }
                } else {
                    echo "<script>alert('Debes agregar una foto de curso');location.href ='cursos-presenciales-panel.php#seccion_02';</script>";
                }
    guardarCursoonline($linkconx, $titulo, $descripcion, $imparte, $duracion, $fecha, $horario, $ubicacion, $targetFilePath, $link_matutino, $link_vespertino);
}else{}



?>