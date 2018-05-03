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
          <!-- titre-->
          <div class="col-sm-4 titre">Mes Amis</div>
          <div class="col-sm-4 titre">Mon réseau Professionnel</div>
          <div class="col-sm-4 titre">Se Connecter</div>

          <!-- corps -->
          <div class="col-sm-4 corps">
            <div class="col-sm-6">
                  <?php
                    $pp = $_SESSION['$profil_utilisateur'];
                    if($pp != "public/images/pp_template.jpg") echo '<img src="../upload/pp/'.$pp.'" class="img-responsive img-circle img_ppreseau" alt="img_ppreseau">';
                    else echo '<img src="../'.$pp.'" class="img-responsive img-circle img_pp" alt="img_ppreseau">';
                  ?>
            </div>
            <div class="col-sm-6">
                  <?php
                    $pr = $_SESSION['$prenom'];
                    $nm = $_SESSION['$nom'];
                    $ps = $_SESSION['$poste'];
                    echo '<br>'.$pr.' '.$nm.'<br>'.$ps.'';
                  ?>
            </div>
            <div class="col-sm-12 ">
              <button type="button" class="btn btn-primary bouton" data-toggle="modal" data-target="#modal_profil">Voir le profil</button>
              <button type="button" class="btn btn-primary bouton">Supprimer</button>
            </div>
          </div>

          <!-- profil -->
          <div class="modal fade" id="modal_profil" tabindex="-1" role="dialog" aria-labelledby="modal_profil" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modal_profil">Voir le profil</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">




                  <div class="col-sm-12">
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
                        </div>
                      </div>

                        <!-- Mes infos -->
                        <div class="col-sm-4">
                          <div class="col-sm-12 profil">Ses infos</div>
                          <div class="col-sm-12">
                            <?php $dn = $_SESSION['$naissance']; ?>
                            <?php echo $dn; ?>
                          </div>
                          <div class="col-sm-12">
                            <?php $ma = $_SESSION['$email']; ?>
                            <?php echo $ma; ?>
                          </div>
                          <div class="col-sm-6">
                            <button type="button" class="btn btn-success" data-dismiss="modal">Son CV</button>
                          </div>
                        </div>

                        <!-- Mes publications -->
                        <div class="col-sm-offset-4 col-sm-4">
                          <div class="col-sm-12 profil">Ses publications</div>
                          <div class="col-sm-12 ma_publication"></div>
                        </div>
                      </div>






                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-4 corps">
            <div class="col-sm-6">
                  <?php
                    $pp = $_SESSION['$profil_utilisateur'];
                    if($pp != "public/images/pp_template.jpg") echo '<img src="../upload/pp/'.$pp.'" class="img-responsive img-circle img_ppreseau" alt="img_ppreseau">';
                    else echo '<img src="../'.$pp.'" class="img-responsive img-circle img_pp" alt="img_ppreseau">';
                  ?>

            </div>
            <div class="col-sm-6">
                  <?php
                    $pr = $_SESSION['$prenom'];
                    $nm = $_SESSION['$nom'];
                    $ps = $_SESSION['$poste'];
                    echo '<br>'.$pr.' '.$nm.'<br>'.$ps.'';
                  ?>
            </div>
            <div class="col-sm-12 ">
                  <button type="button" class="btn btn-primary bouton">Voir le Profil</button>
                  <button type="button" class="btn btn-primary bouton">Supprimer</button>
            </div>
          </div>
          <div class="col-sm-4 corps">
            <div class="col-sm-6">
                  <?php
                    $pp = $_SESSION['$profil_utilisateur'];
                    if($pp != "public/images/pp_template.jpg") echo '<img src="../upload/pp/'.$pp.'" class="img-responsive img-circle img_ppreseau" alt="img_ppreseau">';
                    else echo '<img src="../'.$pp.'" class="img-responsive img-circle img_pp" alt="img_ppreseau">';
                  ?>
            </div>
            <div class="col-sm-6">
                  <?php
                    $pr = $_SESSION['$prenom'];
                    $nm = $_SESSION['$nom'];
                    $ps = $_SESSION['$poste'];
                    echo '<br>'.$pr.' '.$nm.'<br>'.$ps.'';
                  ?>
            </div>
            <div class="col-sm-12 ">
                  <button type="button" class="btn btn-primary bouton">Voir le Profil</button>
                  <button type="button" class="btn btn-primary bouton">Ajouter</button>
            </div>
          </div>




          </div>

        </div>
      </div>
    </div>
  <!-- Affichage du footer -->
  <?php include ("footer.php"); ?>

  <!-- https://developer.mozilla.org/fr/docs/Web/Guide/HTML/Formulaires/Validation_donnees_formulaire -->
</html>
