<?php
    header("Access-Control-Allow-Origin: *");
    //Relation entre les pages
    require_once '../cnx.php';

    //Verifier si la variable id est ok
    if(isset($_POST['id']))
    {
      //Déclaration de la requete sql pour modifier un candidat
      $sql = "UPDATE language_programmation SET   Nom_language_programmation = ?,
                                                  Logo_language_programmation = ?
                                            WHERE ID_LANGUAGE_PROGRAMMATION = ?";
      //Préparer la requete
      $requete = $pdo->prepare($sql);
      //Bindage des parametres
      $requete->bindParam(1,$_POST['nom']);
      $requete->bindParam(2,$_POST['logo']);
      $requete->bindParam(3,$_POST['id']);
      //Executer la requete
      echo $requete->execute();
    }
    else
    {
      echo -1;
    }