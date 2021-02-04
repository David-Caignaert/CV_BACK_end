<?php
header("Access-Control-Allow-Origin: *");
//Relier la classe centre d'interet
require_once 'cnx.php';    
require_once 'classes/class.Centre_interet.php';

if(isset($_POST['id']))
{
  $_GET['id']=$_POST['id'];
}
else
{
  if(isset($_GET['id']))
  {
    $_POST['id']=$_GET['id'];
  }
}
if(isset($_POST['id']))
{
  //Recherche du centre d'interet par son id
  $sql = "SELECT *  FROM candidat,avoir,centre_interet 
                    WHERE  candidat.ID_CANDIDAT = avoir.ID_CANDIDAT
                    AND avoir.ID_CENTRE_INTERET = centre_interet.ID_CENTRE_INTERET
                    AND ID_CENTRE_INTERET = ?";
  //Préparation de la requete
  $requete = $pdo->prepare($sql);
  //Parametre : id du centre d'interet
  $requete->bindValue(1,$_POST['id']);
  $centre_interet = null;
  //si la requete renvoie qqch
  if($requete->execute())
  {
    //parcourir le resultat
    while($donnee =$requete->fetch())
    {
      $centre_interet = new Centre_interet(
        $donnee['ID_CENTRE_INTERET'],
        $donnee['Intitule_centre_interet']
      );
    }
  }
  echo json_encode($centre_interet);
}
else
{
  //si pas de id erreur, on retourne -1
  echo -1;
}