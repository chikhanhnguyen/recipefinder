<!DOCTYPE html>
<html>
	<head>
		<title>Votre commande</title>
		<style>
			tr.border_bottom td {
				border-bottom: 1px solid #e6e6e6;
			}
		</style>
    </head>
    <body>
		<br><br>
		<div class="center">
			<table class="center" cellpadding="5" style="border: 2px inset #000000; border-radius: 30px;">
				<tr>
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 30px 20px 30px"><b>Photo</b></td>
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 30px 20px 30px"><b>Description</b></td>
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 30px 20px 30px"><b>Prix unité</b></td>
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 30px 20px 30px"><b>Quantité</b></td>
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 30px 20px 30px"><b>Total</b></td>
				</tr>
				<tr class="border_bottom">
					<td colspan="5"> </td>
				<tr>
			<?php
				$somme = 0;
				foreach ($lignes_commande as $key => $value) {
					$quantite = $value['quantite'];
					if ($quantite <= 0)
					{
						continue;
					}
					$description = $value['description'];
					$prix = $value['prix'];
					$photo = $value['photo'];
					$total = $value['total_prix'];
					$somme += $total;
			?>
				<tr>
					<td class="Typo" style="color:rgb(13, 46, 38);" align='center'>
						<?php echo '<img src="../Recipe-Finder/Data/Img/' . $photo . '" width="60vmin" height="50vmin" ></br>'; ?>
					</td>
					<td class="Typo" style="color:rgb(13, 46, 38);" align='center'><?php print $description; ?></td>
					<td class="Typo" style="color:rgb(13, 46, 38);" align='center'><?php print $prix." €"; ?></td>
					<td class="Typo" style="color:rgb(13, 46, 38);" align='center'><?php print $quantite; ?></td>
					<td class="Typo" style="color:rgb(13, 46, 38);" align='center'><?php print $total." €"; ?></td>
				</tr>
				<tr class="border_bottom">
					<td colspan="5"> </td>
				<tr>
			<?php
				}
			?>
				<tr>
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 30px 20px 30px" colspan="4" align='right'><b>Total à régler</b></td>
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 30px 20px 30px" align='center'><b><?php echo $somme." €"; ?></b></td>
				</tr>
			</table>
			</br>
			<form action ="index.php?action=consulter_cmd" method="POST">
				<button class="button" type="submit" style="width: 10vw; height: 5vh; font-size: 1.5vmin; text-align: center">Retour aux commandes</button>
			</form>
		</div>
    </body>
</html>



