<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to the login page
    header('Location: http://localhost/test/pmv/view/Front_office/Contact.php'); // Change 'login.php' to the actual login page
    exit();
}
//include '../../modele/trotinettes.php';
include '../../controlleur/trotinettesC.php';

$trotinettesC = new TrotinettesC();
$trotinettesC->deleteTrotinettes($_GET["id_location"]);
header('Location: liste_trotinettes.php');
?>