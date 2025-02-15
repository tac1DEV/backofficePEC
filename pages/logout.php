<?php

unset($_SESSION['admin']);
unset($_SESSION['user']);
    header('Location: index.php?page=blog');
?>