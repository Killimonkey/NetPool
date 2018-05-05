<!DOCTYPE html>
<html lang="fr">

  <!-- Affichage du head -->
  <?php include ("head.php"); ?>

  <!-- Affichage du corps -->
  <body class="body">

    <!-- Affichage de la nav -->
    <?php include ("nav.php"); ?>

    <!-- Affichage du reste du corps -->
    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-12">
          <!-- publier -->
          <div class="col-sm-12 publier">Publier</div>

          <!--options -->
          <button type="button" class="btn btn-primary option_publier col-sm-4" data-toggle="modal" data-target="#modal_event">Evénement</button>
          <button type="button" class="btn btn-primary option_publier col-sm-4" data-toggle="modal" data-target="#modal_photo"><span class="glyphicon glyphicon-picture"></span></button>
          <button type="button" class="btn btn-primary option_publier col-sm-4" data-toggle="modal" data-target="#modal_emploi">Emploi</button>
        </div>

        <!-- Popup -->
        <!-- Event -->
        <div class="modal fade" id="modal_event" tabindex="-1" role="dialog" aria-labelledby="modal_event" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal_event">Publier un événement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="../php/publication_event.php" method="post">

                <div class="modal-body">
                  <!-- Commentaire -->
                  <div class="form-group">
                  <label for="comment_event">Description :</label>
                  <input type="text" name="comment_event" class="form-control" required>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <input type="submit" value="Publier" class="btn btn-primary"></input>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Emplois -->
        <div class="modal fade" id="modal_emploi" tabindex="-1" role="dialog" aria-labelledby="modal_emploi" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal_emploi">Publier une offre d'emploi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="../php/publication_emploi.php" method="post">

                <div class="modal-body">


                  <!-- Description -->
                  <div class="form-group">
                  <label for="comment_emploi">Detail de l'offre d'emploi :</label>
                  <input type="text" name="comment_emploi" class="form-control" required>
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                  <input type="submit" value="Publier" class="btn btn-primary"></input>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Popup publier photo -->
        <div class="modal fade" id="modal_photo" tabindex="-1" role="dialog" aria-labelledby="modal_photo" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal_photo">Publier une photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <form action="../php/publication_photo.php" method="post" enctype="multipart/form-data">

                <div class="modal-body">
                  <!-- Commentaire -->
                  <div class="form-group">
                  <label for="comment_photo">Description :</label>
                  <input type="text" name="comment_photo" class="form-control" required>
                  </div>

                  <!-- photo_publi -->
                  <div class="form-group">
                  <label for="photo_publi">Photo :</label>
                  <input type="file" name="photo_publi" class="form-control" required>
                  </div>

                  <!-- Lieu -->
                  <div class="form-group">
                  <label for="lieu_publication">Je suis...(lieu)</label>
                  <input type="text" name="lieu_publication" class="form-control" required>
                  </div>

                  <!-- Ressenti -->
                  <div class="form-group">
                    <label for="ressenti_publication">Je suis...(ressenti)</label>
                    <select class="form-control form-add" name="ressenti_publication" required>
                        <option></option>
                        <option>Heureux(se)</option>
                        <option>Triste</option>
                        <option>En forme</option>
                        <option>Fatigué(e)</option>
                        <option>En colère</option>
                        <option>Blasé(e)</option>
                        <option>En train de me noyer</option>
                      </select>
                  </div>

                  <!-- Activite -->
                  <div class="form-group">
                  <label for="activite_publication">Je suis en train de :</label>
                  <input type="text" name="activite_publication" class="form-control" required>
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

      <div class="row">

        <div class="col-sm-12 publications">
          <?php $date = date("d/m/Y");
          $heure = date("H:i");?>

          <!-- Publications -->
          <div class="col-sm-12 publier">Actualités</div>

          <ul class="list-unstyled">


                <?php

                // Essayer de se connecter à la base de données
                try
                {
                  $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');

                  // Chercher si l'utilisateur existe déjà
                  $requete = $bdd->prepare('SELECT DISTINCT * FROM publication AS p WHERE ( (p.id_publication IN (SELECT id_publication FROM publie WHERE id_utilisateur = ?)
                                                                                            OR p.visibilite = "PUBLIC"
                                                                                            OR (
                                                                                                  p.visibilite = "RESEAU"
                                                                                                  AND (

                                                                                                      (SELECT id_utilisateur FROM publie WHERE id_publication = p.id_publication) IN (SELECT utilisateur_1 FROM reseau WHERE utilisateur_2 = ?)

                                                                                                    OR
                                                                                                      (SELECT id_utilisateur FROM publie WHERE id_publication = p.id_publication) IN (SELECT utilisateur_2 FROM reseau WHERE utilisateur_1 = ?)

                                                                                                  )
                                                                                                )
                                                                                            OR (
                                                                                                  p.visibilite = "AMIS"
                                                                                                  AND (

                                                                                                      (SELECT id_utilisateur FROM publie WHERE id_publication = p.id_publication) IN (SELECT utilisateur_1 FROM reseau WHERE utilisateur_2 = ? AND check_ami="TRUE")

                                                                                                    OR
                                                                                                      (SELECT id_utilisateur FROM publie WHERE id_publication = p.id_publication) IN (SELECT utilisateur_2 FROM reseau WHERE utilisateur_1 = ? AND check_ami="TRUE")

                                                                                                  )
                                                                                                ))
                                                                                            AND p.type != "EMPLOI") ORDER BY id_publication DESC');
                  $requete->execute(array($_SESSION['$id_utilisateur'],$_SESSION['$id_utilisateur'],$_SESSION['$id_utilisateur'],$_SESSION['$id_utilisateur'],$_SESSION['$id_utilisateur']));


                  while($resultat = $requete->fetch())
                  {
                    // Récupérer infos publication dans bdd
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
                    else if($humeur == "JOYEUX") $humeur = "heureux(se)";
                    else if($humeur == "TRISTE") $humeur = "triste";
                    else if($humeur == "FORME") $humeur = "en forme";
                    else if($humeur == "FATIGUE") $humeur = "fatigué(e)";
                    else if($humeur == "COLERE") $humeur = "en colère";
                    else if($humeur == "BLASE") $humeur = "blasé(e)";
                    else if($humeur == "NOYE") $humeur = "noyé(e)";

                    // Récupérer l'utilisateur associé
                    $requete_utilisateur = $bdd->prepare('SELECT * FROM utilisateur WHERE id_utilisateur IN (SELECT id_utilisateur FROM publie WHERE id_publication = ?)');
                    $requete_utilisateur->execute(array($id_publication));
                    $utilisateur = $requete_utilisateur->fetch();
                    // Récupérer nom prénom et photo de profil
                    $prenom_nom = strtolower($utilisateur['prenom'].' '.$utilisateur['nom']);
                    $profil = $utilisateur['nom_photo_profil'];

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

                    // Si c'est un partage
                    if($type == "PARTA")
                    {
                      // Récupérer les infos de la publication ( du partage )
                      $requete_partage = $bdd->prepare('SELECT * FROM partage WHERE id_publication = ?');
                      $requete_partage->execute(array($id_publication));
                      $partage = $requete_partage->fetch();
                      $id_mec = $partage['id_mec'];
                      $id_mec_pub = $partage['id_mec_pub'];

                      // Récupérer l'utilisateur associé à la pulication partagée
                      $requete_mec = $bdd->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = ?');
                      $requete_mec->execute(array($id_mec));
                      $mec = $requete_mec->fetch();
                      // Récupérer nom prénom et photo de profil
                      $prenom_nom_mec = strtolower($mec['prenom'].' '.$mec['nom']);
                      $profil_mec = $mec['nom_photo_profil'];

                      // Récupérer la pulication partagée
                      $requete_mec_pub = $bdd->prepare('SELECT * FROM publication WHERE id_publication = ?');
                      $requete_mec_pub->execute(array($id_mec_pub));
                      $mec_pub = $requete_mec_pub->fetch();
                      $humeur_mec_pub = $mec_pub['humeur'];
                      $activite_mec_pub = $mec_pub['activite'];
                      $lieu_mec_pub = $mec_pub['lieu'];
                      $date_heure_mec_pub = $mec_pub['date_heure'];
                      $type_mec_pub = $mec_pub['type'];
                      $description_mec_pub = $mec_pub['description'];
                      // Récupérer nombre de mentions aime
                      $requete_nb_aime_mec = $bdd->prepare('SELECT * FROM aime WHERE id_publication = ?');
                      $requete_nb_aime_mec->execute(array($id_mec_pub));
                      $nb_aime_mec_pub = 0;
                      while($requete_nb_aime_mec->fetch())
                      {
                        $nb_aime_mec_pub = $nb_aime_mec_pub + 1;
                      }
                      // Récupérer la photo si besoin
                      if($type_mec_pub == "PUBLI")
                      {
                        $requete_photo = $bdd->prepare('SELECT nom_photo_video FROM contient WHERE id_publication = ?');
                        $requete_photo->execute(array($id_mec_pub));
                        $photo_mec_pub = $requete_photo->fetch();
                      }

                      echo '
                      <!-- Un partage -->
                      <li class="media cadre_publication">
                      <!-- PP -->
                      <div class="media-left">';

                      if($profil != "") echo '<img src="../upload/pp/'.$profil.'" class="media-object" style="width:45px">';
                      else echo '<img src="../public/images/pp_template.jpg" class="media-object" style="width:45px">';

                      echo '
                      </div>
                      <!-- Body -->
                      <div class="media-body">
                        <h4 class="media-heading">'.$prenom_nom.'
                          <small>
                            a partagé une publication de '.$prenom_nom_mec.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; le '.$date_heure.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-heart coeur_accueil"></span>'.$nb_aime.'<br>';
                            if($humeur_mec_pub !="") echo '&nbsp;&nbsp;&nbsp;est <strong>'.$humeur_mec_pub.'</strong>';
                            if($activite_mec_pub !="") echo '&nbsp;&nbsp;&nbsp;en train de <strong>'.$activite_mec_pub.'</strong>';
                            echo '&nbsp;<strong>'.$lieu_mec_pub.'</strong>
                            &nbsp;&nbsp;&nbsp;<i> le '.$date_heure_mec_pub.'</i>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-heart coeur_accueil"></span>'.$nb_aime_mec_pub.'
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;description : "'.$description_mec_pub.'"
                      ';
                      if($type_mec_pub == "PUBLI")
                      {
                        echo '
                          <div class="col-sm-12">
                            <img src="../upload/publication/'.$photo_mec_pub[0].'" class="taille_image"/>
                          </div>
                        ';
                      }
                      echo '</small>
                    </h4>';

                      echo '
                      </div>';
                      if($aime == FALSE) echo '<a href="aime.php?data='.$id_publication.'"><button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-heart-empty coeur_acceuil"></span></button></a>';
                      else echo '<a href="aime_plus.php?data='.$id_publication.'"><button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-heart coeur_acceuil"></span></button></a>';
                      echo '
                      </li>';
                    }
                    else {
                      echo '
                      <!-- Une publication -->
                      <li class="media cadre_publication">
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
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-heart coeur_accueil"></span>'.$nb_aime.'

                          </small>
                        </h4>
                        <p>'.$description.'</p>
                      ';

                      if($type == "PUBLI")
                      {
                        echo '
                          <div class="col-sm-12">
                            <img src="../upload/publication/'.$photo[0].'" class="taille_image"/>
                          </div>
                        ';
                      }

                      echo '
                      </div>';
                      if($aime == FALSE) echo '<a href="aime.php?data='.$id_publication.'"><button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-heart-empty coeur_acceuil"></span></button></a>';
                      else echo '<a href="aime_plus.php?data='.$id_publication.'"><button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-heart coeur_acceuil"></span></button></a>';
                      echo '
                      <a  href="commentaire_ecriture.php?data='.$id_publication.'"><button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-edit"></span></button><a>
                      <a href="../php/partager.php?data='.$id_publication.'&amp;mec='.$utilisateur['id_utilisateur'].'"><button type="button" class="btn btn-primary option_publier col-sm-4" ><span class="glyphicon glyphicon-share"></span></button></a>';

                      // Récupérer les commentaires de la publication
                      $requete_commentaires = $bdd->prepare('SELECT * FROM commentaire WHERE id_commentaire IN (SELECT id_commentaire FROM est_ecrit_dans WHERE id_publication = ?)');
                      $requete_commentaires->execute(array($id_publication));

                      echo '<br><br><div class="div_commentaire"> <strong>Commentaires :</strong>';

                      while($commentaire = $requete_commentaires->fetch())
                      {
                        // Récupérer l'utilisateur auteur
                        $requete_auteur = $bdd->prepare('SELECT id_utilisateur FROM ecrit WHERE id_commentaire = ?');
                        $requete_auteur->execute(array($commentaire['id_commentaire']));
                        $auteur = $requete_auteur->fetch();
                        $requete_auteur = $bdd->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = ?');
                        $requete_auteur->execute(array($auteur[0]));
                        $auteur = $requete_auteur->fetch();
                        $prenom_nom_auteur = strtolower($auteur['prenom'].' '.$auteur['nom']);
                        $description_commentaire = $commentaire['description'];
                        $date_heure_commentaire = $commentaire['date_heure'];

                        echo '
                          <div class="div_commentaires">
                            <p>par <strong>'.$prenom_nom_auteur.'</strong> le '.$date_heure_commentaire.' : "'.$description_commentaire.'"</p>
                          </div>
                        ';
                      }

                      echo '</div></li>';
                    }

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

  </body>

  <!-- Affichage du footer -->
  <?php include ("footer.php"); ?>
<!-- https://developer.mozilla.org/fr/docs/Web/Guide/HTML/Formulaires/Validation_donnees_formulaire -->
</html>
