<?php
    require_once("Model/dbConnect.php");
    $db = connectToDatabase();
    require_once("Model/function_commande.php");
    
    if (isset($_GET['idcmd']))
    {
        $lignes_commande = getLignesCommande($db, $_GET['idcmd']);
        require_once("View/formulaire_contenue_commande.php");
    } else
    {
        require_once("View/formulaire_home.php");
    }
?>