<?php
    require_once("Model/dbConnect.php");
    $db = connectToDatabase();
    require_once("Model/function_database.php");
    $dtb = requestMainData($db);
    
?>
    <h2>Toutes les commandes</h2><br><br>
<?php
    foreach($dtb['commande'] as $key => $commande) {
        if ($_SESSION['user_id'] == $dtb['commande'][$key]['idclient']) {
?>
    <div class="column" style="padding: 50px 400px 30px 400px;">
        <fieldset style="border: 2px groove; border-radius: 30px; padding: 40px 20px 30px 20px;" class="Typo" style="color:rgb(13, 46, 38);">
            <?php echo "<h3><b>Numero de commande: </b>".$dtb['commande'][$key]['idcommande']."</h3>"; ?>
            <?php echo "<br><br>Date de commande: "."<b>".$dtb['commande'][$key]['date_commande']."</b>"; ?>
            <?php echo "<br>TOTAL: "."<b>" .$dtb['commande'][$key]['total_commande']." EUR</b>"; ?>
            <?php echo "<br><br><a href='index.php?action=contenue_cmd&idcmd=".$dtb['commande'][$key]['idcommande']."'><button class='button' type='submit' style='width: 10vw; height: 5vh; font-size: 1.5vmin; text-align: center'>Détail de la commande</button></a>"; ?>
        </fieldset>
    </div>
    </br>
<?php
        }
    }
?>
