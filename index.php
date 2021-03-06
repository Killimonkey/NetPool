<!DOCTYPE html>
<html lang="fr">

  <!-- Affichage du head -->
  <head>
    <!-- Titre -->
    <title>NetPool</title>
    <meta charset="utf-8">
    <!-- Compatible avec Edge -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Site responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <!-- css stylesheet -->
    <link rel="stylesheet" href="public/css/style.css?refresh=0"  type="text/css">

    <!-- Bootstrap -->
    <link  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  </head>

  <!-- Affichage du corps -->
  <body>
    <div class="container-fluid">
      <div class="row">

        <!-- Bandeau bleu -->
        <div class="col-sm-12 bandeau_bleu">

          <!-- Texte gauche -->
          <div class="col-sm-6 texte_bienvenue">
            Bienvenue sur NetPool
          </div>

          <!-- Texte droite -->
          <div class="col-sm-6">
            <form id="mon_formulaire" action="pages/connexion.php" method="post">

              <!-- Adresse e-mail -->
              <div class="form-group">
                <label class="control-label label_form1 col-sm-2" for="emailc">Email</label>
                <div class="col-sm-10">
                  <input class="form-control label_form2" id="emailc" name="emailc" placeholder="E-mail" type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>
              </div>

              <!-- Pseudo -->
              <div class="form-group">
                <label class="control-label label_form1 col-sm-2" for="pseudoc">Pseudo</label>
                <div class="col-sm-10">
                  <input class="form-control label_form2" id="pseudoc" name="pseudoc" placeholder="Pseudo" type="text" required>
                </div>
              </div>

              <!-- Bouton Envoyer -->
              <div class="col-sm-offset-10 col-sm-2">
                <button type="submit" class="btn btn-info pull-right bouton_valider_connexion">Valider</button>
              </div>
            </form>
          </div>

        </div>

        <!-- Image logo -->
        <div class="col-sm-12">
          <img class="img-responsive img_logo_netpool" src="public/images/logo_texte.png" alt="img logo_netpool" width="120">
        </div>

      </div>


      <div class="row">
        <!-- Texte gauche bas -->
        <div class="col-sm-6">
          Pour vous inscrire, veuillez remplir les champs ci-contre.
        </div>

        <!-- Texte droite -->
        <div class="col-sm-6 inscription">
          <form id="mon_formulaire2" action="pages/inscription.php" method="post">

            <!-- Nom -->
            <div class="form-group">
              <label class="control-label col-sm-2" for="nom">Nom</label>
              <div class="col-sm-10">
                <input class="form-control label_form3" id="nom" name="nom" placeholder="Nom" type="text" required>
              </div>
            </div>

            <!-- Prenom -->
            <div class="form-group">
              <label class="control-label col-sm-2" for="prenom">Prenom</label>
              <div class="col-sm-10">
                <input class="form-control label_form3" id="prenom" name="prenom" placeholder="Prenom" type="text" required>
              </div>
            </div>

            <!-- Naissance -->
            <div class="form-group">
              <label class="control-label col-sm-2" for="naissance">Naissance</label>
              <div class="col-sm-10">
                <input class="form-control label_form3" id="naissance" name="naissance" placeholder="Date de naissance" type="date" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required>
              </div>
            </div>

            <!-- Pseudo -->
            <div class="form-group">
              <label class="control-label col-sm-2" for="pseudo">Pseudo</label>
              <div class="col-sm-10">
                <input class="form-control label_form3" id="pseudo" name="pseudo" placeholder="Pseudo" type="text" required>
              </div>
            </div>

            <!-- Adresse e-mail -->
            <div class="form-group">
              <label class="control-label col-sm-2" for="email">Email</label>
              <div class="col-sm-10">
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
  </body>

</html>

<!-- Sources -->
<!-- https://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql/transmettre-des-donnees-avec-les-formulaires
https://www.w3schools.com/bootstrap/default.asp
http://html5pattern.com/Dates
https://openclassrooms.com/courses/concevez-votre-site-web-avec-php-et-mysql/transmettre-des-donnees-avec-les-formulaires#ss_part_4-->
