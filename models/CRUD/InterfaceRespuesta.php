<?php

interface RespCRUD{

    

    public static function create($id_post, $autor, $fecha, $respuesta );

    public static function delete();

    public static function edit();

}