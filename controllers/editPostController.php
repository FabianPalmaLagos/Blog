<?php 
session_start();
require_once '../models/Post/Post.php';

$id = $_POST['id'];
$id_autor = $_POST['id_autor'];
$titulo = $_POST['titulo'];
$mensaje = $_POST['mensaje'];

try{
    Post::edit($id, $titulo, $mensaje);
    $_SESSION['edit'] = "Post editado correctamente.";
}catch(PDOException $e){
    echo $e;
}

header("Location: ../sesionPost.php?id=$id_autor");