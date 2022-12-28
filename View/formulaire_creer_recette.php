<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Créer une recette</title>
    </head>
    <body>
		<div class="center">
			<br><br><br><br>
			<h1 class="Typo" style="color:rgb(13, 46, 38);">Formulaire de création de recette</h1>
			<br><br><br><br>
			<form action="../Recipe-Finder/index.php?action=creer_recette" method="POST" enctype="multipart/form-data">
				<div class="Aligntext">
					<label class="Typo" style="font-size: 20px; color: rgb(13, 46, 38);">Titre :</label>
					<input type="text" style="width: 15vw; height: 4vh; font-size: 1.7vmin; text-align: center" name="titre" value="">
					<br><br>
					<label class="Typo" style="font-size: 20px; color: rgb(13, 46, 38);">Photo :</label>
					<input type="file" style="color: #146143" name="photo">
					<br><br>
					<label class="Typo" style="font-size: 20px; color: rgb(13, 46, 38);">Description :</label>
					<input type="textarea" name="description" value="">
				</div><br><br><br><br>
				<button class="button" type="submit" style="width: 8vw; height: 4vh; font-size: 1.5vmin; text-align: center" name="Enregistrer" >Enregistrer</button>
			</form>
			<br>
			<br>
			<?php
				if (isset($erreurs))
				{
					$erreurMsg = implode("<br>", $erreurs);
					echo "<span style=\"color: red;  font-size:14px; \">$erreurMsg</span><br>";
				}
			?>
		</div>
    </body>
</html>

