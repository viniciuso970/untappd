<?php

class CheckIn
{
    private $id;
    private $nomeCerveja;
    private $nomeCervejaria;
    private $nomeUsuario;
    private $avaliacao;

    public function __construct($id, $nomeCerveja, $nomeCervejaria, 
            $nomeUsuario, $avaliacao){
        $this->id = $id;
        $this->nomeCerveja = $nomeCerveja;
        $this->nomeCervejaria = $nomeCervejaria;
        $this->nomeUsuario = $nomeUsuario;
        $this->avaliacao = $avaliacao;
    }

    public function getId() {
        return $this->id;
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

}
