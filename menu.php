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
   
   //Limpia la pantalla dependiendo del sistema operativo que estemos usando 
   public function cls(){
      if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    // Estás en Windows
    		system("cls");
		} else {
    			system("clear");
      }
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

    public function elegirUsuario(){
		  self::cls();        
        self::writeln("Elige un tipo de usuario: ");
        self::writeln("0. Salir");
        self::writeln("1. Paricipante");
        self::writeln("2. Administrador");
        self::writeln("");
        return self::readln("opción: ");   
    }

    public function ABMCarreras(){
        self::writeln("Menu ABM Carreras");
        self::writeln("");
    }

    public function Pagos(){
        self::writeln("Menu Pagos");
        self::writeln("");
    }
    

    //Se eligió 2, administrar participantes (ABM)
    public function ABMParticipantes(){          
        self::writeln("Menu ABM Participantes");
        self::writeln("0. Volver al menu anterior");
        self::writeln("1. Alta participante");
        self::writeln("2. Baja participante");
        self::writeln("3. Modificar participante");
        self::writeln("4. Mostrar participantes");
        return self::readln("opción: ");  

    }

    public function admin(){
		  self::cls();          
        self::writeln("Elija la operación a realizar: ");
        self::writeln("0. Volver al menu anterior");
        self::writeln("1. Administrar carreras");
        self::writeln("2. Administrar participantes");
        self::writeln("3. Administrar pagos");
        return self::readln("opción: ");  
    }
       
    public function participante(){
		  self::cls();       
        self::writeln("Elija la operación a realizar: ");
        self::writeln("0. Volver al menu anterior");
        self::writeln("1. Registrarme en el sistema");
        self::writeln("2. Administrar mis equipos");
        self::writeln("3. Administrar mis pagos");
        self::writeln("4. Administrar mis carreras");
        return self::readln("opción: ");  
    }
}


?>