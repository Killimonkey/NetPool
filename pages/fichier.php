<?php


// Testons si le cv a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['cv']) AND $_FILES['cv']['error'] == 0)
{
        // Testons si le cv n'est pas trop gros
        if ($_FILES['cv']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['cv']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('pdf','docx');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le cv et le stocker définitivement
                        // Nom du fichier : prenom-nom-date.pdf ou prenom-nom-date.docx
                        $nom_cv = strtolower($_SESSION['$prenom'] . '-' . $_SESSION['$nom'] . '-' . date('Y-m-d') . '.' . $extension_upload);
                        move_uploaded_file($_FILES['cv']['tmp_name'], '../upload/cv/' . $nom_cv);
                        header ('Location : profil.php');
                        exit();
                }
        }
}
?>
