<?php
header("Access-Control-Allow-Origin: *");
//Création de la relation entre les pages
require_once '../cnx.php';    
require_once '../classes/class.Centre_interet.php';

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
  //Requete sql pour rechercher d'un centre d'interet par son id
  $sql = "SELECT *  FROM candidat,avoir,centre_interet 
                    WHERE  candidat.ID_CANDIDAT = avoir.ID_CANDIDAT
                    AND avoir.ID_CENTRE_INTERET = centre_interet.ID_CENTRE_INTERET
                    AND centre_interet.ID_CENTRE_INTERET = ?";
  //Préparation de la requete
  $requete = $pdo->prepare($sql);
  //Bindage des parametres
  $requete->bindValue(1,$_POST['id']);
  //Création de la variable centre d'interet
  $centre_interet = null;
  //Verifier si la requete renvoie quelque chose
  if($requete->execute())
  {
    //parcourir les resultats
    while($donnee =$requete->fetch())
    {
      //Création d'un objet Centre_interet
      $centre_interet = new Centre_interet(
        $donnee['ID_CENTRE_INTERET'],
        $donnee['Intitule_centre_interet']
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
      //Injection des candidat dans le centre d'interet
      $centre_interet->setLesCandidats($candidat);
    }
  }
  //Representation JSON du centre d'interet
  echo json_encode($centre_interet);
}
else
{
  //si pas de id erreur, on retourne -1
  echo -1;
}