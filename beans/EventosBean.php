<?php
class EventosBean{
    private $Id_eventos;
    private $img;
    private $titulo;
    private $descripcion;
    private $Id_usuario;
    private $fecha_evento;
    private $Fecha_publicacion;


    function setId_eventos($Id_eventos){
        $this->Id_eventos = $Id_eventos;
    }
    function getId_eventos(){
        return $this->Id_eventos;
    }

    function setImg($img){
        $this->img = $img;
    }

    function getImg(){
        return $this->img;
    }

    function setTitulo($titulo){
        $this->titulo = $titulo;
    }
    function getTitulo(){
        return $this->titulo;
    }

    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    function getDescripcion(){
        return $this->descripcion;
    }

    function setId_usuario($Id_usuario){
        $this->Id_usuario = $Id_usuario;
    }
    function getId_usuario(){
        return $this->Id_usuario;
    }

    function setFecha_evento($fecha_evento){
        $this->fecha_evento = $fecha_evento;
    }

    function getFecha_evento(){
        return $this->fecha_evento;
    }

    function setFecha_publicacion($Fecha_publicacion){
        $this->Fecha_publicacion = $Fecha_publicacion;
    }

    function getFecha_publicacion(){
        return $this->Fecha_publicacion;
    }
}
?>