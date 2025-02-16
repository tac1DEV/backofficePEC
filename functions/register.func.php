<?php 
function register($lastname, $firstname, $email, $password){
    global $db;
    $r = [
        'lastname' => $lastname,
        'firstname' => $firstname,
        'email' => $email,
        'password' => sha1($password)
    ];

    $sql = "INSERT INTO utilisateur(nom, prenom, email, password) VALUES(:lastname, :firstname, :email, :password)";

    $req = $db->prepare($sql);
    try {
        $req->execute($r);
        return true;
    } catch (Exception $e) {
        return $e->getMessage();
    }
}	
?>