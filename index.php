<?php
session_start();
    if(isset($_GET['action'])) {
        switch($_GET['action']) {
            case "consulter_profil":
                if (isset($_SESSION['user_id']))
                {
                    $content_for_layout = "Controller/consulter_profil.php";
                } else
                {
                    $content_for_layout = "Controller/connecter.php";
                }
                break;
            case "se_connecter":
                $content_for_layout = "Controller/connecter.php";
                break;
            case "consulter_cmd":
                $content_for_layout = "Controller/consulter_cmd.php";
                break;
            case "contenue_cmd":
                $content_for_layout = "Controller/contenue_cmd.php";
                break;
            case "deconnecter":
                $content_for_layout = "Controller/deconnecter.php";
                break;
            case "creer_un_compte":
                $content_for_layout = "Controller/inscription.php";
                break;
            case 'supprimer_compte':
                $content_for_layout = "Controller/supprimer_compte.php";
                break;
            case "consulter_panier":
                $content_for_layout = "Controller/consulter_panier.php";
                break;
            case "consulter_recette":
                $content_for_layout = "Controller/consulter_recette.php";
                break;
            case "creer_recette":
                if (!isset($_SESSION['user_id'])) {
                    $content_for_layout = "Controller/connecter.php";
                } else {
                    if ($_SESSION['user_role'] == "Cuisinier")
                    {
                        $content_for_layout = "Controller/creer_recette.php";
                    } else {
                        $content_for_layout = "Controller/consulter_recette.php";
                    }
                }
                break;
            case "modifier_recette":
                if (!isset($_SESSION['user_id'])) {
                    $content_for_layout = "Controller/connecter.php";
                } else {
                    if ($_SESSION['user_role'] == "Cuisinier")
                    {
                        $content_for_layout = "Controller/modifier_recette.php";
                    } else {
                        $content_for_layout = "Controller/consulter_recette.php";
                    }
                }
                break;   
            case "vider_panier":
                $content_for_layout = "Controller/consulter_panier.php";
                require_once("Model/function_creer_cmd.php");
                emptyCart();
                break;
            case "addtocart":
                $content_for_layout = "Controller/consulter_produit.php";
                require_once("Model/dbConnect.php");
                $db = connectToDatabase();
                $idproduit = $_POST['idproduit'];
                $qte = $_POST['qte'];
                require_once("Model/function_creer_cmd.php");
                addToCart($qte, $idproduit, $db);
                break;
            case "update_panier":
                $content_for_layout = "Controller/consulter_panier.php";
                require_once("Model/dbConnect.php");
                $db = connectToDatabase();
                $qte = $_POST['qte'];
                $idproduit = $_POST['idproduit'];
                require_once("Model/function_creer_cmd.php");
                updateQuantiteProduit($qte, $idproduit, $db);
                break;
            case "like":
                $content_for_layout = "Controller/consulter_recette.php";
                $id = $_GET['id'];
                require("Model/dbConnect.php");
                $db = connectToDatabase();
                require("Model/function_creer_un_like.php");
                creer_un_like($db, $id);
                break;
            case 'consulter_produit':
                $content_for_layout = "Controller/consulter_produit.php";
                break;
            case "rechercher":
                $content_for_layout = "Controller/recherche.php";
                break;
            case "commander":
                require_once("Model/function_creer_cmd.php");
	            $_cart = findcart();
                if (empty($_cart['lineitems'])) {
                    $content_for_layout = "Controller/consulter_panier.php";
                } elseif (!isset($_SESSION['user_id'])) {
                    $content_for_layout = "Controller/connecter.php";
                } else {
                    $content_for_layout = "View/formulaire_checkout.php";
                }
                break;
            case 'save_order':
                $content_for_layout = "Controller/save_order.php";
                break;
            case "accueil":
                $content_for_layout = "View/accueil.html";
                break;
            default:
                $content_for_layout = "View/accueil.html";
                break;
        }
    } else {
        $content_for_layout = "View/accueil.html";
    }
    $layout = "View/formulaire_mainlayout.php";
    include($layout);
?> 
