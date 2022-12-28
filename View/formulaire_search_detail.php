<?php
require("../Controller/search_detail.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['value'] ?></title>
</head>
<body>
    <ul>
    <?php if($_GET['table'] == 'produit'){ ?>
        <li><?php echo $info_detail['photo'] ?></li>
        <li><?php echo $info_detail['description'] ?></li>
    <?php } ?>

    <?php if($_GET['table'] == 'recette'){?>
        <li><?php echo $info_detail['photo'] ?> </li>
        <li><?php echo $info_detail['nom'] ?> </li>
    <?php } ?>

    <?php if($_GET['table'] == 'client'){?>
        <li><?php echo $info_detail['prenom'] ?> </li>
        <li><?php echo $info_detail['nom'] ?> </li>
        
    <?php } ?>
    
    </ul>
</body>
</html>