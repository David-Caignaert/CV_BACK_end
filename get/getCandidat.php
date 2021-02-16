<?php
header("Access-Control-Allow-Origin: *");
//Création de la relation entre les pages
require_once '../cnx.php';    
require_once '../classes/class.Candidat.php';
require_once '../classes/class.Centre_interet.php';
require_once '../classes/class.Experience_pro.php';
require_once '../classes/class.Formation.php';
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
  //Requete sql pour rechercher d'un candidat par son id
  $sql = "SELECT *  FROM candidat
                    WHERE candidat.ID_CANDIDAT =?";
  //Préparation de la requete
  $requete = $pdo->prepare($sql);
  //Parametre : id d'un candidat
  $requete->bindValue(1,$_POST['id']);
  //Création de la variable candidat
  $candidat = null;
  //Verifier si la requete renvoie quelque chose
  if($requete->execute())
  {
    //Parcourir les résultats
  while($donnees_candidat=$requete->fetch())
  {
    //Création d'un objet Candidat
    $candidat = new Candidat(
      $donnees_candidat['ID_CANDIDAT'],
      $donnees_candidat['Nom_candidat'],
      $donnees_candidat['Prenom_candidat'],
      $donnees_candidat['Adresse_candidat'],
      $donnees_candidat['Mail_candidat'],
      $donnees_candidat['Ville_candidat'],
      $donnees_candidat['Date_naissance_candidat'],
      $donnees_candidat['info_candidat'],
      $donnees_candidat['Code_postal_candidat'],
      $donnees_candidat['Num_tel_candidat']
    );
    //Requete sql pour récuperer les centre d'interet du candidat selectionner
    $sql_candidat = "SELECT * FROM candidat,avoir,centre_interet 
                              WHERE ? = avoir.ID_CANDIDAT 
                              AND avoir.ID_CENTRE_INTERET = centre_interet.ID_CENTRE_INTERET";
    //Préparation de la requete
    $requete_candidat2 = $pdo->prepare($sql_candidat);
    //Bindage des parametres
    $requete_candidat2->bindValue(1,$candidat->getId());
    // Liste des centre d'interet
    $liste_centre_interet =array();
    //Verifier si requete est OK
    if($requete_candidat2->execute())
    {
      // Parcourir les resultats
      while($donnees_candidat2 = $requete_candidat2->fetch())
      {
        // Création d'un objet Centre_interet
        $centre_interet_candidat = new Centre_interet(
        $donnees_candidat2['ID_CENTRE_INTERET'],
        $donnees_candidat2['Intitule_centre_interet']
        );
        //Injection des centre d'interet dans la liste des centre d'interet
        $liste_centre_interet[] = $centre_interet_candidat;
      }
    }
    // Associer la liste des centre d'interet au candidat selectionner
    $candidat->setLesCentreInteret($liste_centre_interet);
    //Requete sql pour récuperer les experience pro du candidat selectionner
    $sql_candidat = "SELECT * FROM candidat,effectuer,experience_pro 
                              WHERE ? = effectuer.ID_CANDIDAT
                              AND effectuer.ID_EXPERIENCE_PRO = experience_pro.ID_EXPERIENCE_PRO";
    //Préparation de la requete
    $requete_candidat3 = $pdo->prepare($sql_candidat);
    //Bindage des parametres
    $requete_candidat3->bindValue(1,$candidat->getId());
    //Liste des experiences pro
    $liste_experience_pro =array();
    //Verifier si la requete est ok
    if($requete_candidat3->execute())
    {
      // Parcourir les resultats
      while($donnees_candidat3 = $requete_candidat3->fetch())
      {
        // Création d'un objet Experience_pro
        $experience_pro_candidat = new Experience_pro(
          $donnees_candidat3['ID_EXPERIENCE_PRO'],
          $donnees_candidat3['Date_debut_experience_pro'],
          $donnees_candidat3['Date_debut_experience_pro'],
          $donnees_candidat3['Intitule_experience_pro'],
          $donnees_candidat3['Lieu_experience_pro'],
          $donnees_candidat3['Ville_experience_pro']      
        );
        //Injection des experience pro dans la liste des experience pro
        $liste_experience_pro[] = $experience_pro_candidat;
      }
    }
      //Associer la liste des experience pro au candidat selectionner
      $candidat->setLesExperiencesPro($liste_experience_pro);
    //Requete sql pour récuperer les formation du candidat selectionner
    $sql_candidat = "SELECT * FROM candidat,passer,formation 
                              WHERE ? = passer.ID_CANDIDAT
                              AND passer.ID_FORMATION = formation.ID_FORMATION";
    //Préparation de la requete
    $requete_candidat4 = $pdo->prepare($sql_candidat);
    //Bindage des parametres
    $requete_candidat4->bindValue(1,$candidat->getId());
    // Liste des formations
    $liste_formation =array();
    //Verifier si la requete est ok
    if($requete_candidat4->execute())
    {
      // Parcouris les resultats
      while($donnees_candidat4 = $requete_candidat4->fetch())
      {
        // Création d'un objet formation
        $formation_candidat = new Formation(
        $donnees_candidat4['ID_FORMATION'],
        $donnees_candidat4['Ville_formation'],
        $donnees_candidat4['Annee_obtention_formation'],
        $donnees_candidat4['Intitule_formation'],
        $donnees_candidat4['Lieu_formation'],
        );
        //Injection des formation dans la liste des formations
        $liste_formation[] = $formation_candidat;
      }
    }
      // Associer la liste des formations au candidat selectionner
      $candidat->setLesFormations($liste_formation);

    //Requete sql pour récuperer les languages de programmation du candidat selectionner
    $sql_candidat = "SELECT * FROM candidat,connaitre,language_programmation 
                              WHERE ? = connaitre.ID_CANDIDAT
                              AND connaitre.ID_LANGUAGE_PROGRAMMATION = 
                              language_programmation.ID_LANGUAGE_PROGRAMMATION";
    //Préparation de la requete
    $requete_candidat5 = $pdo->prepare($sql_candidat);
    //Bindage des parametres
    $requete_candidat5->bindValue(1,$candidat->getId());
    // Liste des langagues de programmation
    $liste_langague_programmation =array();
    // Verifier si la requete est ok
    if($requete_candidat5->execute())
    {
      // Parcourir les resultats
      while($donnees_candidat5 = $requete_candidat5->fetch())
      {
        //Création d'un objet Langague_programmation
        $langague_programmation_candidat = new Language_programmation(
        $donnees_candidat5['ID_LANGUAGE_PROGRAMMATION'],
        $donnees_candidat5['Nom_language_programmation'],
        $donnees_candidat5['Logo_language_programmation'],
        );
        //Injection des language de programmation dans la liste des language de programmation
        $liste_langague_programmation[] = $langague_programmation_candidat;
      }
    }
      //Associer les languages de programmation au candidat
      $candidat->setLesLanguagesDeProgrammations($liste_langague_programmation);
  }
  }
  //Representation JSON du candidat
  echo json_encode($candidat);
}
else
{
  //si pas de id erreur, on retourne -1
  echo -1;
}