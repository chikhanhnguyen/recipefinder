<?php
    require_once("Model/dbConnect.php");
    $db = connectToDatabase();
    require_once("Model/function_database.php");
    $dtb = requestMainData($db);
    $produits = $dtb['produit'];
    $recettes = false;
    $users = false;
    require('View/formulaire_home.php');
?>

