<?php
    header("Access-Control-Allow-Origin: *");
    //Création de la relation entre page
    require_once '../cnx.php';
    require_once '../classes/class.Experience_pro.php';
    
    //Verification de la variable dateBebut
    if(isset($_POST["dateDebut"]))
    {
      //Déclaration de la requete sql pour la creation d'une nouvelle experience pro
      $sql = "INSERT INTO experience_pro(Date_debut_experience_pro,
                          Date_fin_experience_pro,Intitule_experience_pro,
                          Lieu_experience_pro,Ville_experience_pro) 
                          VALUES(?,?,?,?,?)";
      //Préparation de la requete
      $requete = $pdo->prepare($sql);
      //Bindage des parametres
      $requete->bindParam(1, $_POST['dateDebut']);
      $requete->bindParam(2, $_POST['dateFin']);
      $requete->bindParam(3, $_POST['intitule']);
      $requete->bindParam(4, $_POST['lieu']);
      $requete->bindParam(5, $_POST['ville']);
      //Execution de la requete
      echo $requete->execute();

      //Déclaration de la requete sql pour recuperer le tableau des experiences pro
      $sql_experience_pro = "SELECT * FROM experience_pro";
      //Préparation de la requete
      $requete_experience_pro = $pdo->prepare($sql_experience_pro);
      //déclaration de la liste de experience pro
      $liste_experience_pro =array();
      //testé si la requete est ok
      if($requete_experience_pro->execute())
      {
        //parcourir les resultats
        while($donnee_experience_pro=$requete_experience_pro->fetch())
        {
          //Céation d'un objet experience pro
          $experience_pro = new Experience_pro(
            $donnee_experience_pro['ID_EXPERIENCE_PRO'],
            $donnee_experience_pro['Date_debut_experience_pro'],
            $donnee_experience_pro['Date_fin_experience_pro'],
            $donnee_experience_pro['Intitule_experience_pro'],
            $donnee_experience_pro['Lieu_experience_pro'],
            $donnee_experience_pro['Ville_experience_pro'],
          );
          //Injection de l'experience pro dans la liste d'experience pro
          $liste_experience_pro[] =$experience_pro;
        }
      }
      //Création et récuperation de la dernier requete injecter
      $dernierligne = new Experience_pro();
      $dernierligne = end($liste_experience_pro);
      //Récuperation de l'id de la derniere requete
      $dernierId=$dernierligne->getId();
      
      //Déclaration de la requete sql pour relier la table candidat et experience pro
      $sql_effectuer = "INSERT INTO effectuer(ID_CANDIDAT,ID_EXPERIENCE_PRO) 
                    VALUES(1,$dernierId)";
      //Préparation de la requete
      $requete_effectuer = $pdo->prepare($sql_effectuer);
      //Bindage des parametres
      $requete_effectuer->bindParam(1,$_POST['ID_CANDIDAT']);
      $requete_effectuer->bindParam(2,$_POST['ID_EXPERIENCE_PRO']);
      //Executer la requete
      echo $requete_effectuer->execute();      
      exit(); 
    }
    else
    {
        echo -1;
    }
