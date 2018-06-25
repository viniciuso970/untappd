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
    private $badge1;
    private $badge2;
    private $badge3;
    private $badge4;
    private $badge5;
    private $badge6;
    private $badge7;
    private $badge8;
    private $badge9;
    private $badge10;

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

    public function getBadges() {
        //return $this->badges;
    }
}
