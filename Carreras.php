<?php

class Carrera {

    private $id;
    private $nombre;
    private $circuito;
    private $fecha;
    private $precio;
    private $kits;

    public function __construct($id,$nombre,$circuito,$fecha,$precio,$kits)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->circuito = $circuito;
        $this->fecha = $fecha;
        $this->precio = $precio;
        $this->kits = $kits;
    }

   

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of kits
     */ 
    public function getKits()
    {
        return $this->kits;
    }

    /**
     * Set the value of kits
     *
     * @return  self
     */ 
    public function setKits($kits)
    {
        $this->kits = $kits;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of circuito
     */ 
    public function getCircuito()
    {
        return $this->circuito;
    }

    /**
     * Set the value of circuito
     *
     * @return  self
     */ 
    public function setCircuito($circuito)
    {
        $this->circuito = $circuito;

        return $this;
    }
}