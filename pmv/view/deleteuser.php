<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to the login page
    header('Location: ../view/Front_office/Contact.php'); // Change 'login.php' to the actual login page
    exit();
}
require_once('C:\xampp\htdocs\test\pmv\controller\userC.php');
$userC = new UserC();
$userC->deleteuser($_GET['cin_user']);
header('Location: listeuser.php');




?>