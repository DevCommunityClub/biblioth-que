<!DOCTYPE html>
<html lang="en">

<?php include "header.html"; ?>

<body>

  <!-- ======= Header ======= -->
  <?php include "navbar.html"; ?>

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

        <form action = "verif-form.php" method = "get" name="Livres">
          <input type = "search" name = "terme">
          <input type = "submit" name = "s" value = "Rechercher">
        </form>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      
    </section><!-- End Pricing Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>Dugny</h3>
            <p>Dugny, est une commune française située dans le département de la Seine-Saint-Denis, en région Île-de-France. Ses habitants sont appelés les Dugnysiens et les Dugnysiennes.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Lien utiles</h4>
            <ul>
              <li><a href="#">Acceuil</a></li>
              <li><a href="#">à propos</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">réservation</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Nous contacter</h4>
            <p>
              Avenue Ambroize Croizat <br>
              93440 Dugny<br>
              France<br>
              <strong>téléphone:</strong> 01 49 34 11 54<br>
              <strong>Mail:</strong> porselvi.tibource@mairie-dugny.fr<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
              <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
              <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
              <a href="#" class="google-plus"><i class="icofont-skype"></i></a>
              <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
            </div>

          </div>

          

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Serenity</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/serenity-bootstrap-corporate-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>