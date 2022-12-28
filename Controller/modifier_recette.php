<?php
    require_once("Model/dbConnect.php");
    $DB = connectToDatabase();
    $_POST['erreur'] = array();

    if (!isset($_SESSION['user_id'])) {
        require('View/formulaire_connecter.php');
        exit;
    }
    if (isset($_GET["action"]) && isset($_GET["id"]))
    {
        $req_idrecette = $DB->prepare("SELECT * FROM recette WHERE idrecette = ?");
        if (isset($_GET["id"])) {
            $idrecette = $_GET['id'];
        } else {
            $idrecette = $_POST['idRecette'];
        }
        $req_idrecette->execute(array($idrecette));
        $req_idrecette = $req_idrecette->fetch();
        $nom = $req_idrecette['nom'];
        $description = $req_idrecette['description'];
    }
    if (isset($_POST['action']))
    {
        $idrecette = $_POST['idrecette'];
        if ($_POST['action'] == "modifier") {
            $modifier = true;
            $nom = $_POST['nom'];
            $description = $_POST['description'];
    
            if ($modifier) {
                $insert = $DB->prepare("UPDATE recette SET  nom = ?, description = ? WHERE idrecette = ?");
                $insert->execute(array($nom, $description, $idrecette));
                $erreur = "Votre recette a été modifié.";
            }
            require('Controller/consulter_recette.php');
        }
    
        else if ($_POST["action"] == "supprimer") {
            if ($idrecette) {
                $check= $DB->query("DELETE FROM recette WHERE idrecette = '$idrecette'");
                $erreur = "Votre recette a été supprimé";
            }
            require('Controller/consulter_recette.php');
        }
        else {
            require('View/formulaire_modifier_recette.php');
        }
        array_push($_POST['erreur'], "<span style=\"color: green; font-size:14px; \">$erreur</span><br>");
    }
    else {
        require('View/formulaire_modifier_recette.php');
    }
?>