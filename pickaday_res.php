<?php include './inc/header_1.php'; ?>

<?php include './inc/navbar.php'; ?>

<?php require_once './model/Functions.php'; ?>

<?php
        $function = new Functions();
        $function->fetch_media();
        $a = $function->getReq();
?>

<body class="bg-gradient-primary-simple" id="centrer-objet">

        <div class="card mb-3" id = "Item_res">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo $a[$i]['Lien_image']; ?>" alt="..." style ="width: 200px" id ="img-size">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title"><?php echo $a[$i]['Titre']; ?></h1>
                        <p class="card-text"><?php echo $a[$i]['Description']; ?></p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        <form action="pickaday_res.php" method="get">
                            <input name="id" hidden value="<?php echo $a[$i]['id']; ?>">
                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Réservez maintenant">
                        </form>
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
</body>
</html>
<script type="text/javascript"> 
function dateEmprunt(){
//const dateEmprunt = document.getElementById('date').value;
//console.log(document.getElementById('date').value);
}
</script>