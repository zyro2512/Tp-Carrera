<?php
 require_once('Menu.php');
 require_once('atletaManager.php'); 
 require_once('carreraManager.php');
  
  //Dar de alta un participante
  function altaParticipante($menu,$atletaManager){
        $nombre = $menu->readln("Ingrese nombre y apellido: ");
        $email = $menu->readln("Ingrese mail: ");
        $fechaNacimiento =  $menu->readln("Ingrese fecha de nacimiento, con el formato dd/mm/yyyy: ");
        $atleta = new Atleta($atletaManager->getNuevoId(),$nombre,$email,$fechaNacimiento);
        $atletaManager->agregar($atleta);
  }
 
  //Dar de baja un participante
  function bajaParticipante($menu,$atletaManager){
        $id = $menu->readln("Ingrese Id de atleta a elimiar: ");
        if($atletaManager->existeId($id)){
        		$atletaManager->eliminarPorId($id);
        	}else {
        		$menu->writeln("El id ingresado no se encuentra entre nuestros atletas");
        }
  }
         
  //Modificar un participante
  function modificaParticipante($menu,$atletaManager){
        $id = $menu->readln("Ingrese Id de atleta a modificar: ");
        if($atletaManager->existeId($id)){
            $atletaModificado = $atletaManager->getPorId($id);         	   
        	   $menu->writeln("A continuación ingrese los nuevos datos, enter para dejarlos sin modificar");
        		$nombre = $menu->readln("Ingrese nombre y apellido: ");
        		if ($nombre != ""){
        			$atletaModificado->setNombre($nombre);
        		}
            $email = $menu->readln("Ingrese mail: ");
        		if ($email != ""){
        			$atletaModificado->setEmail($email);
        		}
            $fechaNacimiento =  $menu->readln("Ingrese fecha de nacimiento, con el formato dd/mm/yyyy: ");
            if ($fechaNacimiento != ""){
        			$atletaModificado->setFechaNacimiento($fechaNacimiento);
        		}
		      $atletaManager->modificar($atletaModificado);
        	}else {
        		$menu->writeln("El id ingresado no se encuentra entre nuestros atletas");
        }
  }

  //Un administrador va a operar con participantes
  function ABMparticipantes($menu, $atletaManager){
        $opcion = $menu->ABMParticipantes();     //0 volver, 1 alta, 2 baja, 3 modificacion, 4 mostrar
        while ($opcion != 0){
            switch ($opcion) {
                case '1': 
                        altaParticipante($menu,$atletaManager);
                        break;
                case '2':
                        bajaParticipante($menu,$atletaManager);
                        break;
                case '3':
                        modificaParticipante($menu,$atletaManager);
                        break;
                case '4':
                        $atletaManager->mostrarAtletas();
                        break;
                default:
                       $menu->writeln("Tipo de operación inválida");
                       break;
                }
                $opcion = $menu->ABMParticipantes();     //0 volver, 1 alta, 2 baja, 3 modificacion, 4 mostrar
        }
    }

//Se le presentan todas las opciones para operar a un Administrador
  function operacionesAdmin($menu, $atletaManager){
    $opcion = $menu->admin();     //0 volver, 1 carreras, 2 participantes, 3 pagos
    while ($opcion != 0){
        switch ($opcion) {
            case '1': 
                    $menu->ABMCarreras();
                    break;
            case '2':
                    ABMparticipantes($menu,$atletaManager);
                    break;
            case '3':
                    $menu->menuPagos();
                    break;
            default:
                   $menu->writeln("Tipo de operación inválida");
                   break;
            }
            $menu->admin();  //0 salir, 1 participante, 2 administrador
            $opcion = readline("opcion: ");
    }
}

//Se le presentan todas las opciones para operar a un participante
function operacionesParticipante($menu, $atletaManager){
	 $opcion = $menu->participante();     //0 volver, 1 carreras, 2 participantes, 3 pagos
    while ($opcion != 0){
		  $menu->cls();        
        switch ($opcion) {
            case '1': 
                    $menu->menuABMCarreras();
                    break;
            case '2':
                    $menu->menuABMParticipantes();
                    break;
            case '3':
                    $menu->menuPagos();
                    break;
            default:
                   $menu->writeln("Tipo de operación inválida");
                   break;
            }
            $opcion = $menu->participante();   //0 volver, 1 carreras, 2 participantes, 3 pagos
    }
}

//MAIN

$menu = new Menu;
$menu->cls();
$menu->pantallaBienvenida('Es-Tan-Dil');

$atletaManager = new AtletaManager();
$atletaManager->cargaInicial();

$carreraManager = new CarreraManager();
$carreraManager->cargaInicial();

// Leer el tipo de usuario seleccionado
$opcionTipoUsuario = $menu->elegirUsuario();  //0 salir, 1 participante, 2 administrador

while ($opcionTipoUsuario != 0){
    
     switch ($opcionTipoUsuario) {
        case '1': 
	        operacionesParticipante($menu,$atletaManager);
           break;
        case '2':
           operacionesAdmin($menu,$atletaManager);
           break;
        default:
           $menu->writeln("Tipo de usuario inválido");
           break;
        }
        $opcionTipoUsuario = $menu->elegirUsuario();  //0 salir, 1 participante, 2 administrador;

    }
    $menu->pantallaDespedida();
?>