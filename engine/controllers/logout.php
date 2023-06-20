<?php

unset($_SESSION['login']);
unset($_COOKIE['user_id']);
setcookie('user_id', null, -1, '/');
unset($_COOKIE['user_hash']);
setcookie('user_hash', null, -1, '/');
header('Location: ../../index.php'); 
