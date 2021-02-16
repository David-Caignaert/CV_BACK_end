<?php
    header("Access-Control-Allow-Origin: *");
    //Création de la relation entre page
    require_once '../cnx.php';    
    
    //Verification de la variable id
    if(isset($_POST['id'])){
        // Requete sql pour supprimer le centre d'interet selectionner
        $sql = "DELETE FROM centre_interet WHERE ID_CENTRE_INTERET = ? ";
        // Préparation de la requête
        $requete = $pdo->prepare($sql);
        // Bindage des parametres
        $requete->bindValue(1, $_POST['id']);
        //Execution de la requete
        echo $requete->execute();
        //Requete sql pour suprimer la relation entre le centre d'interet et le candidat
        $sql_avoir = "DELETE FROM avoir WHERE ID_CENTRE_INTERET = ?";
        //Préparation de la requete
        $requete = $pdo->prepare($sql_avoir);
        //Bindage des parametres
        $requete->bindParam(1,$_POST['id']);
        //Execution de la requete
        echo $requete->execute();
    }
    else
    {
        echo -1;
    }
    
?>    