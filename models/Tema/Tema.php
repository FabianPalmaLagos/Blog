<?php

require_once '../models/CRUD/InterfaceTema.php';
require_once '../vendor/autoload.php';
require_once '../models/Database/Database.php';

use Illuminate\Database\Capsule\Manager as DB;

class Tema implements TemaCRUD {


    public static function create($id, $nombre){

        DB::table('tema')->insert([
            'id' => $id,
            'nombre' => $nombre,
        ]);

    }

    public static function index(){

    }

    

    public static function edit($id, $nombre){

        DB::table('tema')->where('id', '=',$id)->update([
            'nombre'    => $nombre
        ]);
    }

    public static function delete($id){
        DB::table('tema')->where('id', '=', $id)->delete();
    }
}