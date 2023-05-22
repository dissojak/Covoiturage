<?php

class Location {
    public $nbplace;
    public $prix;
    public $datedepare;
    public $villedepare;
    public $villefin;
    public $Cin;
    public $mat;

    function __construct($nbplace = "", $prix = "", $datedepare = "", $villedepare = "", $villefin = "", $Cin = "", $mat = "") {
        $this->nbplace = $nbplace;
        $this->prix = $prix;
        $this->datedepare = $datedepare;
        $this->villedepare = $villedepare;
        $this->villefin = $villefin;
        $this->Cin = $Cin;
        $this->mat = $mat;
    }

    public function getNbPlace() {
        return $this->nbplace;
    }

    public function setNbPlace($nbplace) {
        $this->nbplace = $nbplace;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }

    public function getDateDepare() {
        return $this->datedepare;
    }

    public function setDateDepare($datedepare) {
        $this->datedepare = $datedepare;
    }

    public function getVilleDepare() {
        return $this->villedepare;
    }

    public function setVilleDepare($villedepare) {
        $this->villedepare = $villedepare;
    }

    public function getVilleFin() {
        return $this->villefin;
    }

    public function setVilleFin($villefin) {
        $this->villefin = $villefin;
    }

    public function getCin() {
        return $this->Cin;
    }

    public function setCin($Cin) {
        $this->Cin = $Cin;
    }

    public function getMat() {
        return $this->mat;
    }

    public function setMat($mat) {
        $this->mat = $mat;
    }
}


?>