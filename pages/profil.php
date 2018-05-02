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
          echo '<img src="../upload/couv/'.$pc.'" class="img-responsive img_couv" alt="img_couv">';
        ?>

        <!-- pp -->
        <div class="col-sm-12">
          <?php
            $pp = $_SESSION['$profil_utilisateur'];
            echo '<img src="../upload/pp/'.$pp.'" class="img-responsive img_pp" alt="img_pp">';
          ?>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <div class="col-sm-12">Mes infos</div>
          <div class="col-sm-12">

          </div>
        </div>
      </div>
    </div>

  </body>

  <!-- Affichage du footer -->
  <?php include ("footer.php"); ?>

</html>
