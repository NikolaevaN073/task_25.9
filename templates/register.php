<?php $url = $_SERVER['REQUEST_URI']; ?>

<!DOCTYPE html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" 
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">  
</head>
<body>
    <div class="container my-5">
        <h4 class="text-center text-dark">Регистрация</h4>
        <?php               
        if (isset($_SESSION['errorsReg'])): 
            $errorsReg = $_SESSION['errorsReg'];
            if (!empty($errorsReg)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errorsReg as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif;
        endif; ?>
        <div class="row justify-content-center pb-5">
            <div class="col-4 my-5">
                <form action="<?php echo $url; ?>" method="POST" id="registration">                    
                    <div class="form-group">
                        <label for="login">Логин</label>
                        <input type="text" class="form-control" id="login" name="login" aria-describedby="emailHelp" placeholder="Введите логин" required>
                        <div class="form-control-feedback"></div>
                    </div>                    
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Пароль" required>
                        <div class="form-control-feedback"></div>
                    </div>                    
                    <input type="submit" class="btn btn-primary my-5" name="submit"  value="Зарегистрироваться">
                    <a href="<?php echo $url; ?>" class="btn btn-secondary ml-3">Сброс</a>
                </form>
            </div>
        </div>            
    </div>    
</body>
</html>
