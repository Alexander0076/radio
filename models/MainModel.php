<?php

session_start();

require "beans/ArtistaBean.php";
require "beans/ComentariosBean.php";
require "beans/GeneroBean.php";
require "beans/MusicaBean.php";
require "beans/TipousuarioBean.php";
require "beans/UsuarioBean.php";
require "beans/EventosBean.php";

class MainModel extends Model
{
    function __construct()
    {
        parent::__construct(); //accedemos al constructor de Model, para poder usar la bdd
    }

    function listaArtista()
    {

        $query = "SELECT * FROM artista";
        $this->conexion = $this->con->conectar();
        $rs = $this->conexion->prepare($query);
        $rs->execute();
        $array = array();
        while ($row = $rs->fetch()) {
            $artista = new ArtistaBean();
            $artista->setId_artista($row['Id_artista']);
            $artista->setImg($row['img']);
            $artista->setNombreartista($row['nombreartista']);
            $artista->setDescripcion($row['descripcion']);
            $array[] = $artista;
        }
        $this->con->desconectar($this->conexion);
        return $array;
    }

    function ingresarArtista($img, $nombre, $descripcion)
    {
        $query = "INSERT INTO artista(img, nombreartista, descripcion) VALUES(:img,:nombre,:descripcion)";
        $this->conexion = $this->con->conectar();
        $row = $this->conexion->prepare($query);
        $row->bindParam(':img', $img);
        $row->bindParam(':nombre', $nombre);
        $row->bindParam(':descripcion', $descripcion);
        return $row->execute(); //

    }

    function eliminarArtista($id)
    {
        $query = "DELETE FROM artista WHERE Id_artista =:valor";
        $this->conexion = $this->con->conectar();
        $row = $this->conexion->prepare($query);
        $row->bindParam(':valor', $id);
        return $row->execute();
    }

    function actualizarArtista($id1, $img, $nombre, $descripcion)
    {
        $query = "UPDATE artista SET img=:img, nombreartista=:nombre, descripcion=:descripcion WHERE Id_artista =:valor1";
        $this->conexion = $this->con->conectar();
        $row = $this->conexion->prepare($query);
        $row->bindParam(':valor1', $id1);
        $row->bindParam(':img', $img);
        $row->bindParam(':nombre', $nombre); 
        $row->bindParam(':descripcion', $descripcion);
        return $row->execute(); //devolvera un booleano dependiendo si la consulta y conexion fue exitosa
    }




    //----------------------------------------------------------------------------------------------

    function listaComentario()
    {
        $id = 1;
        $query = "SELECT * FROM comentarios c INNER JOIN usuario u ON c.Id_usuario = u.Id_usuario INNER JOIN musica m ON c.Id_musica = m.Id_musica where c.Id_musica =:id";
        $this->conexion = $this->con->conectar();
        $rs = $this->conexion->prepare($query);
        $rs->bindParam(':id', $id);
        $rs->execute();
        $array = array();
        while ($row = $rs->fetch()) {
            $comentario = new ComentariosBean();
            $usuario = new UsuarioBean();
            $musica = new MusicaBean();
            $comentario->setId_comentario($row['Id_comentario']);
            $comentario->setComentario($row['comentario']);
            $comentario->setFecha_publicacion($row['Fecha_publicacion']);

           
            $array[] = $comentario;
        }
        $this->con->desconectar($this->conexion);
        return $array;
    }

    function listaGenero()
    {
        $query = "SELECT * FROM genero";
        $this->conexion = $this->con->conectar();
        $rs = $this->conexion->prepare($query);
        $rs->execute();
        $array = array();
        while ($row = $rs->fetch()) {
            $genero = new GeneroBean();
            $genero->setId_genero($row['Id_genero']);
            $genero->setGenero($row['genero']);
            $array[] = $genero;
        }
        $this->con->desconectar($this->conexion);
        return $array;
    }

