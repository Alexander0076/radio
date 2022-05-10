<?php
class TipousuarioBean{
    private $Id_tipoUsuario;
    private $tipoUsuario;

    function setId_tipoUsuario($Id_tipoUsuario){
        $this->Id_tipoUsuario = $Id_tipoUsuario;
    }

    function getId_tipoUsuario(){
        return $this->Id_tipoUsuario;
    }

    function settipoUsuario($tipoUsuario){
        $this->tipoUsuario = $tipoUsuario;
    }

    function gettipoUsuario(){
        return $this->tipoUsuario;
    }
    

}
?>