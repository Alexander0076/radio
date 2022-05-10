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
          <h2 class="section-title">Eventos</h2>
          <div class="row">
            <?php
            foreach ($this->listaEvento as $evento) {
            ?>
              <div class="col-12 col-md-4 col-lg-4">
                <article class="article article-style-c">
                  <div class="article-header">
                    <div class="article-image" data-background="<?php echo constant('URL') ?>resources/eventos/<?php echo $evento->getImg(); ?>">
                    </div>
                  </div>
                  <div class="article-details">
                    <div class="article-category"><a href="#">Fecha del evento</a>
                      <div class="bullet"></div> <a href="#"><?php echo $evento->getFecha_evento(); ?></a>
                    </div>
                    <div class="article-title">
                      <h2><a href="#"><?php echo $evento->getTitulo(); ?></a></h2>
                    </div>
                    <p><?php echo $evento->getDescripcion(); ?></< /p>
                    <div class="article-user">
                      <img alt="image" src="<?php echo constant('URL') ?>resources/usuarios/<?php echo $evento->getId_usuario()->getFoto(); ?>">
                      <div class="article-user-details">
                        <div class="user-detail-name">
                          <a href="#"><?php echo $evento->getId_usuario()->getNombre(); ?></a>
                        </div>
                        <div class="text-job"><?php echo $evento->getFecha_publicacion(); ?></div>
                      </div>
                    </div>
                  </div>
                </article>
              </div>
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
              <h5 class="modal-title" id="formModal">Ingresar nuevo artista</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="<?php echo constant("URL") ?>main/agregarEvento" method="POST" enctype="multipart/form-data">
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
                  <label>Nombre evento</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-user"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Evento" name="evento" id="evento">
                  </div>
                </div>
                <div class="form-group">
                  <label>rejet</label>
                  <input type="text" class="form-control datepicker" name="fechap">
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