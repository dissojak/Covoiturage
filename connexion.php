<?php 
class connexion { 
    public function Cnx()
     {
         $dbc=new PDO('mysql:host=localhost;dbname=covoiturage','root','');
          return $dbc; 
          } 
          }?>