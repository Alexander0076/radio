<?php
class ArtistaBean{
    private $Id_artista;
    private $img;
    private $nombreartista;
    private $descripcion;


    function setId_artista($Id_artista){
        $this->Id_artista = $Id_artista;
    }

    function getId_artista(){
        return $this->Id_artista;
    }

    function setImg($img){
        $this->img = $img;
    }

    function getImg(){
        return $this->img;
    }

    function setNombreartista($nombreartista){
        $this->nombreartista = $nombreartista;
    }

    function getNombreartista(){
        return $this->nombreartista;
    }

    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    function getDescripcion(){
        return $this->descripcion;
    }
}
?>