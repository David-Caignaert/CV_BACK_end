<?php
    header("Access-Control-Allow-Origin: *");
    //Création de la relation entre page
    require_once '../cnx.php';    
    
    //Verification de la variable id
    if(isset($_POST['id'])){
        // Requete sql pour supprimer l'experience pro selectionner
        $sql = "DELETE FROM experience_pro WHERE ID_EXPERIENCE_PRO = ? ";
        // Préparation de la requête
        $requete = $pdo->prepare($sql);
        // Bindage des parametres
        $requete->bindValue(1, $_POST['id']);
        //Execution de la requete
        echo $requete->execute();
        //Requete sql pour suprimer la relation entre l'experience pro et le candidat
        $sql_effectuer = "DELETE FROM effectuer WHERE ID_EXPERIENCE_PRO = ?";
        //préparation de la requete
        $requete = $pdo->prepare($sql_effectuer);
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