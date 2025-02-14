<?php
if(isset($_POST['post'])){
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    $sql = "SELECT * FROM utilisateur WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    

    if ($user && sha1($password) === $user['password']) {
        session_start();
        $_SESSION['user_prenom'] = $user['prenom'];
        header('Location: index.php?page=home'); 
        exit();
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>