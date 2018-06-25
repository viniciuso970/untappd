<?php

class Database
{
    private static $dsn =
        'mysql:host=localhost;dbname=untappd';
    private static $username = 'root';
    private static $password = '';
    private static $db;

    private function __construct(){}

    public static function getDB()
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                    self::$username,
                    self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo "Erro na conexão com o banco!". $error_message;
                exit();
            }
        }
        return self::$db;
    }
}
