<?php

function create_user($lastname, $firstname, $email, $password){
    
    global $db;
    $u = [
        'lastname' => $lastname,
        'firstname' => $firstname,
        'email' => $email,
        'password' => sha1($password)
    ];
    
    $sql = "INSERT INTO utilisateur (nom, prenom, email, password) 
            VALUES (:lastname, :firstname, :email, :password)";
    
    $req = $db->prepare($sql);
    $req->execute($u);
}

?>