<?php
header("Access-Control-Allow-Origin: *");
//Relier la classe Candicat
require_once 'cnx.php';    
require_once 'classes/class.Candidat.php';
// ordre SQL 
$sql_candidat = " SELECT * FROM candidat";
// préparation de la requete
$requete_candidat = $pdo->prepare($sql_candidat);
// Liste des candidats
$liste_candidats =array();
// Tester si la requete est ok
if($requete_candidat->execute())
{
  // Parcours des résultats
  while($donnees_candidat=$requete_candidat->fetch())
  {
    // Création d'un objet Candidat
    $candidat = new Candidat(
      $donnees_candidat['ID_CANDIDAT'],
      $donnees_candidat['Nom_candidat'],
      $donnees_candidat['Prenom_candidat'],
      $donnees_candidat['Adresse_candidat'],
      $donnees_candidat['Mail_candidat'],
      $donnees_candidat['Ville_candidat'],
      $donnees_candidat['Date_naissance_candidat'],
      $donnees_candidat['info_candidat']
    );
    // recherche les centre d'interet
    $sql_candidat = "SELECT * FROM candidat,avoir,centre_interet 
                              WHERE candidat.ID_CANDIDAT = avoir.ID_CANDIDAT 
                              AND avoir.ID_CENTRE_INTERET = centre_interet.ID_CENTRE_INTERET";
    //Préparation de la requete
    $requete_candidat2 = $pdo->prepare($sql_candidat);
    // Chargement du parametre
    $requete_candidat2->bindValue(1,$candidat->getId());
    // Liste des centre d'interet
    $liste_centre_interet =array();
    // Test si requete OK
    if($requete_candidat2->execute())
    {
      // Parcourt des resultat
      while($donnees_candidat2 = $requete_candidat2->fetch())
      {
        // Création d'un objet Centre_interet
        $centre_interet_candidat = new Centre_interet(
        $donnees_candidat2['ID_CENTRE_INTERET'],
        $donnees_candidat2['Intitule_centre_interet']
        );
        $liste_centre_interet[] = $centre_interet_candidat;
      }
    }
    // Associer les centre d'interet au candidat
    $candidat->setLesCentreInteret($liste_centre_interet);
    // recherche les experiences_pro
    $sql_candidat = "SELECT * FROM candidat,effectuer,experience_pro 
                              WHERE candidat.ID_CANDIDAT = effectuer.ID_CANDIDAT
                              AND effectuer.ID_EXPERIENCE_PRO = experience_pro.ID_EXPERIENCE_PRO";
    //Préparation de la requete
    $requete_candidat3 = $pdo->prepare($sql_candidat);
    // Chargement du parametre
    $requete_candidat3->bindValue(1,$candidat->getId());
    // Liste des experiences pro
    $liste_experience_pro =array();
    // Test si requete OK
    if($requete_candidat3->execute())
    {
      // Parcourt des resultat
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
        $liste_experience_pro[] = $experience_pro_candidat;
      }
    }
      // Associer les experiences_pro au candidat
      $candidat->setLesExperiencesPro($liste_experience_pro);
    // recherche les formations
    $sql_candidat = "SELECT * FROM candidat,passer,formation 
                              WHERE candidat.ID_CANDIDAT = passer.ID_CANDIDAT
                              AND passer.ID_FORMATION = formation.ID_FORMATION";
    //Préparation de la requete
    $requete_candidat4 = $pdo->prepare($sql_candidat);
    // Chargement du parametre
    $requete_candidat4->bindValue(1,$candidat->getId());
    // Liste des experiences pro
    $liste_formation =array();
    // Test si requete OK
    if($requete_candidat4->execute())
    {
      // Parcourt des resultat
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
        $liste_formation[] = $formation_candidat;
      }
    }
      // Associer les formations au candidat
      $candidat->setLesFormations($liste_formation);



    // recherche les Langagues de programmation
    $sql_candidat = "SELECT * FROM candidat,connaitre,language_programmation 
                              WHERE candidat.ID_CANDIDAT = connaitre.ID_CANDIDAT
                              AND connaitre.ID_LANGUAGE_PROGRAMMATION = 
                              language_programmation.ID_LANGUAGE_PROGRAMMATION";
    //Préparation de la requete
    $requete_candidat5 = $pdo->prepare($sql_candidat);
    // Chargement du parametre
    $requete_candidat5->bindValue(1,$candidat->getId());
    // Liste des langagues de programmation
    $liste_langague_programmation =array();
    // Test si requete OK
    if($requete_candidat5->execute())
    {
      // Parcourt des resultat
      while($donnees_candidat5 = $requete_candidat5->fetch())
      {
        //Création d'un objet Langague_programmation
        $langague_programmation_candidat = new Language_programmation(
        $donnees_candidat5['ID_LANGUAGE_PROGRAMMATION'],
        $donnees_candidat5['Nom_language_programmation'],
        $donnees_candidat5['Logo_language_programmation'],
        );
        $liste_langague_programmation[] = $langague_programmation_candidat;
      }
    }
      //associer le language_programmation au candidat
      $candidat->setLesLanguagesDeProgrammations($langague_programmation_candidat);
    // Ajouter à la liste
    $liste_candidats[]=$candidat;
  }
}
// Génération du flux Json
echo json_encode($liste_candidats);
exit();


