<!DOCTYPE html>
<html lang="fr">

<!-- Affichage du head -->
<?php include ("head.php"); ?>

  <!-- Affichage du corps -->
  <body>
    <div class="container-fluid">
        <div class="row">

        <!-- Bandeau bleu -->
        <div class="col-sm-12 bandeau_bleu">

          <!-- Texte gauche -->
          <div class="col-sm-6 texte_bienvenue">

          </div>

        </div>

        <!-- Image logo -->
        <div class="col-sm-12">
          <img class="img-responsive img_logo_netpool" src="../public/images/logo_texte.png" alt="img logo_netpool" width="120">
        </div>

      </div>

      <div class="row">
        <!-- Texte gauche bas -->
        <div class="col-sm-12">
          <?php

            session_start();

            // On recupere les valeurs
            $pseudoc = isset($_POST["pseudoc"])?$_POST["pseudoc"] : "";
            $emailc = isset($_POST["emailc"])?$_POST["emailc"] : "";
            $error = "";

            // On teste si les champs ne sont pas vide sinon on affiche un message d'erreur
            if($pseudoc == "")
            {
             $error .= "Pas de pseudo<br/>";
            }
            if($emailc == "")
            {
             $error .= "Pas d'e-mail<br>";
            }

            // Si il n'y a pas d'erreur
            if ($error != "")
            {
              echo "Erreur :<br> $error";
            }
            else
            {
              // Essayer de se connecter à la base de données
              try
              {
                $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');

                // Chercher si l'utilisateur existe déjà
                $requete = $bdd->prepare('SELECT id_utilisateur FROM utilisateur WHERE adresse_mail = ? AND pseudo = ?');
                $requete->execute(array($emailc, $pseudoc));
                // Récupérer le résultat
                $resultat = $requete->fetch();
                // Récupérer l'id de l'utilisateur
                $_SESSION['$id_utilisateur'] = $resultat[0];
                $_SESSION['$email']          = $emailc;
                $_SESSION['$pseudo']         = $pseudoc;

                // Chercher son prenom
                $requete = $bdd->prepare('SELECT prenom FROM utilisateur WHERE id_utilisateur = ?');
                $requete->execute(array($_SESSION['$id_utilisateur']));
                $resultat_prenom = $requete->fetch();
                $_SESSION['$prenom'] = $resultat_prenom[0];
                // Chercher son nom
                $requete = $bdd->prepare('SELECT nom FROM utilisateur WHERE id_utilisateur = ?');
                $requete->execute(array($_SESSION['$id_utilisateur']));
                $resultat_nom = $requete->fetch();
                $_SESSION['$nom'] = $resultat_nom[0];
                // Chercher son age
                $requete = $bdd->prepare('SELECT date_de_naissance FROM utilisateur WHERE id_utilisateur = ?');
                $requete->execute(array($_SESSION['$id_utilisateur']));
                $resultat_age = $requete->fetch();
                if($resultat_age[0] != "")$_SESSION['$naissance'] = $resultat_age[0];
                else $_SESSION['$naissance'] = "pas de date de naissance enregistrée";
                // Chercher s'il est administrateur ou non
                $requete = $bdd->prepare('SELECT check_admin FROM utilisateur WHERE id_utilisateur = ?');
                $requete->execute(array($_SESSION['$id_utilisateur']));
                $resultat_admin = $requete->fetch();
                $_SESSION['$admin'] = $resultat_admin[0];
                // Chercher son poste
                $requete = $bdd->prepare('SELECT poste FROM utilisateur WHERE id_utilisateur = ?');
                $requete->execute(array($_SESSION['$id_utilisateur']));
                $resultat_poste = $requete->fetch();
                if($resultat_poste[0] != "")$_SESSION['$poste'] = $resultat_poste[0];
                else $_SESSION['$poste'] = "pas de poste enregistré";
                // Chercher son cv
                $requete = $bdd->prepare('SELECT nom_cv FROM utilisateur WHERE id_utilisateur = ?');
                $requete->execute(array($_SESSION['$id_utilisateur']));
                $resultat_cv = $requete->fetch();
                if($resultat_cv != NULL) $_SESSION['$cv'] = $resultat_cv[0];
                else $_SESSION['$cv'] = NULL;
                // Chercher sa photo de couverture
                $requete = $bdd->prepare('SELECT nom_photo_couv FROM utilisateur WHERE id_utilisateur = ?');
                $requete->execute(array($_SESSION['$id_utilisateur']));
                $resultat_couv = $requete->fetch();
                if($resultat_couv[0] != "") $_SESSION['$couv_utilisateur'] = $resultat_couv[0];
                else $_SESSION['$couv_utilisateur'] = "public/images/couv_template.jpg";
                // Chercher sa photo de profil
                $requete = $bdd->prepare('SELECT nom_photo_profil FROM utilisateur WHERE id_utilisateur = ?');
                $requete->execute(array($_SESSION['$id_utilisateur']));
                $resultat_profil = $requete->fetch();
                if($resultat_profil[0] != "") $_SESSION['$profil_utilisateur'] = $resultat_profil[0];
                else $_SESSION['$profil_utilisateur'] = "public/images/pp_template.jpg";

                $bdd = null;
              }
              catch (Exception $e)
              {
                die('Erreur : ' . $e->getMessage());
              }

              // Si l'utilisateur n'existe pas, prévenir
              if($resultat == FALSE)
              {
                //echo("L'utilisateur $pseudo d'adresse mail $emailc n'existe pas.");

                // Essais pour des pop up
                //echo '<script type="text/javascript">window.alert("'.'Un utilisateur $pseudo avec une adresse mail $email existe déjà.'.'"); </script>'; //echo("L'utilisateur $pdo d'adresse mail $email existe déjà.");
                // retour a la page
                // = function(){header("Location: ../index.php"); exit;};
                //header("Location: ../index.php");
                //exit();
                //if(window.closed()) {header("Location: ../index.php");exit;}

                // Bouton pour recommencer
          ?>


                      <div>
                        <form action="../index.php">
                          <label for="recommencer"> <?php echo $pseudoc ?> (adresse mail <?php echo $emailc ?>) ne figure pas dans nos membres.</label>
                          <input name="recommencer" type="submit" class="parametres_profil" value="Recommencer" />
                        </form>
                      </div>
          <?php
              }
              // Sinon, lui donner accès à son accueil
              else
              {
                // Bienvenue
                $pr = $_SESSION['$prenom'];
                echo("Bonjour $pr ! Comment allez-vous ?");

                // Bouton pour recommencer
                echo '<div>
                  <form action="../pages/accueil.php">
                    <input type="submit" class="parametres_profil" value="Accueil" />
                  </form>
                </div>';
              }
            }
          ?>
        </div>
      </div>
    </div>
  </body>

</html>
