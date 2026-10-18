<?php

require_once "interfaces/IToJson.php";

class User implements IToJson{
    
    private string $nombre;
    private string $apellidos;
    private string $contrasena;
    private string $telefono;
    private string $mail;
    private string $sexo;

    function __construct(string $nombre, string $apellidos, string $contrasena, string $telefono, string $mail, string $sexo){
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->contrasena = $contrasena;
        $this->telefono = $telefono;
        $this->mail = $mail;
        $this->sexo = $sexo;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setNombre(string $nombre){
        $this->nombre = $nombre;
    }

    function getApellidos(){
        return $this->apellidos;
    }

    function setApellidos(string $apellidos){
        $this->apellidos = $apellidos;
    }

    function getcontrasena(){
        return $this->contrasena;
    }

    function setcontrasena(string $contrasena){
        $this->contrasena = $contrasena;
    }

    function getTelefono(){
        return $this->telefono;
    }

    function setTelefono(string $telefono){
        $this->telefono = $telefono;
    }

    function getMail(){
        return $this->mail;
    }

     function setMail(string $mail){
        $this->mail = $mail;
    }

    function getSexo(){
        return $this->sexo;
    }

    function setSexo(string $sexo){
        $this->sexo = $sexo;
    }

    #[Override]
    function toJson(){
        return json_encode([
            "nombre" => $this->nombre,
            "apellidos" => $this->apellidos,
            "contrasena" => $this->contrasena,
            "telefono" => $this->telefono,
            "mail" => $this->mail,
            "sexo" => $this->sexo,
        ]);
    }

}