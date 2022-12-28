<!DOCTYPE html>
<html>
    <head>
		<title>Produits & Recettes</title>
    </head>
    <body>
	<div class='Typo'>
		<?php 
			if (isset($_GET['search'])) 
			{
				echo "<h2>Résultats de recherche</h2><br>";
			}
		?>
		<?php
			$maxProduitsRow = 3;
			if (isset($_GET['search']) && !$produits)
			{
				echo "<h2>Produits</h2><br>";
				echo "0 produit trouvé <br><br>";
			}
			if ($produits)
			{
				echo "<h2>Produits</h2>";
				$count = 0;
				?>
				<?php
				foreach($produits as $key => $produit) {
					if ($produit['stock_dispo'] != 0) {
						$count += 1;
						if ($count > $maxProduitsRow) $count -= $maxProduitsRow;
						if ($count == 1)
						{
							echo "<div class=\"container1\">";
						}
				?>
				<div class="column"></br>
					<fieldset style="padding: 40px 20px 30px 20px; border: 2px groove; border-radius: 30px;" class="Typo" style="color:rgb(13, 46, 38);">
						<?php echo '<img src="../Recipe-Finder/Data/Img/' . $produit['photo'] . '" width="250vmin" height="200vmin" ></br>'; ?>
						<?php echo '<b>'.strtoupper($produit['description']."</b></br>") ?>
						<?php echo "Prix : ".$produit['prix']." €</br>" ?>
						<?php echo "Stock disponible : ".$produit['stock_dispo']." restants</br></br>" ?>
						<form action="../Recipe-Finder/index.php?action=addtocart" method="POST">
							<input type="hidden" name="idproduit" value="<?php echo $produit['idproduit'];?>">
							<select class="Typo" style="display: inline-flex; width: 3vw;" name="qte">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
							</select>	
							<!-- <input type="text" name="qte" style="display: inline-block; width: 3.5vw; height: 4vh; font-size: 1.6vmin;" value="1"> -->
							<button class="button" type="submit" style="width: 8vw; height: 4vh; font-size: 1.3vmin; text-align: center;">Ajouter au panier</button>
						</form>
					</fieldset>
				</div>
				
				<?php
						if ($count == $maxProduitsRow)
						{
							echo "</div>";
						}
					} else {
						continue;
					}
				}
				if ($count != $maxProduitsRow)
				{
					echo "</div>";
				}
			}
			
			if (isset($_GET['search']) && !$recettes)
			{
				echo "<h2>Recettes</h2><br>";
				echo "0 recette trouvée <br><br>";
			}
			if ($recettes)
			{
				echo "<h2>Recettes</h2>";
				$count = 0;
				?>
				<?php
				foreach($recettes as $key => $recette) {
					$like = $db->prepare('SELECT * FROM avis WHERE idrecette = ?');
					$like->execute(array($dtb['recette'][$key]['idrecette']));
					$check_like = $like->rowCount();
					$count += 1;
					if ($count > $maxProduitsRow) $count -= $maxProduitsRow;
					if ($count == 1)
					{
						echo "<div class=\"container1\">";
					}
				?>
				<div class="column">
					<fieldset style="padding: 40px 20px 30px 20px; border: 2px groove; border-radius: 30px;" class="Typo" style="color:rgb(13, 46, 38);">
						<?php echo "<embed src='data:".$recette['type'].";base64,".base64_encode($recette['photo'])."' width='250vmin' height='200vmin' /></br>"; ?>
						<?php echo '<b>'.strtoupper($recette['nom']."</b></br>") ?>
						<?php echo $recette['description']."</br>" ?>
						</br>
						<a href="index.php?action=like&id=<?=$recette['idrecette']?>"><button class="button" type="submit" style="width: 7vw; height: 3vh; font-size: 1.3vmin; text-align: center; background: #6483f3; color: white"><?php echo $check_like;?> J'aime</button></a>
						<a href="index.php?action=modifier_recette&id=<?=$recette['idrecette']?>">
							<?php
								if (isset($_SESSION['user_role']) && $_SESSION['user_role']=="Cuisinier") 
								{
									echo "<button class=\"button\" type=\"submit\" style=\"width: 7vw; height: 3vh; font-size: 1.3vmin; text-align: center\">Modifier</button></a>";
								}
							?>
						</a>
					</fieldset>
				</div>
				
			<?php
					if ($count == $maxProduitsRow)
					{
						echo "</div>";
					}
				}
				if ($count != $maxProduitsRow)
				{
					echo "</div>";
				}
			}
		?>
	</div>
    </body>
</html>



