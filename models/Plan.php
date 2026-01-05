<?php

namespace Model;

class Plan extends ActiveRecord{
    //base de datos
    protected static $tabla = 'planes';
    protected static $columnasDB = ['id', 'nombre', 'cantidad', 'precio'];

    public $id;
    public $nombre;
    public $cantidad;
    public $precio;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->cantidad = $args['cantidad'] ?? 0;
        $this->precio = $args['precio'] ?? '';
    }

    public function validarCrearPlan(){
        if($this->nombre==="" || $this->cantidad==="" ){
            self::$alertas['error'][]='Todos los campos son obligatorios';
        }
        return self::$alertas;
    }

}