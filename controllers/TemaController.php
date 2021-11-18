<?php
session_start();
require_once '../models/Tema/Tema.php';
$id = $_POST['id'];
$nombre = $_POST['nombre'];



try{
   $tema = Tema::create($id, $nombre);
   $_SESSION['crearTema'] = "El tema ha sido creado correctamente";
}catch (PDOException $e){
    echo $e;
}
header("Location: ../index.php");

?>