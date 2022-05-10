<?php
class ComentariosBean{
    private $Id_comentario;
    private $comentario;
    private $Fecha_publicacion;
    private $Id_usuario;
    private $Id_musica;


    function setId_comentario($Id_comentario){
        $this->Id_comentario = $Id_comentario;
    }

    function getId_comentario(){
        return $this->Id_comentario;
    }

    function setFecha_publicacion($Fecha_publicacion){
        $this->Fecha_publicacion = $Fecha_publicacion;
    }

    function getFecha_publicacion(){
        return $this->Fecha_publicacion;
    }

    function setComentario($comentario){
        $this->comentario = $comentario;
    }

    function getComentario(){
        return $this->comentario;
    }

    function setId_musica($Id_musica){
        $this->Id_musica = $Id_musica;
    }

    function getId_musica(){
        return $this->Id_musica;
    }

    function setId_usuario($Id_usuario){
        $this->Id_usuario = $Id_usuario;
    }

    function getId_usuario(){
        return $this->Id_usuario;
    }

}
?>