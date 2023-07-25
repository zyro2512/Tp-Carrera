<?php
 require_once('Menu.php');

function subMenuAdmin($menu){
    $menu->menuAdmin();     //0 volver, 1 carreras, 2 participantes, 3 pagos
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

function subMenuParticipante($menu){
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
$menu->pantallaBienvenida('Es-Tan-Dil');
$menu->menuElegirUsuario();  //0 salir, 1 participante, 2 administrador
// Leer el tipo de usuario seleccionado
$opcionTipoUsuario = readline("opcion: ");
while ($opcionTipoUsuario != 0){
    switch ($opcionTipoUsuario) {
        case '1': 
	            subMenuParticipante($menu);
                break;
        case '2':
                subMenuAdmin($menu);
                break;
        default:
               $menu->writeln("Tipo de usuario inválido");
               break;
        }
        $menu->menuElegirUsuario();  //0 salir, 1 participante, 2 administrador
        $opcionTipoUsuario = readline("opcion: ");
    }
        $menu->pantallaDespedida();

 