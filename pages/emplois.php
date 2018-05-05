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

      <!-- Option Supprimer-->
      <div class="row">
        <div class="col-sm-12">

          <div class="col-sm-12 offre_emploi">Offres d'emplois</div>

          <ul class="list-unstyled">


            <?php

            // Essayer de se connecter à la base de données
            try
            {
              $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');

              // Chercher si l'utilisateur existe déjà
              $requete = $bdd->prepare('SELECT * FROM publication WHERE type = "EMPLOI" ORDER BY id_publication DESC');
              $requete->execute(array());


              while($resultat = $requete->fetch())
              {
                // récupérer utilisateur correspondant
                $requete_uti = $bdd->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = (SELECT id_utilisateur FROM publie WHERE id_publication = ?)');
                $requete_uti->execute(array($resultat['id_publication']));
                $utilisateur = $requete_uti->fetch();

                // Récupérer infos publication dans bdd
                $id_publication = $resultat['id_publication'];
                $description = $resultat['description'];
                $date_heure = $resultat['date_heure'];
                $visibilite = $resultat['visibilite'];

                // Récupérer nom prénom et photo de profil
                $prenom_nom = strtolower($utilisateur['prenom'].' '.$utilisateur['nom']);
                $profil = $utilisateur['nom_photo_profil'];

                // Récupérer mention aime
                $requete_aime = $bdd->prepare('SELECT * FROM aime WHERE id_utilisateur = ? AND id_publication = ?');
                $requete_aime->execute(array($utilisateur['id_utilisateur'],$id_publication));
                $aime = $requete_aime->fetch();

                // Récupérer nombre de mentions aime
                $requete_nb_aime = $bdd->prepare('SELECT * FROM aime WHERE id_publication = ?');
                $requete_nb_aime->execute(array($id_publication));
                $nb_aime = 0;
                while($requete_nb_aime->fetch())
                {
                  $nb_aime = $nb_aime + 1;
                }

                echo '
                <!-- Une offre d emploi -->
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
                      <i> le '.$date_heure.'</i>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-heart coeur_accueil"></span>'.$nb_aime;
                      echo '<br><strong>! OFFRE EMPLOI !</strong>
                    </small>
                  </h4>
                  <p>'.$description.'</p>
                ';

                echo '
                </div>';
                if($aime == FALSE) echo '<a href="aime_emploi.php?data='.$id_publication.'"><button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-heart-empty coeur_acceuil"></span></button></a>';
                else echo '<a href="aime_plus_emploi.php?data='.$id_publication.'"><button type="button" class="btn btn-primary option_publier col-sm-4"><span class="glyphicon glyphicon-heart coeur_acceuil"></span></button></a>';
                echo '</li>';

            }
              $bdd = null;
            }
            catch (Exception $e)
            {
              die('Erreur : ' . $e->getMessage());
            }
            ?>


        <!--    <li class="panel panel-primary div_emploi">
              <div class="panel-heading titre_emploi"><h3 class="panel-title">Titre</h3></div>
              <div class="panel-body">Contenu</div>
            </li>-->


          </ul>
        </div>
      </div>
    </div>
  </body>

  <!-- Affichage du footer -->
  <?php include ("footer.php"); ?>

</html>
