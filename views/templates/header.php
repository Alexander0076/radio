<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Inicio</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/stylecoment.css">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/all.css">
  <link rel="stylesheet" href="../../resources/resources/css/stylecoment.css">
  <link rel="stylesheet" href="../../resources/resources/css/all.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/classy-nav.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/animate.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/audioplayer.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/one-music-icon.css">

    <style>



.products-preview .preview{
   display: none;
   text-align: center;
   background: #fff;
   position: relative;
   margin:2rem;
   width: 40rem;
}

.products-preview .preview.active{
   display: inline-block;
}

.products-preview .preview img{
   height: 30rem;
}

.products-preview .preview .fa-times{
   position: absolute;
   top:1rem; right:1.5rem;
   cursor: pointer;
   color:#444;
   font-size: 4rem;
}

.fa-times:hover{
   transform: rotate(90deg);
}



.products-preview .preview .price{
   padding:1rem 0;
   font-size: 2.5rem;
   color:#27ae60;
}


    </style>

</head>

<body>

<div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-on">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <!-- Nav brand -->
                        <a href="<?php echo constant("URL") ?>main/principalIndex" class="nav-brand"><img src="<?php echo constant('URL') ?>resources/resources/img/core-img/logo.png" alt=""></a>
                        <!-- Menu -->
                        <div class="classy-menu" style="margin-right: 10%;">

                            <!-- Nav Start -->
                            <div class="classynav" >
                                <ul>
                                    <li><a href="<?php echo constant("URL") ?>main/principalIndex">Inicio</a></li>
                                    <li><a href="<?php echo constant("URL") ?>main/principalverArtista">Artistas</a></li>
                                    <li><a href="<?php echo constant("URL") ?>main/principalverEvento">Eventos</a></li>
                                    <li><a href="#"><?php echo "$_SESSION[NameUsuIni]"; ?></a>
                                        <ul class="dropdown" style="width: 200px;">
                                            <li><a href="#"><img src="<?php echo constant('URL') ?>resources/resources/img/core-img/logo.png" alt=""></a></li>
                                            <li><a href="<?php echo constant("URL") ?>main/principalIndex"><?php echo "$_SESSION[UsuarioIni]"; ?></a></li>
                                            <li><a href="<?php echo constant("URL") ?>main/principalSession">Cerrar Sesión</a></li>
                                        </ul>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>