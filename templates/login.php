<?php $url = $_SERVER['REQUEST_URI']; ?>

<!DOCTYPE html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">   
</head>
<body>
    <div class="container my-5">
        <h4 class="text-center text-dark">Авторизация</h4>
        <?php               
        if (isset($_SESSION['errorsAuth'])): 
        $errorsAuth = $_SESSION['errorsAuth'];
        if (!empty($errorsAuth)): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errorsAuth as $error): ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif;                
        endif; ?>
        <div class="row justify-content-center my-3">                
            <div class="col-4 mb-5 pb-5">
                <form action="<?php echo $url; ?>" method="POST" id="login">                        
                    <div class="form-group">
                        <label for="login">Логин</label>
                        <input type="text" class="form-control" id="login" name="login" aria-describedby="emailHelp" placeholder="Введите логин">
                        <div class="form-control-feedback"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
                        <div class="form-control-feedback"></div>
                    </div>
                    <input type="submit" class="btn btn-primary my-5" name="submit"  value="Войти">
                    <a href="<?php echo $url; ?>" class="btn btn-secondary ml-3">Сброс</a>
                    <div class="form-group my-3">
                        <a class="link mb-5" href="index.php?url=register">Зарегистрироваться</a>
                    </div>
                </form>
            </div>
        </div>            
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./assets/js/form.js"></script>
</body>
</html>
