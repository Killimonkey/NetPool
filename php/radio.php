<?php
session_start();
  // On recupere les valeurs
  $radio = isset($_POST["optradio"])?$_POST["optradio"] : "";
  $id_publi = isset($_POST["id_publi"])?$_POST["id_publi"] : "";
  $error = "";

  // On teste si les champs ne sont pas vide sinon on affiche un message d'erreur
  if($radio == "")
  {
   $error .= "Pas d'option sélectionnée<br>";
  }
  if($id_publi == "")
  {
   $error .= "Pas d'id_publi<br>";
  }

  // Si il n'y a pas d'erreur
  if ($error != "")
  {
    echo "Erreur :<br> $error";
  }
  else
  {
    // Traduire l'affichage en bdd pour les trois cas
    if ($radio == "public") $radio = "PUBLIC";
    elseif ($radio == "reseau") $radio = "RESEAU";
    elseif ($radio == "amis") $radio = "AMIS";


    // Essayer de se connecter à la base de données
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');
      // Enregister l'offre d'emploi
      $requete = $bdd->prepare('UPDATE publication SET visibilite=? WHERE id_publication = ?');
      $requete->execute(array($radio,$id_publi));
      // Récupérer le résultat
      $resultat = $requete->fetch();
      $bdd = null;
    }
    catch (Exception $e)
    {
      die('Erreur : ' . $e->getMessage());
    }

  }
    header('Location:../pages/profil.php');

  ?>
