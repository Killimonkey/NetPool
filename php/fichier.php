<?php
session_start();
// Variables de date et heure
$date = date("d-m-Y");
$heure = date("H-i-s");

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
                        // Nom du fichier : prenom-nom-date-time.pdf ou prenom-nom-date-time.docx
                        $pr = $_SESSION['$prenom'];
                        $no = $_SESSION['$nom'];
                        $nom_cv = strtolower('cv-' .$pr. '-' . $no . '-' .$date.'-'.$heure. '.' . $extension_upload);
                        move_uploaded_file($_FILES['cv']['tmp_name'], '../upload/cv/' . $nom_cv);

                          header ('Location:../pages/profil.php');
                }
        }
}

// Testons si la couv a bien été envoyée et s'il n'y a pas d'erreur
if (isset($_FILES['couv']) AND $_FILES['couv']['error'] == 0)
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
                        $pr_couv = $_SESSION['$prenom'];
                        $no_couv = $_SESSION['$nom'];
                        $nom_couv = strtolower('couv-' .$pr_couv. '-' . $no_couv . '-' .$date.'-'.$heure. '.' . $extension_upload);
                        move_uploaded_file($_FILES['couv']['tmp_name'], '../upload/couv/' . $nom_couv);

                        header ('Location:../pages/profil.php');

                }
        }
}

// Testons si la pp a bien été envoyée et s'il n'y a pas d'erreur
if (isset($_FILES['pp']) AND $_FILES['pp']['error'] == 0)
{
        // Testons si la couv n'est pas trop gros
        if ($_FILES['pp']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['pp']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {

                    // On peut valider la couv et la stocker définitivement
                        $pr_pp = $_SESSION['$prenom'];
                        $no_pp = $_SESSION['$nom'];
                        $nom_pp = strtolower('pp-' .$pr_pp. '-' . $no_pp . '-' .$date.'-'.$heure. '.' . $extension_upload);
                        move_uploaded_file($_FILES['pp']['tmp_name'], '../upload/pp/' . $nom_pp);

                        header ('Location:../pages/profil.php');

                }
        }
}
?>
