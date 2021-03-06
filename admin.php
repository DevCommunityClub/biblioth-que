<?php include 'inc/sidenav.php'; ?>

<?php include 'inc/header.php'; ?>

<?php require_once 'model/Functions.php'; ?>

        <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Utilisateurs</h1>
                <p class="mb-4">Dans cette section, vous trouverez les utilisateurs présent dans votre base de donnée.</p>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Utilisateurs</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php
                            $function = new Functions();
                            $function->fetch_user();
                            $a = $function->getReq();
                            ?>
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Mail</th>
                                    <th>Rôle</th>
                                    <th>Modification</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count_1 = count($a);
                                for ($i=0;$i<$count_1;$i++){

                                    if ($a[$i]['role'] == 1){
                                        $a[$i]['role'] = "admin";
                                    }
                                    elseif ($a[$i]['role'] == 2){
                                        $a[$i]['role'] = "user";
                                    }

                                    echo '<tr>';
                                    echo '<td>'.$a[$i]['id'].'</td>';
                                    echo '<td>'.$a[$i]['username'].'</td>';
                                    echo '<td>'.$a[$i]['nom'].'</td>';
                                    echo '<td>'.$a[$i]['prenom'].'</td>';
                                    echo '<td>'.$a[$i]['mail'].'</td>';
                                    echo '<td>'.$a[$i]['role'].'</td>';
                                    echo '<td>
                                          <form action="traitement/traitement_suppression.php" method="post" id="form">
                                            <input name="id" hidden value="' .$a[$i]['id'].'">
                                            <button document.getElementById("form").submit();">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                          </form>
                                          </td>';
                                    echo '</tr>';
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Username</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Mail</th>
                                    <th>Rôle</th>
                                    <th>Modification</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Bootstrap core JavaScript-->
<script src="./assets/vendor/jquery/jquery.min.js"></script>
<script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="./assets/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="./js/sb-admin-2.min.js"></script>
<!-- Page level plugins -->
<script src="./assets/vendor/chart.js/Chart.min.js"></script>
<!-- Page level custom scripts -->
<script src="./js/demo/chart-area-demo.js"></script>
<script src="./js/demo/chart-pie-demo.js"></script>
</body>

</html>