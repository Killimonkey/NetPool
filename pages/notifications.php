<!DOCTYPE html>
<html lang="fr">

  <!-- Affichage du head -->
  <?php include ("head.php"); ?>

  <!-- Affichage du corps -->
  <body class="body">

    <!-- Affichage de la nav -->
    <?php include ("nav.php"); ?>
    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-12">
          <!-- notifications-->
          <div class="panel panel-primary">

          <div class="panel-body">
            <div class="col-sm-2">
            <?php
              $pp = $_SESSION['$profil_utilisateur'];
              if($pp != "public/images/pp_template.jpg") echo '<img src="../upload/pp/'.$pp.'" class="img-responsive img-circle img_ppnotif" alt="img_ppnotif">';
              else echo '<img src="../'.$pp.'" class="img-responsive img-circle img_ppnotif" alt="img_ppnotif">';
            ?>
            </div>
            <div class="col-sm-7">
              <?php
                $pr = $_SESSION['$prenom'];
                $nm = $_SESSION['$nom'];
                echo '<h3>'.$pr.' '.$nm.'</h3>';
              ?>
            </div>
            <div class="col-sm-3">
              <button type="button" class="btn btn-primary bouton">Voir le Profil</button>

            </div>


          </div>
        </div>
        <div class="panel panel-primary">

          <div class="panel-body">Contenu</div>
        </div>
        <div class="panel panel-primary">

          <div class="panel-body">Contenu</div>
        </div>
        <div class="panel panel-primary">

          <div class="panel-body">Contenu</div>
        </div>
        <div class="panel panel-primary">

          <div class="panel-body">Contenu</div>
        </div>



          </div>

        </div>
      </div>
    </div>
  <!-- Affichage du footer -->
  <?php include ("footer.php"); ?>

  <!-- https://developer.mozilla.org/fr/docs/Web/Guide/HTML/Formulaires/Validation_donnees_formulaire -->
</html>
