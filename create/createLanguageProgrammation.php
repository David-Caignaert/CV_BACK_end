<?php
    header("Access-Control-Allow-Origin: *");
    //Création de relation entre page
    require_once '../cnx.php';
    require_once '../classes/class.Language_programmation.php';
    
    //Verification de la variale nom
    if(isset($_POST["nom"]))
    {
      //Déclaration de la requete sql pour la création d'un nouveau language de programmation
      $sql = "INSERT INTO language_programmation(Nom_language_programmation,
                          Logo_language_programmation) VALUES(?,?)";
      $requete = $pdo->prepare($sql);
      $requete->bindParam(1, $_POST['nom']);
      $requete->bindParam(2, $_POST['logo']);

      echo $requete->execute();
      //Déclaration da la requete sql pour récupérer le tableau de language programmation
      $sql_language_programmation ="SELECT * FROM language_programmation";
      //préparation de la requete 
      $requete_language_programmation = $pdo->prepare($sql_language_programmation);
      //liste de language programmation
      $liste_language_programmation =array();
      //testé si la requete est ok
      if($requete_language_programmation->execute())
      {
        //parcourir les resultats
        while($donnee_language_programmation=$requete_language_programmation->fetch())
        {
          //Céation d'un objet language programmation
          $language_programmation = new Language_programmation(
            $donnee_language_programmation['ID_LANGUAGE_PROGRAMMATION'],
            $donnee_language_programmation['Nom_language_programmation'],
            $donnee_language_programmation['Logo_language_programmation'],
          );
          $liste_language_programmation[] =$language_programmation;
        }
      }
      //Création et récuperation de la dernier requete injecter
      $dernierligne = new Language_programmation();
      $dernierligne = end($liste_language_programmation);
      //Récuperation de l'id de la derniere requete
      $dernierId=$dernierligne->getId();
      
      //Déclaration de la requete sql pour relier la table candidat et language de programmation
      $sql_connaitre = "INSERT INTO connaitre(ID_CANDIDAT,ID_LANGUAGE_PROGRAMMATION) 
                    VALUES(1,$dernierId)";
      //Préparation de la requete
      $requete_connaitre = $pdo->prepare($sql_connaitre);
      //Bindage des parametres
      $requete_connaitre->bindParam(1,$_POST['ID_CANDIDAT']);
      $requete_connaitre->bindParam(2,$_POST['ID_LANGUAGE_PROGRAMMATION']);
      //Executer la requete
      echo $requete_connaitre->execute();
      exit(); 
    }
    else
    {
        echo -1;
    }
