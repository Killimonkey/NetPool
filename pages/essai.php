<?php

  $id = $_GET['data'];

  // Essayer de se connecter à la base de données
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');

    // Chercher si l'utilisateur existe déjà
    $requete = $bdd->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = ?');
    $requete->execute(array($id));

    // Récupérer ses données
    $donnees = $requete->fetch();
    $pseudo = $donnees['pseudo'];
    $email = $donnees['adresse_mail'];
    $prenom = $donnees['prenom'];
    $nom = $donnees['nom'];
    $poste = $donnees['poste'];
    $naissance = $donnees['date_de_naissance'];
    $profil = $donnees['nom_photo_profil'];
    $couv = $donnees['nom_photo_couv'];
    $cv = $donnees['nom_cv'];

    $bdd = null;
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }

?>

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
          if($couv != "") echo '<img src="../upload/couv/'.$couv.'" class="img-responsive img_couv" alt="img_couv">';
          else echo '<img src="../public/images/couv_template.jpg" class="img-responsive img_couv" alt="img_couv">';
        ?>

        <!-- pp -->
        <div class="col-sm-12">
          <?php
            if($profil != "") echo '<img src="../upload/pp/'.$profil.'" class="img-responsive img-rounded img_pp" alt="img_pp">';
            else echo '<img src="../public/images/pp_template.jpg" class="img-responsive img-rounded img_pp" alt="img_pp">';
          ?>

        </div>
      </div>

      <div class="row">
        <div class="col-sm-12">
          <!-- Nom + job -->
          <div class="col-sm-12 nom_job">
            <?php
              echo ''.$prenom.' '.$nom.'<br>'.$poste.'';
            ?>
          </div>

          <!-- Mes infos -->
          <div class="col-sm-4">
            <div class="col-sm-12 profil">Ses infos</div>
            <div class="col-sm-12">
              <?php echo $naissance; ?>
            </div>
            <div class="col-sm-12">
              <?php echo $email; ?>
            </div>
            <div class="col-sm-6">
              <button type="button" class="btn btn-success" data-dismiss="modal">Son CV</button>
            </div>
          </div>

          <!-- Ses publications -->
          <div class="col-sm-offset-4 col-sm-4">
            <div class="col-sm-12 profil">Ses publications</div>
            <div class="col-sm-8 ma_publication"></div>
            <div class="col-sm-4">
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>

  <!-- Affichage du footer -->
  <?php include ("footer.php"); ?>

</html>
