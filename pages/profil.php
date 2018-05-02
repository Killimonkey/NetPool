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
        <img src="../upload/couv/couverture.jpg" class="img-responsive img_couv" alt="img_couv">

        <!-- pp -->
        <div class="col-sm-12">
          <img src="../public/images/pp_template.jpg" class="img-responsive img_pp" alt="img_pp">
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12 nom_job">
          Harry Potter<br>
          Sorcier
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <!-- Mes infos -->
          <div class="col-sm-4">
            <div class="col-sm-12 profil">Mes infos</div>
            <div class="col-sm-12">20 ans</div>
            <div class="col-sm-12">amandine.ducruetr@edu.ece.fr</div>
            <div class="col-sm-6">Mon CV</div>
            <div class="col-sm-6">
              <input type="file" name="cv" required>
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
