<?php
    header("Access-Control-Allow-Origin: *");
    //Relation entre les pages
    require_once '../cnx.php';

    //Verifier si la variable id est ok
    if(isset($_POST['id']))
    {
      //Déclaration de la requete sql pour modifier un candidat
      $sql = "UPDATE candidat SET   Nom_candidat = ?,Prenom_candidat = ?,
                                    Adresse_candidat = ?,Mail_candidat = ?,
                                    Ville_candidat = ?,Date_naissance_candidat = ?
                                    info_candidat = ?,Code_postal_candidat = ?
                                    Num_tel_candidat = ? 
                              WHERE ID_CANDIDAT = ?";
      //Préparer la requete
      $requete = $pdo->prepare($sql);
      //Bindage des parametres
      $requete->bindParam(1,$_POST['nom']);
      $requete->bindParam(2,$_POST['prenom']);
      $requete->bindParam(3,$_POST['adresse']);
      $requete->bindParam(4,$_POST['mail']);
      $requete->bindParam(5,$_POST['ville']);
      $requete->bindParam(6,$_POST['dateNaissance']);
      $requete->bindParam(7,$_POST['info']);
      $requete->bindParam(8,$_POST['codePostal']);
      $requete->bindParam(9,$_POST['numTel']);
      $requete->bindParam(10,$_POST['id']);
      //Executer la requete
      echo $requete->execute();
    }
    else
    {
      echo -1;
    }