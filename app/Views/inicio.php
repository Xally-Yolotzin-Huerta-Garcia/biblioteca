<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  </head>
  <body>

  <!--empieza contenido barra de navegacion-->

  <nav class="navbar navbar-expand bg-info">
  <div class="container-fluid">
  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="navbar-brand text-white" aria-current="page" href="#">Biblioteca</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Opciones
          </a>
          <ul class="dropdown-menu bg-light">
            <li><a class="dropdown-item" href="#"><i class="bi bi-gear-wide-connected"></i> Configuración</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-left"></i> Cerrar sesión</a></li>
          </ul>
        </li>
       
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Busca tu libro aqui" aria-label="Search">
        <button class="btn btn-success" type="submit"><i class="bi bi-search"></i></button>
      </form>
    </div>
  </div>
</nav>

<!--empieza contenido tabla-->
    <div class="container">
      <h3 class="text-center mt-5"> Libros disponibles</h3>
    <div class="mt-5">
      <a href="<?php echo base_url('/create')?>" class="btn btn-info text-white">
        <i class="bi bi-journal-plus"></i>
        Agregar
</a>
    </div>
      <div class="table-responsive rounded d-flex justify-content-center align-items-center">
      
        <table class="table table-light">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Titulo</th>
              <th scope="col">Autor</th>
              <th scope="col">Editorial</th>
              
              <th scope="col">Precio</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($libros as $libro): ?>
            <tr class="">
              <td><?=$libro['id'];?></td>
              <td><?=$libro['titulo'];?></td>
              <td><?=$libro['autor'];?></td>
              <td><?=$libro['editorial'];?></td>
             
              <td><?=$libro['precio'];?></td>
              <td><a href="<?=base_url('edit/'.$libro['id']);?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
              <a href="<?=base_url('delete/'.$libro['id']);?>" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a></td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>
      
    </div>
    
    <!-- empieza contenido modal

    <div class="modal" tabindex="-1" id="guardar">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </div>  termina contenido modal-->
    
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>