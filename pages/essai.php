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
            <div class="col-sm-12"><strong>Date de naissance : </strong>
              <?php echo $naissance; ?>
            </div>
            <div class="col-sm-12"><strong>Adresse e-mail : </strong>
              <?php echo $email; ?>
            </div>
            <div class="col-sm-6">
              <?php
                if($cv != "")
                {
                  echo '<a href="../upload/cv/'.$cv.'"download="'.$cv.'">
                          <button type="button" class="btn btn-success bouton_cv" data-dismiss="modal">Son CV</button>
                        </a>';
                }
               ?>
            </div>
          </div>

          <!-- Mes publications -->
          <div class="col-sm-offset-1 col-sm-7">
            <div class="col-sm-12 profil">Ses publications</div>
              <ul class="list-unstyled">

                <?php

                  // Essayer de se connecter à la base de données
                  try
                  {
                    $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');

                    // Chercher si l'utilisateur existe déjà
                    $requete = $bdd->prepare('SELECT DISTINCT * FROM publication AS p
                                              WHERE p.id_publication IN (SELECT id_publication FROM publie WHERE id_utilisateur = ?)
                                              ORDER BY id_publication DESC');
                    $requete->execute(array($id));

                    while($resultat = $requete->fetch())
                    {
                      $id_publication = $resultat['id_publication'];
                      $description = $resultat['description'];
                      $date_heure = $resultat['date_heure'];
                      $activite = $resultat['activite'];
                      $humeur = $resultat['humeur'];
                      $visibilite = $resultat['visibilite'];
                      $check_suppression = $resultat['check_suppression'];
                      $type = $resultat['type'];

                      $requete_utilisateur = $bdd->prepare('SELECT * FROM utilisateur WHERE id_utilisateur IN (SELECT id_utilisateur FROM publie WHERE id_publication = ?)');
                      $requete_utilisateur->execute(array($id_publication));
                      $utilisateur = $requete_utilisateur->fetch();
                      $prenom_nom = strtolower($utilisateur['prenom'].' '.$utilisateur['nom']);
                      $profil = $utilisateur['nom_photo_profil'];

                      echo '
                      <!-- Une publication -->
                      <li class="media cadre_publication">
                      <div class="col-sm-12">
                        <!-- PP -->
                        <div class="media-left">
                          <img src="../upload/pp/'.$profil.'" class="media-object" style="width:45px">
                        </div>
                        <!-- Body -->
                        <div class="media-body">
                          <h4 class="media-heading">'.$prenom_nom.' <small><i>'.$date_heure.'</i></small></h4>
                          <p>'.$description.'</p>
                        </div>
                      </div>
                      </li>
                      ';

                    }
                    $bdd = null;
                  }
                  catch (Exception $e)
                  {
                    die('Erreur : ' . $e->getMessage());
                  }
                ?>
              </ul>

          </div>

        </div>
      </div>
    </div>

  </body>

  <!-- Affichage du footer -->
  <?php include ("footer.php"); ?>

</html>
