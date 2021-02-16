<?php
header("Access-Control-Allow-Origin: *");
//Création de la relation entre les pages
require_once '../cnx.php';    
require_once '../classes/class.Language_programmation.php';

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

//Verification de la variable id
if(isset($_POST['id']))
{
  //Requete sql pour rechercher un language de programmation par son id
  $sql = "SELECT *  FROM candidat,connaitre,language_programmation 
                    WHERE candidat.ID_CANDIDAT = connaitre.ID_CANDIDAT
                    AND connaitre.ID_LANGUAGE_PROGRAMMATION = 
                        language_programmation.ID_LANGUAGE_PROGRAMMATION
                    AND language_programmation.ID_LANGUAGE_PROGRAMMATION = ?";
  //Préparation de la requete
  $requete = $pdo->prepare($sql);
  //Bindage des parametres
  $requete->bindValue(1,$_POST['id']);
  //Création de la variable language de programmation
  $languague_programmation = null;
  //Verifier si la requete renvoie quelque chose
  if($requete->execute())
  {
    //parcourir les resultats
    while($donnee =$requete->fetch())
    {
      //Création d'un objet Language_programmation
      $languague_programmation = new Language_programmation(
        $donnee['ID_LANGUAGE_PROGRAMMATION'],
        $donnee['Nom_language_programmation'],
        $donnee['Logo_language_programmation'],
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
      //Injection des candidats dans le language de programmation
      $languague_programmation->setLesCandidats($candidat);
    }
  }
//Representation JSON du language de programmation
  echo json_encode($languague_programmation);
}
else
{
  //si pas de id erreur, on retourne -1
  echo -1;
}