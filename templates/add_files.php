<?php $url = $_SERVER['REQUEST_URI']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Загрузка файлов</title>
</head>
<body>
    <div class="container py-5 my-5">
        <h1 class="mb-4">Загрузка файлов</h1>
        <?php 
        $errors = $_SESSION['errors'];    
        if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif;

        if (!empty($_FILES) && empty($errors)): ?>
            <div class="alert alert-success">Файлы успешно загружены</div>
        <?php endif; ?>

        <div class="my-5">
            <form action="<?php echo $url; ?>" method="post" enctype="multipart/form-data">
                <div class="custom-file mb-5">
                    <input type="file" class="custom-file-input" name="files[]" id="customFile" multiple required>
                    <label class="custom-file-label" for="customFile" data-browse="Выбрать">Выберите файлы</label>
                    <small class="form-text text-muted">
                        Максимальный размер файла: <?php echo UPLOAD_MAX_SIZE / 1000000; ?>Мб.
                        Допустимые форматы: <?php echo implode(', ', ALLOWED_TYPES) ?>.
                    </small>
                </div>
                <hr>
                <div class="my-5 pb-5">
                    <button type="submit" class="btn btn-primary">Загрузить</button>
                    <a href="<?php echo $url; ?>" class="btn btn-secondary ml-3">Сброс</a>
                </div>        
            </form>
        </div>        
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input@1.3.4/dist/bs-custom-file-input.min.js"></script>
    <script>
        $(() => {
            bsCustomFileInput.init();
        })
    </script>
</body>
</html>
