<?php
    require_once("Model/dbConnect.php");
    $db = connectToDatabase();
    require("Model/function_search.php");
    $resultat_search=[];
    include_once("Model/function_database.php");
    $dtb = requestMainData($db);
    // faire une recherche
    if (isset($_GET['search']) && !empty($_GET['search']))
    {
        $search =  htmlspecialchars($_GET['search']);
        $resultats = searchAll($search);
        $produits = $resultats["produits"];
        $recettes = $resultats["recettes"];
        $users = $resultats["users"];
        require('View/formulaire_home.php');
    }
?>