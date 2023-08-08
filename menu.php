<?php

class Menu{
    //Función que muestra una línea en pantalla con el salto de línea
    public function writeln($texto) {
        echo ($texto);
        echo(PHP_EOL);
    }

    //Función que muestra una línea en pantalla con el salto de línea
    public function readln($texto) {
        echo ($texto);
        $rta = readline();
        echo(PHP_EOL);
        return $rta;
   }   

public function pantallaBienvenida($nombreSistema){
        self::writeln("**************************************");
        self::writeln("**                                 **");     
        self::writeln("**   Bienvenidos a ".$nombreSistema."      **");
        self::writeln("**                                 **");     
        self::writeln("**************************************"); 
        self::writeln("");                            
    }

    public function pantallaDespedida(){
        self::writeln("Gracias por utilizar nuestro sistema");
        self::writeln("");
    }

    public function menuElegirUsuario(){
        self::writeln("Elige un tipo de usuario: ");
        self::writeln("0. Salir");
        self::writeln("1. Paricipante");
        self::writeln("2. Administrador");
        self::writeln("");
    }

    public function menuABMCarreras(){
        self::writeln("Menu ABM Carreras");
        self::writeln("");
    }

    public function menuPagos(){
        self::writeln("Menu Pagos");
        self::writeln("");
    }
    

    //Se eligió 2, administrar participantes (ABM)
    public function menuABMParticipantes(){
        self::writeln("Menu ABM Participantes");
        self::writeln("0. Volver al menu anterior");
        self::writeln("1. Alta participante");
        self::writeln("2. Baja participante");
        self::writeln("3. Modificar participante");
        self::writeln("4. Mostrar participantes");

    }

    public function menuAdmin(){
        self::writeln("Elija la operación a realizar: ");
        self::writeln("0. Volver al menu anterior");
        self::writeln("1. Administrar carreras");
        self::writeln("2. Administrar participantes");
        self::writeln("3. Administrar pagos");
        self::writeln("");
    }
       
    public function menuParticipante(){
        self::writeln("Elija la operación a realizar: ");
        self::writeln("0. Volver al menu anterior");
        self::writeln("1. Registrarse en el sistema");
        self::writeln("2. Administrar equipos");
        self::writeln("3. Administrar pagos");
        self::writeln("4. Administrar carreras");
        self::writeln("");
    }
}


?>