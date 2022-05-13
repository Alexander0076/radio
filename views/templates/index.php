<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../resources/resources/css/stylecoment.css">
  <link rel="stylesheet" href="../../resources/resources/css/all.css">
</head>
<body>

  <div class="main-flex-container margen">
  

    <div class="center-flex-container flex-item">
      <div class="home">
        <h1>Comentarios</h1>
        <i class="fas fa-magic"></i>
      </div>

      <div class="post-tweet">
        <form action="<?php echo constant("URL") ?>main/agregarComentario" method="POST">
          <div class="form-group-1">
            
            <input class="form-control" name="comentario" type="text" placeholder="Comenta...">
          </div>
          <div class="form-group-2">
            
            <button class="btn mt-2" type="submit">Comentar</button>
          </div>
        </form>

      </div>
      <!-- User Content -->
     
       

        <section class="follow-users-box">
          <!--Esta es la caja para el estilo de mensajes que se usaran-->
       <?php
       
        foreach ($this->listaComentario as $comentarioData) {
        ?>        
           <div class="follow-user">
            <div class="user-profile">
              
              </div>

              <div class="user-profile-content">
                <div class="title-container">
                  <div class="user-names">
                    <div class="full-name"><h1 class="main-text"><?php echo $comentarioData->getId_comentario()?></h1></div>
                    <div class="user-name"><p class="sub-text"><?php echo $comentarioData->getId_musica()?></p></div>
                    <div class="user-name"><p class="sub-text"><?php echo $comentarioData->getFecha_publicacion()?></p></div>
                  </div>
                </div>
                <div class="bio-container">
                  <p>
                  <?php echo $comentarioData->getComentario()?></p></div>
                  </p>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>
          <!--fin de diseño -->
        </section> 
  </div>
  
</body>
</html>