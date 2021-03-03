<?php include "inc/header_1.php"; ?>

<?php include "inc/navbar.php"; ?>

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
              <img src="https://static.fnac-static.com/multimedia/Images/FR/NR/4a/dd/ae/11459914/1507-1/tsp20200130165132/Max-et-Lili-ont-peur-du-noir.jpg" alt="..." style ="max width : 500px" id ="img-size">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h1 class="card-title">Card title</h1>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="javascript:;" onclick="document.getElementById('form').submit()" class="btn btn-primary btn-user btn-block">
                  Réservez maintenant
                </a>
              </div>
            </div>
          </div>
        </div>

    </section><!-- End Breadcrumbs -->

    

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      
    </section><!-- End Pricing Section -->

  </main><!-- End #main -->

<?php include "inc/footer.php"; ?>
