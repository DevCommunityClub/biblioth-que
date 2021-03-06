<?php include "inc/header_1.php"; ?>

<?php include "inc/navbar.php"; ?>

<?php require_once 'model/Functions.php'; ?>

<main id="main">
    <div class="container pt-2">

            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Modifier vos information !</h1>
                                    </div>
                                    <form class="user" id="form" method="post" action="traitement/traitement_modification.php">
                                        <div class="form-group row mb-2">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                                       name="nom" placeholder="Nom *">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user" id="exampleLastName"
                                                       name="prenom" placeholder="Prénom *">
                                            </div>
                                        </div>
                                        <div class="form-group mb-2">
                                            <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                                   name="username" placeholder="username *">
                                        </div>
                                        <div class="form-group mb-2">
                                            <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                                   name="mail" placeholder="Email Address *">
                                        </div>
                                        <div class="form-group row mb-2">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="password" class="form-control form-control-user"
                                                       name="password" id="exampleInputPassword" placeholder="Password *">
                                            </div>
                                            <div class="col-sm-6 mb-2">
                                                <input type="password" class="form-control form-control-user"
                                                       name="repassword" id="exampleRepeatPassword" placeholder="Repeat Password *">
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Modifier">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <p class="small text-muted">* Information obligatoire</p>
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