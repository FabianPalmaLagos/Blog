<?php 
session_start();
require_once '../models/Tema/Tema.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];

try{
    Tema::edit($id, $nombre);
    $_SESSION['editTema'] = "Tema editado correctamente.";
}catch(PDOException $e){
    echo $e;
}

header("Location: ../index.php");