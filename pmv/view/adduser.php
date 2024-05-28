<?php
session_start();
// Récupérer la valeur du captcha stockée dans la session
$captcha = $_SESSION['captcha'];

// Vérifier le formulaire lorsque soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer la valeur du captcha soumise par l'utilisateur
    $userCaptcha = $_POST['captcha_input'];

    // Comparer les deux valeurs
    if ($userCaptcha == $captcha) {
        // La valeur du captcha est correcte

        // Ajouter l'utilisateur à la base de données
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
                // All required fields are set and not empty

                // Assuming you have a User class with appropriate setters
                $user = new user(
                    $_POST["text-7bd6"],
                    $_POST["name"],
                    $_POST["email"],
                    $_POST["text-af00"],
                    $_POST["phone"],
                    $_POST["select"],
                    $_POST["select-1"]
                );
                // Add user logic
                $userC->addUser($user);
                header('Location: ../view/Front_office/contact.php');
            }
        }
    } else { ?>

        <script> alert("veuillez verifier votre Capcha ")
            window.location.href = '../view/Front_office/Sinscrire.php';
        </script>
        <?php

    }
}
?>