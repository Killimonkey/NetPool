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
                        $nom_cv = strtolower('cv-'$_SESSION['$prenom'] . '-' . $_SESSION['$nom'] . '-' . date('Y-m-d') . '.' . $extension_upload);
                        move_uploaded_file($_FILES['cv']['tmp_name'], '../upload/cv/' . $nom_cv);
                        header ('Location : profil.php');
                        exit();
                }
        }
}

// Testons si la couv a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['']) AND $_FILES['couv']['error'] == 0)
{
        // Testons si la couv n'est pas trop gros
        if ($_FILES['couv']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['couv']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider la couv et la stocker définitivement
                        // Nom du fichier : prenom-nom-date.pdf ou prenom-nom-date.docx
                        $nom_couv = strtolower('couv-'.$_SESSION['$prenom'] . '-' . $_SESSION['$nom'] . '-' . date('Y-m-d') . '.' . $extension_upload);
                        move_uploaded_file($_FILES['cv']['tmp_name'], '../upload/cv/' . $nom_couv);
                        header ('Location : profil.php');
                        exit();
                }
        }
}
?>
