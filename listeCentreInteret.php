<?php
header("Access-Control-Allow-Origin: *");
//Relier la classe Candicat
require_once 'cnx.php';    
require_once 'classes/class.Centre_interet.php';
//ordre sql
$sql_centre_interet = "SELECT * FROM centre_interet";
//préparation de la requete 
$requete_centre_interet = $pdo->prepare($sql_centre_interet);
//liste de centre d'interet
$liste_centre_interet =array();
//testé si la requete est ok
if($requete_centre_interet->execute())
{
  //parcourir les resultats
  while($donnee_centre_interet=$requete_centre_interet->fetch())
  {
    //Céation d'un objet centre d'interet
    $centre_ineret = new Centre_interet(
      $donnee_centre_interet['ID_CENTRE_INTERET'],
      $donnee_centre_interet['Intitule_centre_interet'],
    );
    $liste_centre_interet[] =$centre_ineret;
  }
}
// Génération du flux Json
echo json_encode($liste_centre_interet);
exit();