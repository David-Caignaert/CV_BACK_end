<?php
    header("Access-Control-Allow-Origin: *");
    //Relation entre les pages
    require_once '../cnx.php';

    //Verifier si la variable id est ok
    if(isset($_POST['id']))
    {
      //Déclaration de la requete sql pour modifier un centre d'interet
      $sql = "UPDATE centre_interet SET   Intitule_centre_interet = ?
                                    WHERE ID_CENTRE_INTERET = ?";
      //Préparer la requete
      $requete = $pdo->prepare($sql);
      //Bindage des parametres
      $requete->bindParam(1,$_POST['intitule']);
      $requete->bindParam(2,$_POST['id']);
      //Executer la requete
      echo $requete->execute();
    }
    else
    {
      echo -1;
    }