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
          <!-- Supprimer -->
          <div class="col-sm-6 supprimer">Supprimer</div>
          <!--Ajouter-->
          <div class="col-sm-6 ajouter">Ajouter</div>
          <!-- option Supprimer-->
          <div class="col-sm-6 option-supprimer">
            <div class="col-sm-12 option-1"></div>
            <div class="col-sm-12 option-1"></div>
            <div class="col-sm-12 option-1"></div>
          </div>

          <!-- option Ajouter-->
          <div class="col-sm-6 option-ajouter">
            <div class="col-sm-12 option-1">
              <div class="col-sm-12 option-2">
                
                <form>
                Nom : <input type= "text" name = "Nom"><br>
                Prénom : <input type= "text" name = "Prenom"><br>
                e-mail : <input type= "text" name = "email"><br>
                Pseudo : <input type= "text" name = "Pseudo"><br>

                </form>

              </div>
            </div>
          </div>




        </div>

      </div>
    </div>

  </body>

  <!-- Affichage du footer -->
  <?php include ("footer.php"); ?>

  <!-- https://developer.mozilla.org/fr/docs/Web/Guide/HTML/Formulaires/Validation_donnees_formulaire -->
</html>
