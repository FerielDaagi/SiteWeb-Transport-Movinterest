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

// create 
$reservationtrottinette = null;
// create an instance of the controller
$reservationtrottinetteC = new reservationtrottinetteC();

if (
    isset($_POST["heure"]) &&
    isset($_POST["numero"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["CIN"]) &&
    isset($_POST["duree"])
) {
    if (
        !empty($_POST["heure"]) &&
        !empty($_POST["numero"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["CIN"]) &&
        !empty($_POST["duree"])
    ) {

        $reservationtrottinette = new reservationtrottinette(
            $_POST["CIN"],
            $_POST["heure"],
            $_POST["duree"],
            $_POST["adresse"],
            $_POST["numero"]
        );

        $reservationtrottinetteC->updatereservationtrottinette($reservationtrottinette, $_GET['CIN']);

        header('Location: listereservationtrottinette.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
        Tableau de bord
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
                    <a class="nav-link text-white" href="listereservationtrottinette.php">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Reservation Trottinette </span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-white " href="../pages/notifications.html">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">notifications</i>
                        </div>
                        <span class="nav-link-text ms-1">Notifications</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white " href="../pages/sign-up.html">
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
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-header pb-0 p-3">
                            <div class="row">
                                <div class="col-6 d-flex align-items-center">
                                    <h6 class="mb-0">Mise a jour du reservation </h6>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn btn-outline-primary btn-sm mb-0"> <a
                                            href="listereservationtrottinette.php"> Retour
                                            à la liste </a></button>
                                    <?php
                                    if (isset($_GET['CIN'])) {
                                        $oldreservationtrottinette = $reservationtrottinetteC->showreservationtrottinette($_GET['CIN']);
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <form action="" method="POST">
                                <div class="card-body p-3 pb-0">
                                    <ul class="list-group">
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex flex-column">
                                                <tr>
                                                    <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                        <td><label for="CIN"> CIN :</label></td>
                                                    </h6>
                                                    <span class="text-xs">
                                                        <td>
                                                            <input type="text" id="CIN" name="CIN"
                                                                value="<?php echo $oldreservationtrottinette['CIN'] ?>"
                                                                readonly />
                                                        </td>
                                                    </span>
                                                </tr>
                                            </div>
                                        </li>
                                    </ul>

                                    <ul class="list-group">
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex flex-column">
                                                <tr>
                                                    <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                        <td><label for="heure"> heure :</label></td>
                                                    </h6>
                                                    <span class="text-xs">
                                                        <td>
                                                            <input type="heure" id="heure" name="heure"
                                                                value="<?php echo $oldreservationtrottinette['heure'] ?>" />
                                                        </td>
                                                    </span>
                                                </tr>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-group">
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex flex-column">
                                                <tr>
                                                    <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                        <td><label for="adresse"> adresse :</label></td>
                                                    </h6>
                                                    <span class="text-xs">
                                                        <td>
                                                            <input type="text" id="adresse" name="adresse"
                                                                value="<?php echo $oldreservationtrottinette['adresse'] ?>" />
                                                        </td>
                                                    </span>
                                                </tr>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-group">
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex flex-column">
                                                <tr>
                                                    <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                        <td><label for="numero"> numero :</label></td>
                                                    </h6>
                                                    <span class="text-xs">
                                                        <td>
                                                            <input type="text" id="numero" name="numero"
                                                                value="<?php echo $oldreservationtrottinette['numero'] ?>" />
                                                        </td>
                                                    </span>
                                                </tr>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-group">
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex flex-column">
                                                <tr>
                                                    <h6 class="mb-1 text-dark font-weight-bold text-sm">
                                                        <td><label for="duree"> duree :</label></td>
                                                    </h6>
                                                    <span class="text-xs">
                                                        <td>
                                                            <input type="text" id="duree" name="duree"
                                                                value="<?php echo $oldreservationtrottinette['duree'] ?>" />
                                                        </td>
                                                    </span>
                                                </tr>
                                            </div>
                                        </li>
                                    </ul>


                                </div>
                                <ul>
                                    <input class="btn btn-outline-primary btn-sm mb-0" type="submit" value="Update">
                                    <input class="btn btn-outline-primary btn-sm mb-0" type="reset" value="Reset">

                                </ul>

                            </form>
                        <?php }
                                    ?>
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