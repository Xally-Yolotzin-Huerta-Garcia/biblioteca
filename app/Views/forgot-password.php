<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body class="bg-info d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white p-5 rounded-5" style="width: 25rem">
      <form action="<?php echo base_url('/inicio')?>" method="post">

      <div class="text-center fs-1 fw-bold">Contraseña olvidada</div>
      <div class="input-group mt-3">
        <div class="input-group-text bg-info">
          <img src="<?= base_url('assets/usuario.png'); ?>" alt="user-icon" style="height:1rem">
        </div>
        <input class="form-control" type="email" name="email" placeholder="Correo" required>
      </div>
      <div>
        <button class="btn btn-info w-100 text-white mt-3">Enviar</button>
      </div>
      </form>
    </div><!--div container-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>