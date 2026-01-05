<?php

namespace Model;

class Suscripcion extends ActiveRecord{
    //base de datos
    protected static $tabla = 'suscripciones';
    protected static $columnasDB = ['id', 'planId', 'meses'];

    public $id;
    public $planId;
    public $meses;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->planId = $args['planId'] ?? '';
        $this->meses = $args['meses'] ?? '';
    }

}