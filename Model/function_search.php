<?php

function detail_search(string $table_bdd, string $col, string $value){
    global $db;
    $req = "SELECT * FROM $table_bdd WHERE $col = '$value'";
    $stmt = $db->query($req);
    
    return $stmt -> fetch();
}

function searchInfo($keyword):array{
    global $db;
    $req ="SELECT DISTINCT description,photo,'produit' FROM produit WHERE description LIKE '%$keyword%'
    UNION
    SELECT DISTINCT nom,photo,'recette' FROM recette WHERE nom LIKE '%$keyword%'
    UNION 
    SELECT DISTINCT nom,prenom,'cuisinier' FROM client WHERE role = 'Cuisinier' AND (nom LIKE '%$keyword%' OR prenom LIKE '%$keyword%')";
    $stmt = $db->prepare($req);
    $stmt->execute();

    return $stmt->fetchAll();
}

function searchAll($keyword):array{
    global $db;
    // produit
    $req ="SELECT * FROM produit WHERE description LIKE '%$keyword%'";
    $stmt = $db->prepare($req);
    $stmt->execute();
    $produits = $stmt->fetchAll();
    // recette
    $req ="SELECT * FROM recette WHERE nom LIKE '%$keyword%' OR description LIKE '%$keyword%'";
    $stmt = $db->prepare($req);
    $stmt->execute();
    $recettes = $stmt->fetchAll();
    // user
    $req ="SELECT * FROM client WHERE nom LIKE '%$keyword%' OR prenom LIKE '%$keyword%'";
    $stmt = $db->prepare($req);
    $stmt->execute();
    $users = $stmt->fetchAll();

    return array(
        "produits" => $produits,
        "recettes" => $recettes,
        "users" => $users);
}
?>