    function listaMusica()
    {
        $query = "SELECT * FROM musica m INNER JOIN genero g ON m.Id_genero = g.Id_genero INNER JOIN artista a ON m.Id_artista = a.Id_artista";
        $this->conexion = $this->con->conectar();
        $rs = $this->conexion->prepare($query);
        $rs->execute();
        $array = array();
        while ($row = $rs->fetch()) {
            $genero = new GeneroBean();
            $artista = new ArtistaBean();
            $musica = new MusicaBean();

            $musica->setId_musica($row['Id_musica']);
            $musica->setImg($row['img']);
            $musica->setNombre($row['Nombre']);
            $musica->setCancion($row['cancion']);
            $musica->setDuracion($row['duracion']);

            $genero->setId_genero($row['Id_genero']);
            $genero->setGenero($row['genero']);
            $musica->setId_genero($genero);

            $artista->setId_artista($row['Id_artista']);
            $artista->setNombreartista($row['nombreartista']);
            $artista->setImg($row['img']);
            $musica->setId_artista($artista);
            $array[] = $musica;
        }
        $this->con->desconectar($this->conexion);
        return $array;
    }

    function listaTipoUsuario()
    {
        $query = "SELECT * FROM tipousuario";
        $this->conexion = $this->con->conectar();
        $rs = $this->conexion->prepare($query);
        $rs->execute();
        $array = array();
        while ($row = $rs->fetch()) {
            $tipousu = new TipousuarioBean();

            $tipousu->setId_tipoUsuario($row['Id_tipoUsuario']);
            $tipousu->settipoUsuario($row['tipoUsuario']);
            $array[] = $tipousu;
        }
        $this->con->desconectar($this->conexion);
        return $array;
    }

    function listaUsuario()
    {
        $query = "SELECT * FROM usuario u INNER JOIN tipousuario t ON u.Id_tipousuario = t.Id_tipoUsuario";
        $this->conexion = $this->con->conectar();
        $rs = $this->conexion->prepare($query);
        $rs->execute();
        $array = array();
        while ($row = $rs->fetch()) {
            $usuario = new UsuarioBean();
            $tipousu = new TipousuarioBean();

            $usuario->setId_usuario($row['Id_usuario']);
            $usuario->setNombre($row['Nombre']);
            $usuario->setFoto($row['Foto']);
            $usuario->setUsuario($row['usuario']);
            $usuario->setContrasena($row['contrasena']);
            $tipousu->setId_tipoUsuario($row['Id_tipoUsuario']);
            $tipousu->settipoUsuario($row['tipoUsuario']);
            $usuario->setId_tipoUsuario($usuario);
            $array[] = $usuario;
        }
        $this->con->desconectar($this->conexion);
        return $array;
    }
    //Apartado de ingresar eventos 
    function agregarEventos($img, $nombre, $descripcion, $fecha, $usuario)
    {
        $query = "INSERT INTO eventos(img, titulo, descripcion, Id_usuario, fecha_evento) VALUES(:img,:titulo,:descripcion,:Idusu,:fechaeve)";
        $this->conexion = $this->con->conectar();
        $row = $this->conexion->prepare($query);
        $row->bindParam(':img', $img);
        $row->bindParam(':titulo', $nombre);
        $row->bindParam(':descripcion', $descripcion);
        $row->bindParam(':Idusu', $usuario);
        $row->bindParam(':fechaeve', $fecha);
        return $row->execute(); 
    }
    //Funcion para validar el inicio de sesion de losusuarios.

