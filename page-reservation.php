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
                        <input name="id" hidden value="<?php echo $a['id']; ?>">
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Réservez maintenant">
                    </div>
                </div>
            </div>
        </div>

			<div class="dates-wrapper group">
			
			  	<div class="field clearfix date-range-start date-wrapper">
                    <form method="post" action="traitement/traitement_reservation.php">
                        <div class="label">
                          <label for="datepicker-start">Date Emprunt:</label>
                        </div>
                        <div class="input">
                          <input id="date" type="date" name="experience-start" class="input-text" placeholder="dd/mm/yyyy">
                        </div>
                        <p></p>
                        <input type="submit" name="Réserver" id="centrer-objet"
                        onclick="dateEmprunt()">
				    <p></p>
                    </form>
		  		</div>
		  	</div>
    </section>
</body>
</html>
<script type="text/javascript"> 
function dateEmprunt(){
//const dateEmprunt = document.getElementById('date').value;
//console.log(document.getElementById('date').value);
}
</script>