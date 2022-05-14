<?php
class MainController extends Controller
{ //extenderemos de controller para poder acceder a sus funciones
  function __construct()
  {
    //parent::__construct(); codigo de la primera parte de la guia
    //$this->view->mensaje1= "Parametro enviado a la vista";
    //$this->view->renderView('main/main.php');
  }
  function principal()
  {
    parent::__construct();
    $this->view->listaEvento = $this->model->listaEvento();
    $this->view->renderView('main/login.php');
  }
  function viewArtista()
  {
    parent::__construct();
    header('Location:' . constant('URL') . "main/principalArtista");
  }
  function principalArtista()
  {
    parent::__construct();
    $this->view->listaArtista = $this->model->listaArtista();
    $this->view->renderView('main/admin/principalArtista.php'); //llamando al metodo renderView para pintar la vista
  }
  function agregarArtista()
  {
    parent::__construct();
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
      $nombre = $_POST["nombre"];
      $descripcion = $_POST["descripcion"];
      $ruta = "resources/artistas/";
      $nombrefinal = trim($_FILES['image']['name']);
      $nombrefinal = str_replace(" ", "", $nombrefinal);
      $archivo = $nombrefinal;
      $upload = $ruta . $nombrefinal;
      if (move_uploaded_file($_FILES['image']['tmp_name'], $upload)) {
        $this->model->ingresarArtista($archivo, $nombre, $descripcion);
        header('Location:' . constant('URL') . "main/principalArtista");
      }
    }
  }
  function eliminarArtista($id)
  {
    parent::__construct();
    $this->model->eliminarArtista($id); //invocamos al model y a la funcion del modelo
    header('Location:' . constant('URL') . "main/principalArtista"); //notese el redirect al metodo principal, esto para no enviar nuevamente los parametros de ese metodo
  }
  function actualizarArtista()
  {
    parent::__construct();
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
      $id = $_POST['id'];
      $nombre = $_POST["nombre"];
      $descripcion = $_POST["descripcion"];
      $ruta = "resources/artistas/";
      $nombrefinal = trim($_FILES['image']['name']);
      $nombrefinal = str_replace(" ", "", $nombrefinal);
      $archivo = $nombrefinal;
      $upload = $ruta . $nombrefinal;
      if (move_uploaded_file($_FILES['image']['tmp_name'], $upload)) {
        $this->model->actualizarArtista($id, $archivo, $nombre, $descripcion);
        header('Location:' . constant('URL') . "main/principalArtista");
      }
    }
  }
  //----------------------------------------------------Vistas de usuario principal------------------------------------------------------
  function viewIndex()
  {
    parent::__construct();
    header('Location:' . constant('URL') . "main/principalIndex");
  }
  function principalIndex()
  {
    parent::__construct();
    $this->view->listaEvento = $this->model->listaEvento();
    $this->view->renderView('main/user/index.php'); //llamando al metodo renderView para pintar la vista
  }
  function viewCerrarSession()
  {
    parent::__construct();
    header('Location:' . constant('URL') . "main/principalSession");
  }
  function principalSession()
  {
    parent::__construct();
    $this->view->listaEvento = $this->model->listaEvento();
    $this->view->renderView('main/cerrarSession.php'); //llamando al metodo renderView para pintar la vista
  }
  //----------------------------------------------------------------------------------------------------------------
  function viewEvento()
  {
    parent::__construct();
    header('Location:' . constant('URL') . "main/principalEvento");
  }
  function principalEvento()
  {
    parent::__construct();
    $this->view->listaEvento = $this->model->listaEvento();
    $this->view->renderView('main/admin/principalEvento.php'); //llamando al metodo renderView para pintar la vista
  }
  
  //----------------------------------------------------Vistas de Login------------------------------------------------------
  function viewRegistro()
  {
    parent::__construct();
    header('Location:' . constant('URL') . "main/principalRegistro");
  }
  function principalRegistro()
  {
    parent::__construct();
    $this->view->listaEvento = $this->model->listaEvento();
    $this->view->renderView('main/register.php'); //llamando al metodo renderView para pintar la vista
  }
  function viewDash()
  {
    parent::__construct();
    header('Location:' . constant('URL') . "main/principalDash");
  }
  function principalDash()
  {
    parent::__construct(); //llamamos el constructor de Controller, para poder acceder a la instancia de view
    $this->view->listaEvento = $this->model->listaEvento(); //enviamos arreglos de objetos a las vistas
    $this->view->listaArtista = $this->model->listaArtista();
    $this->view->musica = $this->model->listaMusica();
    $this->view->usuario = $this->model->listaUsuario();
    $this->view->renderView('main/admin/dashboard.php');
  }
  //----------------------------------------------------Validaciones de Login------------------------------------------------------
  function validarLogeo()
  {
    parent::__construct();
    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];
    echo "listo";
    if ($usuario != "" && $pass != "") {
      echo "listo2";
      $this->model->validarInicioSesion($usuario, $pass);
    } elseif ($usuario == "" && $pass != "") {
      header('Location:' . constant('URL') . "main/principal?usuError=true");
    } elseif ($usuario != "" && $pass == "") {
      header('Location:' . constant('URL') . "main/principal?passError=true");
    }else{
      header('Location:' . constant('URL') . "main/principal?dataError=true");
    }
  }
  function validarRegistro()
  {
    parent::__construct();
    $nombreIng = $_POST['name'];
    $usuarioIng = $_POST['usuarioN'];
    $passIng1 = $_POST['password'];
    $passIng2 = $_POST['passConfirm'];
    if ($usuarioIng != "" && $passIng1 != "" && $passIng2 != "" && $nombreIng != "") {
      if ($passIng1 == $passIng2) {
        $this->model->argregarUsuarios($usuarioIng, $passIng1, $nombreIng);
      } else {
        header('Location:'. constant('URL')."main/principalRegistro?passError=true");
      }      
    } else {
      header('Location:'. constant('URL')."main/principalRegistro?dataError=true");
    }
  }
  function agregarEvento()
  {
    parent::__construct();
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
      $titulo = $_POST["evento"];
      $descripcion = $_POST["descripcion"];
      $fecha = $_POST['fechap'];
      $ruta = "resources/eventos/";
      $nombrefinal = trim($_FILES['image']['name']);
      $nombrefinal = str_replace(" ", "", $nombrefinal);
      $archivo = $nombrefinal;
      $upload = $ruta . $nombrefinal;
      $usuario = 2;
      if (move_uploaded_file($_FILES['image']['tmp_name'], $upload)) {
        $this->model->agregarEventos($archivo, $titulo, $descripcion, $fecha, $usuario);
        header('Location:' . constant('URL') . "main/principalArtista");
      }
    }
  }
