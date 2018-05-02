<!-- Affichage de la nav -->
<nav class="navbar navbar-default navbar-fixed-top navigation">

  <div class="container-fluid">
    <!-- Logos -->
    <div class="navbar-header">
        <!-- Navbar en responsive -->
        <div class="navbar-brand">
            <img src="../public/images/logo_texte_nav.png" class="img-responsive logo_netpool" alt="img logo_netpool" width="200">
        </div>

        <div>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">
      <div>
        <ul class="nav navbar-nav">
          <!-- Lien vers l'accueil -->
          <li>
            <a class="mot_nav" href="accueil.php">Accueil</a>
          </li>
          <!-- Lien vers mon profil -->
          <li>
            <a class="mot_nav" href="profil.php">Mon profil</a>
          </li>
          <!-- Lien vers mon reseau -->
          <li>
            <a class="mot_nav" href="reseau.php">Mon réseau</a>
          </li>
          <!-- Lien vers notifications -->
          <li>
            <a class="mot_nav" href="notifications.php">Notifications</a>
          </li>
          <!-- Lien vers offres d'emplois -->
          <li>
            <a class="mot_nav" href="emplois.php">Offres d'emplois</a>
          </li>

          <!-- Lien vers admin -->
          <?php
            session_start();
            // Essayer de se connecter à la base de données
            try
            {
              $bdd = new PDO('mysql:host=localhost;dbname=netpool;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            {
              die('Erreur : ' . $e->getMessage());
            }
            // Chercher si l'utilisateur existe déjà
            $requete = $bdd->prepare('SELECT check_admin FROM utilisateur WHERE id_utilisateur = ?');
            $requete->execute(array($_SESSION['$id_utilisateur']));
            // Récupérer le résultat
            $resultat = $requete->fetch();
            $e = $resultat[0];
            if($e == "TRUE")
            {
              echo '<li>
                <a class="mot_nav" href="admin.php">Admin</a>
              </li>';
            }
          ?>

          <!-- Deconnexion -->
          <li>
            <a class="mot_nav" href="deconnexion.php">Se déconnecter <span class="glyphicon glyphicon-log-out"></span></a>
          </li>
        </ul>
      </div>
    </div>

  </div>
</nav>
