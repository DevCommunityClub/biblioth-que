<?php include "inc/header_1.php"; ?>

<?php include "inc/navbar.php"; ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="breadcrumb-hero">
        <div class="container">
          <div class="breadcrumb-hero">
            <h2>Contact</h2>
            <p>Contactez nous depuis cette page pour toutes vos demandes.</p>
          </div>
        </div>
      </div>
      <div class="container">
        <ol>
          <li><a href="index.php">Acceuil</a></li>
          <li>Contact</li>
        </ol>
      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div>
          <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.fr/maps/place/M%C3%A9diath%C3%A8que+Anne+Frank/@48.9549219,2.4140019,17.26z/data=!4m5!3m4!1s0x47e66ba1e91fc30d:0x3ec65cf13c7d02c5!8m2!3d48.9549278!4d2.415796" frameborder="0" allowfullscreen></iframe>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4" data-aos="fade-right">
            <div class="info">
              <div class="address">
                <i class="icofont-google-map"></i>
                <h4>Adresse:</h4>
                <p>Avenue Ambroize Croizat 93440 Dugny France</p>
              </div>

              <div class="email">
                <i class="icofont-envelope"></i>
                <h4>Email:</h4>
                <p>porselvi.tibource@mairie-dugny.fr</p>
              </div>

              <div class="phone">
                <i class="icofont-phone"></i>
                <h4>Téléphone:</h4>
                <p>01 49 34 11 54</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" data-rule="minlen:4" data-msg="Entrez au moins 4 charactères" />
                  <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email" data-rule="email" data-msg="Entrez un Email valide" />
                  <div class="validate"></div>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Objet" data-rule="minlen:4" data-msg="Entrez au moins 8 charactères dans votre objet" />
                <div class="validate"></div>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Écrivez-nous quelque chose" placeholder="Message"></textarea>
                <div class="validate"></div>
              </div>
              <div class="mb-3">
                <div class="loading">Chargement</div>
                <div class="error-message"></div>
                <div class="sent-message">Votre message a bien été envoyé. Merci de votre investissement !</div>
              </div>
              <div class="text-center"><button type="submit">Envoyer message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

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
              <li><a href="index.php">Acceuil</a></li>
              <li><a href="about.php">à propos</a></li>
              <li><a href="contact.php">Contact</a></li>
              <li><a href="réservation.php">réservation</a></li>
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