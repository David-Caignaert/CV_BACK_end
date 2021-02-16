<?php
    header("Access-Control-Allow-Origin: *");
    
    //Création de relation entre page
    require_once '../cnx.php';
    
    //Verifier de la variable nom
    if(isset($_POST["nom"]))
    {
      //Déclaration de la requete sql pour la création d'un candidat
      $sql = "INSERT INTO candidat(Nom_candidat,Prenom_candidat,
                          Adresse_candidat,Mail_candidat,Ville_candidat,
                          Date_naissance_candidat,info_candidat,
                          Code_postal_candidat,Num_tel_candidat) 
                          VALUES(?,?,?,?,?,?,?,?,?)";

      //Préparation de la requete sql
      $requete = $pdo->prepare($sql);
      //Bindage des parametres 
      $requete->bindParam(1, $_POST['nom']);
      $requete->bindParam(2, $_POST['prenom']);
      $requete->bindParam(3, $_POST['adresse']);
      $requete->bindParam(4, $_POST['mail']);
      $requete->bindParam(5, $_POST['ville']);
      $requete->bindParam(6, $_POST['dateNaissance']);
      $requete->bindParam(7, $_POST['info']);
      $requete->bindParam(8, $_POST['codePostal']);
      $requete->bindParam(9, $_POST['numTel']);

      //Executer la requete
      echo $requete->execute();
    }
    else
    {
        echo -1;
    }