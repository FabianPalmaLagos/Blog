<?php
session_start();
require_once '../models/Respuesta/Respuesta.php';

$id_post  = $_POST['id_post'];
$autor = $_POST['autor'];
$fecha    = $_POST['fecha'];
$respuesta = $_POST['respuesta'];

try{
    Respuesta::create($id_post, $autor, $fecha, $respuesta);
    $_SESSION['Respuesta'] = "Comentario agregado";
}catch(PDOException $e){
    echo $e;
}

header("Location: ../verPost.php?id=$id_post");