<?php

class Comentario
{
    private $id;
    private $idCheckin;
    private $idConta;
    private $texto;

    public function __construct($id, $idCheckin, $idConta, 
            $texto){
        $this->id = $id;
        $this->idCheckin = $idCheckin;
        $this->idConta = $idConta;
        $this->texto = $texto;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdCheckin() {
        return $this->idCheckin;
    }

    public function getIdConta() {
        return $this->idConta;
    }

    public function getTexto() {
        return $this->texto;
    }
}
