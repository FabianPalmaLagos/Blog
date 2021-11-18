<?php 
session_start();
require_once '../models/Post/Post.php';

$id = $_GET['id'];
$id_autor = $_GET['id_autor'];

try{
    Post::delete($id);
    $_SESSION['delete'] = "Se ha eliminado correctamente el post";
}catch(PDOException $e){
    echo $e;
}

header("Location: ../sesionPost.php?id=$id_autor");