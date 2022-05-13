<?php require "views/templates/header.php"; ?>

<!-- ##### Breadcumb Area Start ##### -->
<section class="breadcumb-area bg-img bg-overlay" style="background-image: url(<?php echo constant('URL') ?>resources/resources/img/bg-img/breadcumb3.jpg);">
    <div class="bradcumbContent">
        <p></p>
        <h2>Eventos</h2>
    </div>
</section>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Blog Area Start ##### -->
<div class="blog-area section-padding-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-9">
                <?php
                foreach ($this->listaEvento as $evento) {
                    $fecha = strtotime($evento->getFecha_evento());
                    setlocale(LC_ALL, 'es_CO.UTF-8');
                    $dia = date("d", $fecha);
                    $mes = date("m", $fecha);
                    $año = date("Y", $fecha);
                    $date = DateTime::createFromFormat('!m', $mes);
                    $month = $date->format('F');

                    $fechap = strtotime($evento->getFecha_publicacion());
                    setlocale(LC_ALL, 'es_CO.UTF-8');
                    $diap = date("d", $fechap);
                    $mesp = date("m", $fechap);
                    $añop = date("Y", $fechap);
                    $datep = DateTime::createFromFormat('!m', $mesp);
                    $monthp = $date->format('F');
                ?>
                    <!-- Single Post Start -->
                    <div class="single-blog-post mb-100 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Post Thumb -->
                        <div class="blog-post-thumb mt-30">
                            <a href="#"><img src="<?php echo constant('URL') ?>resources/eventos/<?php echo $evento->getImg(); ?>" alt=""></a>
                            <!-- Post Date -->
                            <div class="post-date">
                                <span><?php echo $dia; ?></span>
                                <span><?php echo $month . " '" . $año; ?></span>
                            </div>
                        </div>

                        <!-- Blog Content -->
                        <div class="blog-content">
                            <!-- Post Title -->
                            <a href="#" class="post-title"><?php echo $evento->getTitulo(); ?></a>
                            <!-- Post Meta -->
                            <div class="post-meta d-flex mb-30">
                                <p class="post-author">By<a href="#"> <?php echo $evento->getId_usuario()->getNombre(); ?></a></p>
                                <p class="tags">in<a href="#"> Events</a></p>
                                <p class="tags"><a href="#">Publicado: <?php echo $monthp . " " . $diap . " " . $añop; ?></a></p>
                            </div>
                            <!-- Post Excerpt -->
                            <p><?php echo $evento->getDescripcion(); ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>



            </div>

            <div class="col-12 col-lg-3">
                <div class="blog-sidebar-area">

                    <!-- Widget Area -->
                    <div class="single-widget-area mb-30">
                        <div class="widget-title">
                            <h5>Categories</h5>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <li><a href="#">Music</a></li>
                                <li><a href="#">Events &amp; Press</a></li>
                                <li><a href="#">Festivals</a></li>
                                <li><a href="#">Lyfestyle</a></li>
                                <li><a href="#">Uncategorized</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Widget Area -->
                    <div class="single-widget-area mb-30">
                        <div class="widget-title">
                            <h5>Archive</h5>
                        </div>
                        <div class="widget-content">
                            <ul>
                                <?php
                                foreach ($this->listaEvento as $evento) {
                                    $fecha = strtotime($evento->getFecha_evento());
                                    setlocale(LC_ALL, 'es_CO.UTF-8');
                                    $dia = date("d", $fecha);
                                    $mes = date("m", $fecha);
                                    $año = date("Y", $fecha);
                                    $date = DateTime::createFromFormat('!m', $mes);
                                    $month = $date->format('F');

                                ?>
                                    <li><a href="#"> <?php echo $month . " " . $dia . " " . $año; ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Blog Area End ##### -->


<?php require "views/templates/footer.php"; ?>