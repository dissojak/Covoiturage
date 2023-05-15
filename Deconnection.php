<?php
include 'connexion.php';
 $okdec=mysqli_close($idcon);
  if($okdec) 
  {
  echo 'Déconnexion réussite <br/>' ; 
  }
  else
  { 
  echo 'Echec de la déconnexion <br/>' ; 
  }
  ?>