<?php

require "../../functions/main-functions.php";

$db->exec("UPDATE comments SET seen = '1' WHERE id = '{$_POST['id']}'");
header('Location: ../index.php?page=dashboard');
exit();
?>