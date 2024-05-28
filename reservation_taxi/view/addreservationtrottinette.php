<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to the login page
    header('Location: http://localhost/test/pmv/view/Front_office/Contact.php'); // Change 'login.php' to the actual login page
    exit();
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
var_dump($_POST);
require_once('C:\xampp\htdocs\test\reservation_taxi\controller\reservationtrottinetteC.php');
require_once('C:\xampp\htdocs\test\reservation_taxi\model\reservationtrottinette.php');

$reservationtrottniette = null;
$reservationtrottinetteC = new reservationtrottinetteC();
if (
    isset($_POST["CIN"]) &&
    isset($_POST["heure"]) &&
    isset($_POST["duree"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["numero"])

) {
    if (
        !empty($_POST["CIN"]) &&
        !empty($_POST["heure"]) &&
        !empty($_POST["duree"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["numero"])

    ) {
        // All required fields are set and not empty

        // Assuming you have a reservationtaxi class with appropriate setters
        $reservationtrottinette = new reservationtrottinette(
            $_POST["CIN"],
            $_POST["heure"],
            $_POST["duree"],
            $_POST["adresse"],
            $_POST["numero"]
        );
        $reservationtrottinetteC->addreservationtrottinette($reservationtrottinette);
        echo " <script> alert('Votre reservation bien passe '); </script>";
        header('Location: http://localhost/test/reservation_taxi/view/front-office/done.html');
    }

    header('Location: http://localhost/test/reservation_taxi/view/front-office/done.html');
}

?>