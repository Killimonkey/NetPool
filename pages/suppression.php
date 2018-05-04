<?php
  session_start();
  $id = $_GET['data'];

  // Essayer de se connecter à la base de données
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');

    // Chercher si l'utilisateur existe déjà
    $requete = $bdd->prepare('DELETE FROM reseau WHERE (utilisateur_1 = ? AND utilisateur_2 = ?)
                                                          OR (utilisateur_2 = ? AND utilisateur_1 = ?)');
    $requete->execute(array($id, $_SESSION['$id_utilisateur'], $id, $_SESSION['$id_utilisateur']));

    $bdd = null;
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
  header('Location:reseau.php');
?>
