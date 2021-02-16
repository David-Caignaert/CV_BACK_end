<?php
    header("Access-Control-Allow-Origin: *");
    //Relation entre les pages
    require_once '../cnx.php';

    //Verifier si la variable id est ok
    if(isset($_POST['id']))
    {
      //Déclaration de la requete sql pour modifier une experience pro
      $sql = "UPDATE experience_pro SET   Date_debut_experience_pro = ?,Date_fin_experience_pro = ?,
                                          Intitule_experience_pro = ?,Lieu_experience_pro = ?,
                                          Ville_experience_pro = ?
                                    WHERE ID_EXPERIENCE_PRO = ?";
      //Préparer la requete
      $requete = $pdo->prepare($sql);
      //Bindage des parametres
      $requete->bindParam(1,$_POST['dateDebut']);
      $requete->bindParam(2,$_POST['dateFin']);
      $requete->bindParam(3,$_POST['intitule']);
      $requete->bindParam(4,$_POST['lieu']);
      $requete->bindParam(5,$_POST['ville']);
      $requete->bindParam(6,$_POST['id']);
      //Executer la requete
      echo $requete->execute();
    }
    else
    {
      echo -1;
    }