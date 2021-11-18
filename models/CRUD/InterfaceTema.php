<?php

interface TemaCRUD{

    public static function index();


    public static function create($id, $nombre);

    public static function delete($id);

    public static function edit($id, $nombre);

}