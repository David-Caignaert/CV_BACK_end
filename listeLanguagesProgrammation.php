<?php
header("Access-Control-Allow-Origin: *");
//Relier la classe Language_programmation.php
require_once 'cnx.php';    
require_once 'classes/class.Language_programmation.php';
//Requete sql pour la liste de language de programmation
$sql_language_programmation = "SELECT * FROM language_programmation";
//préparation de la requete 
$requete_language_programmation = $pdo->prepare($sql_language_programmation);
//liste de language de programmation
$liste_language_programmation =array();
//testé si la requete est ok
if($requete_language_programmation->execute())
{
  //parcourir les resultats
  while($donnee_language_programmation=$requete_language_programmation->fetch())
  {
    //Céation d'un objet language de programmation
    $language_programmation = new Language_programmation(
      $donnee_language_programmation['ID_LANGUAGE_PROGRAMMATION'],
      $donnee_language_programmation['Nom_language_programmation'],
      $donnee_language_programmation['Logo_language_programmation'],
    );
    //Relier les language de programmation a la liste des languages de programmation
    $liste_language_programmation[] =$language_programmation;
  }
}
// Génération du flux Json
echo json_encode($liste_language_programmation);
exit();