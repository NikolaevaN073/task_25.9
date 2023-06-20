<?php

$errorsAuth = [];
$_SESSION['errorsAuth'] = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {  
    
    $login = $_POST['login'];
    $password = md5(md5(trim($_POST['password'])));

    if (!check_login_exists($login)) {
        $errorsAuth[] = 'Неверный логин';
        
    } else {
        $user_data = get_user_by_login($login);

        if ($user_data['password'] === $password) {
            $hash = md5(generate_сode(10));
            add_hash($user_data['id'], $hash);

            setcookie('user_id', $user_data['id'], time() + 60 + 60 + 24 + 30, '/');
            setcookie('user_hash', $hash, time() + 60 + 60 + 24 + 30, '/',  null, null, true);

            header("Location: ../../index.php"); exit();            
            
        } else {
            $errorsAuth[] = 'Неверный пароль';
        }
    }    

    if (!empty($errorsAuth)) {           
        $_SESSION['errorsAuth'] = $errorsAuth; 
    } 
}

generate_view('login.php', 'tmp.php');
