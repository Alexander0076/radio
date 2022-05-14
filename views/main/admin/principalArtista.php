<?php require "views/templates/head.php"; ?>
<link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/bundles/bootstrap-social/bootstrap-social.css">
<link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/bundles/owlcarousel2/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/bundles/owlcarousel2/dist/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="<?php echo constant('URL') ?>resources/assets/bundles/summernote/summernote-bs4.css">
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <div class="navbar-bg"></div>
    <?php require "views/templates/nav.php"; ?>
    <?php require "views/templates/sidebar.php"; ?>
    <!-- Main Content -->
    <div class="main-content">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Insertar</button>
      <br><br><br>
      <section class="section">
        <div class="section-body">
          <div class="row">
            <?php
            foreach ($this->listaArtista as $artista) {
              $descripcion = $artista->getDescripcion();
              $descripcion = str_replace("-", " ", $descripcion);
            ?>
              <div class="col-12 col-sm-12 col-lg-7">
                <div class="card author-box card-primary">
                  <div class="card-body">
                    <div class="author-box-left">
                      <input type="hidden" name="id" id="id_artista" value="<?php echo $artista->getId_artista(); ?>">
                      <img alt="image" src="<?php echo constant('URL') ?>resources/artistas/<?php echo $artista->getImg(); ?>" class="rounded-circle author-box-picture">
                      <div class="clearfix"></div>
                    </div>
                    <div class="author-box-details">
                      <div class="author-box-name">
                        <a href="#"><?php echo $artista->getNombreartista(); ?></a>
                      </div>
                      <div class="author-box-job">Artista</div>
                      <div class="author-box-description">
                        <p><?php echo $descripcion; ?></p>
                      </div>

                      <div class="w-100 d-sm-none"></div>
                      <div class="float-right mt-sm-0 mt-3">
                        <!-- <button class="btn" onclick="modificar1('<?php echo $artista->getId_artista() ?>','<?php echo $artista->getNombreartista(); ?>')">Modificar<i class="fas fa-chevron-right"></i></button> -->
                        <buttom onclick="alerta('<?php echo $artista->getId_artista() ?>')" class="btn btn-danger">Eliminar<i class="fas fa-chevron-right"></i></buttom>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <script>
                function alerta(id) {
                  var mensaje;
                  var opcion = confirm("Esta seguro de eliminar este registro");
                  if (opcion == true) {
                    location.href = '<?php echo constant('URL') ?>main/eliminarArtista/' + id;
                  }
                }
              </script>
              <script>
                function modificar1(id1, nombre) {
                  document.getElementById("Id_Artista").value = id1;
                  document.getElementById("nombre").value = nombre;
                  document.getElementById("btnmodificar").action = "<?php echo constant("URL") ?>main/actualizarArtista";
                  var modal1 = document.getElementById("btnmodificar");
                  modal1.click();

                }
              </script>

            <?php
            }
            ?>
            
          </div>
        </div>
        
      </section>

      <div hidden>
              <a style='cursor: pointer;' class="btn" href="#" data-toggle="modal" id="btnmodificar" data-target="#exampleModalModificar">Modificar</a>
            </div>
             <!-- Modal Modificar -->

      <div class="modal fade" id="exampleModalModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalModificarTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="formModal">Modificar artista</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="<?php echo constant("URL") ?>main/actualizarArtista" method="POST" enctype="multipart/form-data">
                <input type="hidden" id="Id_Artista" name="id">
                <div class="form-group" style="margin: 0 20%;">
                  <label style="margin: 0 48%;">Foto</label>
                  <div class="col-sm-12 row-md-12">
                    <div id="image-preview" class="image-preview">
                      <label for="image-upload" id="image-label">Elegir una foto</label>
                      <input type="file" name="image" id="image-upload" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nombre del artista</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-user"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
                  </div>
                </div>

                <div class="form-group">
                  <label>Descripcion</label>
                  <textarea class="summernote-simple form-control" name="descripcion"></textarea>
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
              <h5 class="modal-title" id="formModal">Ingresar nuevo artista</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="<?php echo constant("URL") ?>main/agregarArtista" method="POST" enctype="multipart/form-data">
                <div class="form-group" style="margin: 0 20%;">
                  <label style="margin: 0 48%;">Foto</label>
                  <div class="col-sm-12 row-md-12">
                    <div id="image-preview" class="image-preview">
                      <label for="image-upload" id="image-label">Elegir una foto</label>
                      <input type="file" name="image" id="image-upload" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Nombre del artista</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-user"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre" name="nombre" id="nombre">
                  </div>
                </div>

                <div class="form-group">
                  <label>Descripcion</label>
                  <textarea class="summernote-simple form-control" name="descripcion" id="descripcion"></textarea>
                </div>
                <button type="subtmit" class="btn btn-primary m-t-15 waves-effect">Insertar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- fin -->

     

    </div>

  </div>

  <?php require "views/templates/fin.php"; ?>
