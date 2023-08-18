<?php
/*
Ejercicio 1.
Crea una clase Persona con los siguientes atributos nombre, apellidos y edad.
Crea su constructor, los getters y setters.
Crear las siguientes funciones:
• mayorEdad: indica si es o no mayor de edad.
• nombreCompleto: devuelve el nombre más los apellidos
*/ 
class Persona{
    private $nombre;
    private $apellidos;
    private $edad;
    public function __construct($nombre,$apellidos,$edad){
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->edad=$edad;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellidos(){
        return $this->apellidos;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellidos($apellidos){
        $this->apellidos=$apellidos;
    }
    public function setEdad($edad){
        $this->edad=$edad;
    }
    public function mayorEdad(){
        if($this->edad>=18){
            return true;
        }else{
            return false;
        }
    }
    public function nombreCompleto(){
        return $this->nombre." ".$this->apellidos;
    }
}

$persona1=new Persona("Juan","Perez",20);

echo $persona1->nombreCompleto();
if ($persona1->mayorEdad()){
    echo " es mayor de edad";
}else{
    echo " no es mayor de edad";
}
?>



