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
          <button type="button" class="btn btn-primary option_publier col-sm-4" data-toggle="modal" data-target="#modal_photo">Photo</button>
          <button type="button" class="btn btn-primary option_publier col-sm-4" data-toggle="modal" data-target="#modal_emploi">Emploi</button>
        </div>

        <!-- Popup -->
        <!-- Event -->
        <div class="modal fade" id="modal_event" tabindex="-1" role="dialog" aria-labelledby="modal_event" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal_event">Evénement</h5>
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

        <!-- Photo -->
        <div class="modal fade" id="modal_photo" tabindex="-1" role="dialog" aria-labelledby="modal_photo" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal_photo">Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="../php/publication_photo.php" method="post">

                <div class="modal-body">

                  <!-- Commentaire -->
                  <div class="form-group">
                  <label for="comment_photo">Description :</label>
                  <input type="text" name="comment_photo" class="form-control" required>
                  </div>

                  <!-- Photo -->
                  <div class="form-group">
                  <label for="photo_publication">Photo :</label>
                  <input type="file" name="photo_publication" class="form-control" required>
                  </div>

                  <!-- Lieu -->
                  <div class="form-group">
                  <label for="lieu_publication">Lieu :</label>
                  <input type="text" name="lieu_publication" class="form-control" required>
                  </div>

                  <!-- Ressenti -->
                  <div class="form-group">
                    <label for="ressenti_publication">Je suis :</label>
                    <select class="form-control form-add" name="ressenti_publication" required>
                        <option>Heureux(se)</option>
                        <option>Triste</option>
                        <option>En forme</option>
                        <option>Fatigué(e)</option>
                        <option>En colère</option>
                        <option>Blasé(e)</option>
                        <option>En train de me noyé(e)</option>
                      </select>
                  </div>

                  <!-- Activite -->
                  <div class="form-group">
                  <label for="activite_publication">Activité :</label>
                  <input type="text" name="activite_publication" class="form-control" required>
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
                  $requete = $bdd->prepare('SELECT DISTINCT * FROM publication AS p
                                            WHERE ( p.id_publication IN (SELECT id_publication FROM publie WHERE id_utilisateur = ?)
                                                    OR p.visibilite = "PUBLIC") AND type != "EMPLOI" ORDER BY id_publication DESC');
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
                    <!-- PP -->
                    <div class="media-left">
                      <img src="../upload/pp/'.$profil.'" class="media-object" style="width:45px">
                    </div>
                    <!-- Body -->
                    <div class="media-body">
                      <h4 class="media-heading">'.$prenom_nom.' <small><i>'.$date_heure.'</i></small></h4>
                      <p>'.$description.'</p>
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

  </body>

  <!-- Affichage du footer -->
  <?php include ("footer.php"); ?>

</html>
