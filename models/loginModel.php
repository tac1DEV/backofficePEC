<?php

class Login {
    
        public string $email;//Propriété de la classe
        public string $password;//Propriété de la classe
        public string $role;//Propriété de la classe
    
        public function setEmail(string $email) {//Méthode de la classe
            $this->email = $email;
        }
    
        public function setPassword(string $password) {//Méthode de la classe
            $this->password = $password;
        }
    
        public function setRole(string $role) {//Méthode de la classe
            $this->role = $role;
        }
    
        public function is_registered(string $email, string $password, string $role) {//Méthode de la classe
            global $db;
            $a = [
                'email' => $email,
                'password' => $password,
                'role' => $role
            ];
            
            $sql = "SELECT * FROM utilisateur WHERE email = :email AND password = :password AND role = :role";
            $req = $db->prepare($sql);
            $req->execute($a);
            $exist = $req->rowCount();
            return $exist;
        }
}
//<?php

// class Calculator {

//     const AUTHORIZED_OPERATIONS = [ 
//       'addition',
//       'soustraction',
//       'multiplication',
//       'division',
//       'power'  
//     ];

//     public string|null $operation = null;//Propriété de la classe
//     public int $numberRight;//Propriété de la classe
//     public int $numberLeft;//Propriété de la classe
//     public int|float|null $result = null;//Propriété de la classe

//     public function setOperation(string $operation) {//Méthode de la classe
//         if(in_array($operation, self::AUTHORIZED_OPERATIONS) === false) {
//             return;
//         }
        
//         $this->operation = $operation;
//     }

//     public function setNumberLeft(int $numberLeft) {//Méthode de la classe
//         $this->numberLeft = $numberLeft;
//     }

//     public function setNumberRight(int $numberRight) {//Méthode de la classe
//         $this->numberRight = $numberRight;
//     }

//     public function addition(): int {//Méthode de la classe
//         $this->result = $this->numberLeft + $this->numberRight;
//         return $this->result;
//     }

//     public function soustraction(): int {//Méthode de la classe
//         $this->result = $this->numberLeft - $this->numberRight;
//         return $this->result;
//     }

//     public function multiplication(): int {//Méthode de la classe
//         $this->result = $this->numberLeft * $this->numberRight;
//         return $this->result;
//     }

//     public function division(): float|null {//Méthode de la classe
//         if($this->numberRight === 0) {
//             return null;
//         }
//         $this->result = $this->numberLeft / $this->numberRight;
//         return $this->result;
//     }

//     public function power(): int {//Méthode de la classe
//         $this->result = $this->numberLeft ** $this->numberRight;
//         return $this->result;
//     }
// }


if(isset($_POST['submit'])){
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    $errors = [];
    
    if(empty($email) || empty($password)){//verifie si les champs sont vides
        ?>
        <p>
            <?php
                echo "Tous les champs n'ont pas été remplis <br />";
            ?>
        <?php
    }else if(is_registered($email, $password, 'admin')){//verifie si l'utilisateur est un admin
        $_SESSION['admin'] = $email;
        header("Location: index.php?page=dashboard");
    }else if(is_registered($email, $password, 'user')){//verifie si l'utilisateur est un user{
        $_SESSION['user'] = $email;
        header("Location: index.php?page=blog");
    }else{
        ?>
        <p>Identifiants incorrects</p>
        <?php
    }
}

?>