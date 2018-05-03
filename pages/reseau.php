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
