<?php

class Conta
{
    private $id;
    private $email;
    private $senha;
    private $nome;
    private $usuario;
    private $total;
    private $unico;

    public function __construct($id, $email, $senha, $nome, $usuario,
            $total, $unico){
        $this->id = $id;
        $this->email = $email;
        $this->senha = $senha;
        $this->nome = $nome;
        $this->usuario = $usuario;
        $this->total = $total;
        $this->unico = $unico;
    }

    public function getId() {
        return $this->id;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getTotal() {
        return $this->total;
    }

    public function getUnico() {
        return $this->unico;
    }
}
