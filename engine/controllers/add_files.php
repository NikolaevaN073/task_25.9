<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_COOKIE['user_id'])) {
        $errors = check_files($_FILES);    
        $filename = $_FILES['files']['name'];  
        $user_id = intval($_COOKIE['user_id']);  

        if(isset($filename) && !empty($filename)){            
            $location = UPLOAD_DIR; 
        }    
        
        $filename = implode(',', $_FILES['files']['name']);
        insert_image($filename, $user_id);

    } else {
        header("Location: engine/controllers/login.php"); exit();
    }    
}    

$_SESSION['errors'] = $errors;

generate_view('add_files.php', 'tmp.php');
