<?php
    header("Access-Control-Allow-Origin: *");
    //Création de relation entre page
    require_once '../cnx.php';
    require_once '../classes/class.Centre_interet.php';
    
    //Verification de la variale intitule
    if(isset($_POST["intitule"]))
    {
      //Déclaration de la requete sql pour la création d'un nouveau centre d'interet
      $sql = "INSERT INTO centre_interet(Intitule_centre_interet)
                     VALUES(?)";
      //préparation de la requete               
      $requete = $pdo->prepare($sql);
      //Bindage des parametres
      $requete->bindParam(1, $_POST['intitule']);
      //Execution de la requete
      echo $requete->execute();

      //Déclaration de la requete sql pour récupérer le tableau des centre d'interet
      $sql_centre_interet = "SELECT * FROM centre_interet";
      //préparation de la requete 
      $requete_centre_interet = $pdo->prepare($sql_centre_interet);
      //liste de centre d'interet
      $liste_centre_interet =array();
      //testé si la requete est ok
      if($requete_centre_interet->execute())
      {
        //parcourir les resultats
        while($donnee_centre_interet=$requete_centre_interet->fetch())
        {
          //Céation d'un objet centre d'interet
          $centre_ineret = new Centre_interet(
            $donnee_centre_interet['ID_CENTRE_INTERET'],
            $donnee_centre_interet['Intitule_centre_interet'],
          );
          //Injection du nouveua centre d'interet dans les tableau liste de centre d'interet
          $liste_centre_interet[] =$centre_ineret;
        }
      }
      //Création et récuperation de la dernier requete injecter
      $dernierligne = new Centre_interet();
      $dernierligne = end($liste_centre_interet);
      //Récuperation de l'id de la derniere requete
      $dernierId=$dernierligne->getId();
      
      //Déclaration de la requete sql pour relier la table candidat et centreInteret
      $sql_avoir = "INSERT INTO avoir(ID_CANDIDAT,ID_CENTRE_INTERET) 
                    VALUES(1,$dernierId)";
      //Préparation de la requete
      $requete_avoir = $pdo->prepare($sql_avoir);
      //Bindage des parametres
      $requete_avoir->bindParam(1,$_POST['ID_CANDIDAT']);
      $requete_avoir->bindParam(2,$_POST['ID_CENTRE_INTERET']);
      //Executer la requete
      echo $requete_avoir->execute();
      exit(); 
    }
    else
    {
        echo -1;
    }

    