<?php

class Viaje
{

    private $codViaje;
    private $destino;

    private $cantMaxPasajero;
    private $pasajeros = [];

    private $objResponsable;


    public function __construct($codViaje, $destino, $cantMaxPasajero, ResponsableV $objResponsable)
    {
        $this->codViaje = $codViaje;
        $this->destino = $destino;
        $this->cantMaxPasajero = $cantMaxPasajero;
        $this->objResponsable = $objResponsable;
    }
    public function setCodViaje($codViaje)
    {
        $this->codViaje = $codViaje;
    }

    public function setPasajeros($psjs){
        $this->pasajeros []= $psjs;
    }
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }
    public function setMaxPasajaero($cantMaxPasajero)
    {
        $this->cantMaxPasajero = $cantMaxPasajero;
    }
    public function setObjPasajero($objPasajero)
    {
        $this->objPasajero = $objPasajero;
    }

    public function getCodViaje()
    {
        return $this->codViaje;
    }
    public function getDestino()
    {
        return $this->destino;
    }
    public function getPasajeros(){
       return $this->pasajeros;
    }
    public function getMaxPasajero()
    {
        return $this->cantMaxPasajero;
    }
    public function getObjResponsable()
    {
        return $this->objResponsable;
    }

    public function __toString()
    {
        $msj = "Cddigo:  " . $this->getCodViaje() . "\n";
        $msj .= "Destino: " . $this->getDestino() . "\n";
        $msj .= "Cantidad de pasajeros: " . $this->getMaxPasajero() . "\n";
        $msj .= "Responsable: \n" . $this->getObjResponsable()."\n";
        foreach ($this->getPasajeros() as $pasajero) {
            $msj .= $pasajero->toString() . "\n". "\n";
        }


        return $msj;
    }
    public function existePasajero ($numDoc){
        $longitud = count($this->getPasajeros());
        $existe = false;
      for ($i=0; $i <$longitud ; $i++) { 
   if($this->getPasajeros()[$i]->getNumDoc() ==$numDoc){
    $existe = true;
   }
  
    }
    return $existe;
}

    public function modificarPasajero($numDoc,$nombre,$apellido,$tel,$numDocNuevo){
        $modifiacion=-1;
        $psjs = $this->getPasajeros();
        if($this->existePasajero($numDoc)){
            $longitud = count($psjs);
            for ($i=0; $i <$longitud ; $i++) { 
                if($psjs[$i]->getNumDoc() ==$numDoc){
                    $psjs[$i]->setNumDoc($numDocNuevo);
                    $psjs[$i]->setNombre($nombre);
                    $psjs[$i]->setApellido($apellido);
                    $psjs[$i]->setTel($tel);
                    $modifiacion = 1;
                }
   
}
      }
      return $modifiacion;
    }
    

    

    public function agregarPasajero(Pasajero $pasajero)
    {
        $existe = false;
        $msj="";
        if (count($this->getPasajeros()) > 0) {
            if(count($this->getPasajeros())< $this->getMaxPasajero()){

            
            if(!$this->existePasajero($pasajero->getNumDoc())){
                $this->setPasajeros($pasajero);
                $msj=1;
            }
            else{
                $msj=-1;
            }
        }else{
            $msj=0;
        }
        } else {
            $this->setPasajeros($pasajero);
            $msj=1;
        }

        return $msj;
    }


 public function modificarResponsable($numeroEmpleado, $numeroLicencia, $nombre, $apellido){
$this->objResponsable->setNombre($nombre);
$this->objResponsable->setApellido($apellido);
$this->objResponsable->setNumeroEmpleado($numeroEmpleado);
$this->objResponsable->setNumeroLicencia($numeroLicencia);
    }
}