<?php include "inc/header_1.php"; ?>

<?php include "inc/navbar.php"; ?>

<?php require_once 'model/Functions.php'; ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>Réservation</h2>
            <p>Veuillez selectionner les livres que vous souhaitez réserver, il faudra aller les chercher directement à la bibliothèque.</p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="index.html">Acceuil</a></li>
          <li>Réservation</li>
        </ol>

        <form action = "recherche-multimedia.php" method = "get" name="Livres">
          <input type = "search" name = "search">
          <input type = "submit" name = "search" value = "Rechercher">
        </form>
      </div>

        <div class="card mb-3" id = "Item_res">
          <div class="row g-0">
            <div class="col-md-4">
              <?php
                $function = new Functions();
                $function->fetch_media();
                $a = $function->getReq();
                var_dump($a);
                die();
              ?>

                <div class="card mb-3" id = "Item_res">
                  <div class="row g-0">
                    <div class="col-md-4">
                    <?php
                      $count_1 = count($a);
                      for ($i=0; $i <$count_1 ; $i++) {
                        echo '<img src='.$a[$i]['Lien_image'].'alt="..." style ="width : 200px" id ="img-size">';
                        echo'</div>';
                        echo'<div class="col-md-8">';
                        echo'<div class="card-body">';
                        echo'<h1 class="card-title">'.$a[$i]['Titre'].'</h1>';
                        echo'<p class="card-text">'.$a[$i]['Description'].'</p>';
                        echo'<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>';
                        echo'<a href=" class="btn btn-primary btn-user btn-block"> Réservez maintenant';
                        echo'</div>';
                      }
                    ?>
                  </div>
                </div>
            </section><!-- End Breadcrumbs -->



    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">

    </section><!-- End Pricing Section -->

  </main><!-- End #main -->

<?php include "inc/footer.php"; ?>
