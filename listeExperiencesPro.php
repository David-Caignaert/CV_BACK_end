<?php
header("Access-Control-Allow-Origin: *");
//Relier la classe Candicat
require_once 'cnx.php';    
require_once 'classes/class.Experience_pro.php';
//ordre sql
$sql_experience_pro = "SELECT * FROM experience_pro";
//préparation de la requete 
$requete_experience_pro = $pdo->prepare($sql_experience_pro);
//liste de centre d'interet
$liste_experience_pro =array();
//testé si la requete est ok
if($requete_experience_pro->execute())
{
  //parcourir les resultats
  while($donnee_experience_pro=$requete_experience_pro->fetch())
  {
    //Céation d'un objet centre d'interet
    $experience_pro = new Experience_pro(
      $donnee_experience_pro['ID_EXPERIENCE_PRO'],
      $donnee_experience_pro['Date_debut_experience_pro'],
      $donnee_experience_pro['Date_fin_experience_pro'],
      $donnee_experience_pro['Intitule_experience_pro'],
      $donnee_experience_pro['Lieu_experience_pro'],
      $donnee_experience_pro['Ville_experience_pro'],
    );
    $liste_experience_pro[] =$experience_pro;
  }
}
// Génération du flux Json
echo json_encode($liste_experience_pro);
exit();