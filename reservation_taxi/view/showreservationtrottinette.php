<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  // If not logged in, redirect to the login page
  header('Location: http://localhost/test/pmv/view/Front_office/Contact.php'); // Change 'login.php' to the actual login page
  exit();
}
require_once('C:\xampp\htdocs\test\reservation_taxi\controller\reservationtrottinetteC.php');
require_once('C:\xampp\htdocs\test\reservation_taxi\model\reservationtrottinette.php');
$CIN = $_GET['CIN'];
$reservationtrottinetteC = new reservationtrottinetteC();
$reservationtrottinette = $reservationtrottinetteC->showreservationtrottinette($CIN);


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="back_office/assets/img/apple-icon.png">
  <title>
    tableau de bord
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
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
  <aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
        target="_blank">
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
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0"> Details de la reservation </h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm"> CIN :
                      <?= $reservationtrottinette["CIN"]; ?>
                    </h6>
                    <span class="mb-2 text-xs">numero : <span class="text-dark font-weight-bold ms-sm-2">
                        <?= $reservationtrottinette["numero"]; ?>
                      </span></span>
                    <span class="mb-2 text-xs">adresse : <span class="text-dark ms-sm-2 font-weight-bold">
                        <?= $reservationtrottinette["adresse"]; ?>
                      </span></span>
                    <span class="mb-2 text-xs"> heure : <span class="text-dark ms-sm-2 font-weight-bold">
                        <?= $reservationtrottinette["heure"]; ?>
                      </span></span>
                    <span class="mb-2 text-xs">duree: <span class="text-dark font-weight-bold ms-sm-2">
                        <?= $reservationtrottinette["duree"]; ?>
                      </span></span>

                  </div>
                </li>
              </ul>
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
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="back_office/assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>