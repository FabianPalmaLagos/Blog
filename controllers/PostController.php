<?php
session_start();
require_once '../models/Post/Post.php';
$id = $_POST['id'];
$id_tema = $_POST['id_tema'];
$autor = $_POST['autor'];
$titulo = $_POST['titulo'];
$mensaje = $_POST['mensaje'];
$fecha = $_POST['fecha'];
$respuestas = $_POST['respuestas'];



try{
   $post = Post::create($id, $id_tema, $autor, $titulo, $mensaje, $fecha, $respuestas);
   $_SESSION['crear'] = "El post ha sido creado correctamente";
}catch (PDOException $e){
    echo $e;
}
header("Location: ../listPost.php?id=$id_tema");

?>