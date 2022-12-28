<?php
    function requestMainData($db) {
        //Donnée des produits
        $sql ="SELECT * FROM produit";
        $res = $db->query($sql);
        $produit = array();

        while ($data = $res->fetch()) {
            $produit[] = array (
                "idproduit" => $data['idproduit'],
                "description" => $data['description'],
                "stock_dispo" => $data['stock_dispo'],
                "prix" => $data['prix'],
                "photo" => $data['photo']
            );
        };

        //Donnée des commande
        $sql ="SELECT * FROM commande";
        $res = $db->query($sql);
        $commande = array();

        while ($data = $res->fetch()) {
            $commande[] = array (
                "idcommande" => $data['idcommande'],
                "idclient" => $data['idclient'],
                "date_commande" => $data['date_commande'],
                "idfacture" => $data['idfacture'],
                "total_commande" => $data['total_commande']
            );
        };

        //Donnée des lignes_commande
        $sql ="SELECT * FROM lignes_commande";
        $res = $db->query($sql);
        $lignes_commande = array();

        while ($data = $res->fetch()) {
            $lignes_commande[] = array (
                "idlignes_commande" => $data['idlignes_commande'],
                "idcommande" => $data['idcommande'],
                "idproduit" => $data['idproduit'],
                "quantite" => $data['quantite'],
                "prix" => $data['prix']
            );
        };

        //Donnée des avis
        $sql ="SELECT * FROM avis";
        $res = $db->query($sql);
        $avis = array();

        while ($data = $res->fetch()) {
            $avis[] = array (
                "idavis" => $data['idavis'],
                "idclient" => $data['idclient'],
                "idrecette" => $data['idrecette'],
                "avis" => $data['avis']
            );
        };

        //Donnée des client
        $sql ="SELECT * FROM client";
        $res = $db->query($sql);
        $client = array();

        while ($data = $res->fetch()) {
            $client[] = array (
                "idclient" => $data['idclient'],
                "nom" => $data['nom'],
                "prenom" => $data['prenom'],
                "telephone" => $data['telephone'],
                "mail" => $data['mail'],
                "mdp" => $data['mdp'],
                "adresse" => $data['adresse'],
                "cp" => $data['cp'],
                "ville" => $data['ville'],
                "role" => $data['role']
            );
        };

        //Donnée des facture
        $sql ="SELECT * FROM facture";
        $res = $db->query($sql);
        $facture = array();

        while ($data = $res->fetch()) {
            $facture[] = array (
                "idfacture" => $data['idfacture'],
                "date_facture" => $data['date_facture'],
                "methode_paiement" => $data['methode_paiement']
            );
        };

        //Donnée des recette
        $sql ="SELECT * FROM recette";
        $res = $db->query($sql);
        $recette = array();

        while ($data = $res->fetch()) {
            $recette[] = array (
                "idrecette" => $data['idrecette'],
                "nom" => $data['nom'],
                "photo" => $data['photo'],
                "description" => $data['description'],
                "type" => $data['type']
            );
        };

        //Donnée de la table "contenir"
        $sql ="SELECT * FROM contenir";
        $res = $db->query($sql);
        $contenir = array();

        while ($data = $res->fetch()) {
            $contenir[] = array (
                "idcontenir" => $data['idcontenir'],
                "idrecette" => $data['idrecette'],
                "idproduit" => $data['idproduit']
            );
        };


        //Toutes les données stockée dans $dtb
        $dtb = array (
            "produit" => $produit,
            "commande" => $commande,
            "lignes_commande" => $lignes_commande,
            "avis" => $avis,
            "client" => $client,
            "facture" => $facture,
            "recette" => $recette,
            "contenir" => $contenir
        );

        return $dtb;
    };
?>