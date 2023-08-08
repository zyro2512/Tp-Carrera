<?php
require_once('atleta.php');

class AtletaManager {
    private $atletas;
    static $ids = 0;

    // Constructor
    public function __construct(){
        $this->atletas = [];
    }

       
    // Agregar un nuevo atleta
    public function agregaratleta($atleta) {
        $this->atletas[] = $atleta;
        self::$ids ++; 
    }


    /**
     * Get the value of ids
     */ 
    public function getIds()
    {
        return self::$ids;
    }

    // Eliminar un atleta por su ID
    public function eliminaratleta($id) {
        foreach ($this->atletas as $key => $atleta) {
            if ($atleta->getId() === $id) {
                unset($this->atletas[$key]);
                break;
            }
        }
    }

    // Actualizar los datos de un atleta por su ID
    public function actualizaratleta($id, $nombre, $email) {
        foreach ($this->atletas as $atleta) {
            if ($atleta->getId() === $id) {
                $atleta->setNombre($nombre);
                $atleta->setEmail($email);
                break;
            }
        }
    }

    // Obtener todos los atletas
    public function obteneratletas() {
        return $this->atletas;
    }
}


/*Main para probar
// Crear el objeto del Administrador de Atleta
$atletaManager = new AtletaManager();

// Agregar atletas
$atleta1 = new Atleta(1, 'Juan', 'juan@example.com','04/06/1999');
$atleta2 = new Atleta(2, 'María', 'maria@example.com','14/08/2000');
$atleta3 = new Atleta(3, 'Pedro', 'pedro@example.com','12/03/1992');

$atletaManager->agregaratleta($atleta1);
$atletaManager->agregaratleta($atleta2);
$atletaManager->agregaratleta($atleta3);

// Obtener todos los Atleta
$atletas = $atletaManager->obteneratletas();
foreach ($atletas as $atleta) {
    echo "ID: " . $atleta->getId() . ", Nombre: " . $atleta->getNombre() . ", Email: " . $atleta->getEmail() . $atleta->getFechaNacimiento();
    echo(PHP_EOL);
}

// Actualizar un Atleta
$atletaManager->actualizaratleta(2, 'María Rodríguez', 'maria.rodriguez@example.com','14/08/2001');

// Eliminar un Atleta
$atletaManager->eliminaratleta(3);

// Mostrar Atletas después de la actualización y eliminación
$atletas = $atletaManager->obteneratletas();
echo("Atletas después de la actualización y eliminación:");
echo(PHP_EOL);
foreach ($atletas as $atleta) {
    echo "ID: " . $atleta->getId() 1. ", Nombre: " . $atleta->getNombre() . ", Email: " . $atleta->getEmail();
    echo(PHP_EOL);

    
}
$atleta1->getEdad();

*/