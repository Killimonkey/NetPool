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
              <div class="modal-body">
                <form>
                  <!-- Commentaire -->
                  <div class="form-group">
                    <label for="comentaire_event" class="col-form-label">Commentaire:</label>
                    <input type="text" class="form-control" id="comentaire_event">
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary">Publier</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Photo -->
        <div class="modal fade" id="modal_photo" tabindex="-1" role="dialog" aria-labelledby="modal_photo" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modal_event">Photo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form>
                  <!-- Commentaire -->
                  <div class="form-group">
                    <label for="comentaire_event" class="col-form-label">Commentaire:</label>
                    <input type="text" class="form-control" id="comentaire_event">
                    <!-- Photo -->
                    <label class="control-label" for="photo">Télécharger une photo:</label>
                    <input type="file" name="photo" required>
                  </div>
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary">Publier</button>
              </div>
            </div>
          </div>
        </div>


      </div>

      <div class="row">

        <div class="col-sm-12 publications">
          <!-- Publications -->

        </div>

      </div>
    </div>

  </body>

  <!-- Affichage du footer -->
  <?php include ("footer.php"); ?>

</html>
