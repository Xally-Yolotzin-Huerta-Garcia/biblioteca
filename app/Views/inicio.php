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
            <li><a class="dropdown-item" href="<?= site_url('/logout') ?>"><i class="bi bi-box-arrow-left"></i> Cerrar sesión</a></li>
          </ul>
        </li>
       
      </ul>
      <form class="d-flex" role="search">
      <input id="searchInput" class="form-control me-2" type="search" placeholder="Busca tu libro aquí" aria-label="Search">
      <button id="searchBtn" class="btn btn-success" type="button"><i class="bi bi-search"></i></button>
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
              <a href="#" class="btn btn-danger delete-book"
                data-id="<?= $libro['id']; ?>"
                data-title="<?= $libro['titulo']; ?>"
                data-bs-toggle="modal" data-bs-target="#deleteModal">
                <i class="bi bi-trash3-fill"></i>
              </a>

            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
      </div>

        <!-- Modal de confirmación -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                ¿Estás seguro de que quieres eliminar este libro?
                <p id="bookTitleToDelete"></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <!-- Botón de confirmación dentro del modal -->
                <button type="button" class="btn btn-danger" id="confirmDeleteBtnModal">Eliminar</button>
              </div>
            </div>
          </div>
        </div>
    </div>

    <!-- script de confirmación -->
    <script>
  document.addEventListener("DOMContentLoaded", function() {
    const deleteButtons = document.querySelectorAll('.delete-book');
    const confirmDeleteButtonModal = document.getElementById('confirmDeleteBtnModal');
    const bookTitleToDeleteElement = document.getElementById('bookTitleToDelete');

    let bookIdToDelete = null;
    let bookTitleToDelete = null;

    deleteButtons.forEach(deleteButton => {
      deleteButton.addEventListener('click', function(event) {
        event.preventDefault();
        bookIdToDelete = event.currentTarget.getAttribute('data-id');
        bookTitleToDelete = event.currentTarget.getAttribute('data-title');
        const deleteUrl = `<?= base_url('delete/') ?>${bookIdToDelete}`;

        // Actualizar el título del libro en el modal
        bookTitleToDeleteElement.textContent = `Título del libro: ${bookTitleToDelete}`;

        // Mostrar el modal para confirmar la eliminación
        $('#deleteModal').modal('show');
      });
    });

    confirmDeleteButtonModal.addEventListener('click', function(event) {
      event.preventDefault();
      if (bookIdToDelete) {
        const deleteUrl = `<?= base_url('delete/') ?>${bookIdToDelete}`;
        fetch(deleteUrl, {
          method: 'GET',
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        }).then(response => {
          if (response.ok) {
            window.location.reload();
          }
        }).catch(error => {
          console.error('Error al eliminar el libro:', error);
        });
      }
    });
  });
</script>

<!-- script de busqueda de libros -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#searchBtn').click(function() {
      const searchTerm = $('#searchInput').val().trim(); // Obtener el término de búsqueda

      // Realizar la solicitud AJAX al servidor
      $.ajax({
        type: 'GET',
        url: '<?= base_url('search') ?>', // Ruta a tu controlador o función para buscar libros
        data: { searchTerm: searchTerm }, // Enviar el término de búsqueda al servidor
        success: function(response) {
          // Manipular la respuesta del servidor (lista de libros encontrados)
          console.log(response);
          // Actualizar la vista con los resultados (puedes implementar esto según tus necesidades)
        },
        error: function(error) {
          console.error('Error en la búsqueda:', error);
        }
      });
    });
  });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>