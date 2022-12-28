<!DOCTYPE html>
<html>
    <head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Modifier une recette</title>
    </head>
    <body>
		<div class="center" >
			<br><br><br>
			<h1 class="Typo" style="color:rgb(13, 46, 38);">Formulaire de modification de recette</h1>
			<br><br><br>
			<form action="../Recipe-Finder/index.php?action=modifier_recette" method="POST">
				<div class="Aligntext">
					<label class="Typo" style="font-size: 20px; color: rgb(13, 46, 38);">Nom :</label>
					
					<input type="hidden" name="idrecette" value="<?php if(isset($idrecette)) {echo $idrecette;} ?>">
					<input type="text" name="nom" value="<?php if(isset($nom)) {echo $nom;} ?>"required>
					<br><br>
					<label class="Typo" style="font-size: 20px; color: rgb(13, 46, 38);">Description :</label>
					<input type="text" name="description" value="<?php if(isset($description)) { echo $description;} ?>" required>
					<br><br><br>
					<div class="center" style="left: 50%">
						<?php $erreurs = implode("<br>", $_POST['erreur']); echo "<span style=\"color: green;  font-size:14px; \">$erreurs</span><br>";?>
						<br/>
						<button class="button" type="submit" style="width: 10vw; height: 5vh; font-size: 1.5vmin; text-align: center" name="action" value="modifier">Enregistrer</button>
						<br><br>
						<button class="button" type="submit" style="width: 10vw; height: 5vh; font-size: 1.5vmin; text-align: center; background: #ce2151; color: white;" name="action" value="supprimer">Supprimer</button>
					</div>
				</div>
			</form>
		</div>
    </body>
</html>

