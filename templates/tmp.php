<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Галерея изображений</title>
</head>
<body>    
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f1f9ff;">
        <a href="/"><span class="navbar-brand mb-0 h1 ml-5 pl-5">Галерея.ru</span></a>         
        <div class="collapse navbar-collapse justify-content-end mr-5" id="navbarNav"> 
            <ul class="d-flex">   
                <li class="nav-item" style="list-style-type: none;">
                <?php if (isset($_COOKIE['user_id'])): ?>
                    <a class="nav-link" href="index.php?url=logout">Выйти</a>
                <?php else :?>
                    <a class="nav-link" href="index.php?url=login">Вход</a>                    
                <?php endif; ?>
                </li>
                <li class="nav-item" style="list-style-type: none;">
                    <a class="nav-link" href="index.php?url=register">Регистрация</a>
                </li>      
            </ul>
        </div>
    </nav>   
    <?php require $content_view; ?>
    <div class="border-top border-dark py-3" style="background-color: #f1f9ff;">
        <p class="text-center text-dark">Галерея изображений. 2023</p>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" 
        crossorigin="anonymous">
    </script>
</body>
</html>
