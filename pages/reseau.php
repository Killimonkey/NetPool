<!DOCTYPE html>
<html lang="fr">

  <!-- Affichage du head -->
  <?php include ("head.php"); ?>

  <!-- Affichage du corps -->
  <body class="body">

    <!-- Affichage de la nav -->
    <?php include ("nav.php"); ?>
    <div class="container-fluid">
      <div class="row">

        <div class="col-sm-12">
          <!-- Amis-->
          <div class="col-sm-4">
            <div class="col-sm-12 titre">Mes Amis</div>
            <div class="col-sm-12 corps">
              <?php

              // Essayer de se connecter à la base de données
              try
              {
                $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');

                // Chercher si l'utilisateur existe déjà
                $requete = $bdd->prepare('SELECT * FROM utilisateur AS u WHERE u.id_utilisateur IN (SELECT utilisateur_1
                                                                                                    FROM reseau
                                                                                                    WHERE utilisateur_2 = ? AND check_ami = "TRUE")
                                                                          OR u.id_utilisateur IN (SELECT utilisateur_2
                                                                                                    FROM reseau
                                                                                                    WHERE utilisateur_1 = ? AND check_ami = "TRUE")');
                $requete->execute(array($_SESSION['$id_utilisateur'], $_SESSION['$id_utilisateur']));


                while($resultat = $requete->fetch())
                {
                  $id_ami = $resultat['id_utilisateur'];
                  echo '<!-- Bloc -->
                  <div class="row corps">

                      <div class="col-sm-6">
                      <!-- Photo -->
                        <div class="col-sm-12">';
                          //<?php
                            $pp = $resultat['nom_photo_profil'];
                            if($pp != "") echo '<img src="../upload/pp/'.$pp.'" class="img-responsive img-circle img_ppreseau" alt="img_ppreseau">';
                            else echo '<img src="../public/images/pp_template.jpg" class="img-responsive img-circle img_ppreseau" alt="img_ppreseau">'
                          //
                        .'
                        </div>
                        <!-- Boutons -->
                        <div class="col-sm-12 infos-amis">';
                            $pr = $resultat['prenom'];
                            $nm = $resultat['nom'];
                            $ps = $resultat['poste'];
                            echo '<br>'.$pr.' '.$nm.'<br><br>'.$ps.''

                          .'
                        </div>
                       </div>

                        <div class="col-sm-6 ">
                            <a href="essai.php?data='.$id_ami.'"> <button type="button" class="btn btn-primary bouton" >Voir le profil</button> </a>
                            <a href="suppression.php?data='.$id_ami.'"> <button type="button" class="btn btn-primary bouton">Se Déconnecter</button> </a>
                        </div>

                    </div>';
                  $bdd = null;
              }

              }
              catch (Exception $e)
              {
                die('Erreur : ' . $e->getMessage());
              }
              ?>
            </div>
          </div>


          <!-- Reseau -->
          <div class="col-sm-4">
            <div class="col-sm-12 titre">Mon réseau professionnel</div>
            <div class="col-sm-12 corps">
              <?php

              // Essayer de se connecter à la base de données
              try
              {
                $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');

                // Chercher si l'utilisateur existe déjà
                $requete = $bdd->prepare('SELECT * FROM utilisateur AS u WHERE u.id_utilisateur IN (SELECT utilisateur_1
                                                                                                    FROM reseau
                                                                                                    WHERE utilisateur_2 = ? AND check_ami = "FALSE")
                                                                          OR u.id_utilisateur IN (SELECT utilisateur_2
                                                                                                    FROM reseau
                                                                                                    WHERE utilisateur_1 = ? AND check_ami = "FALSE")');
                $requete->execute(array($_SESSION['$id_utilisateur'], $_SESSION['$id_utilisateur']));


                while($resultat = $requete->fetch())
                {
                  $id_collegue = $resultat['id_utilisateur'];
                  echo '<!-- Bloc -->
                  <div class="row corps">

                      <div class="col-sm-6">
                      <!-- Photo -->
                        <div class="col-sm-12">';
                          //<?php
                            $pp = $resultat['nom_photo_profil'];
                            if($pp != "") echo '<img src="../upload/pp/'.$pp.'" class="img-responsive img-circle img_ppreseau" alt="img_ppreseau">';
                            else echo '<img src="../public/images/pp_template.jpg" class="img-responsive img-circle img_ppreseau" alt="img_ppreseau">'
                          //
                        .'
                        </div>
                        <!-- Boutons -->
                        <div class="col-sm-12 infos-amis">';
                            $pr = $resultat['prenom'];
                            $nm = $resultat['nom'];
                            $ps = $resultat['poste'];
                            echo '<br>'.$pr.' '.$nm.'<br><br>'.$ps.''

                          .'
                        </div>
                       </div>

                        <div class="col-sm-6 ">
                            <a href="essai.php?data='.$id_collegue.'"> <button type="button" class="btn btn-primary bouton" >Voir le profil</button> </a>
                            <a href="suppression.php?data='.$id_collegue.'"> <button type="button" class="btn btn-primary bouton">Se Déconnecter</button> </a>
                        </div>

                    </div>';
                  $bdd = null;
              }

              }
              catch (Exception $e)
              {
                die('Erreur : ' . $e->getMessage());
              }
              ?>
            </div>
          </div>


          <!-- Autre -->
          <div class="col-sm-4">
            <div class="col-sm-12 titre">Se connecter</div>
            <div class="col-sm-12 corps">
              <?php

              // Essayer de se connecter à la base de données
              try
              {
                $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');

                // Chercher si l'utilisateur existe déjà
                $requete = $bdd->prepare('SELECT * FROM utilisateur AS u WHERE u.id_utilisateur NOT IN (SELECT utilisateur_1
                                                                                                    FROM reseau
                                                                                                    WHERE utilisateur_2 = ?)
                                                                          AND u.id_utilisateur NOT IN (SELECT utilisateur_2
                                                                                                    FROM reseau
                                                                                                    WHERE utilisateur_1 = ?)
                                                                          AND u.id_utilisateur != ?');
                $requete->execute(array($_SESSION['$id_utilisateur'], $_SESSION['$id_utilisateur'], $_SESSION['$id_utilisateur']));


                while($resultat = $requete->fetch())
                {
                  $id_autre = $resultat['id_utilisateur'];
                  echo '<!-- Bloc -->
                  <div class="row corps">

                      <div class="col-sm-6">
                      <!-- Photo -->
                        <div class="col-sm-12">';
                          //<?php
                            $pp = $resultat['nom_photo_profil'];
                            if($pp != "") echo '<img src="../upload/pp/'.$pp.'" class="img-responsive img-circle img_ppreseau" alt="img_ppreseau">';
                            else echo '<img src="../public/images/pp_template.jpg" class="img-responsive img-circle img_ppreseau" alt="img_ppreseau">'
                          //
                        .'
                        </div>
                        <!-- Boutons -->
                        <div class="col-sm-12 infos-amis">';
                            $pr = $resultat['prenom'];
                            $nm = $resultat['nom'];
                            $ps = $resultat['poste'];
                            echo '<br>'.$pr.' '.$nm.'<br><br>'.$ps.''

                          .'
                        </div>
                       </div>

                        <div class="col-sm-6 ">
                            <a href="essai.php?data='.$id_autre.'"> <button type="button" class="btn btn-primary bouton" >Voir le profil</button> </a>
                            <a href="collegue.php?data='.$id_autre.'"> <button type="button" class="btn btn-primary bouton">Se Connecter</button>
                            <a href="ami.php?data='.$id_autre.'"> <button type="button" class="btn btn-primary bouton">Devenir Ami</button>
                        </div>

                    </div>';
                  $bdd = null;
              }

              }
              catch (Exception $e)
              {
                die('Erreur : ' . $e->getMessage());
              }
              ?>
            </div>
          </div>


          </div>

        </div>
      </div>
    </div>
  <!-- Affichage du footer -->
  <?php include ("footer.php"); ?>

  <!-- https://developer.mozilla.org/fr/docs/Web/Guide/HTML/Formulaires/Validation_donnees_formulaire -->
</html>
