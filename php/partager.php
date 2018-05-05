

<?php

  session_start();
  $date = date("d/m/Y");
  $heure = date("H:i:s");
  $datetime = strtolower($date.' '.$heure);

  $id_mec = $_GET['mec'];
  $id_pub = $_GET['data'];

  // Essayer de se connecter à la base de données
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');
      // Ajouter une publication
      $requete = $bdd->prepare('INSERT INTO publication (description,type,date_heure,visibilite,check_suppression) VALUES (?,?,?,?,?)');
      $requete->execute(array("","PARTA",$datetime,"PUBLIC","FALSE"));
      // récupérer l'id de cette publication
      $requete = $bdd->prepare('SELECT id_publication FROM publication WHERE date_heure = ?');
      $requete->execute(array($datetime));
      $id_partage = $requete->fetch();
      // ajouter un publi entre lutilisateur et ce partage
      $requete = $bdd->prepare('INSERT INTO publie (id_utilisateur,id_publication) VALUES (?,?)');
      $requete->execute(array($_SESSION['$id_utilisateur'],$id_partage[0]));
      // pareil mais dans partage
      $requete = $bdd->prepare('INSERT INTO partage (id_utilisateur,id_publication,id_mec,id_mec_pub) VALUES (?,?,?,?)');
      $requete->execute(array($_SESSION['$id_utilisateur'],$id_partage[0],$id_mec,$id_pub));
      // Récupérer le résultat
      $resultat = $requete->fetch();
      $bdd = null;

    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

header('Location:../pages/accueil.php');
?>
