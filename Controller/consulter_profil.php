<?php
require_once("Model/dbConnect.php");
require_once("Model/function_profil.php");
$db = connectToDatabase();
$idclient = $_SESSION['user_id'];
$info = getProfilById($idclient);
if (!$info) {
    require('View/formulaire_connecter.php');
} else {
    $search = '';
    if (isset($_GET['modifier']) && $_GET['modifier']=='info') $msg2 = 'go'; else $msg2 = '';
    if (isset($_GET['modifier']) && $_GET['modifier']=='mdp') $msg = 'go'; else $msg = '';
    
    /*faire une recherche
    if(isset($_GET['search']) && !empty($_GET['search']) && isset($_GET['btn_recherche'])){
        $search =  htmlspecialchars($_GET['search']);
        //print_r(searchInfo($search));
        foreach(searchInfo($search) as $key => $valeur){
            foreach($valeur as $key2 => $valeur2){
                echo $valeur[$key2]."<br>";
            }
        }
    }*/

    if (isset($_POST['majinfo'])) {
        $msg2 = 'mjinfo';
        $array = [
            "nom" => htmlspecialchars($_POST['nom']),
            "prenom" => htmlspecialchars($_POST['prenom']),
            "telephone" => htmlspecialchars($_POST['telephone']),
            "mail" => htmlspecialchars($_POST['mail']),
            "adresse" => htmlspecialchars($_POST['adresse']),
            "cp" => htmlspecialchars($_POST['cp']),
            "ville" => htmlspecialchars($_POST['ville']),
            "idclient" => $idclient
        ];
        $res1 = majProfil($array);
        $info = getProfilById($idclient);
        $_SESSION['nom'] = $info["nom"];
        require("View/formulaire_profil.php");
    } elseif (isset($_POST['majmdp'])) {
        $msg = 'majmdp';
        $array2 = [
            "idclient" => $idclient,
            "mdp" => sha1(htmlspecialchars($_POST['mdp']))
        ];
        $res2 = majMdp($array2);
        require("View/formulaire_profil.php");
    } else {
        require("View/formulaire_profil.php");
    }
}
