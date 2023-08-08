<?php
 require_once('Menu.php');
// require_once('atleta.php');
 require_once('atletaManager.php'); 
 require_once('Carreas.php');
  
    //Dar de alta un participante
  function altaParticipante($menu,$atletaManager){
        $nombre = $menu->readln("Ingrese nombre y apellido: ");
        $email = $menu->readln("Ingrese mail: ");
        $fechaNacimiento =  $menu->readln("Ingrese fecha de nacimiento, coon el formato dd/mm/yyyy: ");
        $id = $atletaManager->getIds();
        $atleta = new Atleta($id,$nombre,$email,$fechaNacimiento);
        $atletaManager->agregaratleta($atleta);
    }
 
    //Muestra todos los atletas
  function mostrarParticipantes($menu,$atletaManager){
        $atletas = $atletaManager->obteneratletas();
        foreach ($atletas as $atleta) {
            var_dump($atleta);
            //    echo "ID: " . $atleta->getId() . ", Nombre: " . $atleta->getNombre() . ", Email: " . $atleta->getEmail() . ", Fecha nacimiento: " . $atleta->getFechaNacimiento->format('d/m/y');
            echo(PHP_EOL);
        }
}
       
       


    function menuABMparticipantes($menu, $atletaManager){
        $menu->menuABMParticipantes();     //0 volver, 1 alta, 2 baja, 3 modificacion, 4 mostrar
        $opcion = readline("opcion: ");
        while ($opcion != 0){
            switch ($opcion) {
                case '1': 
                        altaParticipante($menu,$atletaManager);
                        break;
                case '2':
                        bajaParticipante($menu,$atletaManager);
                        break;
                case '3':
                        modificarParticipante($menu,$atletaManager);
                        break;
                case '4':
                        mostrarParticipantes($menu,$atletaManager);
                        break;
                default:
                       $menu->writeln("Tipo de operación inválida");
                       break;
                }
                $menu->menuABMParticipantes();
                $opcion = readline("opcion: ");
        }
    }

    function subMenuAdmin($menu, $atletaManager){
    $menu->menuAdmin();     //0 volver, 1 carreras, 2 participantes, 3 pagos
    $opcion = readline("opcion: ");
    while ($opcion != 0){
        switch ($opcion) {
            case '1': 
                    $menu->menuABMCarreras();
                    break;
            case '2':
                    menuABMparticipantes($menu,$atletaManager);
                    break;
            case '3':
                    $menu->menuPagos();
                    break;
            default:
                   $menu->writeln("Tipo de operación inválida");
                   break;
            }
            $menu->menuAdmin();  //0 salir, 1 participante, 2 administrador
            $opcion = readline("opcion: ");
    }
}

function subMenuParticipante($menu, $atletaManager){
    $menu->menuParticipante();     //0 volver, 1 carreras, 2 participantes, 3 pagos
    $opcion = readline("opcion: ");
    while ($opcion != 0){
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
            $menu->menuAdmin();  //0 salir, 1 participante, 2 administrador
            $opcion = readline("opcion: ");
    }
}

$menu = new Menu;
 $atletaManager = new AtletaManager();
$menu->pantallaBienvenida('Es-Tan-Dil');
$menu->menuElegirUsuario();  //0 salir, 1 participante, 2 administrador
// Leer el tipo de usuario seleccionado
$opcionTipoUsuario = readline("opcion: ");
//system('cls'); 
while ($opcionTipoUsuario != 0){
      
    switch ($opcionTipoUsuario) {
        case '1': 
	        subMenuParticipante($menu,$atletaManager);
                break;
        case '2':
                subMenuAdmin($menu,$atletaManager);
                break;
        default:
               $menu->writeln("Tipo de usuario inválido");
               break;
        }
        $menu->menuElegirUsuario();  //0 salir, 1 participante, 2 administrador
        $opcionTipoUsuario = readline("opcion: ");

    }
        $menu->pantallaDespedida();

 