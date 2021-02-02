<?php
header("Access-Control-Allow-Origin: *");
//Relier la classe Candicat
require_once 'cnx.php';    
require_once 'classes/class.Formation.php';
//ordre sql
$sql_formation = "SELECT * FROM formation";
//préparation de la requete 
$requete_formation = $pdo->prepare($sql_formation);
//liste de centre d'interet
$liste_formation =array();
//testé si la requete est ok
if($requete_formation->execute())
{
  //parcourir les resultats
  while($donnee_formation=$requete_formation->fetch())
  {
    //Céation d'un objet centre d'interet
    $formation = new Formation(
      $donnee_formation['ID_FORMATION'],
      $donnee_formation['Ville_formation'],
      $donnee_formation['Annee_obtention_formation'],
      $donnee_formation['Intitule_formation'],
      $donnee_formation['Lieu_formation'],
    );
    $liste_formation[] =$formation;
  }
}
// Génération du flux Json
echo json_encode($liste_formation);
exit();