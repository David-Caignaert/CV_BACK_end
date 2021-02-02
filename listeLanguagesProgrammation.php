<?php
header("Access-Control-Allow-Origin: *");
//Relier la classe Candicat
require_once 'cnx.php';    
require_once 'classes/class.Language_programmation.php';
//ordre sql
$sql_language_programmation = "SELECT * FROM language_programmation";
//préparation de la requete 
$requete_language_programmation = $pdo->prepare($sql_language_programmation);
//liste de centre d'interet
$liste_language_programmation =array();
//testé si la requete est ok
if($requete_language_programmation->execute())
{
  //parcourir les resultats
  while($donnee_language_programmation=$requete_language_programmation->fetch())
  {
    //Céation d'un objet centre d'interet
    $language_programmation = new Formation(
      $donnee_language_programmation['ID_LANGUAGE_PROGRAMMATION'],
      $donnee_language_programmation['Nom_language_programmation'],
      $donnee_language_programmation['Logo_language_programmation'],
    );
    $liste_language_programmation[] =$language_programmation;
  }
}
// Génération du flux Json
echo json_encode($liste_language_programmation);
exit();