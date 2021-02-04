<?php
header("Assess-Control-Allow-Origin: *");
//Relier la classe exxperience pro
require_once ('cnx.php');
require_once ('classes/class.Experience_pro.php');

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
  //Recherche d'une experience pro par son id
  $sql = "SELECT * FROM candidat,effectuer,experience_pro
                   WHERE candidat.ID_CANDIDAT = effectuer.ID_EXPERIENCE
                   AND effectuer.ID_EXPERIENCE = experience_pro.EXPERIENCE_PRO 
                   AND ID_EXPERIENCE = ?";
  //preparer la requete
  $requete= $pdo->prepare($sql);
  //Parametre : id d'une experience pro
  $requete->bindValue(1,$_POST['id']);
  $experience_pro = null;
  //si la requete renvoie qqch
  if($requete->execute())
  {
    //parcourir le resultat
    while($donnee =$requete->fetch())
    {
      $experience_pro = new Experience_pro(
        $donnee['ID_EXPERIENCE_PRO'],
        $donnee['Date_debut_experience_pro'],
        $donnee['Date_fin_experience_pro'],
        $donnee['Intitule_experience_pro'],
        $donnee['Lieu_experience_pro'],
        $donnee['Ville_experience_pro'],
      );
    }
  }
  echo json_encode($centre_interet);
}
else
{
  //si pas de id erreur, on retourne -1
  echo -1;
}