<?php
require_once('vendor/autoload.php');
require_once('models\Database\Database.php');

use Illuminate\Database\Capsule\Manager as DB;

class Post{

    public function index($id_tema){
        $posts = DB::table('post')->where('id_tema', '=', $id_tema)->get();
        return $posts;
    }

    public static function show($id){
        return DB::table('post')->where('id_autor', '=', $id)->get();
    }
}