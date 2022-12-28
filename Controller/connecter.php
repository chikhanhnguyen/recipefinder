<?php 
    require_once('Model/dbConnect.php');
    $db = connectToDatabase();

    if(!empty($_POST['mail']) AND !empty($_POST['motdepasse']))
    {
        $mail = htmlspecialchars($_POST['mail']);
        $motdepasse = sha1(htmlspecialchars($_POST['motdepasse']));

        $check = $db->prepare('SELECT idclient, mail, mdp, nom, role FROM client WHERE mail = ?');
        $check->execute(array($mail));
        $data = $check->fetch();
        $row = $check->rowCount();

        $redirect = NULL;
        if(isset($_GET['location']) != '') {
            $redirect = $_GET['location'];
        };

        if($row == 1) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                if($motdepasse == $data['mdp']) {
                    $_SESSION['user_id'] = $data['idclient'];
                    $_SESSION['nom'] = $data['nom'];
                    $_SESSION['user_role'] = $data['role'];
                    // Si la variable avec le lien de redirection existe alors on redirige vers cette page
                    if($redirect) {
                        require("Controller/consulter_produit.php");
                    // Sinon on retourne à la page d'accueil
                    } elseif($redirect == NULL) {
                        require("Controller/consulter_produit.php");
                    }
                } else {
                    $erreurs = array("<span style=\"color: red; font-size:14px\">Mot de passe n'est pas correct.</span><br>");
                    require('View/formulaire_connecter.php');
                }
            } else {
                $erreurs = array("<span style=\"color: red; font-size:14px\">Mot de passe n'est pas correct.</span><br>");
                require('View/formulaire_connecter.php');
            }
        } else {
            $erreurs = array("<span style=\"color: red; font-size:14px\">Email pas trouvé.</span><br>");
            require('View/formulaire_connecter.php');
        }
    } else {
        require('View/formulaire_connecter.php');
    }
    // Enregistre le lien de redirection sous htmlspecialchars dans un input hidden si il existe
    echo '<input type="hidden" name="location" value="';
    if(isset($_GET['location'])) {
        echo htmlspecialchars($_GET['location']);
    }
    echo '" />';
?>