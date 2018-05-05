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
                          <button type="button" class="btn btn-success bouton_cv" data-dismiss="modal"><span class="glyphicon glyphicon-cloud-download"></span> Son CV</button>
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
                      // Récupérer dans la base de données les infos de la publication
                      $id_publication = $resultat['id_publication'];
                      $description = $resultat['description'];
                      $date_heure = $resultat['date_heure'];
                      $activite = $resultat['activite'];
                      $humeur = $resultat['humeur'];
                      $lieu = $resultat['lieu'];
                      $visibilite = $resultat['visibilite'];
                      $check_suppression = $resultat['check_suppression'];
                      $type = $resultat['type'];

                      // Traduire de bdd à affichage
                      if($humeur == "") $humeur = "";
                      else if($humeur == "HEUREUX") $humeur = "heureux(se)";
                      else if($humeur == "TRISTE") $humeur = "triste";
                      else if($humeur == "FORME") $humeur = "en forme";
                      else if($humeur == "FATIGUE") $humeur = "fatigué(e)";
                      else if($humeur == "COLERE") $humeur = "en colère";
                      else if($humeur == "BLASE") $humeur = "blasé(e)";
                      else if($humeur == "NOYE") $humeur = "noyé(e)";

                      // Concaténer prénom et nom
                      $prenom_nom = strtolower($prenom.' '.$nom);

                      // Récupérer mention aime
                      $requete_aime = $bdd->prepare('SELECT * FROM aime WHERE id_utilisateur = ? AND id_publication = ?');
                      $requete_aime->execute(array($_SESSION['$id_utilisateur'],$id_publication));
                      $aime = $requete_aime->fetch();

                      // Récupérer nombre de mentions aime
                      $requete_nb_aime = $bdd->prepare('SELECT * FROM aime WHERE id_publication = ?');
                      $requete_nb_aime->execute(array($id_publication));
                      $nb_aime = 0;
                      while($requete_nb_aime->fetch())
                      {
                        $nb_aime = $nb_aime + 1;
                      }

                      if($type == "PUBLI")
                      {
                        $requete_photo = $bdd->prepare('SELECT nom_photo_video FROM contient WHERE id_publication = ?');
                        $requete_photo->execute(array($id_publication));
                        $photo = $requete_photo->fetch();
                      }

                      echo '
                      <!-- Une publication -->
                      <li class="media cadre_publication">
                      <div class="col-sm-12">
                        <!-- PP -->
                        <div class="media-left">';
                        if($profil != "") echo '<img src="../upload/pp/'.$profil.'" class="media-object" style="width:45px">';
                        else echo '<img src="../public/images/pp_template.jpg" class="media-object" style="width:45px">';
                        echo '
                        </div>
                        <!-- Body -->
                        <div class="media-body">
                          <h4 class="media-heading">'.$prenom_nom.'
                            <small>';
                              if($humeur !="") echo '&nbsp;&nbsp;&nbsp;est <strong>'.$humeur.'</strong>';
                              if($activite !="") echo '&nbsp;&nbsp;&nbsp;en train de <strong>'.$activite.'</strong>';
                              echo '&nbsp;<strong>'.$lieu.'</strong>
                              &nbsp;&nbsp;&nbsp;<i> le '.$date_heure.'</i>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-heart coeur_accueil"></span>'.$nb_aime;
                              if($type == "EMPLOI") echo '<br><strong>! OFFRE EMPLOI !</strong>';
                            echo '</small>
                          </h4>
                          <p>'.$description.'</p>';
                          if($type == "PUBLI")
                          {
                            echo '
                              <div class="col-sm-12">
                                <img src="../upload/publication/'.$photo[0].'" class="taille_image"/>
                              </div>
                            ';
                          }
                          echo '
                        </div>
                      </div>';
                      if($aime == FALSE) echo '<a href="aime_toi.php?data='.$id_publication.'&amp;mec='.$id.'"><button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-heart-empty coeur_acceuil"></span></button></a>';
                      else echo '<a href="aime_plus_toi.php?data='.$id_publication.'&amp;mec='.$id.'"><button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-heart coeur_acceuil"></span></button></a>';
                      echo '
                      <button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-edit"></span></button>
                      <button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-share"></span></button>
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
