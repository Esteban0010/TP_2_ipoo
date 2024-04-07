<?php

class Pasajero
{
    public $nombreP;
    public $apellidoP;
    public $documentoP;
    public $telefonoP;

    public function __construct($nombre, $apellido, $documento, $telefono)
    {
        $this->nombreP = $nombre;
        $this->apellidoP = $apellido;
        $this->documentoP = $documento;
        $this->telefonoP = $telefono;
    }


    public function getNombre()
    {
        return $this->nombreP;
    }

    public function setNombre($nombre)
    {
        $this->nombreP = $nombre;
    }

    public function getApellido()
    {
        return $this->apellidoP;
    }

    public function setApellido($apellido)
    {
        $this->apellidoP = $apellido;
    }


    public function getNumDoc()
    {
        return $this->documentoP;
    }

    public function setNumDoc($documento)
    {
        $this->documentoP = $documento;
    }

    public function getTel()
    {
        return $this->telefonoP;
    }

    public function setTel($telefono)
    {
        $this->telefonoP = $telefono;
    }

    public function toString()
    {
        return "nombre: " . $this->getNombre() . "\n" . "apellido: " . $this->getApellido() . "\n" . "numero Dni: " . $this->getNumDoc() . "\n numero de telefono: " . $this->getTel();
    }
}