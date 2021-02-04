<?php
header("Access-Control-Allow-Origin: *");
//Relier la classe candidat
require_once 'cnx.php';    
require_once 'classes/class.Candidat.php';


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
  //Recherche d'un candidat par son id
  $sql = "SELECT *  FROM candidat";
  //Préparation de la requete
  $requete = $pdo->prepare($sql);
  //Parametre : id d'un candidat'
  $requete->bindValue(1,$_POST['id']);
  $candidat = null;
  //si la requete renvoie qqch
  if($requete->execute())
  {
    //parcourir le resultat
    while($donnee =$requete->fetch())
    {
      $candidat = new Candidat(
        $donnee['ID_CENTRE_INTERET'],
        $donnee['Intitule_centre_interet']
      );
    }
  }
  echo json_encode($candidat);
}
else
{
  //si pas de id erreur, on retourne -1
  echo -1;
}