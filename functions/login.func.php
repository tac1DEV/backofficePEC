<?php 

function is_admin($email, $password){//verifie si l'utilisateur est un admin
            
    global $db;
    
    $a = [
        'email' => $email,
        'password' => sha1($password),
        'role' => 'admin'
    ];
    $sql = "SELECT * FROM utilisateur WHERE email = :email AND password = :password AND role = :role";
    $req = $db->prepare($sql);
    $req->execute($a);
    $exist = $req->rowCount();
    
    return $exist;
};

function is_user($email, $password){//verifie si l'utilisateur est un admin
        
        global $db;
        
        $a = [
            'email' => $email,
            'password' => sha1($password),
            'role' => 'user'
        ];
        $sql = "SELECT * FROM utilisateur WHERE email = :email AND password = :password AND role = :role";
        $req = $db->prepare($sql);
        $req->execute($a);
        $exist = $req->rowCount();
        
        return $exist;
};
?>