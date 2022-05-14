
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Comentarios</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../resources/resources/css/stylecoment.css">
  <link rel="stylesheet" href="../../resources/resources/css/all.css">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/stylecoment.css">
  <link rel="stylesheet" href="<?php echo constant('URL') ?>resources/resources/css/all.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="icon" href="<?php echo constant('URL') ?>resources/resources/img/comentarios.png">

</head>
<body>
  
  <button class="btn btn btn-dark mt-2 ml-4 mr-4 btno" type="submit"><a class="link" href="<?php echo constant("URL") ?>main/principalDash">Regresar</a> </button>
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
        
        
        <div class="follow-user margin">
            <div class="user-profile">
            <div class="full-name"><h1 class="main-text"><?php echo $comentarioData->getId_usuario()->getUsuario()?></h1></div>
              </div>
              <div class="user-profile-content">
                <div class="title-container">
                  <div class="user-names">
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