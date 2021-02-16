<?php
header("Assess-Control-Allow-Origin: *");
//Création de la relation entre les pages
require_once ('../cnx.php');
require_once ('../classes/class.Experience_pro.php');


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
  //Requete sql pour rechercher d'une experience pro par son id
  $sql = "SELECT * FROM candidat,effectuer,experience_pro
                   WHERE candidat.ID_CANDIDAT = effectuer.ID_CANDIDAT
                   AND effectuer.ID_EXPERIENCE_PRO = experience_pro.ID_EXPERIENCE_PRO 
                   AND experience_pro.ID_EXPERIENCE_PRO = ?";
  //Préparation de la requete
  $requete= $pdo->prepare($sql);
  //Parametre : id d'une experience pro
  $requete->bindValue(1,$_POST['id']);
  //Création de la variable experience pro
  $experience_pro = null;
  //Verifier si la requete renvoie quelque chose
  if($requete->execute())
  {
    //parcourir les resultats
    while($donnee =$requete->fetch())
    {
      //Création d'un objet Experience_pro
      $experience_pro = new Experience_pro(
        $donnee['ID_EXPERIENCE_PRO'],
        $donnee['Date_debut_experience_pro'],
        $donnee['Date_fin_experience_pro'],
        $donnee['Intitule_experience_pro'],
        $donnee['Lieu_experience_pro'],
        $donnee['Ville_experience_pro'],
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
      //Injection des candidats dans l'experience pro
      $experience_pro->setLesCandidats($candidat);
    }
  }
  //Representation JSON de l'experience pro
  echo json_encode($experience_pro);
}
else
{
  //si pas de id erreur, on retourne -1
  echo -1;
}