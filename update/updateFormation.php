<?php
    header("Access-Control-Allow-Origin: *");
    //Relation entre les pages
    require_once '../cnx.php';

    //Verifier si la variable id est ok
    if(isset($_POST['id']))
    {
      //Déclaration de la requete sql pour modifier un candidat
      $sql = "UPDATE formation  SET   Ville_formation = ?,Annee_obtention_formation = ?,
                                      Intitule_formation = ?,Lieu_formation = ?
                                WHERE ID_FORMATION = ?";
      //Préparer la requete
      $requete = $pdo->prepare($sql);
      //Bindage des parametres
      $requete->bindParam(1,$_POST['ville']);
      $requete->bindParam(2,$_POST['anneeObtention']);
      $requete->bindParam(3,$_POST['intitule']);
      $requete->bindParam(4,$_POST['lieu']);
      $requete->bindParam(5,$_POST['id']);
      //Executer la requete
      echo $requete->execute();
    }
    else
    {
      echo -1;
    }