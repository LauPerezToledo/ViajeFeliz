<?php
include_once 'Pasajero.php';
include_once 'Viaje.php';
include_once 'ResponsableV.php';

// $pasajero1 = new Pasajero("Bruno", "Lopez", 45809467, 29950684562);
// $pasajero2 = new Pasajero("Marta", "Vazquez", 43728444, 22158932076);
// $pasajero3 = new Pasajero("Lautaro", "Fernandez", 14796389, 22158739029);
// $pasajero4 = new Pasajero("Micaela", "Perez", 20948392, 29959837194);

// $colPasajeros = [$pasajero1, $pasajero2, $pasajero3, $pasajero4];

// $responsable = new ResponsableV(76521, 8973241, "Mario", "Gonzales");

// $viaje1 = new Viaje(6734, "La plata", 200, $colPasajeros, $responsable);

// echo $viaje1;

$viaje = new Viaje (0, "", 0,[], null);

do{
    echo "ELIJA UNA OPCION \n"." 1)Crear viaje \n 2)Modificar viaje \n 3)Mostrar viaje \n 4)Salir \n";
    $opcion = trim(fgets(STDIN));
    switch($opcion){ 
        case 1: 
            echo "Ingrese el código del viaje\n";
            $cod = trim(fgets(STDIN));
            $viaje->setCodigo($cod);

            echo "Ingrese el destino\n";
            $des = trim(fgets(STDIN));
            $viaje->setDestino($des);

            echo "Ingrese la cantidad máxima de pasajeros\n";
            $cantMax = trim(fgets(STDIN));
            $viaje->setCantMaxima($cantMax);

            echo "Ingrese la cantidad de pasajeros que subiran viaje\n";
            $cantPasajeros = trim(fgets(STDIN));
            $i = 0;
            while ($i<$cantPasajeros){
                if ($viaje->cargarPasajero()){
                    echo "El pasajero se cargo exitosamente\n";
                    $i++;
                }
                else{
                    echo "Este DNI ya ha sido ingresado\n";
                }
            }
            $viaje->cargarResponsable();
            echo $viaje;
            
            break;
        case 2:
            echo "Elija el elemento del viaje que desea modificar \n
            1)Código \n 2)Destino \n 3)Cantidad máxima de pasajeros \n
            4)Datos de algún pasajero \n 5)Datos del responsable del viaje \n";
            $opc = trim(fgets(STDIN));
            switch($opc){
                case 1:
                    echo "Ingrese el nuevo código del viaje\n";
                    $cod = trim(fgets(STDIN));
                    $viaje->setCodigo($cod);
                    break;
                case 2:
                    echo "Ingrese el destino\n";
                    $des = trim(fgets(STDIN));
                    $viaje->setDestino($des);
                    break;
                case 3:
                    echo "Ingrese la cantidad máxima de pasajeros\n";
                    $cantMax = trim(fgets(STDIN));
                    $viaje->setCantMaxima($cantMax);
                    break;
                case 4:
                    echo "Ingrese el número de documento del pasajero que quiere modificar\n";
                    $dni = trim(fgets(STDIN));
                    $viaje->modificarPasajero($dni);
                    break;
                case 5:
                    $viaje->modificarResponsable();
                    break;
                default:
                    echo "Ingrese una opción válida\n";
            }

            break;
        case 3:
            echo $viaje;
            break;
        default:
            echo "Ingrese una opción válida\n";
    }
}
while ($opcion != 4);
