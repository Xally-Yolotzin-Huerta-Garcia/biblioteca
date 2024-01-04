<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body class="bg-info d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white p-5 rounded-5" style="width: 25rem">
      <form action="<?php echo base_url('/login')?>" method="post">
      <?= csrf_field() ?>
      <div class="d-flex justify-content-center">
        <img  src="<?= base_url('assets/login.png'); ?>" alt="login-icon" style="height: 7rem">
      </div>
      <div class="text-center fs-1 fw-bold">Login</div>
      <div class="input-group mt-3">
        <div class="input-group-text bg-info">
          <img src="<?= base_url('assets/usuario.png'); ?>" alt="user-icon" style="height:1rem">
        </div>
        <input class="form-control" type="email" name="correo" placeholder="Correo" required>
      </div>
      <div class="input-group mt-1">
        <div class="input-group-text bg-info">
          <img src="<?= base_url('assets/password.png'); ?>" alt="password-icon" style="height:1rem">
        </div>
        <input class="form-control" type="password" name="password" placeholder="Contraseña" required>
      </div>
      <div class="text-danger text-center">
    <?php if (isset($error)) : ?>
        <?= $error ?>
    <?php endif; ?>
</div>
      <div>
        <button class="btn btn-info w-100 text-white mt-3">Entrar</button>
      </div>
      <div class="pt-1">
        <a class="text-decoration-none text-info fst-italic" href="<?php echo base_url('/forgotPassword')?>">Olvidaste tu contraseña?</a>
      </div>
      </form>
    </div><!--div container-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>