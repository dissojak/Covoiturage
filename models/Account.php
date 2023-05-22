<?php

class Account {
    private $username;
    private $pw;
    private $nom;
    private $cin;
    private $adresse;
    private $tel;
    private $role;
    private $carModel;
    private $mat;

    function __construct($username = "", $pw = "", $nom = "", $cin = "", $adresse = "", $tel = "", $role = "", $carModel = "", $mat = "") {
        $this->username = $username;
        $this->pw = $pw;
        $this->nom = $nom;
        $this->cin = $cin;
        $this->adresse = $adresse;
        $this->tel = $tel;
        $this->role = $role;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getPw(){
        return $this->pw;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getCin(){
        return $this->cin;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function getTel(){
        return $this->tel;
    }

    public function getRole(){
        return $this->role;
    }
    public function setPw($pw){
        $this->pw = $pw;
    }

    public function setUsername($username){
        $this->username = $username;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setCin($cin){
        $this->cin = $cin;
    }

    public function setAdresse($adresse){
        $this->adresse = $adresse;
    }

    public function setTel($tel){
        $this->tel = $tel;
    }

    public function setRole($role){
        $this->role = $role;
    }




}


?>
