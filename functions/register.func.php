<?php

function create_user($lastname, $firstname, $email, $password){
    
    global $db;
    
    $u = [
        'lastname' => $lastname,
        'firstname' => $firstname,
        'email' => $email,
        'password' => sha1($password)
    ];

    $checkEmail = $db->prepare("SELECT COUNT(*) FROM utilisateur WHERE email = :email");
    $checkEmail->execute([':email' => $email]);
    $emailExists = $checkEmail->fetchColumn();
    if($emailExists){
        return false;
    } else{
        $sql = "INSERT INTO utilisateur (nom, prenom, email, password) 
                VALUES (:lastname, :firstname, :email, :password)";
        
        $req = $db->prepare($sql);
        $req->execute($u);
        return true;
    }
}

?>