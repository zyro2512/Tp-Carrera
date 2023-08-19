<?php
class ArrayIdManager {
    private $arreglo;
    private static $ids = 0;

    // Constructor
    public function __construct(){
        $this->arreglo = [];
    }

       
    // Agregar un objeto nuevo
    public function agregar($elemento) {
        $this->arreglo[] = $elemento;
        self::$ids ++;
        return  self::$ids;
    }


    /**
     * Get the value of ids
     */ 
    public function getIds()
    {
        return self::$ids;
    }
    
    /**
     * Get the value of ids + 1, para crear un nuevo valor. No lo cambia por si la alta falla
     */ 
    public function getNuevoId()
    {
        $nuevoId = self::$ids+1;    	
        return $nuevoId;
    }
    
	//Busca si existe un id dentro de los elementos del arreglo	
	public function existeId($id){
		  foreach ($this->arreglo as $elemento) {
            if ($elemento->getId() == $id) {
                return TRUE;
            }
        }	
        return FALSE;	
	}

    // Eliminar un elemento por su ID
    public function eliminarPorId($id) {
        foreach ($this->arreglo as $key => $elemento) {
            if ($elemento->getId() == $id) {
                unset($this->arreglo[$key]);
                break;
            }
        }
    }


	  // Retorna por id el elemento, retorna NULL si no está
    public function getPorId($id) {
        foreach ($this->arreglo as $elemento) {
            if ($elemento->getId() == $id) {
                return $elemento;                
            }
        }
        return NULL;
    }
    
    //Va a modificar recibiendo un objeto, el id permanece
    public function modificar($elementoModificado) {
      $id = $elementoModificado->getId();
      if (self::existeId($id)){
      	foreach ($this->arreglo as $key => $elemento) {
            if ($elemento->getId() == $id) {
                $this->arreglo[$key] = $elementoModificado;
                break;
            }
         }
      }
    
    } 
        
    // Obtener arreglo
    protected function getArreglo() {
        return $this->arreglo;
    }
}


/*//Main para probar
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
*/
?>