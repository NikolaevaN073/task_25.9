<?php

if (isset($_COOKIE['id'])) {
    $add_files = true;
}

generate_view('main.php', 'tmp.php');
