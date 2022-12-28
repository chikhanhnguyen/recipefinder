<?php
    require_once("Model/dbConnect.php");
    $db = connectToDatabase();
	require_once("Model/function_profil.php");
    if (!isset($_SESSION['user_id'])) {
        exit;
	}

	if (isset($_POST["Valider"]) && $_POST["Valider"] == "confirmer_supprimer_compte") {
		$idClient = $_SESSION['user_id'];
		$mdp = sha1($_POST['mdp']);

		if (!$mdp) {
			$message = "<span style=\"color: red;\">Entrez votre mot de passe</span>";
		}

		if ($mdp) {
			$ok = supprimerCompte($idClient, $mdp);
			if ($ok)
			{
				session_destroy();
				$message = "<span style=\"color: green; font-size:14px; \">Votre compte a été supprimé</span>";
			}
			else
			{
				$message = "<span style=\"color: red; font-size:14px; \">Mot de passe n'est pas correct</span>";
			}
		} else {
			$message = "<span style=\"color: red; font-size:14px; \">Mot de passe n'est pas correct</span>";
		} 
	}

	require('View/formulaire_supprimer_compte.php');
	echo '<input type="hidden" name="location" value="';
	
    if (isset($_GET['location'])) {
        echo htmlspecialchars($_GET['location']);
    }
    echo '" />';
?>