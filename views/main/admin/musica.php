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
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Insertar</button>
          <h2 class="section-title">Musica</h2>
          <div class="row">
            <?php
            foreach($this->musica as $musica){
            ?>
              <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                    <h4 class="d-inline"><?php echo $musica->getCancion();?></h4>
                  </div>
                  <div class="card-body">
                    <ul class="list-unstyled list-unstyled-border">
                      <li class="media">
                        <img alt="image" class="mr-3 rounded-circle" width="50" src="<?php echo constant('URL') ?>resources/musica/<?php echo $musica->getImgm(); ?>">
                        <div class="media-body">
                        <buttom onclick="alerta('<?php echo $musica->getId_musica() ?>')" class="btn btn-danger badge badge-pill badge-danger mb-1 float-right">Eliminar</buttom>
                          <div class="badge badge-pill badge-warning mb-1 float-right">Modificar</div>
                          <h6 class="media-title"><a href="#"><?php echo $musica->getNombre().": ".$musica->getDuracion();?></a></h6>
                          <div class="text-small text-muted"><?php echo $musica->getId_artista()->getNombreartista();?><div class="bullet"></div> 
                          <span class="text-primary"><?php echo $musica->getId_genero()->getGenero();?></span></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <script>
                function alerta(id) {
                  var mensaje;
                  var opcion = confirm("Esta seguro de eliminar este registro");
                  if (opcion == true) {
                    location.href = '<?php echo constant('URL') ?>main/eliminarMusica/' + id;
                  }
                }
              </script>
              <?php
              }
              ?>


            </div>
          
            
           

          </div>
        </section>

        <!-- Vertically Center -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="formModal">Ingresar nuevo evento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="<?php echo constant("URL") ?>main/agregarMusica" method="POST" enctype="multipart/form-data">
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
                  <label>Archivo mp3</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fab fa-itunes-note"></i>
                      </div>
                    </div>
                    <input type="file" class="form-control" name="cancion" id="cancion">
                  </div>
                </div>
                <div class="form-group">
                  <label>Nombre de la canción</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fab fa-itunes-note"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Nombre de la canción" name="nombre" id="nombre">
                  </div>
                </div>
                <div class="form-group">
                  <label>Duración de la canción</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-history"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Duración 0:00" name="tiempo" id="tiempo">
                  </div>
                </div>
                <div class="form-group">
                  <label>Artista</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fab fa-itunes-note"></i>
                      </div>
                    </div>
                    <select name="artista" id="artista" class="form-control select2" style="width: 80%;">
                      <?php
                      foreach($this->listaArtista as $artista){
                      ?>
                      <option value="<?php echo $artista->getId_artista() ?>"><?php echo $artista->getNombreartista() ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label>Genero</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fab fa-itunes-note"></i>
                      </div>
                    </div>
                    <select name="genero" id="genero" class="form-control select2" style="width: 80%;">
                      <?php
                      foreach($this->listaGenero as $genero){
                      ?>
                      <option  value="<?php echo $genero->getId_genero() ?>"><?php echo $genero->getGenero() ?></option>
                      <?php
                      }
                      ?>
                    </select>
                    </select>
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