    function validarInicioSesion($usuario, $pass){
        $usuGet = "";
        $conGet = "";
        $tipoUsuGet = "";
        $nombre = "";
        $query  = "SELECT   usuario, contrasena, Id_tipousuario, Nombre FROM usuario WHERE usuario = :usu && contrasena = :pass ";
        $this->conexion = $this->con->conectar();
        $rs = $this->conexion->prepare($query);
        $rs->bindParam(':usu',$usuario);
        $rs->bindParam(':pass',$pass);
        $rs->execute();
        while ($row = $rs->fetch()) {
            $usuGet =  $row['usuario'];
            $conGet = $row['contrasena'];
            $tipoUsuGet = $row['Id_tipousuario'];
            $nombre = $row['Nombre'];
        }
        if ($usuGet == $usuario && $conGet == $pass) {
            echo "llego";
            session_start();
            $_SESSION['UsuarioIni'] = $usuGet;
            $_SESSION['NameUsuIni'] = $nombre;
            if ($tipoUsuGet == 1) {
                header('Location:' . constant('URL') . "main/principalIndex");   
            }else {
                header('Location:' . constant('URL') . "main/principalDash");
            }
        }elseif ($usuGet != $usuario && $conGet != $pass) {
            header('Location:'. constant('URL')."main/principal?cuentaError=true");
        }
    }
    //Funcion de validar registro.
    function argregarUsuarios($usuarioIng, $passIng1, $nombreIng)
    {
        $conteo = 0;
        $query2 = "SELECT COUNT(usuario) as 'conteo' FROM usuario WHERE usuario = :usuarioN";
        $this->conexion = $this->con->conectar();
        $row = $this->conexion->prepare($query2);
        $row->bindParam(':usuarioN', $usuarioIng);
        $row->execute();
        while($rs = $row->fetch()){
            $conteo  = $rs['conteo'];
        }
        if ($conteo == 0) {
            $ID = 1;
        $query  = "INSERT INTO usuario(Nombre, usuario, contrasena, Id_tipousuario) VALUES (:nombre, :usuario, :pass, :idTU)";
        $this->conexion = $this->con->conectar();
        $row = $this->conexion->prepare($query);
        $row->bindParam(':nombre', $nombreIng);
        $row->bindParam(':usuario', $usuarioIng);
        $row->bindParam(':pass', $passIng1);
        $row->bindParam(':idTU', $ID);
        $row->execute(); 
        header('Location:' . constant('URL') . "main/principal?correctoReg=true");
        }else {
            header('Location:'. constant('URL')."main/principalRegistro?usuarioEx=true");
        }

    }
    function listaEvento()
    {
        $query = "SELECT * FROM eventos e INNER JOIN usuario u ON e.Id_usuario = u.Id_usuario";
        $this->conexion = $this->con->conectar();
        $rs = $this->conexion->prepare($query);
        $rs->execute();
        $array = array();
        while ($row = $rs->fetch()) {
            $eventos = new EventosBean();
            $usuario = new UsuarioBean();

            $eventos->setId_eventos($row['Id_eventos']);
            $eventos->setImg($row['img']);
            $eventos->setTitulo($row['titulo']);
            $eventos->setDescripcion($row['descripcion']);

            $usuario->setId_usuario($row['Id_usuario']);
            $usuario->setNombre($row['Nombre']);
            $usuario->setUsuario($row['usuario']);
            $usuario->setFoto($row['Foto']);
            $eventos->setId_usuario($usuario);

            $eventos->setFecha_evento($row['fecha_evento']);
            $eventos->setFecha_publicacion($row['Fecha_publicacion']);

            $array[] = $eventos;
        }
        $this->con->desconectar($this->conexion);
        return $array;
    }
    //-----------------------------------Modelo para insertar comentarios----------------------------------------
    function agregarComentarios($comentario,$idusu,$idmusica)
    {
        $id = 0;
    $queryID = "SELECT Id_usuario FROM usuario WHERE  usuario = :usu";
    $this->conexion = $this->con->conectar();
        $row = $this->conexion->prepare($queryID);
        $row->bindParam(':usu',$idusu);
        $row->execute();
        while($rs= $row ->fetch()){
                $id = $rs['Id_usuario'];
        }
        $fecha = date('mm-dd-YY');
        $fecha = '05-13-2022';
        $query = "INSERT INTO comentarios(comentario, Fecha_publicacion, Id_usuario, Id_musica)
         VALUES (:comen, :fecha, :idusu, :idmusica)";
        $this->conexion = $this->con->conectar();
        $row = $this->conexion->prepare($query);
        $row->bindParam(':comen',$comentario );
        $row->bindParam(':fecha', $fecha);
        $row->bindParam(':idusu',$id);
        $row->bindParam(':idmusica',$idmusica);
        $row->execute();
        header('Location:' . constant('URL') . "main/principalverArtista");

    }
    
    
  //------------------------------------Modelo para Canciones---------------------------------------

