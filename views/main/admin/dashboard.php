<?php require "views/templates/head.php"; ?>
<div ></div>
<div id="app">
  <div class="main-wrapper main-wrapper-1">
    <div class="navbar-bg"></div>
    <?php require "views/templates/nav.php"; ?>
    <?php require "views/templates/sidebar.php"; ?>
    <!-- Main Content -->
    <div class="main-content">
      <section class="section">
        <div class="row ">
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                  <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                      <div class="card-content">
                        <h5 class="font-15">Eventos</h5>
                        <h2 class="mb-3 font-18"><?php echo sizeof($this->listaEvento);?> </h2>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                      <div class="banner-img">
                        <img src="<?php echo constant('URL') ?>resources/assets/img/banner/1.png" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                  <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                      <div class="card-content">
                        <h5 class="font-15"> Musica</h5>
                        <h2 class="mb-3 font-18"><?php echo sizeof($this->musica);?></h2>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                      <div class="banner-img">
                        <img src="<?php echo constant('URL') ?>resources/assets/img/banner/5.png" alt="" height="95px">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                  <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                      <div class="card-content">
                        <h5 class="font-15">Artistas</h5>
                        <h2 class="mb-3 font-18"><?php echo sizeof($this->listaArtista);?></h2>
                         
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                      <div class="banner-img">
                        <img src="<?php echo constant('URL') ?>resources/assets/img/banner/6.png" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="card">
              <div class="card-statistic-4">
                <div class="align-items-center justify-content-between">
                  <div class="row ">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                      <div class="card-content">
                        <h5 class="font-15">Mensajes</h5>
                        <h2 class="mb-3 font-18">$48,697</h2>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                      <div class="banner-img">
                        <img src="<?php echo constant('URL') ?>resources/assets/img/banner/7.png" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Eventos</h4>

              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <tr>
                      <th>Titulo</th>
                      <th>Imagen</th>
                      <th>Fecha del evento</th>
                      <th>Fecha de publicación</th>
                      <th>Quien lo publico</th>
                      <th>Action</th>
                    </tr>
                    <?php

                    foreach ($this->listaEvento as $lista) {
                    ?>
                      <tr>
                        <td><?php echo $lista->getTitulo();?></td>
                        <td class="text-truncate">
                          <ul class="list-unstyled order-list m-b-0 m-b-0">
                            <li class="team-member team-member-sm"><img class="rounded-circle" src="<?php echo constant('URL') ?>resources/eventos/<?php echo $lista->getImg(); ?>" alt="user" data-toggle="tooltip" title="" data-original-title="<?php echo $lista->getTitulo();?>"></li>

                          </ul>
                        </td>
                        <td><?php echo $lista->getFecha_evento();?></td>
                        <td><?php echo $lista->getFecha_publicacion();?></td>
                        <td>
                          <div class="badge badge-success"><?php echo $lista->getId_usuario()->getNombre();?></div>
                        </td>
                        <td><a href="#" class="btn btn-outline-primary">Detail</a></td>
                      </tr>


                    <?php
                    }

                    ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-12 col-xl-6">
            <!-- Support tickets -->
            <div class="card">
              <div class="card-header">
                <h4>Canciones</h4>
              </div>
              <a href="javascript:void(0)" class="card-footer card-link text-center small ">View All</a>
             <?php 
             foreach($this->musica as $musica){
             ?>
              <div class="card-body">
                <div class="support-ticket media pb-1 mb-3">
                  <img src="<?php echo constant('URL') ?>resources/musica/<?php echo $musica->getImgm();?>" class="user-img mr-2" alt="imgen">
                  <div class="media-body ml-3">
                  <div class="badge badge-danger mb-1 float-right">Duración: <?php echo $musica->getDuracion();?></div>
                    <span class="font-weight-bold">#<?php echo $musica->getId_musica();?></span>
                    <a href="javascript:void(0)">Genero: <?php echo $musica->getId_genero()->getGenero();?></a>
                    <p class="my-1"><?php echo $musica->getNombre();?></p>
                    <small class="text-muted">Artista: <span class="font-weight-bold font-13"><?php echo $musica->getId_artista()->getNombreartista();?></span>
                      &nbsp;&nbsp;</small>
                  </div>
                </div>

              </div>
             <?php
            }
            ?>
            
            </div>
            <!-- Support tickets -->
          </div>
          <div class="col-md-6 col-lg-12 col-xl-6">
            <div class="card">
              <div class="card-header">
                <h4>Artistas</h4>
              </div>
              <a class="card-footer card-link text-center small " href="<?php echo constant("URL")?>main/principalArtista">View All</a>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Imagen</th>
                        <th>Nombre del artista</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      foreach($this->listaArtista as $artista){
                      ?>
                      <tr>
                        <td><?php echo $artista->getId_artista();?></td>
                        <td class="text-truncate">
                          <ul class="list-unstyled order-list m-b-0 m-b-0">
                            <li class="team-member team-member-sm"><img class="rounded-circle" src="<?php echo constant('URL') ?>resources/artistas/<?php echo $artista->getImg(); ?>" alt="user" data-toggle="tooltip" title="" data-original-title="<?php echo $artista->getNombreartista();?>"></li>

                          </ul>
                        </td>
                        <td><?php echo $artista->getNombreartista();?></td>
                       
                      </tr>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>

              </div>
              
            </div>

          </div>
        </div>
      </section>



    </div>
  </div>
  <?php require "views/templates/fin.php"; ?>
