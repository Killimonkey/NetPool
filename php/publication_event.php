<?php

  session_start();

  // On recupere les valeurs
  $comment_event = isset($_POST["comment_event"])?$_POST["comment_event"] : "";
  $error = "";

  // On teste si les champs ne sont pas vide sinon on affiche un message d'erreur
  if($comment_event == "")
  {
   $error .= "Pas de commentaire dans l'evenement<br/>";
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
      // Modifier le comment_event
      $requete = $bdd->prepare('UPDATE utilisateur SET comment_event = ? WHERE id_utilisateur = ?');
      $requete->execute(array($comment_event, $_SESSION['$id_utilisateur']));
      // Récupérer le résultat
      $resultat = $requete->fetch();
      // Enregistrer dans la variable
      $_SESSION['$comment_event'] = $comment_event;
      $bdd = null;
      header('Location:../pages/profil.php');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

  }
?>
