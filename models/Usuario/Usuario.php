<?php
require_once '../models/CRUD/InterfaceUser.php';
require_once '../vendor/autoload.php';
require_once '../models/Database/Database.php';

use Illuminate\Database\Capsule\Manager as DB;

class Usuario implements UserCRUD{

    public static function login($email, $password){

        $usuario = DB::table('usuario')->select('password')
        ->where('email', '=', $email)
        ->get();

        return $usuario;

    }

    public static function sesion($email, $password){

        $usuario = DB::table('usuario')->select('id', 'nombre', 'apellido')
            ->where('email', '=', $email, 'and', 'password', '=', $password)
            ->get();
    
            return $usuario;

    }
    

    public static function register($nombre, $apellido, $email, $password){

        DB::table('usuario')->insert([
            'nombre' => $nombre,
            'apellido' => $apellido,
            'email' => $email,
            'password' => $password
        ]);

    }

    public static function index(){

    }
}