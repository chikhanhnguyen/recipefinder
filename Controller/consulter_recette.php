<?php
    require_once("Model/dbConnect.php");
    $db = connectToDatabase();
    include_once("Model/function_database.php");
    $dtb = requestMainData($db);
    $recettes = $dtb['recette'];
    $produits = false;
    $users = false;
    require('View/formulaire_home.php');
?>