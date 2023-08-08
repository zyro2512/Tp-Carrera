<?php

class Atleta {
    private $id;
    private $nombre;
    private $email;
    private $fechaNacimiento; //dd/mm/aaaa

    public function __construct($id, $nombre, $email, $fechaNacimiento) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->fechaNacimiento =  DateTime::createFromFormat('d/m/y', $fechaNacimiento);
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

    public function getFechaNacimiento(){
        return $this->fechaNacimiento;
    }

    public function getEdad(){
        $nacimiento = new DateTime($this->fechaNacimiento);
        $ahora = new DateTime(date("d-m-Y"));
        $diferencia = $ahora->diff($nacimiento);
        return $diferencia->format("%y");

    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
};