<!DOCTYPE html>
<html lang="en">

<?php
error_reporting(0);
$cuentaEx = true;
$dataError = true;
$passError = true;
$cuentaEx = $_GET['usuarioEx'];
$dataError = $_GET['dataError'];
$passError = $_GET['passError'];
?>
<!-- auth-register.html  21 Nov 2019 04:05:01 GMT -->
<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Otika - Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/css/app.min.css">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/css/components.css">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/css/Estilos.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?php echo constant('URL') ?>resources/assets/img/favicon.ico' />
</head>
<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
            <?php 
                    if ($cuentaEx == true) { 
                      echo "<span id='errorusu'>Error, Cuenta de usuario ya existe</span>";
                       }elseif ($dataError == true) {
                        echo "<span id='errorusu'>Error, Debes llenar todos los campos</span>";
                       }?> 
                       <br> 
              <div class="card-header">
                <h4>Register</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="<?php echo constant("URL") ?>main/validarRegistro">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">Nombre: </label>
                      <input id="frist_name" type="text" class="form-control" name="name" autofocus required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Usuario</label>
                    <input id="email" type="text" class="form-control" name="usuarioN" required>
                    <div class="invalid-feedback">
                    </div>
                  </div>
                  <?php 
                    if ($passError == true) { 
                      echo "<span id='errorusu'>Error, Contraseñas no coinciden</span>";
                    }?> 
                       <br>
                  <div class="row"> 
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Contraseña: </label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator"
                        name="password" required>
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Confirme contraseña: </label>
                      <input id="password2" type="password" class="form-control" name="passConfirm" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Registrar
                    </button>
                  </div>
                </form>
              </div>
              <div class="mb-4 text-muted text-center">
                ¿Ya te has registrado? <a href="<?php echo constant("URL")?>main/principalIniciar">Iniciar sesión</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>
 <!-- General JS Scripts -->
 <script src="<?php echo constant('URL') ?>resources/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?php echo constant('URL') ?>resources/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo constant('URL') ?>resources/assets/js/custom.js"></script>
</html>
