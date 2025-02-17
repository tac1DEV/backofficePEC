<?php

require_once '../config/config.php';

class Login {
    private PDO $db;
    public string|null $email = null;
    public string|null $password = null;
    public string|null $role = null;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function setPassword(string $password) {
        $this->password = sha1($password);
    }
    
    public function setRole(string $role) {
        $this->role = $role;
    }

    public function getRole(): ?string {
        return $this->role;
    }

    public function isRegistered(): bool {
        $a = [
            'email' => $this->email,
            'password' => $this->password
        ];
        
        $sql = "SELECT role FROM utilisateur WHERE email = :email AND password = :password";
        $req = $this->db->prepare($sql);
        $req->execute($a);
        $user = $req->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $this->role = $user['role'];
            return true;
        } else {
            return false;
        }
    }
}
?>