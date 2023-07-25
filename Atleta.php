<?php

class Atleta {
    private $id;
    private $nombre;
    private $email;

    public function __construct($id, $nombre, $email) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
    }

    // Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}

class AtletaManager {
    private $atleta = [];

    // Agregar un nuevo atleta
    public function agregaratleta($atleta) {
        $this->atleta[] = $atleta;
    }

    // Eliminar un atleta por su ID
    public function eliminaratleta($id) {
        foreach ($this->atleta as $key => $atleta) {
            if ($atleta->getId() === $id) {
                unset($this->atleta[$key]);
                break;
            }
        }
    }

    // Actualizar los datos de un atleta por su ID
    public function actualizaratleta($id, $nombre, $email) {
        foreach ($this->atleta as $atleta) {
            if ($atleta->getId() === $id) {
                $atleta->setNombre($nombre);
                $atleta->setEmail($email);
                break;
            }
        }
    }

    // Obtener todos los atleta
    public function obteneratleta() {
        return $this->atleta;
    }
}

// Crear el objeto del Administrador de Atleta
$atletaManager = new AtletaManager();

// Agregar atletas
$atleta1 = new Atleta(1, 'Juan', 'juan@example.com');
$atleta2 = new Atleta(2, 'María', 'maria@example.com');
$atleta3 = new Atleta(3, 'Pedro', 'pedro@example.com');

$atletaManager->agregaratleta($atleta1);
$atletaManager->agregaratleta($atleta2);
$atletaManager->agregaratleta($atleta3);

// Obtener todos los Atleta
$atleta = $atletaManager->obteneratleta();
foreach ($atleta as $atleta) {
    echo "ID: " . $atleta->getId() . ", Nombre: " . $atleta->getNombre() . ", Email: " . $atleta->getEmail() . "<br>";
}

// Actualizar un Atleta
$atletaManager->actualizaratleta(2, 'María Rodríguez', 'maria.rodriguez@example.com');

// Eliminar un Atleta
$atletaManager->eliminaratleta(3);

// Mostrar Atletas después de la actualización y eliminación
$atleta = $atletaManager->obteneratleta();
echo "<br>Atletas después de la actualización y eliminación:<br>";
foreach ($atleta as $atleta) {
    echo "ID: " . $atleta->getId() . ", Nombre: " . $atleta->getNombre() . ", Email: " . $atleta->getEmail() . "<br>";
}
