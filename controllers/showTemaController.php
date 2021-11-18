<?php
require_once('vendor/autoload.php');
require_once('models\Database\Database.php');

use Illuminate\Database\Capsule\Manager as DB;

class Tema{

    public function index(){
        $tema = DB::table('tema')->get();
        return $tema;
    }
    public function data($id){
        $tema = DB::table('tema')->where('id', '=', $id)->get();
        return $tema;
    }
    
}