<?php
    function getLignesCommande($db, $idCommande) {
        $req = "SELECT P.description, LC.quantite, P.prix, P.photo, P.prix*LC.quantite  AS total_prix FROM lignes_commande as LC join produit as P on LC.idproduit = P.idproduit where LC.idcommande = $idCommande";
        $stmt = $db->prepare($req);
        $stmt->execute();
        $lignes_commande = $stmt->fetchAll();
        return $lignes_commande;
    };
?>