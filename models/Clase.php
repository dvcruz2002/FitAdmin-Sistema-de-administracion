<?php

namespace Model;

class Clase extends ActiveRecord{
    //base de datos
    protected static $tabla = 'clases';
    protected static $columnasDB = ['id', 'nombre', 'instructor', 'fecha', 'hora', 'lugar'];

    public $id;
    public $nombre;
    public $instructor;
    public $fecha;
    public $hora;
    public $lugar;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->instructor = $args['instructor'] ?? '';
        $this->fecha = $args['fecha'] ?? '';
        $this->hora = $args['hora'] ?? '';
        $this->lugar = $args['lugar'] ?? '';
    }

    public function existeClase(){
        $query = " SELECT * FROM " . self::$tabla . " WHERE id = '" . $this->id . "' LIMIT 1";

        $resultado=self::$db->query($query);

        if (!($resultado->num_rows)){
            self::$alertas['error'][]='La clase no existe';
        }
        return $resultado;
    }

    public function validarCrearClase(){
        if($this->fecha==="" || $this->hora==="" ){
            self::$alertas['error'][]='Todos los campos son obligatorios';
        }
        return self::$alertas;
    }

}