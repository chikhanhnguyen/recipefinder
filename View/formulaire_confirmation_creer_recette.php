<!DOCTYPE html>
<html>
    <head>
		<title>Confirmation de création de recette</title>
		<link rel="icon" href="recipe_finder_logo.png" type="image/icon type">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	</head>
    <body>
		<div class="center">
			<br><br><br><br>
        	<h1 class="Typo" style="font-size: 30px; color: rgb(13, 46, 38)">Confirmation de création de recette</h1>
			<br><br><br><br>
			<p class="Typo" style="color: rgb(13, 46, 38)">
				Votre recette a bien été créé.
			</p><br><br>
			<p class="Typo" style="color: rgb(13, 46, 38)">
				Cliquez sur le lien ci-dessous pour revenir à la page d'accueil
			</p><br><br><br><br><br>
			<a href="index.php" style="width: 14vw; height: 5vh; font-size: 2vmin; font-family: 'Lato', sans-serif;">
				<form action="../Recipe-Finder/index.php?action=consulter_recette" method="POST">
					<button class="button" style="width: 14vw; height: 5vh" type="submit">Revenir à la page d'accueil</button>
				</form>
			</a>
		</div>
    </body>
</html>

