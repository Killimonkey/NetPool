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
                      <button type="button" class="btn btn-primary parametres_profil" data-toggle="modal" data-target="#modal_poste">Modifier mon poste</button>
                  </div>

                  <!-- Boutons annuler et valider -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Popup modifier poste -->
            <div class="modal fade" id="modal_poste" tabindex="-1" role="dialog" aria-labelledby="modal_poste" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modal_poste">Modifier mon poste</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="../php/poste.php" method="post">

                    <div class="modal-body">
                      <!-- Poste -->
                      <div class="form-group">
                      <label for="poste">Poste:</label>
                      <input type="text" name="poste" class="form-control" required>
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
                      <input type="file" name="cv" class="form-control" required>
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
                      <input type="file" name="couv" class="form-control" required>
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

            <!-- Popup modifier pp -->
            <div class="modal fade" id="modal_fic_pp" tabindex="-1" role="dialog" aria-labelledby="modal_fic_pp" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modal_fic_pp">Modifier ma photo de profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <form action="../php/fichier.php" method="post" enctype="multipart/form-data">

                    <div class="modal-body">
                      <!-- PP -->
                      <div class="form-group">
                      <label for="pp">Profil:</label>
                      <input type="file" name="pp" class="form-control" required>
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
            <div class="col-sm-12"><strong>Date de naissance : </strong>
              <?php $dn = $_SESSION['$naissance']; ?>
              <?php echo $dn; ?>
            </div>
            <div class="col-sm-12"><strong>Adresse e-mail : </strong>
              <?php $ma = $_SESSION['$email']; ?>
              <?php echo $ma; ?>
            </div>
            <div class="col-sm-6">

            <a href="../upload/cv/cv-cou-cou-04-05-2018-11-11-58.docx"download="cv-cou-cou-04-05-2018-11-11-58">
              <button type="button" class="btn btn-success bouton_cv" data-dismiss="modal">Mon CV</button>
            </a>

            </div>
          </div>

          <!-- Mes publications -->
          <div class="col-sm-offset-1 col-sm-7">
            <div class="col-sm-12 profil">Mes publications</div>
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
                    $requete->execute(array($_SESSION['$id_utilisateur']));

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
                      <div class="col-sm-8">
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
                      <div class="col-sm-4">
                        <div class="row param_profil">
                          <button type="button" class="btn btn-primary supprimer">Supprimer</button>
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
