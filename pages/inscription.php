<?php
  // On recupere les valeurs
  $nom = isset($_POST["nom"])?$_POST["nom"] : "";
  $prenom = isset($_POST["prenom"])?$_POST["prenom"] : "";
  $pseudo = isset($_POST["pseudo"])?$_POST["pseudo"] : "";
  $email = isset($_POST["email"])?$_POST["email"] : "";
  $error = "";

  // On teste si les champs ne sont pas vide sinon on affiche un message d'erreur
  if($nom == "")
  {
   $error .= "Pas de nom<br>";
  }
  if($prenom == "")
  {
   $error .= "Pas de prénom<br>";
  }
  if($pseudo == "")
  {
   $error .= "Pas de pseudo<br/>";
  }
  if($email == "")
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
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }
    // Chercher si l'utilisateur existe déjà
    $requete = $bdd->prepare('SELECT id_utilisateur FROM utilisateur WHERE adresse_mail = ? AND pseudo = ?');
    $requete->execute(array($email, $pseudo));
    // Récupérer le résultat
    $resultat = $requete->fetch();

    // Si l'utilisateur existe déjà, prévenir
    if($resultat != FALSE)
    {
      echo("L'utilisateur $pseudo d'adresse mail $email existe déjà.");
      //echo '<script type="text/javascript">window.alert("'.'Un utilisateur $pseudo avec une adresse mail $email existe déjà.'.'"); </script>'; //echo("L'utilisateur $pdo d'adresse mail $email existe déjà.");
      // retour a la page
      // = function(){header("Location: ../index.php"); exit;};
      //header("Location: ../index.php");
      //exit();
      //if(window.closed()) {header("Location: ../index.php");exit;}

    }
    // Sinon, le créer
    else
    {
      // Ajouter le nouvel utilisateur
      $requete = $bdd->prepare('INSERT INTO utilisateur (adresse_mail,pseudo,prenom,nom) VALUES (?,?,?,?)');
      $requete->execute(array($email,$pseudo,$prenom,$nom));
      echo("Bonjour $pseudo ! Vous êtes maintenant inscrit sur NetPool !");
    }
  }


  ?>
