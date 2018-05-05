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
        <div class="col-sm-12 container">
          <?php
            $pp = $_SESSION['$profil_utilisateur'];
            if($pp != "public/images/pp_template.jpg") echo '<img src="../upload/pp/'.$pp.'" class="img-responsive img-rounded img_pp" alt="img_pp">';
            else echo '<img src="../'.$pp.'" class="img-responsive img-rounded img_pp" alt="img_pp">';
          ?>
          <div class="middle">
              <button type="button" class="btn btn-primary modif_pp parametres_profil" data-toggle="modal" data-target="#modal_fic_pp">Modifier</button>
          </div>
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
            <button type="button" class="btn btn-primary parametres_profil" data-toggle="modal" data-target="#modal_modif"><span class="glyphicon glyphicon-pencil"></span> Modifier mon profil</button>

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
              <?php
                $nom_cv = $_SESSION['$cv'];
                if($nom_cv != "")
                {
                  echo '<a href="../upload/cv/'.$nom_cv.'"download="'.$nom_cv.'">
                          <button type="button" class="btn btn-success bouton_cv" data-dismiss="modal"><span class="glyphicon glyphicon-cloud-download"></span> Mon CV</button>
                        </a>';
                }
               ?>


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
                      // Récupérer les infos de la publication
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

                      // Récupérer prenom nom et photo de l'utilisateur
                      $prenom_nom = strtolower($_SESSION['$prenom'].' '.$_SESSION['$nom']);
                      $profil = $_SESSION['$profil_utilisateur'];

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
                      <div class="col-sm-8">
                        <!-- PP -->
                        <div class="media-left">';
                        if($profil != "public/images/pp_template.jpg") echo '<img src="../upload/pp/'.$profil.'" class="media-object" style="width:45px">';
                        else echo '<img src="../'.$profil.'" class="media-object" style="width:45px">';
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
                      </div>
                      <div class="col-sm-4">
                        <div class="row param_profil">
                          <a href="supp_pub.php?data='.$id_publication.'"> <button type="button" class="btn btn-primary supprimer"><span class="glyphicon glyphicon-trash"></span> Supprimer</button>';
                          if($visibilite=="PUBLIC")
                          {
                            echo ' <form action="../php/radio.php" method="post">
                                <div class="radio">
                                  <label><input type="radio" name="optradio" value="public" checked="">Public</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="optradio" value="reseau">Réseau</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="optradio" value="amis">Amis</label>
                                </div>
                                <input type="hidden" name="id_publi" value="'.$id_publication.'" >
                                <input class="bouton_cv" type="submit" value="Ok">
                              </form>';
                          }
                          if($visibilite=="RESEAU")
                          {
                            echo ' <form action="../php/radio.php" method="post">
                                <div class="radio">
                                  <label><input type="radio" name="optradio" value="public">Public</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="optradio" checked="" value="reseau">Réseau</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="optradio" value="amis">Amis</label>
                                </div>
                                <input type="hidden" name="id_publi" value="'.$id_publication.'" >
                                <input class="bouton_cv" type="submit" value="Ok">
                              </form>';
                          }
                          if($visibilite=="AMIS")
                          {
                            echo ' <form action="../php/radio.php" method="post">
                                <div class="radio">
                                  <label><input type="radio" name="optradio" value="public">Public</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="optradio" value="reseau">Réseau</label>
                                </div>
                                <div class="radio">
                                  <label><input type="radio" name="optradio" value="amis" checked="">Amis</label>
                                </div>
                                <input type="hidden" name="id_publi" value="'.$id_publication.'" >
                                <input class="bouton_cv" type="submit" value="Ok">
                              </form>';
                          }


                      if($aime == FALSE) echo '<a href="aime_moi.php?data='.$id_publication.'"><button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-heart-empty coeur_acceuil"></span></button></a>';
                      else echo '<a href="aime_plus_moi.php?data='.$id_publication.'"><button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-heart coeur_acceuil"></span></button></a>';
                      echo '
                      <button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-edit"></span></button>
                      <button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-share"></span></button>
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
