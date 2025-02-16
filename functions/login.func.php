<?php 

function is_registered($email, $password, $role){//verifie si l'utilisateur est enrégistré
            
    global $db;
    
    $a = [
        'email' => $email,
        'password' => sha1($password),
        'role' => $role
    ];
    $sql = "SELECT * FROM utilisateur WHERE email = :email AND password = :password AND role = :role";
    $req = $db->prepare($sql);
    $req->execute($a);
    $exist = $req->rowCount();
    
    return $exist;
};
?>