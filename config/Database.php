<?php
class Database { //singleton pour ne pas avoir a repeter la connexion a la base de données ($db)
    private static ?PDO $instance = null;

    public static function getInstance(): PDO {
        if (self::$instance === null) {
            $dbhost = 'localhost';
            $dbname = 'blog';
            $dbuser = 'root';
            $dbpwd = '';

            try {
                self::$instance = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpwd, [
                    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                ]);
            } catch (PDOException $e) {
                die('Une erreur est survenue lors de la connexion à la base de données');
            }
        }
        return self::$instance;
    }
}
?>