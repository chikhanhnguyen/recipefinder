<?php
    ob_start();
    require_once('Model/dbConnect.php');
    $db = connectToDatabase();
    unset($_SESSION['user_id']);
    $donne = $_POST;
    if (isset($donne['action']) && $donne['action'] == "creer") {
        $inscription = true;
        $nom = $donne['nom'];
        $prenom = $donne['prenom'];
        $telephone = $donne['telephone'];
        $mail = strtolower($donne['mail']);
        $mdp = $donne['mdp'];
        $adresse = $donne['adresse'];
        $cp = $donne['cp'];
        $ville = $donne['ville'];
        $role = $donne['role'];

        $reponde = $db->query("SELECT mail FROM client WHERE mail = '$mail'");
        while ($trouve = $reponde->fetch()) {
            $inscription = false;
            $erreurs = array("<span style=\"color: red; font-size:14px; \">Email déjà pris.</span><br>");
            break;
        }

        if ($inscription == true) {
            $requete = $db->prepare("INSERT INTO client (`nom`,`prenom`,`telephone`,`mail`,`mdp`,`adresse`,`cp`,`ville`,`role`) VALUES (?,?,?,?,SHA1(?),?,?,?,?)");
            $requete->execute(array($nom, $prenom, $telephone, $mail, $mdp, $adresse, $cp, $ville, $role));
            $reponde = $db->query("SELECT * FROM client WHERE mail = '$mail'");
            while ($trouve = $reponde->fetch()) {
                $idClient = intval($trouve['idclient']);
                $username = $trouve['nom'];
                $userRole = $trouve['role'];
            }
            $_SESSION['user_id'] = $idClient;
            $_SESSION['nom'] = $username;
            $_SESSION['user_role'] = $userRole;
            require("View/formulaire_confirmation_inscription.php");
        }
        else
        {
            require('View/formulaire_inscription.php');
        }
    } else {
        require('View/formulaire_inscription.php');
    }

    echo '<input type="hidden" name="location" value="';
    if (isset($_GET['location'])) {
        echo htmlspecialchars($_GET['location']);
    }
    echo '" />';
?>
