<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to the login page
    header('Location: http://localhost/test/pmv/view/Front_office/Contact.php'); // Change 'login.php' to the actual login page
    exit();
}
require_once('C:\xampp\htdocs\test\reservation_taxi\controller\reservationtrottinetteC.php');
$reservationtrottinetteC = new reservationtrottinetteC();
$reservationtrottinetteC = $reservationtrottinetteC->deletereservationtrottinette($_GET['CIN']);
header('Location: listereservationtrottinette.php');



?>