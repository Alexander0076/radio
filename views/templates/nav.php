<nav class="navbar navbar-expand-lg main-navbar sticky">
    <div class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg collapse-btn"> <i data-feather="align-justify"></i></a></li>

        </ul>
    </div>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
                <span class="badge headerBadge1">
                    6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
                <div class="dropdown-header">
                    Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item"> 
                        <span class="dropdown-item-avatar text-white"> <img alt="image" src="<?php echo constant('URL') ?>resources/assets/img/users/user-1.png" class="rounded-circle"></span> 
                        <span class="dropdown-item-desc">
                            <span class="message-user">JohnDeo</span>
                            <span class="time messege-text">Please check your mail !!</span>
                            <span class="time">2 Min Ago</span>
                        </span>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>
        <li class="mr-4 ml-4"><a href="#"><?php echo "$_SESSION[NameUsuIni]";?> , <?php echo "$_SESSION[UsuarioIni]"; ?></a></li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="<?php echo constant('URL') ?>resources/usuarios/<?php echo "$_SESSION[imagen]"; ?>" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
                <div class="dropdown-title"><?php echo "$_SESSION[NameUsuIni]";?></div>
                <a href="<?php echo constant("URL") ?>main/principalSession" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>Cerrar sessión </a>
            </div>
        </li>
    </ul>
</nav>