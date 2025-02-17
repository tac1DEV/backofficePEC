<?php


// require_once './calculator.php';
require_once './login.php';

// $calculator = new Calculator();
$login = new Login();
// $calculator->setOperation($_GET['operation']);
// $calculator->setNumberLeft($_GET['numberLeft']);
// $calculator->setNumberRight($_GET['numberRight']);


// if($calculator->operation === null) {
//     echo 'Operation invalide';
//     return;
// }


// $calculator->{$calculator->operation}();


// if($calculator->result === null) {
//     echo 'something went wrong';
//     return;
// }

// echo $calculator->result;

?>
<h4>Se connecter</h4>
<form method="post" class="flex flex-col">
<label for="email">Adresse email</label>
    <input type="email" id="email" name="email" placeholder="Email" />
    <label for="email">Mot de passe</label>
    <input type="password" id="password" name="password" placeholder="Mot de passe" />
    <input type="submit" name="submit" value="Se connecter" />
</form>
