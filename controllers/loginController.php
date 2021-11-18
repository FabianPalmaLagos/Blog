<?php
session_start();
require_once '../models/Usuario/Usuario.php';

$email = $_POST['email'];
$password = $_POST['password'];



try{
   $usuario = Usuario::login($email, $password);

   if (empty($usuario[0])) {
       $_SESSION['usuarioerror'] = "El email es incorrecto";
       header("Location: ../login.php");
   }else{
        $pass = ($usuario[0]->password);
        
        if(!password_verify($password, $pass)){
            $_SESSION['usuarioerror'] = "La contraseña es incorrecta";
            header("Location: ../login.php");
        }else{
            $_SESSION['usuario'] = "Bienvenido $email";
            $user = Usuario::sesion($email, $password);
            $_SESSION['user'] = $user;
            header("Location: ../index.php");
        }
    }
}catch (PDOException $e){
    echo $e;
}
