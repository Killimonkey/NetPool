<?php
  session_start();
  $id_publication = $_GET['data'];
  $id_mec = $_GET['mec'];

  // Essayer de se connecter à la base de données
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');

    // enregistrer que l'utilisateur connecté aime la publication correspondante au bouton qur lquel il a cliqué
    $requete = $bdd->prepare('DELETE FROM aime WHERE id_utilisateur = ? AND id_publication = ?');
    $requete->execute(array($_SESSION['$id_utilisateur'],$id_publication));

    $bdd = null;
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
  header('Location:essai.php?data='.$id_mec);
?>
