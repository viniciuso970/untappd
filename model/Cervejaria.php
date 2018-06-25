<?php

class Cervejaria
{
    private $id;
    private $nome;
    private $cidade;
    private $estado;
    private $pais;
    private $avaliacao;
    private $tipo;

    public function __construct($id, $nome, $cidade, 
                $estado, $pais, $avaliacao, $tipo){
        $this->id = $id;
        $this->nome = $nome;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->pais = $pais;
        $this->avaliacao = $avaliacao;
        $this->tipo = $tipo;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getPais() {
        return $this->pais;
    }

    public function getAvaliacao() {
        return $this->avaliacao;
    }

    public function getTipo() {
        return $this->tipo;
    }
}
