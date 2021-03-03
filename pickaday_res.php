<!DOCTYPE html>
<html>
<head>
		<?php require_once ?>
		<script src="assets/js/moment.js"></script>
        <script src="assets/js/pikaday.js"></script>
        <script src="assets/js/script.js"></script>


<link rel="stylesheet" type="text/css" href="assets/css/sb-admin-2.css"> 
<!--><link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css"><!-->

	<title></title>

</head>
<body class="bg-gradient-primary-simple">

			<div class="dates-wrapper group">
			<?php
				$function = new Functions();
                $function->fetch_user();
                $a = $function->getReq();
			?>
			  	<div class="field clearfix date-range-start date-wrapper">
				    <div class="label">
				      <label for="datepicker-start">Date Emprunt:</label>
				    </div>
				    <div class="input">
				      <input type="date" name="experience-start" id="datepicker-start" class="input-text" placeholder="dd/mm/yyyy">
				    </div>
				    <p></p>
				    <input type="submit" name="Réserver" id="centrer-objet">
				    <p></p>
		  		</div>
		  	</div>
</body>
</html>