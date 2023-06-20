<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">   
</head>
<body>    
    <div class="position-relative">
        <div class="position-absolute m-5">
            <h2 class="pl-5 pt-5 display-1 text-dark">Галерея изображений</h2>
            <?php if (isset($_COOKIE['user_id'])): ?>
            <a class="btn btn-dark m-5" href="index.php?url=add"> Добавить изображение</a>
            <?php endif ?>
        </div>   
        <img src="./public_html/img/img1.jpg" class="img-fluid" alt="">    
    </div>
    <?php require 'engine/controllers/images.php'?>        
</body>
</html>
