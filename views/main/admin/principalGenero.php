<?php require "views/templates/head.php"; ?>
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <div class="navbar-bg"></div>
    <?php require "views/templates/nav.php"; ?>
    <?php require "views/templates/sidebar.php"; ?>
    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <div class="section-body">
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card l-bg-green">
                <div class="card-statistic-3">
                  <div class="card-icon card-icon-large"><i class="fa fa-award"></i></div>
                  <div class="card-content">
                    <h4 class="card-title">Cantidad de generors musicales</h4>
                    <span><?php echo sizeof($this->listaGenero); ?></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Insertar</button>
          <br><br>
          <div class="row">
            <div class="col-lg-8 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Generos musicales</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>Tipo de genero</th>
                        <th>Action</th>

                      </tr>

                      <tr>
                        <?php
                        foreach ($this->listaGenero as $genero) {
                        ?>
                          <td><?php echo $genero->getGenero()?></td>
                          <td>
                            <button class="btn btn-primary btn-action mr-1" onclick="modificar('<?php echo $genero->getId_genero();?>','<?php echo $genero->getGenero();?>')"><i class="fas fa-pencil-alt"></i></button>
                            <a class="btn btn-danger btn-action" onclick="alerta('<?php echo $genero->getId_genero() ?>')"><i class="fas fa-trash"></i></a>
                          </td>

                      </tr>
                      <script>
                        function alerta(id) {
                          var mensaje;
                          var opcion = confirm("Esta seguro de eliminar este registro");
                          if (opcion == true) {
                            location.href = '<?php echo constant('URL') ?>main/eliminarMusica/' + id;
                          }
                        }
                      </script>

                      <script>
                       function modificar(id, genero){
                         document.getElementById("id").value = id;
                         document.getElementById("genero").value = genero;
                         document.getElementById("modi").action = "<?php echo constant("URL") ?>main/modificarGenero";
                         var btn = document.getElementById("modi");
                         btn.click();
                       }
                      </script>
                    <?php
                        }
                    ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>


        </div>



      </section>



      <!-- Vertically Center -->
      <div hidden>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModificar" id="modi">Insertar</button>
      </div>
  <div class="modal fade" id="exampleModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModificarTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="formModal">Modificar genero</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="<?php echo constant("URL") ?>main/modificarGenero" method="POST" >
              <input type="hidden" name="id" id="id" value="">
                <div class="form-group">
                  <label>Nombre del genero</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-plus-circle"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre del genero" name="genero" id="genero" value="">
                  </div>
                </div>
                <button type="subtmit" class="btn btn-primary m-t-15 waves-effect">Modificar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- fin -->
        


  <!-- Vertically Center -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="formModal">Ingresar nuevo genero</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="<?php echo constant("URL") ?>main/agregarGenero" method="POST">
              
                <div class="form-group">
                  <label>Nombre del genero</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-plus-circle"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre del genero" name="genero" id="genero">
                  </div>
                </div>
                <button type="subtmit" class="btn btn-primary m-t-15 waves-effect">Insertar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- fin -->

      
    </div>
    <?php require "views/templates/fin.php"; ?>