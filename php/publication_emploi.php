<?php

  session_start();
  $date = date("d/m/Y");
  $heure = date("H:i:s");
  $datetime = strtolower($date.' '.$heure);

  // On recupere les valeurs
  $comment_emploi = isset($_POST["comment_emploi"])?$_POST["comment_emploi"] : "";
  $error = "";

  // On teste si les champs ne sont pas vide sinon on affiche un message d'erreur
  if($comment_emploi == "")
  {
   $error .= "Pas de description dans l'offre d'emploi<br/>";
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
      // Enregister l'offre d'emploi
      $requete = $bdd->prepare('INSERT INTO publication (description,type,date_heure,visibilite,check_suppression) VALUES (?,?,?,?,?)');
      $requete->execute(array($comment_emploi,"EMPLOI",$datetime,"PUBLIC","FALSE"));
      $requete = $bdd->prepare('SELECT id_publication FROM publication WHERE date_heure = ?');
      $requete->execute(array($datetime));
      $id_pub = $requete->fetch();
      $requete = $bdd->prepare('INSERT INTO publie (id_utilisateur,id_publication) VALUES (?,?)');
      $requete->execute(array($_SESSION['$id_utilisateur'],$id_pub[0]));
      // Récupérer le résultat
      $resultat = $requete->fetch();
      $bdd = null;
      header('Location:../pages/accueil.php');
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

  }
?>
