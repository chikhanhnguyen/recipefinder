<?php 
    // supprimer la session puis redirige vers l'index
    session_destroy();
    require("../Recipe-Finder/Controller/consulter_produit.php");
?>