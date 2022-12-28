<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Inscription</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<div class="center">
		<form action="../Recipe-Finder/index.php?action=creer_un_compte" method="POST">
			<form class="registration" id="registration">
				<br>
				<h2>Inscription</h2>
				<br><br>
				<?php
					if (isset($erreurs))
					{
						$erreurs = implode("<br>", $erreurs);
						echo "<span style=\"color: red;  font-size:14px; \">$erreurs</span><br>";
					}
				?>
				<label for="nom">
					<span>Nom</span>
					<input type="text" id="nom" minlength="2" maxlength="35" name="nom" value="<?php if (isset($_POST['nom'])) {echo $_POST['nom'];} ?>" required>
					<ul class="input-requirements">
						<li>Au moins 2 caractères et au plus 35 caractères</li>
						<li>Ne doit contenir que des lettres et des caractères spéciaux (é,è,à,-,')</li>
					</ul>
				</label>
				<label for="prenom">
					<span>Prénom</span>
					<input type="text" id="prenom" minlength="2" maxlength="35" name="prenom" value="<?php if (isset($_POST['prenom'])) {echo $_POST['prenom'];}?>" required>
					<ul class="input-requirements">
						<li>Au moins 2 caractères et au plus 35 caractères</li>
						<li>Ne doit contenir que des lettres et des caractères spéciaux (é,è,à,-,')</li>
					</ul>
				</label>
				<label for="mail">
					<span>Mail</span>
					<input type="text" id="mail" name="mail" value="<?php if (isset($_POST['mail'])) {echo $_POST['mail'];}?>" required>
					<ul class="input-requirements">
						<li>L'entrée doit être un courrier valide</li>
					</ul>
				</label>
				<label for="password">
					<span>Password</span>
					<input type="password" id="password" maxlength="100" minlength="8" name="mdp" value="<?php if (isset($_POST['mdp'])) {echo $_POST['mdp'];}?>" required>
					<ul class="input-requirements">
						<li>Au moins 8 caractères (et moins de 100 caractères)</li>
						<li>Contient au moins 1 chiffre</li>
						<li>Contient au moins 1 lettre minuscule</li>
						<li>Contient au moins 1 lettre majuscule</li>
					</ul>
				</label>
				<label for="tel">
					<span>Telephone</span>
					<input type="text" id="tel" minlength="10" name="telephone" value="<?php if (isset($_POST['telephone'])) {echo $_POST['telephone'];}?>" required>
					<ul class="input-requirements">
						<li>Doit contenir 10 chiffres</li>
					</ul>
				</label>
				<label for="adresse">
					<span>Adresse</span>
					<input type="text" id="adresse" minlength="3" name="adresse" value="<?php if (isset($_POST['adresse'])) {echo $_POST['adresse'];}?>"required>
					<ul class="input-requirements">
						<li>Au moins 3 caractères</li>
						<li>Ne doit contenir que des lettres, des chiffres, et des caractères spéciaux (é,è,à,-,',\s)</li>
					</ul>
				</label>
				<label for="cp">
					<span>Code postal</span>
					<input type="text" id="cp" minlength="5" name="cp" value="<?php if (isset($_POST['cp'])) {echo $_POST['cp'];}?>" required>
					<ul class="input-requirements">
						<li>Doit contenir 5 chiffres</li>
					</ul>
				</label>
				<label for="ville">
					<span>Ville</span>
					<input type="text" id="ville" minlength="3" name="ville" value="<?php if (isset($_POST['ville'])) {echo $_POST['ville'];}?>" required>
					<ul class="input-requirements">
						<li>Au moins 3 caractères</li>
						<li>Ne doit contenir que des lettres, des chiffres, et des caractères spéciaux (é,è,à,-,',\s)</li>
					</ul>
				</label>
				<label for="role">
					<span>Role</span>
					<select name="role">
						<option value="client" <?php if (isset($_POST['role']) == "client") {print "selected";}?>>Client</option>
						<option value="cuisinier" <?php if (isset($_POST['role']) == "cuisinier") {print "selected";}?>>Cuisinier</option>
					</select>
				</label>
				<br>
				<button class="button" type="submit" style="width: 8vw; height: 4vh; font-size: 1.3vmin; text-align: center" name="action" value="creer">Créer compte</button>
			</form>
		</form>
		<br>
	</div>
    <script src="Assets/script_form_validation.js"></script>
</body>
</html>