<?php 
function checkout($methode_paiement, $idclient, $db) {

    include_once("Model/function_creer_cmd.php");
    include_once("Model/function_database.php");
    $_cart = findcart();

    $data = requestMainData($db);
    
    $insert_facture = array(
        "date_facture" => date("Y-m-d"),
        "methode_paiement" => $methode_paiement,
        "total_facture" => cartTotalPrice()
    );

    $sql_facture = "INSERT INTO facture(date_facture, methode_paiement, total_facture) VALUES (:date_facture, :methode_paiement, :total_facture)";
    $req = $db->prepare($sql_facture);
    $req->execute($insert_facture);

    $insert_commande = array(
        "idclient" => $idclient,
        "date_commande" => date("Y-m-d"),
        "idfacture" =>  $data['facture'][count($data['facture']) - 1]['idfacture']+1,
        "total_commande" => cartTotalPrice()
    );

    $sql_commande = "INSERT INTO commande(idclient, date_commande, idfacture, total_commande) VALUES (:idclient, :date_commande, :idfacture, :total_commande)";
    $req = $db->prepare($sql_commande);
    $req->execute($insert_commande);

    $sql_lignes_commande = "INSERT INTO lignes_commande(idcommande, idproduit, quantite, prix) VALUES (:idcommande, :idproduit, :quantite, :prix)";
    $req = $db->prepare($sql_lignes_commande);

    foreach ($_cart["lineitems"] as $key => $value) {
        $insert_lignes_commande = array(
            "idcommande" => $data['commande'][count($data['commande']) - 1]['idcommande']+1,
            "idproduit" => $value['produit']['idproduit'],
            "quantite" => $value['quantite'],
            "prix" => $value['produit']['prix']
        );
        $req->execute($insert_lignes_commande);
    }

    $sql_produit = "UPDATE produit SET stock_dispo=:stock_dispo WHERE idproduit=:idproduit";
    $req = $db->prepare($sql_produit);

    foreach ($_cart["lineitems"] as $key => $value) {
        $update_produit = array(
            "stock_dispo" => $value['produit']['stock_dispo']-$value['quantite'],
            "idproduit" => $value['produit']['idproduit']
        );
        $req->execute($update_produit);
    }
    
    emptyCart();
}
?>