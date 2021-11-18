<?php

interface UserCRUD{

    public static function index();

    public static function login($email, $password);

    public static function register($nombre, $apellido, $email, $password);

    public static function sesion($email, $password);

}