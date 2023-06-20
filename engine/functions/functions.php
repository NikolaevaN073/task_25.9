<?php

/**
 * Create controllers 
 *
 * @return void
 */

function route()
{
    $controller_name = 'Main';
        
    if ( !empty($_GET['url']) ) {	
        $controller_name = $_GET['url'];
    }    
    
    $controller_file = strtolower($controller_name).'.php';
    $controller_path = "engine/controllers/".$controller_file;

    if(file_exists($controller_path)) {
        include "engine/controllers/".$controller_file;
    } else {			
        ErrorPage404();
    }
}

/**
 * Redirect 404 error pages
 *
 * @return void
 */

function ErrorPage404()
{
    $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
    header('HTTP/1.1 404 Not Found');
    header("Status: 404 Not Found");
    header('Location:'.$host.'404');
}

/**
 * Generates a template view
 * 
 * @param string    $content_view   plug-in template view
 * @param string    $tmp_view       default template view
 *
 * @return void
 */

function generate_view (string $content_view, string $tmp_view) 
{
    include 'templates/'.$tmp_view;
}

/**
 * Verification of user data before registration
 * 
 * @param array    $data   User data
 *
 * @return array   errors
 */

function check_userdata_before_register (array $data)
{
    $err = [];
    
    if(!preg_match("/^[a-zA-Z0-9]+$/",$data['login'])) {
        $err[] = "Логин может состоять только из букв английского алфавита и цифр";
    } 

    if(strlen($data['login']) < 3 || strlen($data['login']) > 30) {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    } 

    if (check_login_exists($data['login'])) {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }  
    
    if(strlen($data['password']) < 6) {
        $err[] = "Пароль должен быть не меньше 6-ти символов";
    } 
    
    return $err;
}

/**
 * Generating a random string
 * 
 * @param int       $length   length of string, default = 6
 *
 * @return string   random string
 */

function generate_сode(int $length=6) 
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
} 

/**
 * Checking the existence of a login
 * 
 * @param string    $login   User login
 *
 * @return bool   
 */

function check_login_exists (string $login)
{
    if (get_user_by_login($login)) {
        return true;
    }
    return false;
}

/**
 * Checking files for errors before saving
 * 
 * @param array    $files   Files data
 *
 * @return array   errors
 */

function check_files (array $files)
{
    $errors = []; 
    if (!empty($files)) {
    
        for ($i = 0; $i < count($files['files']['name']); $i++) {    
            $fileName = $files['files']['name'][$i];
    
            if ($files['files']['size'][$i] > UPLOAD_MAX_SIZE) {
                $errors[] = 'Недопустимый размер файла ' . $fileName;
                continue;
            }
    
            if (!in_array($files['files']['type'][$i], ALLOWED_TYPES)) {
                $errors[] = 'Недопустимый формат файла ' . $fileName;
                continue;
            }    
            $filePath = UPLOAD_DIR . '/' . basename($fileName);
    
            if (!move_uploaded_file($files['files']['tmp_name'][$i], $filePath)) {
                $errors[] = 'Ошибка загрузки файла ' . $fileName;
                continue;
            }

            if (file_exists($fileName)) {
                $errors[] = 'Файл с именем ' . $fileName . ' уже существует';
                continue; 
            }
        }
    }
    return $errors;
}
