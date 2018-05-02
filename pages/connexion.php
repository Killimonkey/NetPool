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

      // Chercher si l'utilisateur existe déjà
      $requete = $bdd->prepare('SELECT nom_photo_couv FROM utilisateur WHERE id_utilisateur = ?');
      $requete->execute(array($_SESSION['$id_utilisateur']));
      // Récupérer le résultat
      $resultat_1 = $requete->fetch();
      // Récupérer l'id de l'utilisateur
      $_SESSION['$couv_utilisateur'] = $resultat_1[0];

      // Chercher si l'utilisateur existe déjà
      $requete = $bdd->prepare('SELECT nom_photo_profil FROM utilisateur WHERE id_utilisateur = ?');
      $requete->execute(array($_SESSION['$id_utilisateur']));
      // Récupérer le résultat
      $resultat_2 = $requete->fetch();
      // Récupérer l'id de l'utilisateur
      $_SESSION['$profil_utilisateur'] = $resultat_2[0];

      $bdd = null;
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

    // Si l'utilisateur n'existe pas, prévenir
    if($resultat == FALSE)
    {
      echo("L'utilisateur $pseudoc d'adresse mail $emailc n'existe pas.");

      // Essais pour des pop up
      //echo '<script type="text/javascript">window.alert("'.'Un utilisateur $pseudo avec une adresse mail $email existe déjà.'.'"); </script>'; //echo("L'utilisateur $pdo d'adresse mail $email existe déjà.");
      // retour a la page
      // = function(){header("Location: ../index.php"); exit;};
      //header("Location: ../index.php");
      //exit();
      //if(window.closed()) {header("Location: ../index.php");exit;}

      // Bouton pour recommencer
      echo '<div>
        <form action="../index.php">
          <input type="submit" value="Recommencer" />
        </form>
      </div>';

    }
    // Sinon, lui donner accès à son accueil
    else
    {
      // Bienvenue
      echo("Bonjour $pseudoc ! Comment allez-vous ?");

      // Bouton pour recommencer
      echo '<div>
        <form action="../pages/accueil.php">
          <input type="submit" value="Accueil" />
        </form>
      </div>';
    }
  }
?>
