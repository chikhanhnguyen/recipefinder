<?php
    function getProfilById($idclient):array{
        global $db;
        $req = "SELECT * FROM client WHERE idclient=:idclient";
        $stmt = $db->prepare($req);
        $stmt->execute(array(":idclient"=>$idclient));
        $info = $stmt->fetch();
        if (!$info) return array();
        return $info;
    }

    function majProfil($array):bool{
        global $db;
        $req = "UPDATE client SET nom = :nom, prenom = :prenom,
        telephone = :telephone, mail = :mail, adresse = :adresse,
        cp = :cp, ville = :ville WHERE idclient = :idclient";
        $stmt = $db->prepare($req);
        return $stmt->execute($array);
    }

    function majMdp($array):bool{
        global $db;
        $req = "UPDATE client SET mdp = :mdp WHERE idclient = :idclient";
        $stmt = $db->prepare($req);
        return $stmt->execute($array);
    }

    function supprimerCompte($idClient, $mdp)
    {
        global $db;
        // ETAPE 1: verifier le mdp est correct
        $check = $db->prepare("SELECT idclient, mdp FROM client WHERE idclient = ? AND mdp = ?");
        $check->execute(array($idClient, $mdp));
        $row = $check->rowCount();
        if ($row >= 1) {
            // ETAPE 2: supprimer ce compte
            // supprimer tous likes
            $del_like = $db->prepare('DELETE FROM avis WHERE idclient = ?');
            $del_like->execute(array($idClient));
            // supprimer toutes lignes commandes
            $req = "SELECT idcommande from commande where idclient = $idClient";
            $stmt = $db->prepare($req);
            $stmt->execute();
            $idCommandes = $stmt->fetchAll();
            if ($idCommandes)
            {
                foreach($idCommandes as $key => $value)
                {
                    $del_lignes_commande = $db->prepare('DELETE FROM lignes_commande WHERE idcommande = ?');
                    $del_lignes_commande->execute(array($value['idcommande']));
                    // supprimer toutes commandes
                    $del_commande = $db->prepare('DELETE FROM commande WHERE idcommande = ?');
                    $del_commande->execute(array($value['idcommande']));
                }
            }
            $del_compte = $db->prepare('DELETE FROM client WHERE idclient = ? AND mdp = ?');
            $del_compte->execute(array($idClient, $mdp));
            return true;
        } else {
            return false;
        }
    }
?>