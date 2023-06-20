<?php

if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_hash']))
{    
    $user_id = intval($_COOKIE['user_id']);    
    $data = get_user_by_id($user_id);    
 
    if (($data['hash'] !== $_COOKIE['user_hash']) || ($data['id'] !== $_COOKIE['user_id'])) {

        setcookie("user_id", "", time() - 3600*24*30*12, "/");
        setcookie("user_hash", "", time() - 3600*24*30*12, "/", null, null, true); 
        header("Location: /engine/controllers/login.php"); exit();
        
    } else {
        header("Location: ../../index.php"); exit();
    }
}