  function viewMusica()
  {
    parent::__construct();
    header('Location:' . constant('URL') . "main/principalMusica");
  }
  function principalMusica()
  {
    parent::__construct();
    $this->view->musica = $this->model->listaMusica();
    $this->view->listaArtista = $this->model->listaArtista();
    $this->view->listaGenero = $this->model->listaGenero();
    $this->view->renderView('main/admin/musica.php'); //llamando al metodo renderView para pintar la vista
  }

  function agregarMusica()
  {
    parent::__construct();
    if (is_uploaded_file($_FILES['cancion']['tmp_name']) and is_uploaded_file($_FILES['image']['tmp_name'])) {
      $artista = $_POST["artista"];
      $genero = $_POST["genero"];
      $tiempo = $_POST['tiempo'];
      $nombre = $_POST['nombre'];
      $ruta1 = "resources/canciones/";
      $ruta2 = "resources/musica/";


      $nombreCancion = trim($_FILES['cancion']['name']);
      $nombreCancion = str_replace(" ", "", $nombreCancion);
      $cancion = $nombreCancion;
      $upload = $ruta1 . $nombreCancion;

      $nombreImg = trim($_FILES['image']['name']);
      $nombreImg = str_replace(" ","",$nombreImg);
      $img = $nombreImg;
      $upload1 = $ruta2 . $nombreImg;

      if (move_uploaded_file($_FILES['cancion']['tmp_name'], $upload) and move_uploaded_file($_FILES['image']['tmp_name'], $upload1)) {
        $this->model->agregarMusica($img,$nombre, $cancion, $tiempo, $genero, $artista);
        header('Location:' . constant('URL') . "main/principalMusica");
      }
    }
  }

  function eliminarMusica($id)
  {
    parent::__construct();
    $this->model->eliminarMusica($id); //invocamos al model y a la funcion del modelo
    header('Location:' . constant('URL') . "main/principalMusica"); //notese el redirect al metodo principal, esto para no enviar nuevamente los parametros de ese metodo
  }


  //-----------------------------------------Modelo para GENERO----------------------------------------

  function viewGenero()
  {
    parent::__construct();
    header('Location:' . constant('URL') . "main/principalGenero");
  }
  function principalGenero()
  {
    parent::__construct();
    $this->view->listaGenero = $this->model->listaGenero();
    $this->view->renderView('main/admin/principalGenero.php'); //llamando al metodo renderView para pintar la vista
  }


  function agregarGenero(){
    $genero = $_POST['genero'];
    $this->model->agregarGenero($genero);
    header('Location:' . constant('URL') . "main/principalGenero");
  }

  function eliminarGenero($id)
  {
    parent::__construct();
    $this->model->eliminarMusica($id); //invocamos al model y a la funcion del modelo
    header('Location:' . constant('URL') . "main/principalGenero"); //notese el redirect al metodo principal, esto para no enviar nuevamente los parametros de ese metodo
  }


  function modificarGenero(){
    $id = $_POST['id'];
    $genero = $_POST['genero'];
    $this->model->modificarGenero($id, $genero);
    header('Location:' . constant('URL') . "main/principalGenero");
  }
    
    
    
    //-----------------------------------Modelo para extraer comentarios----------------------------------------
    // function seleccionarComentarios($idmusica)
    // {
    //     $query="SELECT  c.comentario, c.Fecha_publicacion, u.usuario FROM comentarios c INNER JOIN usuario u 
    //     on u.Id_usuario = c.Id_usuario WHERE c.Id_musica = :idmusica";
    //     $this->conexion = $this->con->conectar();
    //     $row = $this->conexion->prepare($query);
    //     $row->bindParam(':idmusica',$idmusica);
    //     $row->execute();
    //     $array = array();
    //     while ($rs = $row->fetch()) {
    //         $comentario = new ComentariosBean();
    //         $comentario->setId_musica($rs['c.Id.musica']);
    //         $comentario->setUsuario($rs['u.usuario']);
    //         $comentario->setComentario($rs['c.comentario']);
    //         $comentario->setFecha_publicacion($rs['c.Fecha_publicacion']);
    //         $array[] = $comentario;
    //     }
    //     $this->con->desconectar($this->conexion);
    //     return $array;
    // }
}
