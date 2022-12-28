<!DOCTYPE html>
<html>
    <head>
        <title>Recipe Finder</title>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style >
            <?php
                include_once("../Recipe-Finder/Assets/css/style.css");
                include_once("../Recipe-Finder/Assets/css/style_button_tooltip.css");
                include_once("../Recipe-Finder/Assets/css/form_registration.css");
            ?>
            body {margin:0;}
            .navbarmain {
                background-color: #dceaea;
                position: fixed;
                top: 0;
                width: 100%;
            }

            .navbarmain a {
                display: block;
                color: #f2f2f2;
                text-align: center;
                padding: 5px 10px 5px 10px;
                text-decoration: none;
                font-size: 14px;
            }

            .mainmain {
                padding: 30px;
                margin-top: 40px;
            }
            .notif{
                background-color: #fed812;
                position: absolute;
                font-size: 16px;
                color: black;
                min-width: 25px;
                padding:2px;
                top: 0.2vh;
                left: 5vw;
                border-radius: 25px;
            }
        </style>
    </head>
    <body>
        <div class="Typo">
            <div class="navbarmain">
                <a style="float:left;">
                    <img src="../Recipe-Finder/Assets/App_icons/recipe_finder_logo.png" style="height: 5vmin;">
                </a>
                <a style="float:right;">
                    <div class="tooltipmain">
                        <form action="../Recipe-Finder/index.php?action=consulter_panier" method="POST">
                            <button class="button" type="submit" name="action" value="consulter_panier" style="width: 7vw; height: 5vh; font-size: 1.5vmin;">
                                <img src="../Recipe-Finder/Assets/App_icons/panier2.png" height="25vmin"></image>  
                                <?php
                                if (isset($_SESSION['cart']))
                                {
                                    $total = 0;
                                    $cart = $_SESSION['cart'];
                                    foreach ($cart['lineitems'] as $key => $item) {
                                        $total += $item['quantite'];
                                    }
                                    if ($total > 0) echo "<div class=\"notif\">$total</div>";
                                }
                                ?>
                            </button>
                        </form>
                        <div class="bottom">
                            Votre panier
                        </div>
                    </div>
                </a>
                <a style="float:right;">
                    <div class="tooltipmain">
                        <form action="../Recipe-Finder/index.php?action=consulter_profil" method="POST">
                            <button class="button" type="submit" style="width: 7vw; height: 5vh; font-size: 1.5vmin; text-align: center" name="action" value="consulter_profil">
                                <img src="../Recipe-Finder/Assets/App_icons/compte2.png" height="25vmin"></image>
                            </button>
                        </form>
                        <div class="bottom">
                            <?php if (isset($_SESSION['nom']))
                                {
                                    echo "Bonjour <b>".$_SESSION['nom']."</b><br>Votre compte";
                                } else
                                {
                                    echo "Se connecter";
                                }
                            ?>
                        </div>
                    </div>
                </a>
                <a style="float:right;">
                    <div style="border-left:1px solid #000;height:5vh"></div>
                </a>
                <a style="float:right;">
                    <form action="../Recipe-Finder/index.php?action=consulter_produit" method="POST">
                        <button class="button" type="submit" style="width: 12vw; height: 5vh; font-size: 1.5vmin; text-align: center; color: black;" name="action" value="consulter_produit"><b>Consulter produits</b></button>
                    </form>
                </a>
                <a style="float:right;">
                    <form action="../Recipe-Finder/index.php?action=consulter_recette" method="POST">
                        <button class="button" type="submit" style="width: 12vw; height: 5vh; font-size: 1.5vmin; text-align: center; color: black;" name="action" value="consulter_recette"><b>Consulter recettes</b></button>
                    </form>
                </a>
                <a style="float:right;">
                    <form action="../Recipe-Finder/index.php?action=accueil" method="POST">
                        <button class="button" type="submit" style="width: 12vw; height: 5vh; font-size: 1.5vmin; text-align: center; color: black;" name="action" value="accueil"><b>Accueil</b></button>
                    </form>
                </a>
                <a style="float:left;">
                    <form action="../Recipe-Finder/index.php" method="GET" autocomplete="off">
                        <input type="hidden" name="action" value="rechercher">
                        <input name="search" style="width: 18vw; height: 5vh; font-size: 1.7vmin; text-align: center" value="<?php if (isset($_GET['search'])) {echo $_GET['search'];}?>" placeholder="Recherche...">
                    </form>
                </a>
                <?php
                    if (isset($_SESSION['user_role']) && $_SESSION['user_role']=="Cuisinier") {
                        echo "<a style=\"float:right;\">
                        <div class=\"tooltipmain\">
                            <form action=\"../Recipe-Finder/index.php?action=creer_recette\" method=\"POST\">
                                <button class=\"button\" type=\"submit\" style=\"width: 3.5vw; height: 5vh; font-size: 1.5vmin; text-align: center\" name=\"action\" value=\"creer_recette\">
                                    <img src=\"../Recipe-Finder/Assets/App_icons/recette.png\" height=\"25vmin\"></image>
                                </button>
                            </form>
                            <div class=\"bottom\">
                                Créer une recette
                            </div>
                        </div>
                    </a>";
                    }
                ?>
            </div>
            <div class="mainmain">
                <?php
                    if (isset($content_for_layout)) include($content_for_layout);
                ?>
            </div>
        </div>
	</body>
</html>
