<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to the login page
    header('Location: http://localhost/test/pmv/view/Front_office/Contact.php'); // Change 'login.php' to the actual login page
    exit();
}
 require_once('C:\xampp\htdocs\test\reservation_taxi\controller\reservationtrottinetteC.php');
  $reservationtrottinette = new reservationtrottinetteC(); 
 $tab = $reservationtrottinette->listereservationtrottinette()
 
 ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> table des utilisateurs </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="back_office/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="back_office/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="back_office/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
                <span class="ms-1 font-weight-bold text-white">Tableau de bord </span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="listereservationtrottinette.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Reservation Trottinette </span>
                    </a>
                </li>
              

                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">notifications</i>
                        </div>
                        <span class="nav-link-text ms-1">Notifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="#">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">assignment</i>
                        </div>
                        <span class="nav-link-text ms-1">Se deconnecter</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="sidenav-footer position-absolute w-100 bottom-0 ">
            <div class="mx-3">
                <a class="btn btn-outline-primary mt-4 w-100" href="#" type="button">Documentation</a>
            </div>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 align="center" class="text-white text-capitalize ps-3"> Table des reservations Trottinette </h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">CIN </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> numero </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">adresse</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> heure </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">duree</th>
                        
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Supprimer reservation trottinette</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"> details du reservation trottinette </th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"> mise a jour du reservation trottinette </th>
                                        </tr>
                                    </thead>
                                    <?php
                                    foreach ($tab as $reservationtrottinette) {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">
                                                                <?= $reservationtrottinette["CIN"]; ?>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs font-weight-bold mb-0">
                                                        <?= $reservationtrottinette["numero"]; ?>
                                                    </p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        <?= $reservationtrottinette["adresse"]; ?>
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        <?= $reservationtrottinette["heure"]; ?>
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">
                                                        <?= $reservationtrottinette["duree"]; ?>
                                                    </span>
                                                </td>
                                                

                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-success">
                                                        <a href="deletereservationtrottinette.php?CIN=<?php echo $reservationtrottinette['CIN']; ?>">ici</a>
                                                    </span>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-success">
                                                        <a href="showreservationtrottinette.php?CIN=<?php echo $reservationtrottinette['CIN']; ?>">ici </a>
                                                    </span>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="badge badge-sm bg-gradient-success">
                                                        <a href="updatereservationtrottinette.php?CIN=<?php echo $reservationtrottinette['CIN']; ?>"> ici </a>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php
                                    } ?>
                                        </tbody>
                                </table>
                                
                                <div class="pagination">
          
        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="back_office/assets/js/core/popper.min.js"></script>
    <script src="back_office/assets/js/core/bootstrap.min.js"></script>
    <script src="back_office/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="back_office/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

</body>

</html>