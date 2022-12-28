<?php
    require_once("Model/dbConnect.php");
    $db = connectToDatabase();
    include_once("Model/function_database.php");
    $dtb = requestMainData($db);

    if (isset($_POST["Enregistrer"])) {
        $creer = true;
        $titre = $_POST['titre'];
        $nbr = $dtb['recette'][count($dtb['recette']) - 1]['idrecette']+1;


        if(isset($_FILES['photo']) AND !empty($_FILES['photo']['name'])) {
            $extensionsValides = array('jpg', 'jpeg', 'png');
            $format = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
            
            if(in_array($format, $extensionsValides)) {
                $photo = $nbr.".".$format;
            }
        } else {
           $photo = "vide";
        }
        if ($format == 'jpg' || $format == 'png' || $format == 'jpeg') {
            $form = 'image';
            $blob = file_get_contents($_FILES['photo']['tmp_name']);
            $type = $_FILES['photo']['type'];
        }
        $description = $_POST['description'];

		if ($titre == '' || $photo == 'vide' || $description == '') {
            $erreurs = array("Merci de remplir tous les champs.");
            $creer = false;
        }
        if ($creer == false) {
            require('View/formulaire_creer_recette.php');
        } else {
            $req = $db->prepare("INSERT INTO recette (`nom`,`photo`,`description`,`type`) VALUES (?,?,?,?)");
            $req->execute(array($titre, $blob, $description, $type));
            require("View/formulaire_confirmation_creer_recette.php");
        }
    } else {
        require('View/formulaire_creer_recette.php');
    }
?>