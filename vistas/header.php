<?php 
require_once './vendor/autoload.php';
session_start();
$datos = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="shadow.css">
    <title>BLOG</title>
    <style>
        .h3{
            color: white;
        }
        .link{
            color: black;
            text-decoration: none;
        }
        .link:hover{
            color: #4F4F4F;
            text-decoration: underline;
        }

        .nav-link{
            color: white;
        }
        .nav-link:hover{
            color: #AFAFAF;
        }
        .boton{
            background-color: #C79A68;
            border-color: #CEA06C;
            color: white;
        }
        .boton:hover{
            background-color: #AF895E;
            border-color: #A7835B;
            color: #DDDDDD;
        }
        .tittle{
            color: black;
            text-decoration: none;
        }
        .tittle:hover{
            color: #4F4F4F;
        }
        body{
            background-image: url("https://images.unsplash.com/photo-1603302576837-37561b2e2302?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2068&q=80");
            
            background-size: cover;
        }
        .card{
            border: 5px solid #DBDBDB;
        }
        .navbrand{
            background-color: white;;
            border-bottom: #DBDBDB;
        }
    </style>
    <div class="container-md-12 shadow-longer navbrand">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand tittle " href="index.php">Blog de Estudiantes </a>
            
                <ul class="nav">
                    <?php if(empty($datos)): ?>   
                        <li class="nav-item">
                            <a class="nav-link active" href="login.php">Iniciar Sesión</a> 
                       </li>
                        <li class="nav-item">
                            <a class="nav-link" href="registro.php">Registrarse</a>
                        </li>
                    <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link active"><?= $datos[0]->nombre ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="sesionPost.php?id=<?= $datos[0]->id ?>">Mis post</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="cerrarsesion.php">Cerrar sesión</a>
                            </li>
                    <?php endif; ?>
                
                </ul>
            </div>
        </nav>
    </div>
</head>
<body>
 
    