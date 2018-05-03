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
              <!-- Texte droite -->
              <div class="col-sm-7 ">
                <form id="mon_formulaire2" action="../php/ajout.php" method="post">

                  <!-- Nom -->
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="nom">Nom</label>
                    <div class="col-sm-9">
                      <input class="form-control label_form3" id="nom" name="nom" placeholder="Nom" type="text" required>
                    </div>
                  </div>

                    <!-- Prenom -->
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="prenom">Prenom</label>
                    <div class="col-sm-9">
                      <input class="form-control label_form3" id="prenom" name="prenom" placeholder="Prenom" type="text" required>
                    </div>
                  </div>

                  <!-- Naissance -->
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="naissance">Naissance</label>
                    <div class="col-sm-9">
                      <input class="form-control label_form3" id="naissance" name="naissance" placeholder="Date de naissance" type="date" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required>
                    </div>
                  </div>

                    <!-- Pseudo -->
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="pseudo">Pseudo</label>
                    <div class="col-sm-9">
                      <input class="form-control label_form3" id="pseudo" name="pseudo" placeholder="Pseudo" type="text" required>
                    </div>
                  </div>

                    <!-- Adresse e-mail -->
                  <div class="form-group">
                    <label class="control-label col-sm-3" for="email">Email</label>
                    <div class="col-sm-9">
                      <input class="form-control label_form3" id="email" name="email" placeholder="E-mail" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                    </div>
                  </div>

                  <!-- Bouton Envoyer -->
                  <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-info pull-right bouton_valider_connexion2">Valider</button>
                  </div>
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
