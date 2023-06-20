<?php

$errorsReg = [];
$_SESSION['errorsReg'] = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {     
    
    $errorsReg = check_userdata_before_register($_POST);

    if (empty($errorsReg)) {
        $user_data = [
            'login' => $_POST['login'],
            'password' => md5(md5(trim($_POST['password'])))
        ];     

        $values = [
            $user_data['login'],
            $user_data['password']
        ];   

        insert_user_data ($values);                 
        header("Location: ../../index.php"); exit();

    } else {
        $_SESSION['errorsReg'] = $errorsReg; 
    }   
}

generate_view('register.php', 'tmp.php');
