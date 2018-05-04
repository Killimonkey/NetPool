<?php
session_start();
// Variables de date et heure
$date = date("d-m-Y");
$heure = date("H-i-s");
echo "ficcc";
 // Testons si la photo_publication a bien été envoyée et s'il n'y a pas d'erreur
if (isset($_FILES['photo_publication']) AND $_FILES['photo_publication']['error'] == 0)
{echo "1";
        // Testons si la photo_publication n'est pas trop gros
        if ($_FILES['photo_publication']['size'] <= 1000000)
        {echo "2";
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['photo_publication']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {echo "3";

                    // On peut valider la photo_publication et la stocker définitivement
                        $pr_photo_publication = $_SESSION['$prenom'];
                        $no_photo_publication = $_SESSION['$nom'];
                        $nom_photo_publication = strtolower('photo_publication-' .$pr_photo_publication. '-' . $no_photo_publication . '-' .$date.'-'.$heure. '.' . $extension_upload);
                        move_uploaded_file($_FILES['photo_publication']['tmp_name'], '../upload/photo_publication/' . $nom_photo_publication);

                        // Essayer de se connecter à la base de données

                }
        }
      }

?>
