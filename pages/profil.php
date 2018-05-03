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
          </div>

          <!-- Modifier profil -->
          <div class="col-sm-12">
            <button type="button" class="btn btn-primary parametres_profil" data-toggle="modal" data-target="#modal_modif">Modifier mon profil</button>

            <!-- Popup modifier profil -->
            <div class="modal fade" id="modal_modif" tabindex="-1" role="dialog" aria-labelledby="modal_modif" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modal_event">Modifier mon profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                      <button type="button" class="btn btn-primary parametres_profil" data-toggle="modal" data-target="#modal_fic">Modifier mes fichiers</button>
                      <button type="button" class="btn btn-primary parametres_profil" data-toggle="modal" data-target="#modal_inf">Modifier mes infos</button>
                  </div>

                  <!-- Boutons annuler et valider -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Popup modifier fichiers -->
            <div class="modal fade" id="modal_fic" tabindex="-1" role="dialog" aria-labelledby="modal_fic" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modal_fic">Modifier mes fichiers</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <button type="button" class="btn btn-primary parametres_profil" data-toggle="modal" data-target="#modal_fic_cv">Modifier mon CV</button>
                    <button type="button" class="btn btn-primary parametres_profil" data-toggle="modal" data-target="#modal_fic_couv">Modifier ma photo de couverture</button>
                    <button type="button" class="btn btn-primary parametres_profil" data-toggle="modal" data-target="#modal_fic_pp">Modifier ma photo de profil</button>
                  </div>


                  <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Retour</button>
                  </div>

                </div>

              </div>
            </div>

            <!-- Popup modifier cv -->
            <div class="modal fade" id="modal_fic_cv" tabindex="-1" role="dialog" aria-labelledby="modal_fic_cv" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modal_fic_cv">Modifier mon CV</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="../php/fichier.php" method="post" enctype="multipart/form-data">

                    <div class="modal-body">
                      <!-- CV -->
                      <div class="form-group">
                      <label for="cv">CV:</label>
                      <input type="file" name="cv" class="form-control">
                      </div>

                    </div>


                    <div class="modal-footer">
                      <button type="button" class="btn btn-info" data-dismiss="modal">Retour</button>
                      <input type="submit" value="Valider" class="btn btn-primary"></input>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <!-- Popup modifier couv -->
            <div class="modal fade" id="modal_fic_couv" tabindex="-1" role="dialog" aria-labelledby="modal_fic_couv" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modal_fic_couv">Modifier ma photo de couverture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="../php/fichier.php" method="post" enctype="multipart/form-data">

                    <div class="modal-body">
                      <!-- Couv -->
                      <div class="form-group">
                      <label for="couv">Couverture:</label>
                      <input type="file" name="couv" class="form-control">
                      </div>

                    </div>


                    <div class="modal-footer">
                      <button type="button" class="btn btn-info" data-dismiss="modal">Retour</button>
                      <input type="submit" value="Valider" class="btn btn-primary"></input>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            </div>

          </div>
        </div>

          <!-- Mes infos -->
          <div class="col-sm-4">
            <div class="col-sm-12 profil">Mes infos</div>
            <div class="col-sm-12">
              <?php $ag = $_SESSION['$age']; ?>
              <?php echo $ag; ?> ans
            </div>
            <div class="col-sm-12">
              <?php $ma = $_SESSION['$email']; ?>
              <?php echo $ma; ?>
            </div>
            <div class="col-sm-6">mon CV</div>
            <div class="col-sm-6">
              <form action="../php/fichier.php" method="post" enctype="multipart/form-data">
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
                    <label><input type="radio" name="optradio">Réseau</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="optradio">Amis</label>
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





<!-- PP -->
<div class="form-group">
<label for="pp">Profil:</label>
<input type="file" name="pp" class="form-control">
</div>
