<?php

class DB {
    public static function connect()
    {
        $server = 'localhost';
        $user = 'root';
        $password = '';
        $database = 'api';

        return new PDO("mysql:host={$server};dbname={$database}; charset=UTF8;", $user, $password);
    }
}