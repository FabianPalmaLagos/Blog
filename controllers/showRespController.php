<?php
require_once('vendor/autoload.php');
require_once('models\Database\Database.php');

use Illuminate\Database\Capsule\Manager as DB;

class Resp{

    public static function show($id){
        return DB::table('respuesta')->where('id_post', '=', $id)->get();
    }
}