<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to the login page
    header('Location: ../view/Front_office/Contact.php'); // Change 'login.php' to the actual login page
    exit();
}
require_once('C:\xampp\htdocs\test\pmv\controller\userC.php');
require_once('C:\xampp\htdocs\test\pmv\model\user.php');

$user = null;
$userC = new UserC();
if (
    isset($_POST["name"]) &&
    isset($_POST["email"]) &&
    isset($_POST["text-af00"]) &&
    isset($_POST["text-7bd6"]) &&
    isset($_POST["phone"]) &&
    isset($_POST["select"]) &&
    isset($_POST["select-1"])
) {
    if (
        !empty($_POST["name"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["text-af00"]) &&
        !empty($_POST["text-7bd6"]) &&
        !empty($_POST["phone"]) &&
        !empty($_POST["select"]) &&
        !empty($_POST["select-1"])
    ) {
        $user = new user(
            $_POST["text-7bd6"],
            $_POST["name"],
            $_POST["email"],
            $_POST["text-af00"],
            $_POST["phone"],
            $_POST["select"],
            $_POST["select-1"]
        );
        $userC->updateuser($user, $_GET['cin_user']);
        header('Location: listeuser.php');
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
                    <a class="nav-link text-white active bg-gradient-primary" href="../pages/tables.html">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">table_view</i>
                        </div>
                        <span class="nav-link-text ms-1">Configuration des comptes </span>
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
                    <a class="nav-link text-white " href="../../pmv/view/Front_office/deconnecter.php">
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
                                    <h6 class="mb-0">Mise a jour du compte </h6>
                                </div>
                                <div class="col-6 text-end">
                                    <button class="btn btn-outline-primary btn-sm mb-0"> <a href="listeuser.php"> Retour
                                            à la liste </a></button>
                                    <?php
                                    if (isset($_GET['cin_user'])) {
                                        $olduser = $userC->showuser($_GET['cin_user']);
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
                                                        <td><label for="text-7bd6">cin :</label></td>
                                                    </h6>
                                                    <span class="text-xs">
                                                        <td>
                                                            <input type="text" id="text-7bd6" name="text-7bd6"
                                                                value="<?php echo $_GET['cin_user'] ?>" readonly />
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
                                                        <td><label for="name">Nom :</label></td>
                                                    </h6>
                                                    <span class="text-xs">
                                                        <td>
                                                            <input type="text" id="name" name="name"
                                                                value="<?php echo $olduser['nom_user'] ?>" />
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
                                                        <td><label for="email"> email :</label></td>
                                                    </h6>
                                                    <span class="text-xs">
                                                        <td>
                                                            <input type="email" id="email" name="email"
                                                                value="<?php echo $olduser['email_user'] ?>" />
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
                                                        <td><label for="phone">phone :</label></td>
                                                    </h6>
                                                    <span class="text-xs">
                                                        <td>
                                                            <input type="tel" id="phone" name="phone"
                                                                value="<?php echo $olduser['tel_user'] ?>" />
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
                                                        <td><label for="text-af00">mot de passe :</label></td>
                                                    </h6>
                                                    <span class="text-xs">
                                                        <td>
                                                            <input type="text" id="text-af00" name="text-af00"
                                                                value="<?php echo $olduser['mdp_user'] ?>" />
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
                                                        <td>
                                                            <label for="select-ef80">Sexe :</label>
                                                            <select id="select-ef80" name="select">
                                                                <option value="H" <?php if ($olduser['sexe_user'] == 'H')
                                                                    echo 'selected' ?>>Homme</option>
                                                                    <option value="F" <?php if ($olduser['sexe_user'] == 'F')
                                                                    echo 'selected' ?>>Femme
                                                                    </option>
                                                                </select>
                                                            </td>
                                                        </h6>
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
                                                            <td>
                                                                <label for="select-9b1e">S'inscrire en tant que :</label>
                                                                <select id="select-9b1e" name="select-1">
                                                                    <option value="T" <?php if ($olduser['role_user'] == 'T')
                                                                    echo 'selected' ?>>taxite</option>
                                                                    <option value="B" <?php if ($olduser['role_user'] == 'B')
                                                                    echo 'selected' ?>>Beneficiaire</option>
                                                                    <option value="A" <?php if ($olduser['role_user'] == 'A')
                                                                    echo 'selected' ?>>admin</option>
                                                                </select>
                                                            </td>
                                                        </h6>
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