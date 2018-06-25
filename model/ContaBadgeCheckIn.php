<?php

class ContaBadgeCheckIn
{
    private $idConta;
    private $idCheckIn;
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

    public function __construct($idConta, $idCheckIn,
        $badge1, $badge2, $badge3, $badge4, $badge5,
        $badge6, $badge7, $badge8, $badge9, $badge10){
        $this->idConta = $idConta;
        $this->idCheckIn = $idCheckIn;
        $this->badge1 = $badge1;
        $this->badge2 = $badge2;
        $this->badge3 = $badge3;
        $this->badge4 = $badge4;
        $this->badge5 = $badge5;
        $this->badge6 = $badge6;
        $this->badge7 = $badge7;
        $this->badge8 = $badge8;
        $this->badge9 = $badge9;
        $this->badge10 = $badge10;
    }

    public function getIdConta() {
        return $this->idConta;
    }

    public function getIdCheckIn() {
        return $this->idCheckIn;
    }

    public function getBadge1() {
        return $this->badge1;
    }

    public function getBadge2() {
        return $this->badge2;
    }

    public function getBadge3() {
        return $this->badge3;
    }

    public function getBadge4() {
        return $this->badge4;
    }

    public function getBadge5() {
        return $this->badge5;
    }

    public function getBadge6() {
        return $this->badge6;
    }

    public function getBadge7() {
        return $this->badge7;
    }

    public function getBadge8() {
        return $this->badge8;
    }

    public function getBadge9() {
        return $this->badge9;
    }

    public function getBadge10() {
        return $this->badge10;
    }

}
