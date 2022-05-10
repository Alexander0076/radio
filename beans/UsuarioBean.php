<?php
class UsuarioBean{
    private $Id_usuario;
    private $Nombre;
    private $Foto;
    private $usuario;
    private $contrasena;
    private $Id_tipousuario;


    function setId_usuario($Id_usuario){
        $this->Id_usuario = $Id_usuario;
    }

    function getId_usuario(){
       return $this->Id_usuario;
    }

    function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    function getNombre(){
        return $this->Nombre;
    }

    function setFoto($Foto){
        $this->Foto = $Foto;
    }

    function getFoto(){
        return $this->Foto;
    }

    function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    function getUsuario(){
        return $this->usuario;
    }

    function setContrasena($contrasena){
        $this->contrasena = $contrasena;
    }

    function getContrasena(){
        return $this->contrasena;
    }

    function setId_tipoUsuario($Id_tipousuario){
        $this->Id_tipousuario = $Id_tipousuario;
    }

    function getId_tipoUsuario(){
        return $this->Id_tipousuario;
    }
}
?>