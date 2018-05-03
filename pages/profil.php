<!DOCTYPE html>
<html lang="fr">

  <!-- Affichage du head -->
  <?php include ("head.php"); ?>

  <!-- Affichage du corps -->
  <body class="body_profil">

    <!-- Affichage de la nav -->
    <?php include ("nav.php"); ?>

    <!-- Affichage du reste du corps -->
    <div class="container-fluid">
      <div class="row">
        <!-- photo couv -->
        <?php
          $pc = $_SESSION['$couv_utilisateur'];
          if($pc != "public/images/couv_template.jpg") echo '<img src="../upload/couv/'.$pc.'" class="img-responsive img_couv" alt="img_couv">';
          else echo '<img src="../'.$pc.'" class="img-responsive img_couv" alt="img_couv">';
        ?>

        <!-- pp -->
        <div class="col-sm-12">
          <?php
            $pp = $_SESSION['$profil_utilisateur'];
            if($pp != "public/images/pp_template.jpg") echo '<img src="../upload/pp/'.$pp.'" class="img-responsive img-rounded img_pp" alt="img_pp">';
            else echo '<img src="../'.$pp.'" class="img-responsive img-rounded img_pp" alt="img_pp">';
          ?>

        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <!-- Nom + job -->
          <div class="col-sm-12 nom_job">
            <?php
              $pr = $_SESSION['$prenom'];
              $nm = $_SESSION['$nom'];
              $ps = $_SESSION['$poste'];
              echo ''.$pr.' '.$nm.'<br>'.$ps.'';
            ?>
            <!-- Harry Potter<br>
            Sorcier -->
          </div>

          <!-- Mes infos -->
          <div class="col-sm-4">
            <div class="col-sm-12 profil">Mes infos</div>
            <div class="col-sm-12">20 ans</div>
            <div class="col-sm-12">amandine.ducruetr@edu.ece.fr</div>
            <div class="col-sm-6">Mon CV</div>
            <div class="col-sm-6">
              <form action="fichier.php" method="post" enctype="multipart/form-data">
                <input type="file" name="cv" required>
                <input type="submit" value="Valider">
              </form>
            </div>
          </div>

          <!-- Mes publications -->
          <div class="col-sm-offset-4 col-sm-4">
            <div class="col-sm-12 profil">Mes publications</div>
            <div class="col-sm-8 ma_publication"></div>
            <div class="col-sm-4">
              <div class="row param_profil">
                <button type="button" class="btn btn-primary parametres_profil">Supprimer</button>
                <button type="button" class="btn btn-primary parametres_profil">Modifier</button>
                <form>
                  <div class="radio">
                    <label><input type="radio" name="optradio">Public</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio">Amis</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio">Réseau</label>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>

  <!-- Affichage du footer -->
  <?php include ("footer.php"); ?>

</html>
