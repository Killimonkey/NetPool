<!DOCTYPE html>
<html lang="fr">

  <!-- Affichage du head -->
  <?php include ("head.php"); ?>

  <!-- Affichage du corps -->
  <body class="body">

    <!-- Affichage de la nav -->
    <?php include ("nav.php"); ?>

    <!-- Affichage du reste du corps -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 publier">Commenter</div>

        <?php
          // On recupere les valeurs
          $id_publication = $_GET['data'];


          echo '<!-- Corps -->
          <div class="col-sm-12">
            <form action="../php/commenter.php" method="post">

              <!-- Commenter -->
              <div class="form-group">
                <label for="commentaire">Commentaire :</label>
                <input type="hidden" name="id_publication" value="'. $id_publication .'" >
                <input type="text" name="commentaire" class="form-control" required>
              </div>

              <!-- Bouton Envoyer -->
              <input type="submit" value="Commenter" class="btn btn-primary"></input>
            </form>
          </div>';
          ?>
      </div>
    </div>

  </body>

  <!-- Affichage du footer -->
  <?php include ("footer.php"); ?>

</html>
