<?php
class MusicaBean{
    private $Id_musica;
    private $img;
    private $Nombre;
    private $cancion;
    private $duracion;
    private $Id_genero;
    private $Id_artista;

    function setId_musica($Id_musica){
        $this->Id_musica = $Id_musica;
    }

    function getId_musica(){
        return$this->Id_musica;
    }

    function setImgm($img){
        $this->img = $img;
    }

    function getImgm(){
        return $this->img;
    }

    function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }
    function getNombre(){
        return $this->Nombre;
    }

    function setCancion($cancion){
        $this->cancion = $cancion;
    }
    function getCancion(){
        return $this->cancion;
    }
    function setDuracion($duracion){
        $this->duracion = $duracion;
    }

    function getDuracion(){
        return $this->duracion;
    }
    function setId_genero($Id_genero){
        $this->Id_genero = $Id_genero;
    }

    function getId_genero(){
        return $this->Id_genero;
    }

    function setId_artista($Id_artista){
        $this->Id_artista = $Id_artista;
    }

    function getId_artista(){
        return $this->Id_artista;
    }
}
?>
