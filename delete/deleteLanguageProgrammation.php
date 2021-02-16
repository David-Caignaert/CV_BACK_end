<?php
    header("Access-Control-Allow-Origin: *");
    //Création de la relation entre page
    require_once '../cnx.php';    
    
    //Verification de la variable id
    if(isset($_POST['id'])){
        // Requete sql pour supprimer un language de programmation selectionner
        $sql = "DELETE FROM language_programmation WHERE ID_LANGUAGE_PROGRAMMATION = ? ";
        // Préparation de la requête
        $requete = $pdo->prepare($sql);
        // Bindage des parametres
        $requete->bindValue(1, $_POST['id']);
        //Execution de la requete
        echo $requete->execute();
        //Requete sql pour suprimer la relation entre le language de programmation et le candidat
        $sql_connaitre = "DELETE FROM connaitre WHERE ID_LANGUAGE_PROGRAMMATION = ?";
        //préparation de la requete
        $requete = $pdo->prepare($sql_connaitre);
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