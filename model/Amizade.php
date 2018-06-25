<?php

class Amizade
{
    private $id1;
    private $id2;

    public function __construct($id1, $id2){
        $this->id1 = $id1;
        $this->id2 = $id2;
    }

    public function getId1() {
        return $this->id1;
    }

    public function getId2() {
        return $this->id2;
    }
}
