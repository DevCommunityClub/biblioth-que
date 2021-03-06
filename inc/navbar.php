<header id="header" class="fixed-top">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="index.php"> Médiathèque de Dugny</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Accueil</a></li>

          <li class="drop-down"><a href="#">Médiathèque</a>
            <ul>
              <li><a href="about.php">À propos</a></li>

              <li><a href="contact.php">Contact</a></li>
            </ul>
          </li>

          <li><a href="réservation.php">Réservation</a></li>

            <?php
            if (isset($_SESSION['username'])){
                if ($_SESSION['role'] == 1){
                    echo '<li><a href="admin.php">' .$_SESSION['username'].'</a></li>';
                }
                elseif ($_SESSION['role'] == 2) {
                    echo '<li><a href="espace-membre.php">'.$_SESSION['username'].'</a></li>';
                }
                echo '<li class="get-started"><a class="btn" href="traitement/leave.php">Déconnexion</a></li>';
            }
            else{
                echo '<li class="get-started"><a href="views/login.php">Connexion</a></li>';
            }
            ?>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->