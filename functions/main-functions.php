<?php

session_start();


function admin(){//verifie si la session en cours est celle d'un admin
    if(isset($_SESSION['admin'])){
        global $db;
        $a = [
            'email' => $_SESSION['admin'],
            'role' => 'admin'
        ];
        
        $sql = "SELECT * FROM utilisateur WHERE email = :email AND role = :role";
        $req = $db->prepare($sql);
        $req->execute($a);
        $exist = $req->rowCount();
        return $exist;
    }else{
        return false;
    }
}
?>