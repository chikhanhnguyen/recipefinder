<!DOCTYPE html>
<html>
    <head>
		<title>Se connecter</title>
    </head>
    <body>
        <div class="center">
            <br><br><br><br>
            <table class="center" cellspacing="30"style="text-align: center; border: 2px inset #000000; border-radius: 30px;">
                <tr>
                    <div class="form connection">
                        <form action="../Recipe-Finder/index.php?action=se_connecter" method="POST">
                            <td>
                                <h1 class="Typo" style="color:rgb(13, 46, 38);">S'identifier</h>
                                <br><br>
                                <div class="Aligntext">    
                                    <label class="Typo" style="font-size: 13px; color: rgb(13, 46, 38);">Mail :</label>
                                    <input type="email" name="mail" style="width: 15vw; height: 4vh; font-size: 13px; text-align: center" value="<?php if (isset($_POST['mail'])) {echo $_POST['mail'];} ?>" placeholder="Votre mail" required>
                                    <br>
                                    <label class="Typo" style="font-size: 13px; color: rgb(13, 46, 38);">Mot de passe :</label>
                                    <input type="password" name="motdepasse" style="width: 15vw; height: 4vh; font-size: 13px; text-align: center" value="<?php if (isset($_POST['mdp'])) {echo $_POST['mdp'];} ?>" placeholder="Votre mot de passe" required>
                                </div>
                                <br>
                                <?php
                                    if (isset($erreurs))
                                    {
                                        $erreurs = implode("<br>", $erreurs);
                                        echo "<span style=\"color: red;  font-size:14px; \">$erreurs</span>";
                                    }
                                ?>
                                <br>
                                <button class="button" type="submit" style="width: 7vw; height: 4vh; font-size: 1.3vmin; text-align: center" name="Valider" value="Consulter_profil">Connexion</button>
                                <br><br>
                                <label class="Typo" style="font-size: 12px; color: #383535" >En passant votre commande, vous acceptez les Conditions générales de vente de Recipe Finder.</label>
                            </td>
                        </form>
                    </div>
                </tr>
            </table>
            <br><br>
            <label class="Typo" style="font-size: 12px; color: #9e9e9e" >Nouveau chez Recipe Finder ? </label>
            <br>
            <form action="../Recipe-Finder/index.php?action=creer_un_compte" method="POST">
                <button class="button" type="submit" style="width: 7vw; height: 4vh; font-size: 1.3vmin; text-align: center">Créer un compte</button>
            </form>
        </div>
    </body>
</html>