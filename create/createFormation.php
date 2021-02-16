<?php
    header("Access-Control-Allow-Origin: *");
    //Création de relation entre les page
    require_once '../cnx.php';
    require_once '../classes/class.Formation.php';
    
    //verification de la variable ville
    if(isset($_POST["ville"]))
    {
      //Déclaration de la requete sql pour la création d'une nouvelle formation
      $sql = "INSERT INTO formation(Ville_formation,
                          Annee_obtention_formation,Intitule_formation,
                          Lieu_formation) VALUES(?,?,?,?)";
      //préparation de la requete
      $requete = $pdo->prepare($sql);
      //bindage des parametres
      $requete->bindParam(1, $_POST['ville']);
      $requete->bindParam(2, $_POST['anneeObtention']);
      $requete->bindParam(3, $_POST['intitule']);
      $requete->bindParam(4, $_POST['lieu']);
      //Execution de la requete
      echo $requete->execute();

      //Déclaration da la requete sql pour récupérer le tableau de formation
      $sql_formation ="SELECT * FROM formation";
      //préparation de la requete 
      $requete_formation = $pdo->prepare($sql_formation);
      //liste de formation
      $liste_formation =array();
      //testé si la requete est ok
      if($requete_formation->execute())
      {
        //parcourir les resultats
        while($donnee_formation=$requete_formation->fetch())
        {
          //Céation d'un objet formation
          $formation = new Centre_interet(
            $donnee_formation['ID_FORMATION'],
            $donnee_formation['Ville_formation'],
            $donnee_formation['Annee_obtention_formation'],
            $donnee_formation['Intitule_formation'],
            $donnee_formation['Lieu_formation'],
          );
          //Injection du nouveua centre d'interet dans les tableau liste de formation         
          $liste_formation[] =$formation;
        }
      }
      //Création et récuperation de la dernier requete injecter
      $dernierligne = new Formation();
      $dernierligne = end($liste_formation);
      //Récuperation de l'id de la derniere requete
      $dernierId=$dernierligne->getId();
      
      //Déclaration de la requete sql pour relier la table candidat et formation
      $sql_passer = "INSERT INTO passer(ID_CANDIDAT,ID_FORMATION) 
                    VALUES(1,$dernierId)";
      //Préparation de la requete
      $requete_passer = $pdo->prepare($sql_passer);
      //Bindage des parametres
      $requete_passer->bindParam(1,$_POST['ID_CANDIDAT']);
      $requete_passer->bindParam(2,$_POST['ID_FORMATION']);
      //Executer la requete
      echo $requete_passer->execute();
      exit(); 
    }
    else
    {
        echo -1;
    }