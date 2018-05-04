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
          <button type="button" class="btn btn-primary option_publier col-sm-3" data-toggle="modal" data-target="#modal_event">Evénement</button>
          <button type="button" class="btn btn-primary option_publier col-sm-3" data-toggle="modal" data-target="#modal_photo">Photo</button>
          <button type="button" class="btn btn-primary option_publier col-sm-3" data-toggle="modal" data-target="#modal_video">Vidéo</button>
          <button type="button" class="btn btn-primary option_publier col-sm-3" data-toggle="modal" data-target="#modal_emploi">Emploi</button>
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
                  <label for="comment_event">Commentaire:</label>
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
                  <label for="comment_photo">Commentaire:</label>
                  <input type="text" name="comment_photo" class="form-control" required>
                  </div>

                  <!-- PP -->
                  <div class="form-group">
                  <label for="photo_publication">Profil:</label>
                  <input type="file" name="photo_publication" class="form-control" required>
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

                <!-- Une publication -->
                <li class="media cadre_publication">
                <!-- PP -->
                <div class="media-left">
                  <img src="../upload/pp/pp1.jpg" class="media-object" style="width:45px">
                </div>

                <!-- Body -->
                <div class="media-body">
                  <h4 class="media-heading">Tufais Chier <small><i><?php $date ?> <?php $heure ?></i></small></h4>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>
              </li>

              <li class="media  cadre_publication">
              <!-- PP -->
              <div class="media-left">
                <img src="../upload/pp/pp1.jpg" class="media-object" style="width:45px">
              </div>

              <!-- Body -->
              <div class="media-body">
                <h4 class="media-heading">Machin Minuche <small><i>Posted on February 19, 2016</i></small></h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              </div>
            </li>

            </ul>
        </div>

      </div>
    </div>

  </body>

  <!-- Affichage du footer -->
  <?php include ("footer.php"); ?>

</html>
