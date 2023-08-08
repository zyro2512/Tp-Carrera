<?php
require_once('carreras.php');

class CarreraManager {
    private $carreras;
    static $ids = 0;

    // Constructor
    public function __construct(){
        $this->carreras = [];
    }

       
    // Agregar un nuevo carrera
    public function agregarcarrera($carrera) {
        $this->carreras[] = $carrera;
        self::$ids ++; 
    }


    /**
     * Get the value of ids
     */ 
    public function getIds()
    {
        return self::$ids;
    }

    // Eliminar un carrera por su ID
    public function eliminarcarrera($id) {
        foreach ($this->carreras as $key => $carrera) {
            if ($carrera->getId() === $id) {
                unset($this->carreras[$key]);
                break;
            }
        }
    }

    // Actualizar los datos de un carrera por su ID
    public function actualizarcarrera($id, $nombre, $circuito,$fecha,$precio,$kits) {
        foreach ($this->carreras as $carrera) {
            if ($carrera->getId() === $id) {
                $carrera->setNombre($nombre);
                $carrera->setCircuito($circuito);
                $carrera->setFecha($fecha);
                $carrera->setPrecio($precio);
                $carrera->setKits($kits);
                break;
            }
        }
    }

    // Obtener todos los carreras
    public function obtenercarreras() {
        return $this->carreras;
    }
}


//Main para probar
// Crear el objeto del Administrador de carrera
$carreraManager2 = new carreraManager();

// Agregar carreras  ($id,$nombre,$circuito,$fecha,$precio,$kits
$carrera1 = new carrera(1,'Desafio del Lago', 'el dique','04/06/2023','$5000', null);
$carrera2 = new carrera(2,'Desafio de las Animas', 'las animas','04/07/2023','$7000',null);
$carrera3 = new carrera(3,'Pioneros', 'Los pioneros','03/08/2023','$3000',null);

$carreraManager2->agregarcarrera($carrera1);
$carreraManager2->agregarcarrera($carrera2);
$carreraManager2->agregarcarrera($carrera3);

// Obtener todos los carrera
$carreras = $carreraManager2->obtenercarreras();
foreach ($carreras as $carrera) {
    echo "ID: " . $carrera->getId() . ", Nombre: " . $carrera->getNombre() . ", Fecha: " . $carrera->getFecha() . ", Precio: " .$carrera->getPrecio();
    echo(PHP_EOL);
}

// Actualizar un carrera $id, $nombre, $circuito,$fecha,$precio,$kits
$carreraManager2->actualizarcarrera(2, 'super Desafio', 'la cascada','14/08/2001','$5000','remera');

// Eliminar un carrera
$carreraManager2->eliminarcarrera(3);

// Mostrar carreras después de la actualización y eliminación
$carreras = $carreraManager2->obtenercarreras();
echo("carreras después de la actualización y eliminación:");
echo(PHP_EOL);
// Obtener todos los carrera
$carreras = $carreraManager2->obtenercarreras();
foreach ($carreras as $carrera) {
    echo "ID: " . $carrera->getId() . ", Nombre: " . $carrera->getNombre() . ", Fecha: " . $carrera->getFecha() . ", Precio: " .$carrera->getPrecio();
    echo(PHP_EOL);
}

