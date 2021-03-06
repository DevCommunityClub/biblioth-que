<?php include './inc/header_1.php'; ?>

<?php include './inc/navbar.php'; ?>

<?php require_once './model/Functions.php'; ?>

<?php
        $function = new Functions();
        $function->setId($_GET['id']);
        $function->fetch_media_info();
        $a = $function->getReq();
?>
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2>Réservation</h2>
                    <p>Choissisez une date les livres que vous souhaitez réserver.</p>
                </div>
            </div>
        </div>

        <div class="card mb-3" id = "Item_res">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo $a['Lien_image']; ?>" alt="..." style ="width: 200px" id ="img-size">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo $a['Titre']; ?></h1>
                        <p class="card-text"><?php echo $a['Description']; ?></p>
                        <?php
                            if ($a['Date_emprunt'] == null AND $a['Date_rendu'] == null){
                                echo '<form method="post" action="traitement/traitement_reservation.php">';
                                echo '<input name="id" hidden value="'.$a['id'].'">';
                                echo '<input type="date" hidden name="Date_emprunt" value="'.date("Y-m-d").'"/>';
                                echo '<label class="mb-2">Date de rendu:</label></br>';
                                echo '<input type="date" name="Date_rendu" class="input-text" placeholder="dd/mm/yyyy" required></br>';
                                echo '<input type="submit" class="btn btn-primary btn-user btn-block mt-3" value="Réservez maintenant">';
                                echo '</form>';
                            }
                            else{
                                echo '<p class="card-text"><small class="text-muted">Ce livre est actuellement emprunter date de retour :</br>'.$a['Date_rendu'].'</small></p>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
</body>
</html>