<?php
//include '../../backoffice';
//include '../modele/trotinettes.php';
//include 'C:\xampp/htdocs/test/ab2/view/backoffice/trotinette/add_trotinettes.php';
// create trotinettes
session_start();
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to the login page
    header('Location: http://localhost/test/pmv/view/Front_office/Contact.php'); // Change 'login.php' to the actual login page
    exit();
}
include '../../modele/trotinettes.php';
include '../../controlleur/trotinettesC.php';

$trotinettes = null;

// create an instance of the controller
$trotinettesC = new TrotinettesC();

if (
    isset($_POST["marque"]) &&
    isset($_POST["modele"]) &&
    isset($_POST["num_serie"]) &&
    isset($_POST["duree"]) &&
    isset($_POST["date"]) &&
    isset($_POST["heure"])
) {
    if (
        !empty($_POST["marque"]) &&
        !empty($_POST["modele"]) &&
        !empty($_POST["num_serie"]) &&
        !empty($_POST["duree"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["heure"])
    ) {
        echo 'start saving';
        $trotinettes = new Trotinettes();
        $trotinettes->setValues(
            $_POST["marque"],
            $_POST["modele"],
            $_POST["num_serie"],
            $_POST["duree"],
            $_POST["date"],
            $_POST["heure"]
        );
        /*print_r($trotinettes);
        return;*/
        $trotinettesC->addTrotinettes($trotinettes);
        header('Location: liste_trotinettes.php');
    } else {
        // Display an error message if fields are empty
        echo 'Erreur : Veuillez remplir tous les champs.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Formulaire d'ajout de trotinettes</title>

</head>

<body>
    <style>
        body {
            /* Set your background image and size */
            background-image: url('trotinette1.jpg');
            background-size: cover;
            background-position: center;

            /* For modern browsers */
            background-color: rgba(255, 255, 255, 0.5);
            /* For older browsers */
            filter: alpha(opacity=50);
            /* Set your background image and size */
            background-image: url('trotinette1.jpg');
            background-size: cover;
            background-position: center;
            /* For modern browsers */
            background-color: rgba(255, 255, 255, 0.5);
            /* For older browsers */
            filter: alpha(opacity=50);
        }
    </style>
    <div class="container">
        <header class="text-center mt-4 mb-4">Ajout de trotinettes</header>
        <form action="" method="POST" onsubmit="return validateForm()">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Détails du trotinettes</h5>
                    <div class="form-group">
                        <label for="marque"><i class="uil uil-user"></i> Marque</label>
                        <input class="form-control" type="text" id="marque" name="marque" placeholder="Entrez le marque"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="modele"><i class="uil uil-user"></i> Modele</label>
                        <input class="form-control" type="text" id="modele" name="modele" placeholder="Entrez le modele"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="num_serie"><i class="uil uil-phone"></i> Num_serie</label>
                        <input class="form-control" type="tel" id="num_serie" name="num_serie"
                            placeholder="Entrez le num_serie" required>
                    </div>
                    <div class="form-group">
                        <label for="duree"><i class="uil uil-hospital"></i> duree</label>
                        <input class="form-control" type="text" id="duree" name="duree" placeholder="Entrez le duree"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="date"><i class="uil uil-calendar"></i> Date</label>
                        <input class="form-control" type="date" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="heure"><i class="uil uil-clock"></i> Heure</label>
                        <input class="form-control" type="time" id="heure" name="heure" required>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Ajouter le trotinettes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="saisir_tro.js"></script>
</body>

</html>