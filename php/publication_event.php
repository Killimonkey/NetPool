<?php

  session_start();
  $date = date("d/m/Y");
  $heure = date("H:i:s");
  $datetime = strtolower($date.' '.$heure);

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
      $requete = $bdd->prepare('INSERT INTO publication (description,type,date_heure,visibilite,check_suppression) VALUES (?,?,?,?,?)');
      $requete->execute(array($comment_event,"EVENT",$datetime,"PUBLIC","FALSE"));
      $requete = $bdd->prepare('SELECT id_publication FROM publication WHERE date_heure = ?');
      $requete->execute(array($datetime));
      $id_pub = $requete->fetch();
      $requete = $bdd->prepare('INSERT INTO publie (id_utilisateur,id_publication) VALUES (?,?)');
      $requete->execute(array($_SESSION['$id_utilisateur'],$id_pub[0]));
      // Récupérer le résultat
      $resultat = $requete->fetch();
      // Enregistrer dans la variable
      $_SESSION['$comment_event'] = $comment_event;
      $bdd = null;
      header('Location:../pages/accueil.php');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

  }
?>
