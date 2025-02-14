<?php

session_start();

$dbhost = 'localhost';
$dbname = 'blog';
$dbuser = 'root';
$dbpwd = '';

try{
    $db = new PDO('mysql:host='.$dbhost.';dbname='.$dbname, $dbuser, $dbpwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
}catch(PDOException $e){
    die('Une erreur est survenue lors de la connexion à la base de données');
}

function admin(){
    if(isset($_SESSION['admin'])){
        global $db;
        $a = [
            'email' => $_SESSION['admin'],
            'role' => 'admin'
        ];
        
        $sql = "SELECT * FROM admins WHERE email = :email AND role = :role";
        $req = $db->prepare($sql);
        $req->execute($a);
        $exist = $req->rowCount($sql);
        return $exist;
    }else{
        return false;
    }
}
?>