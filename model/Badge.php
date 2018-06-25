<?php

class Badge
{
    private $id;
    private $nome;

    public function __construct($id1, $nome){
        $this->id1 = $id1;
        $this->nome = $nome;
    }

    public function getId1() {
        return $this->id1;
    }

    public function getNome() {
        return $this->nome;
    }
}
