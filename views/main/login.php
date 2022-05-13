<!DOCTYPE html>
<html lang="en">
  <?php
  error_reporting(0);
  $usuError = true;
  $passError = true;
  $dataError = true;
  $cuentaError = true;
  $correctoReg = true;
  $cuentaError = $_GET['cuentaError'];
  $usuError = $_GET['usuError'];
  $passError = $_GET['passError'];
  $dataError = $_GET['dataError'];
  $correctoReg = $_GET['correctoReg'];
  ?>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Iniciar sessión</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/css/app.min.css">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/css/style.css">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/css/Estilos.css">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/css/custom.css">
  <link rel="icon" href="<?php echo constant('URL') ?>resources/resources/img/llave.png">
</head>

<body>
  <div class="loader"></div>
  <div id="app">
  <?php 
    if ($dataError == true) { 
                      echo "<div id='spanerror'>Error, Debe ingresar los datos requeridos</div>";
    }
    elseif ($correctoReg == true) {
      echo "<div id='spanerror2'>Cuenta registrada</div>";
     }?>      
                       
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
            <?php 
                    if ($cuentaError == true) { 
                      echo "<span id='errorusu'>Error, Cuenta de usuario no existe</span>";
                       }?> 
                       <br>  
            <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="<?php echo constant("URL") ?>main/validarLogeo">
                  <div class="form-group">
                    <?php 
                    if ($usuError == true) { 
                      echo "<span id='errorusu'>Error, Debe ingresar un usuario</span>";
                       }?>      
                       <br>              
                    <label for="email">Usuario: </label>
                    <input id="email" type="text" class="form-control" name="usuario" required autofocus>
                    <div class="invalid-feedback">
                      Por favor ingresa tus usuario
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                    <?php 
                    if ($passError == true) { 
                      echo "<span id='errorusu'>Error, Debe ingresar una contraseña</span>";
                       }?>
                      <label for="password" class="control-label">Contraseña: </label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" required>
                    <div class="invalid-feedback">
                      Por favor ingresa tu contraseña
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Iniciar sesión
                    </button>
                  </div>
                </form>
                <div class="text-center mt-4 mb-3">
                  <div class="text-job text-muted">Login With Social</div>
                </div>
                <div class="row sm-gutters">
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-facebook">
                      <span class="fab fa-facebook"></span> Facebook
                    </a>
                  </div>
                  <div class="col-6">
                    <a class="btn btn-block btn-social btn-twitter">
                      <span class="fab fa-twitter"></span> Twitter
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              No tienes un usuario <a href="<?php echo constant("URL")?>main/principalRegistro">Registrate</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="<?php echo constant('URL') ?>resources/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?php echo constant('URL') ?>resources/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?php echo constant('URL') ?>resources/assets/js/custom.js"></script>
</body>
<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>