<?php
    function findProduit($produitId, $db) {
        require_once("Model/function_database.php");
        $dtb = requestMainData($db);
        foreach ($dtb['produit'] as $key => $produit) {
            if ($produit['idproduit'] == $produitId) {
                return $produit;
            }
        }
        return false;
    }
?>