<?php
    header("Access-Control-Allow-Origin: *");
    //Création de la relation entre page
    require_once '../cnx.php';    
    
    //Verification de la variable id
    if(isset($_POST['id'])){
        // Requete sql pour supprimer la formation selectionner
        $sql = "DELETE FROM formation WHERE ID_FORMATION = ? ";
        // Préparation de la requête
        $requete = $pdo->prepare($sql);
        // Bindage des parametres
        $requete->bindValue(1, $_POST['id']);
        //Execution de la requete
        echo $requete->execute();
        //Requete sql pour suprimer la relation entre la formation et le candidat
        $sql_passer = "DELETE FROM passer WHERE ID_FORMATION = ?";
        //préparation de la requete
        $requete = $pdo->prepare($sql_passer);
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