<?php
class Card {
    private $card;
    private $dateCard;
    private $cvv;
    private $nameOwner;

    public function __construct($card = "", $dateCard = "", $cvv = "", $nameOwner = "") {
        $this->card = $card;
        $this->dateCard = $dateCard;
        $this->cvv = $cvv;
        $this->nameOwner = $nameOwner;
    }

    public function getCard() {
        return $this->card;
    }

    public function setCard($card) {
        $this->card = $card;
    }

    public function getDateCard() {
        return $this->dateCard;
    }

    public function setDateCard($dateCard) {
        $this->dateCard = $dateCard;
    }

    public function getCvv() {
        return $this->cvv;
    }

    public function setCvv($cvv) {
        $this->cvv = $cvv;
    }

    public function getNameOwner() {
        return $this->nameOwner;
    }

    public function setNameOwner($nameOwner) {
        $this->nameOwner = $nameOwner;
    }
}

?>