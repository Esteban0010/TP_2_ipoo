<?php

include_once ("pasajero.php");
include_once ("viaje.php");
include_once ("responsable.php");
include_once ("col_pasajero.php");

$responsable = new ResponsableV("1111", "222333", "Carlos", "Perez");
$viaje = new Viaje("V088", "neuquen", 50, $responsable);
crearArrayPersonajes($viaje,$col);

function solicitud_Datos($msj)
{
    echo $msj;
    return trim(fgets(STDIN));
}


do {
    echo "\n1. Agregar Pasajero\n";
    echo "2. Modificar Pasajero\n";
    echo "3. Ver Viaje\n";
    echo "4. Modificar datos de Responsable de Viaje\n";
    echo "5. Salir\n";
    $opcion = solicitud_Datos("Seleccione una opción: ");

    switch ($opcion) {
        case 1:
            $nombre = solicitud_Datos("Nombre del pasajero: ");
            $apellido = solicitud_Datos("Apellido del pasajero: ");
            $documento = solicitud_Datos("Documento del pasajero: ");
            $telefono = solicitud_Datos("Teléfono del pasajero: ");
            $pasajero = new Pasajero($nombre, $apellido, $documento, $telefono);

            $msj = $viaje->agregarPasajero($pasajero);
            if ($msj == 1) {
                echo "agregado";
            } else if ($msj == -1) {
                echo "el pasajero ya se encuentra en el listado";
            } else {
                echo "Se alcanzo la maxima capacidad del viaje";
            }
            break;
        case 2:
            echo "Ingrese primeramente el DNI del pasajero a modificar";
            $documento = solicitud_Datos("Documento del pasajero: ");
            $validacio = $viaje->existePasajero($documento);
            if ($validacio) {
                $documentoNuevo = solicitud_Datos(" nuevo Documento del pasajero: ");
                $nombre = solicitud_Datos("Nombre del pasajero: ");
                $apellido = solicitud_Datos("Apellido del pasajero: ");
                $telefono = solicitud_Datos("Teléfono del pasajero: ");

                $msj = $viaje->modificarPasajero($documento, $nombre, $apellido, $telefono, $documentoNuevo);
                if ($msj == 1) {
                    echo " Pasajero modificado \n";
                } else {
                    echo "No se pudo modificar el pasajero \n";
                }
            } else {
                echo "el documento ingresado no es valido";
            }

            break;
        case 3:
            echo $viaje;
            break;
        case 4:
           
            $nombre = solicitud_Datos("Nombre del responsable: ");
            $apellido = solicitud_Datos("Apellido del responsable: ");
            $numeroEmpleado = solicitud_Datos("Numero Empleado: ");
            $numerolicencia = solicitud_Datos(" Numero de licencia: ");
             $viaje->modificarResponsable($numeroEmpleado,$numerolicencia,$nombre,$apellido);
             echo "Los datos fueron cambiados. \n \n";
            break;
        case 5:
            echo "Saliendo...\n";
            break;
        default:
            echo "Opción no válida.\n";
    }
} while ($opcion != 5);

