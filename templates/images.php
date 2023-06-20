<?php $url = $_SERVER['REQUEST_URI']; ?>

<!DOCTYPE html>
<body>
    <div class="container">
        <div class="my-5">
            <div class="row row-cols-1 row-cols-md-2">
                <?php
                $images = get_image();      
                foreach ($images as $rows => $row) : ?> 
                <div class="col mb-4"> 
                    <?php if (file_exists(UPLOAD_DIR.'/'.$row['filename'])) : ?>               
                    <div class="card"> 
                        <img src="<?php echo UPLOAD_DIR.'/'.$row['filename'] ?>" class="card-img-top" alt="...">                    
                        <div class="card-body d-flex justify-content-between">                            
                            <a href="#" class="card-link">Комментарии</a>    
                            <?php if (isset($_COOKIE['user_id']) && $_COOKIE['user_id'] == $row['user_id']) : ?>
                            <form action="<?php echo $url; ?>" method="post" class = "card-link">
                                <input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
                                <input type="hidden" name="filename" value="<?php echo UPLOAD_DIR.'/'.$row['filename']  ?>" />                            
                                <input type="submit" name="submit" class="btn btn-outline-danger" value="Удалить">  
                            </form> 
                            <?php endif; ?>                       
                        </div> 
                    </div>  
                    <?php endif ?>              
                </div> 
                <?php endforeach; ?>                   
            </div>
        </div>    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
