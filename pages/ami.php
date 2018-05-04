<?php
  session_start();
  $id = $_GET['data'];

  // Essayer de se connecter à la base de données
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');

    // Chercher si l'utilisateur existe déjà
    $requete = $bdd->prepare('INSERT INTO reseau (utilisateur_1,utilisateur_2,check_ami) VALUES (?,?,?)');
    $requete->execute(array($id,$_SESSION['$id_utilisateur'],"TRUE"));

    $bdd = null;
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
  header('Location:reseau.php');
?>
