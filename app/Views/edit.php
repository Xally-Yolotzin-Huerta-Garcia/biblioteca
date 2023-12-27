<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-50">
    <div class="container mt-5 bg-white p-5 rounded-5 border" style="width: 40rem"><!--container-->
    <h3 class="text-center">Editar Libro</h3>
        <form action="<?php echo base_url('/update')?>" method="post">
        <?= csrf_field() ?>
        <input type="hidden" name="id" value="<?=$libro['id']?>"/>
            <div class="form-group">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" value="<?=$libro['titulo']?>" name="titulo" id="titulo" class="form-control" />
            </div>
            <div class="form-group">
                <label for="autor" class="form-label">Autor</label>
                <input type="text" value="<?=$libro['autor']?>" name="autor" id="autor" class="form-control" />
            </div>
            <div class="form-group">
                <label for="editorial" class="form-label">Editorial</label>
                <input type="text" value="<?=$libro['editorial']?>" name="editorial" id="editorial" class="form-control" />
            </div>
            <div class="form-group">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" value="<?=$libro['isbn']?>" name="isbn" id="isbn" class="form-control" />
            </div>
            <div class="form-group">
                <label for="precio" class="form-label">Precio</label>
                <input type="text" value="<?=$libro['precio']?>" name="precio" id="precio" class="form-control" />
            </div>
            <div class="mt-2">
                 <button type="submit" class="btn btn-success"><i class="bi bi-check-lg"></i> Guardar</button>
                 <a href="<?=base_url('libros')?>" class="btn btn-secondary"><i class="bi bi-x-lg"></i> Cancelar</a>
            </div>
            
           
            
        </form>
    </div><!-- termina container-->
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>