//-----------------------------------------------------------------------

  function verArtista()
  {
    parent::__construct();
    header('Location:' . constant('URL') . "main/principalverArtista");
  }
  function principalverArtista()
  {
    parent::__construct();
    $this->view->listaArtista = $this->model->listaArtista();
    $this->view->renderView('main/user/Artistas.php'); //llamando al metodo renderView para pintar la vista
    
  }
  
   //---------------------------------------Comentarios-----------------------------------

   function verComentarios()
   {
     parent::__construct();
     header('Location:' . constant('URL') . "main/principalComentarios");
   }
   function principalComentarios()
   {
     parent::__construct();
     $this->view->listaComentario = $this->model->listaComentario();
     $this->view->renderView('templates/index.php');
     
   }

  //---------------------------------------Eventos-----------------------------------

  function verEvento()
  {
    parent::__construct();
    header('Location:' . constant('URL') . "main/principalverEvento");
  }
  function principalverEvento()
  {
    parent::__construct();
    $this->view->listaEvento = $this->model->listaEvento();
    $this->view->renderView('main/user/eventos.php'); //llamando al metodo renderView para pintar la vista
  }

  //---------------------------------------Agregar comentario-----------------------------------
  function agregarComentario()
  {
    $comentario = $_POST['comentario'];
    $usuarioIni = $_SESSION['UsuarioIni'];
    echo $usuarioIni;
    $idMusica = 1;
    $this->model->agregarComentarios($comentario,$usuarioIni,$idMusica);
  }
  //---------------------------------------Extraer comentarios-----------------------------------
  function extraerComentarios()
  {
    $idMusica = 1;
    return $idMusica;
  }
  
  
  
  
   //------------------------------------Canciones---------------------------------------

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


  //-----------------------------------------GENERO----------------------------------------

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
}
