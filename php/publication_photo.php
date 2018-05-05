<?php
session_start();

// Variables de date et heure pour le nom du fichier photo
$date_fic = date("d-m-Y");
$heure_fic = date("H-i-s");
$datetime_fic = strtolower($date_fic.'-'.$heure_fic);

// Variables date et heure pour la base de donnees dans publication
$date = date("d/m/Y");
$heure = date("H:i:s");
$datetime = strtolower($date.' '.$heure);

// On recupere les valeurs
$comment_photo  = isset($_POST["comment_photo"])?$_POST["comment_photo"] : "";
$lieu_photo     = isset($_POST["lieu_publication"])?$_POST["lieu_publication"] : "";
$humeur_photo   = isset($_POST["ressenti_publication"])?$_POST["ressenti_publication"] : "";
$activite_photo = isset($_POST["activite_publication"])?$_POST["activite_publication"] : "";

// Traduction base de données
$lieu = $lieu_photo;
$activite = $activite_photo;
if($humeur_photo == "") $humeur = "";
else if($humeur_photo == "Heureux(se)") $humeur = "JOYEUX";
else if($humeur_photo == "Triste") $humeur = "TRISTE";
else if($humeur_photo == "En forme") $humeur = "FORME";
else if($humeur_photo == "Fatigué(e)") $humeur = "FATIGUE";
else if($humeur_photo == "En colère") $humeur = "COLERE";
else if($humeur_photo == "Blasé(e)") $humeur = "BLASE";
else if($humeur_photo == "En train de me noyer") $humeur = "NOYE";

// Testons si la photo a bien été envoyée et s'il n'y a pas d'erreur
if (isset($_FILES['photo_publi']) AND $_FILES['photo_publi']['error'] == 0)
{
        // Testons si la photo_publi n'est pas trop gros
        if ($_FILES['photo_publi']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['photo_publi']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {

                    // On peut valider la photo_publi et la stocker définitivement
                        $pr_photo_publi = $_SESSION['$prenom'];
                        $no_photo_publi = $_SESSION['$nom'];
                        $nom_photo_publi = strtolower('photo_publi-' .$pr_photo_publi. '-' . $no_photo_publi . '-' .$datetime_fic. '.' . $extension_upload);
                        move_uploaded_file($_FILES['photo_publi']['tmp_name'], '../upload/publication/' . $nom_photo_publi);

                        // Essayer de se connecter à la base de données
                        try
                        {
                          $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');
                          // Ajouter la photo
                          $requete = $bdd->prepare('INSERT INTO photo_video (nom_photo_video) VALUES (?)');
                          $requete->execute(array($nom_photo_publi));
                          // Ajouter la publication
                          $requete = $bdd->prepare('INSERT INTO publication (description,type,date_heure,visibilite,check_suppression,lieu,activite,humeur)
                                                    VALUES (?,?,?,?,?,?,?,?)');
                          $requete->execute(array($comment_photo,"PUBLI",$datetime,"PUBLIC","FALSE",$lieu,$activite,$humeur));
                          // Récupérer l'id de la nouvelle publication (qui a été généré automatiquement par incrémentation)
                          $requete = $bdd->prepare('SELECT id_publication FROM publication WHERE date_heure = ?');
                          $requete->execute(array($datetime));
                          $id_new_pub = $requete->fetch();
                          echo $id_new_pub[0];
                          // Faire le lien entre l'utilisateur et la publication
                          $requete = $bdd->prepare('INSERT INTO publie (id_utilisateur,id_publication) VALUES (?,?)');
                          $requete->execute(array($_SESSION['$id_utilisateur'],$id_new_pub[0]));
                          // Faire le lien entre la publication et la photo
                          $requete = $bdd->prepare('INSERT INTO contient (id_publication,nom_photo_video) VALUES (?,?)');
                          $requete->execute(array($id_new_pub[0],$nom_photo_publi));
                          // Récupérer le résultat
                          $bdd = null;
                        }
                        catch (Exception $e)
                        {
                          die('Erreur : ' . $e->getMessage());
                        }
                }
        }
}

header ('Location:../pages/accueil.php');
?>
