<?php include "inc/header_1.php"; ?>

<?php include "inc/navbar.php"; ?>

<?php require_once 'model/Functions.php'; ?>
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

            <?php

              require_once 'model/Functions.php';

              $search = new Functions([
                "search" => $_POST["search"]
              ]);
              $managers = new managers();
              $res = $managers->search($search);
            ?>

        </div>
        <?php
        $function = new Functions();
        $function->fetch_media();
        $a = $function->getReq();
        $count_1 = count($a);
        for ($i = 0; $i < $count_1; $i++) {
            ?>
            <div class="card mb-3" id = "Item_res">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?php echo $a[$i]['Lien_image']; ?>" alt="..." style ="width: 200px" id ="img-size">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h1 class="card-title"><?php echo $a[$i]['Titre']; ?></h1>
                            <p class="card-text"><?php echo $a[$i]['Description']; ?></p>
                            <form>
                                <button type="button" class="btn btn-secondary mb-4"><?php echo $a[$i]['Type']; ?></button>
                            </form>
                            <form action="page-reservation.php" method="get">
                                <input name="id" hidden value="<?php echo $a[$i]['id']; ?>">
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Réservez maintenant">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">

    </section><!-- End Pricing Section -->

<?php include "inc/footer.php"; ?>


<script type="text/javascript">
    function numId(){
        const numId = document.getElementById('numId').value;
        console.log(document.getElementById('numId').value);
    }
</script>