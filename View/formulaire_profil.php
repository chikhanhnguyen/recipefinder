<?php
    require_once("../Recipe-Finder/Controller/consulter_profil.php");
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Mon Profil</title>
    </head>
    <body>
        <header><nav></nav></header>
        <div class="profil">
                <section class="infos"> 
                    <div class="Typo">
                        <h1><?php echo strtoupper($info["nom"])." ".strtoupper($info["prenom"])?></h1>
                        <br>
                        <ul>
                            <li><i class="fas fa-phone"></i><?php echo " [".$info["telephone"]."]"?></li><br>
                            <li><i class="fas fa-envelope-square"></i> <?php echo " ".$info["mail"]?></li><br>
                            <li><i class="fas fa-map-pin"></i><?php echo " ".$info["adresse"]?></li><br>
                            <li><i class="fas fa-globe-europe"></i><?php echo " ".$info["cp"]?></li><br>
                            <li><i class="fas fa-city"></i><?php echo " ".$info["ville"]?></li><br>
                            <li><i class="fas fa-user"></i><?php echo " ".$info["role"]?></li>
                        </ul>
                        <br><br>
                        <form action="../Recipe-Finder/index.php?action=consulter_cmd" method="POST">
                            <button class="button" type="submit" style="width: 8vw; height: 4vh; font-size: 1.3vmin; text-align: center; background: #ded932; color: white;" value="voir_commande" name="voir_commande">Voir Commande</button>
                        </form><br>
                        <form action="../Recipe-Finder/index.php?action=consulter_profil&modifier=info" method="POST">
                            <button class="button" type="submit" id="l_1" style="width: 8vw; height: 4vh; font-size: 1.3vmin; text-align: center; background: #F47E17; color: white;">Modifier</button>
                        </form><br>
                        <form action="../Recipe-Finder/index.php?action=consulter_profil&modifier=mdp" method="POST">
                            <button class="button" type="submit" id="l_2" style="width: 8vw; height: 4vh; font-size: 1.3vmin; text-align: center; background: #F47E17; color: white;">Modifier mot de passe</button>
                        </form><br>
                        <form action="../Recipe-Finder/index.php?action=supprimer_compte" method="POST">
                            <button class="button" type="submit" style="width: 8vw; height: 4vh; font-size: 1.3vmin; text-align: center; background: #ce2151; color: white;" value="supprimer_compte" name="supprimer_compte">Supprimer compte</button>
                        </form><br>
                        <form action="../Recipe-Finder/index.php?action=deconnecter" method="POST">
                            <button class="button" type="submit" style="width: 8vw; height: 4vh; font-size: 1.3vmin; text-align: center" value="deconnecter" name="deconnecter">Déconnecter</button>
                        </form>
                    </div>
                </section>
                <section class="form">
                    <br>
                    <a href="index.php?action=consulter_profil">
                    <button type="button" style="width: 8vw; height: 4vh; font-size: 1.5vmin; text-align: center" class="btn dsp <?php echo !empty($msg)||!empty($msg2)? '' : 'hidden'; ?>"><b>Annuler</b></button>
                    </a>
                    <p class="p"><?php echo !empty($erreur)? $erreur : ''; ?></p>
                    <form action="" method="POST" class=" <?php echo !empty($msg2)? '' : 'hidden'; ?>" id="f_1">
                        <form class="registration" id="registration">
                            <div class="Aligntext">
                                <div class="Typo">
                                    <br>
                                    <label for="nom">
                                        <span>Nom</span>
                                        <input type="text" id="nom" minlength="2" maxlength="35" name="nom" value="<?php if (isset($info['nom'])) {echo $info['nom'];} ?>" required>
                                        <ul class="input-requirements">
                                            <li>Au moins 2 caractères et au plus 35 caractères</li>
                                            <li>Ne doit contenir que des lettres et des caractères spéciaux (é,è,à,-,')</li>
                                        </ul>
                                    </label>
                                    <label for="prenom">
                                        <span>Prénom</span>
                                        <input type="text" id="prenom" minlength="2" maxlength="35" name="prenom" value="<?php if (isset($info['prenom'])) {echo $info['prenom'];}?>" required>
                                        <ul class="input-requirements">
                                            <li>Au moins 2 caractères et au plus 35 caractères</li>
                                            <li>Ne doit contenir que des lettres et des caractères spéciaux (é,è,à,-,')</li>
                                        </ul>
                                    </label>
                                    <label for="mail">
                                        <span>Mail</span>
                                        <input type="text" id="mail" name="mail" value="<?php if (isset($info['mail'])) {echo $info['mail'];}?>" required>
                                        <ul class="input-requirements">
                                            <li>L'entrée doit être un courrier valide</li>
                                        </ul>
                                    </label>
                                    <label for="tel">
                                        <span>Telephone</span>
                                        <input type="text" id="tel" minlength="10" name="telephone" value="<?php if (isset($info['telephone'])) {echo $info['telephone'];}?>" required>
                                        <ul class="input-requirements">
                                            <li>Doit contenir 10 chiffres</li>
                                        </ul>
                                    </label>
                                    <label for="adresse">
                                        <span>Adresse</span>
                                        <input type="text" id="adresse" minlength="3" name="adresse" value="<?php if (isset($info['adresse'])) {echo $info['adresse'];}?>"required>
                                        <ul class="input-requirements">
                                            <li>Au moins 3 caractères</li>
                                            <li>Ne doit contenir que des lettres, des chiffres, et des caractères spéciaux (é,è,à,-,',\s)</li>
                                        </ul>
                                    </label>
                                    <label for="cp">
                                        <span>Code postal</span>
                                        <input type="text" id="cp" minlength="5" name="cp" value="<?php if (isset($info['cp'])) {echo $info['cp'];}?>" required>
                                        <ul class="input-requirements">
                                            <li>Doit contenir 5 chiffres</li>
                                        </ul>
                                    </label>
                                    <label for="ville">
                                        <span>Ville</span>
                                        <input type="text" id="ville" minlength="3" name="ville" value="<?php if (isset($info['ville'])) {echo $info['ville'];}?>" required>
                                        <ul class="input-requirements">
                                            <li>Au moins 3 caractères</li>
                                            <li>Ne doit contenir que des lettres, des chiffres, et des caractères spéciaux (é,è,à,-,',\s)</li>
                                        </ul>
                                    </label>
                                </div>
                            </div>
                            <button class="button" type="submit" style="width: 8vw; height: 4vh; font-size: 1.5vmin; text-align: center; background: #6483f3; color: white" class="btn" name="majinfo">Soumettre</button>
                        </form>
                    </form>

                    <form method="POST" class="<?php echo !empty($msg)? '' : 'hidden'; ?>" id="f_2">
                        <br><br><br><br>
                        <div class="Aligntext">
                            <div class="Typo">
                                <label for="password">
                                    <span>Nouveau mot de passe</span>
                                    <input type="password" id="password" maxlength="100" minlength="8" name="mdp" value="" required>
                                    <ul class="input-requirements">
                                        <li>Au moins 8 caractères (et moins de 100 caractères)</li>
                                        <li>Contient au moins 1 chiffre</li>
                                        <li>Contient au moins 1 lettre minuscule</li>
                                        <li>Contient au moins 1 lettre majuscule</li>
                                    </ul>
                                </label>
                                <label for="password_repeat">
                                    <span>Confirmation de mot passe</span>
                                    <input type="password" id="password_repeat" maxlength="100" minlength="8" required>
                                </label>
                            </div>
                        </div>
                        <br><br><br><br><br><br>
                        <button class="button" type="submit" style="width: 8vw; height: 4vh; font-size: 1.5vmin; text-align: center; background: #6483f3; color: white" class="btn" name="majmdp">Soumettre</button>
                    </form>
                </section>
        </div>
        <script src="../Reciper-Finder/Assets/script.js"></script>
        <script src="Assets/script_form_validation.js"></script>
    </body>

</html>
