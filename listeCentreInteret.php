<?php
header("Access-Control-Allow-Origin: *");
//Création de la relation entre les pages
require_once 'cnx.php';    
require_once 'classes/class.Centre_interet.php';
//requete sql pour la liste des centre d'interet
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
    //Injection des centre d'interet dans la liste des centre d'interet
    $liste_centre_interet[] =$centre_ineret;
  }
}
// Génération du flux Json
echo json_encode($liste_centre_interet);
exit();