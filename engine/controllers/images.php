<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {   

    if (isset($_POST['id']) && isset($_POST['filename'])) {  
                 
        $home = $_SERVER["DOCUMENT_ROOT"];
        $filename = $home.'/'.$_POST['filename'];
       
        if (file_exists($filename)) {        
            unlink($filename);                
        }   

        delete_image(intval($_POST['id']));                
        header('Location: ../../index.php');

    } else {
        header("Location: engine/controllers/login.php"); exit();
    }   
}

include 'templates/images.php';
