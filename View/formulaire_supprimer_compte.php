<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Supprimer Compte</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
    <div class="center">
      <form action="../Recipe-Finder/index.php?action=supprimer_compte" method="POST">
        
          <br><br><br><br>
          <?php if (isset($message)) echo $message; ?>
          <br><br><br>
          <label class="Typo" style="font-size: 20px; color: rgb(13, 46, 38);">Entrez votre mot de passe :</label>
          <input type="password" class="center"style="width: 14vw; height: 5vh; font-size: 2vmin; text-align: center"  name="mdp" value="" required> <br><br><br><br>
          
          <!-- Trigger the modal with a button -->
          <button type="button" class="button" style="width: 14vw; height: 5vh; font-size: 2vmin; text-align: center; color: white; background: #ce2151" data-toggle="modal" data-target="#myModal">Supprimer Compte</button>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Voulez-vous supprimez votre compte ?</h4>
              </div>
              <div class="modal-body">
                <p>Si vous supprimez votre compte, votre profil sera supprimé de Recipe Finder</p>
              </div>
              <div class="modal-footer" style="display: flex;justify-content: space-around;">
                <button style="width: 14vw; height: 5vh; font-size: 2vmin; text-align: center" type="submit" name="Valider" class="button" value="confirmer_supprimer_compte">Confirmer</button>
                <button style="width: 14vw; height: 5vh; font-size: 2vmin; text-align: center" type="button" class="button" data-dismiss="modal"><b>Annuler</b></button>
              </div>
            </div>
          </div>
        
      </form>
      </div>
  </body>
</html>
