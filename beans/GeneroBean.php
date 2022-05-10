<?php
class GeneroBean{
    private $Id_genero;
    private $genero;


    function setId_genero($Id_genero){
        $this->Id_genero = $Id_genero;
    }

    function getId_genero(){
        return $this->Id_genero;
    }

    function setGenero($genero){
        $this->genero = $genero;
    }
    function getGenero(){
        return $this->genero;
    }
}
?>