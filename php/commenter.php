<?php

  session_start();
  $date = date("d/m/Y");
  $heure = date("H:i:s");
  $datetime = strtolower($date.' '.$heure);

  // On recupere les valeurs
  $commentaire = isset($_POST["commentaire"])?$_POST["commentaire"] : "";
  $id_publication = isset($_POST["id_publication"])?$_POST["id_publication"] : "";
  $error = "";

  // On teste si les champs ne sont pas vide sinon on affiche un message d'erreur
  if($commentaire == "")
  {
   $error .= "Pas de commentaire <br/>";
  }
  if($id_publication == "")
  {
   $error .= "Pas d'id_publication<br>";
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
      // Modifier le comment
      $requete = $bdd->prepare('INSERT INTO commentaire (description) VALUES (?)');
      $requete->execute(array($commentaire));
      $requete = $bdd->prepare('SELECT id_commentaire FROM commentaire WHERE id_commentaire');
      $requete->execute(array($commentaire));
      $id_pub = $requete->fetch();
      $requete = $bdd->prepare('INSERT INTO ecrit (id_utilisateur,id_commentaire) VALUES (?,?)');
      $requete->execute(array($_SESSION['$id_utilisateur'],$id_pub[0]));
      $requete = $bdd->prepare('INSERT INTO est_ecrit_dans (id_publication,id_commentaire) VALUES (?,?)');
      $requete->execute(array($id_publication,$id_pub[0]));
      // Récupérer le résultat
      $resultat = $requete->fetch();
      // Enregistrer dans la variable
      $_SESSION['$commentaire'] = $commentaire;
      $bdd = null;
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

  }
  header('Location:../pages/accueil.php');
?>
