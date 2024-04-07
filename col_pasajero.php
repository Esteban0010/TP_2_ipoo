<?php
include_once("viaje.php");


$col = [
 [
        "nombre" => "carlos",
        "apellido" => "piolines",
        "numDoc" => "4061049",
        "tel" => "2995824934"
    ],
    [
        "nombre" => "homero",
        "apellido" => "simpson",
        "numDoc" => "111666000",
        "tel" => "15674923"
    ],
    [
        "nombre" => "ned",
        "apellido" => "flanders",
        "numDoc" => "4455466",
        "tel" => "324595345"
    ],
   [
        "nombre" => "pedro",
        "apellido" => "piolines",
        "numDoc" => "4661049",
        "tel" => "29958212344"
    ],
   [
        "nombre" => "htro",
        "apellido" => "simpson",
        "numDoc" => "4656666000",
        "tel" => "115674923"
    ],
   [
        "nombre" => "bart",
        "apellido" => "flanders",
        "numDoc" => "4455466",
        "tel" => "3245654345"
    ]
];

//agrega un listado de pasajero al array pasajeros de la clase viaje
function crearArrayPersonajes($viaje,$col){
    $longitud_psjs = count($col);
    for ($i = 0; $i < $longitud_psjs; $i++) {
        $pasajero = new Pasajero($col[$i]["nombre"], $col[$i]["apellido"], $col[$i]["numDoc"], $col[$i]["tel"]);
        $viaje->agregarPasajero($pasajero);
    }
}