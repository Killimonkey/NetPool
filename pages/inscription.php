<?php
  // On recupere les valeurs
  $nom = isset($_POST["nom"])?$_POST["nom"] : "";
  $prenom = isset($_POST["prenom"])?$_POST["prenom"] : "";
  $naissance = isset($_POST["naissance"])?$_POST["naissance"] : "";
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
  if($naissance == "")
  {
   $error .= "Pas de date de naissance<br>";
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

      // Chercher si l'utilisateur existe déjà
      $requete = $bdd->prepare('SELECT id_utilisateur FROM utilisateur WHERE adresse_mail = ? AND pseudo = ?');
      $requete->execute(array($email, $pseudo));
      // Récupérer le résultat
      $resultat = $requete->fetch();
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

    // Si l'utilisateur existe déjà, prévenir
    if($resultat != FALSE)
    {
      echo("L'utilisateur $pseudo d'adresse mail $email existe déjà.");

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
    // Sinon, le créer
    else
    {
      try {
        // Ajouter le nouvel utilisateur
        $requete = $bdd->prepare('INSERT INTO utilisateur (adresse_mail,pseudo,prenom,nom,date_de_naissance) VALUES (?,?,?,?,?)');
        $requete->execute(array($email,$pseudo,$prenom,$nom,$naissance));
        echo("Bonjour $prenom ! Vous êtes maintenant inscrit(e) sur NetPool !");
        $bdd = null;
      } catch (\Exception $e) {
        die('Erreur : ' . $e->getMessage());
      }
      // Bouton pour recommencer
      echo '<div>
        <form action="../index.php">
          <input type="submit" value="Connexion" />
        </form>
      </div>';
    }

  }
?>
