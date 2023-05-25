<?php

class Voiture {

    private $carModel;
    private $mat;

    function __construct( $mat = "",$cin = "",$carModel = "") {
        $this->cin = $cin;
        $this->carModel = $carModel;
        $this->mat = $mat;
    }        
    public function getCarModel(){
        return $this->carModel;
    }
    public function setCarModel($carModel){
        $this->carModel = $carModel;
    }
    public function getMat(){
        return $this->mat;
    }
    public function setMat($mat){
        $this->mat = $mat;
    }
    public function getCin(){
        return $this->cin;
    }

}
    