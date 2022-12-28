<?php
    if (isset($_POST['methode_paiement'])) {
        require_once("Model/dbConnect.php");
        require_once("Model/function_checkout.php");
        $db = connectToDatabase();
        $idclient = $_SESSION['user_id'];
        $methode_paiement = $_POST['methode_paiement'];
        checkout($methode_paiement, $idclient, $db);
        require('View/formulaire_save_order.php');
    } else {
        require('View/formulaire_checkout.php');
    }
?>