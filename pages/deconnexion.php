<!DOCTYPE html>
<html lang="fr">

<!-- Affichage du head -->
<?php include ("head.php"); ?>

  <!-- Affichage du corps -->
  <body>
    <div class="container-fluid">
      <div class="row">

        <!-- Bandeau bleu -->
        <div class="col-sm-12 bandeau_bleu">

          <!-- Texte gauche -->
          <div class="col-sm-6 texte_bienvenue">

          </div>

        </div>

        <!-- Image logo -->
        <div class="col-sm-12">
          <img class="img-responsive img_logo_netpool" src="../public/images/logo_texte.png" alt="img logo_netpool" width="120">
        </div>

      </div>


      <div class="row">
        <!-- Texte gauche bas -->
        <div class="col-sm-12">
          <?php
          // Bienvenue
          echo("Au revoir et à bientôt !");

          // Bouton pour recommencer
          echo '<div>
            <form action="../index.php">
              <input type="submit" class="parametres_profil" value="Page de connexion" />
            </form>
          </div>';
          ?>

        </div>
      </div>
    </div>
  </body>

</html>
