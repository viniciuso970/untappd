<?php

class CheckIn
{
    private $id;
    private $idCerveja;
    private $idConta;
    private $nomeCerveja;
    private $nomeCervejaria;
    private $nomeUsuario;
    private $avaliacao;
    private $dataHora;

    public function __construct($id, $idCerveja, $idConta, $nomeCerveja, $nomeCervejaria, 
            $nomeUsuario, $avaliacao, $dataHora){
        $this->id = $id;
        $this->idCerveja = $idCerveja;
        $this->idConta = $idConta;
        $this->nomeCerveja = $nomeCerveja;
        $this->nomeCervejaria = $nomeCervejaria;
        $this->nomeUsuario = $nomeUsuario;
        $this->avaliacao = $avaliacao;
        $this->dataHora = $dataHora;
    }

    public function getId() {
        return $this->id;
    }

    public function getIdCerveja() {
        return $this->idCerveja;
    }

    public function getIdConta() {
        return $this->idConta;
    }

    public function getNomeCerveja() {
        return $this->nomeCerveja;
    }

    public function getNomeCervejaria() {
        return $this->nomeCervejaria;
    }

    public function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    public function getAvaliacao() {
        return $this->avaliacao;
    }

    public function getDataHora() {
        return $this->dataHora;
    }

}
