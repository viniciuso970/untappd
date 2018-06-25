<?php

class Cerveja
{
    private $id;
    private $idCervejaria;
    private $nome;
    private $teor;
    private $tipo;
    private $avaliacao;

    public function __construct($id, $idCervejaria, 
                $nome, $teor, $avaliacao){
        $this->id = $id;
        $this->idCervejaria = $idCervejaria;
        $this->nome = $nome;
        $this->teor = $teor;
        $this->avaliacao = $avaliacao;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdCervejaria() {
        return $this->idCervejaria;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTeor() {
        return $this->teor;
    }

    public function getAvaliacao() {
        return $this->avaliacao;
    }
}
