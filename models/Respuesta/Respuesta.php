<?php

require_once '../models/CRUD/InterfaceRespuesta.php';
require_once '../vendor/autoload.php';
require_once '../models/Database/Database.php';

use Illuminate\Database\Capsule\Manager as DB;

class Respuesta implements RespCRUD {


    

    public static function create($id_post, $autor, $fecha, $respuesta){

        DB::table('respuesta')->insert([
            'id_post' => $id_post,
            'autor' => $autor,
            'fecha' => $fecha,
            'respuesta' => $respuesta
        ]);
    }

    public static function delete(){

    }

    public static function edit(){

    }
}