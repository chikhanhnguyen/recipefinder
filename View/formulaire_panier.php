<!DOCTYPE html>
<html>
    <head>
		<title>Votre panier</title>
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
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 50px 20px 50px" rowspan="2"><b>Quantité</b></td>
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 50px 20px 50px" rowspan="2"><b>Photo</b></td>
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 50px 20px 50px" rowspan="2"><b>Description</b></td>
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 50px 20px 50px" colspan="2" align="center"><b>Prix</b></td>
				</tr>
				<tr>
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 50px 20px 50px"><b>Unité</b></td>
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 50px 20px 50px"><b>Total</b></td>
				</tr>
				<tr class="border_bottom">
					<td colspan="5"> </td>
				<tr>
			<?php
				foreach ($cart['lineitems'] as $key => $value) {
					$quantite = $value['quantite'];
					if ($quantite <= 0)
					{
						continue;
					}
					$description = $value['produit']['description'];
					$photo = $value['produit']['photo'];
					$prix = $value['produit']['prix'];
					$total = $quantite * $prix;
			?>
				<tr>
					<td class="Typo" style="color:rgb(13, 46, 38);" align='center'>
					<form action="../Recipe-Finder/index.php?action=update_panier" method="POST">
						<input type="hidden" name="idproduit" value="<?php echo $value['produit']['idproduit'];?>">
						<input type="text" name="qte" style="display: inline-block;width: 3.5vw; height: 3vh; font-size: 1.4vmin;" value="<?php if (isset($quantite)) {echo $quantite;}?>">
						<button class="button" type="submit" style="width: 6vw; height: 3vh; font-size: 1.2vmin; text-align: center; color: black; background: #fed812;" name="majQTE">Mettre à jour</button>
					</form>
					</td>
					<td class="Typo" style="color:rgb(13, 46, 38);" align='center'>
						<?php echo '<img src="../Recipe-Finder/Data/Img/' . $photo . '" width="60vmin" height="50vmin" ></br>'; ?>
					</td>
					<td class="Typo" style="color:rgb(13, 46, 38);" align='center'><?php print $description; ?></td>
					<td class="Typo" style="color:rgb(13, 46, 38);" align='center'><?php print $prix." €"; ?></td>
					<td class="Typo" style="color:rgb(13, 46, 38);" align='center'><?php print $total." €"; ?></td>
				</tr>
				<tr class="border_bottom">
					<td colspan="5"> </td>
				<tr>
			<?php
				}
			?>
				<tr>
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 50px 20px 50px" colspan="4" align='right'><b>Total à régler</b></td>
					<td class="Typo" style="color:rgb(13, 46, 38); padding: 20px 50px 20px 50px" align='center'><b><?php echo cartTotalPrice()." €"; ?></b></td>
				</tr>
			</table>
			</br>
			<a href="index.php?action=consulter_produit">
				<button class="button" type="submit" style="width: 9vw; height: 4vh; font-size: 1.3vmin; text-align: center">Continuer le shopping</button></br></br>
			</a>
			<a href="index.php?action=vider_panier">
				<button class="button" type="submit" style="width: 9vw; height: 4vh; font-size: 1.3vmin; text-align: center; background: #ce2151; color: white;">Vider le panier</button></br></br>
			</a>
			<a href="index.php?action=commander">
				<button class="button" type="submit" style="width: 9vw; height: 4vh; font-size: 1.3vmin; text-align: center; background: #6483f3; color: white">Commander</button></br></br>
			</a>
		</div>
    </body>
</html>



