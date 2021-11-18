<?php

require_once '../models/CRUD/InterfacePost.php';
require_once '../vendor/autoload.php';
require_once '../models/Database/Database.php';

use Illuminate\Database\Capsule\Manager as DB;

class Post implements PostCRUD {


    public static function create($id, $id_tema, $autor, $titulo, $mensaje, $fecha, $respuestas){

        DB::table('post')->insert([
            'id_autor' => $id,
            'id_tema' => $id_tema,
            'autor' => $autor,
            'titulo' => $titulo,
            'mensaje' => $mensaje,
            'fecha' => $fecha,
            'respuestas' => $respuestas
        ]);

    }

    public static function index(){

    }

    public static function edit($id, $titulo, $mensaje){

        DB::table('post')->where('id', '=',$id)->update([
            'titulo'    => $titulo,
            'mensaje' => $mensaje
        ]);
    }

    public static function delete($id){
        DB::table('post')->where('id', '=', $id)->delete();
    }
}