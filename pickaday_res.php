<!DOCTYPE html>
<html>
<head>
		
		<script src="assets/js/moment.js"></script>
        <script src="assets/js/pikaday.js"></script>
        <script src="assets/js/script.js"></script>


<link rel="stylesheet" type="text/css" href="assets/css/sb-admin-2.css"> 
<!--<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">-->

	<title></title>

</head>
<body class="bg-gradient-primary-simple" id="centrer-objet">

			<div class="dates-wrapper group">
			
			  	<div class="field clearfix date-range-start date-wrapper">
				    <div class="label">
				      <label for="datepicker-start">Date Emprunt:</label>
				    </div>
				    <div class="input">
				      <input id="date" type="date" name="experience-start" id="datepicker-start" class="input-text" placeholder="dd/mm/yyyy">
				    </div>
				    <p></p>
				    <input type="submit" name="Réserver" id="centrer-objet" 
				    onclick="dateEmprunt()">
				    <p></p>
		  		</div>
		  	</div>
</body>
</html>
<script type="text/javascript"> 
function dateEmprunt(){
//const dateEmprunt = document.getElementById('date').value;
console.log(document.getElementById('date').value);
}
</script>