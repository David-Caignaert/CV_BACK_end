<?php
header("Access-Control-Allow-Origin: *");
//Relier la classe formation
require_once '../cnx.php';    
require_once '../classes/class.Formation.php';

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
  //Recherche de formation par son id
  $sql = "SELECT *  FROM candidat,passer,formation 
                    WHERE candidat.ID_CANDIDAT = passer.ID_CANDIDAT
                    AND passer.ID_FORMATION = formation.ID_FORMATION 
                    AND formation.ID_FORMATION = ?";
  //Préparation de la requete
  $requete = $pdo->prepare($sql);
  //Parametre : id d'une formation
  $requete->bindValue(1,$_POST['id']);
  $formation = null;
  //si la requete renvoie qqch
  if($requete->execute())
  {
    //parcourir le resultat
    while($donnee =$requete->fetch())
    {
      $formation = new Formation(
        $donnee['ID_FORMATION'],
        $donnee['Ville_formation'],
        $donnee['Annee_obtention_formation'],
        $donnee['Intitule_formation'],
        $donnee['Lieu_formation'],
      );
      //Création d'un objet Candidat
      $candidat = new Candidat(
        $donnee['ID_CANDIDAT'],
        $donnee['Nom_candidat'],
        $donnee['Prenom_candidat'],
        $donnee['Adresse_candidat'],
        $donnee['Mail_candidat'],
        $donnee['Ville_candidat'],
        $donnee['Date_naissance_candidat'],
        $donnee['info_candidat'],
        $donnee['Code_postal_candidat'],
        $donnee['Num_tel_candidat']
      );
      //Injection des candidats dans la formation
      $formation->setLesCandidats($candidat);
    }
    
  }
  echo json_encode($formation);
}
else
{
  //si pas de id erreur, on retourne -1
  echo -1;
}