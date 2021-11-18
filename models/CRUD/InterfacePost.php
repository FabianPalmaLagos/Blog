<?php

interface PostCRUD{

    public static function index();

    public static function create($id, $id_autor, $autor, $titulo, $mensaje, $fecha, $respuestas);

    public static function delete($id);

    public static function edit($id, $titulo, $mensaje);

}