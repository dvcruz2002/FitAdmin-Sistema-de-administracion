<?php

namespace Model;

class Inscrita extends ActiveRecord{
    //base de datos
    protected static $tabla = 'inscritas';
    protected static $columnasDB = ['id', 'userId', 'claseId'];

    public $id;
    public $userId;
    public $claseId;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->userId = $args['userId'] ?? '';
        $this->claseId = $args['claseId'] ?? '';
    }

}