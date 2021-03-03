<?php include "inc/header_1.php"; ?>

<?php include "inc/navbar.php"; ?>

<?php require_once 'model/Functions.php'; ?>

<main id="main">
    <div class="container">

            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Heureux de vous revoir !</h1>
                                    </div>
                                    <form id="form" class="user" method="post" action="../traitement/traitement_login.php">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                   name="username" placeholder="Entrer votre pseudo ou email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                   name="password" placeholder="Mot de passe">
                                        </div>
                                        <a href="javascript:;" onclick="document.getElementById('form').submit()" class="btn btn-primary btn-user btn-block">
                                            Connectez-vous
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Mot de passe oublié??</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Créer un compte!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

    </div>
</main><!-- End #main -->

<?php include 'inc/footer.php'; ?>