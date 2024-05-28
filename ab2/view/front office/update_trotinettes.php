<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to the login page
    header('Location: http://localhost/test/pmv/view/Front_office/Contact.php'); // Change 'login.php' to the actual login page
    exit();
}
include '../../modele/trotinettes.php';
include '../../controlleur/trotinettesC.php';

// Create a trotinettes
$trotinettes = null;

// Create an instance of the controller
$trotinettesC = new TrotinettesC();

// Check if the form has been submitted
if (isset($_POST["submit"])) {
    // Check for the presence of required fields
    if (
        isset($_POST["marque"]) &&
        isset($_POST["modele"]) &&
        isset($_POST["num_serie"]) &&
        isset($_POST["duree"]) &&
        isset($_POST["date"]) &&
        isset($_POST["heure"])
    ) {
        // Check that required fields are not empty
        if (
            !empty($_POST["marque"]) &&
            !empty($_POST["modele"]) &&
            !empty($_POST["num_serie"]) &&
            !empty($_POST["duree"]) &&
            !empty($_POST["date"]) &&
            !empty($_POST["heure"])
        ) {
            // Use the correct parameter names when creating the trotinettes object
            $trotinettes = new Trotinettes();
            $trotinettes->setValues(
                $_POST["marque"],
                $_POST["modele"],
                $_POST["num_serie"],
                $_POST["duree"],
                $_POST["date"],
                $_POST["heure"]
            );

            // Update the trotinettes in the database
            $trotinettesC->updateTrotinettes($trotinettes, $_POST['id_location']);

            // Redirect to the list of trotinettes after the update
            header('Location: liste_trotinettes.php');
        }
    }
}

// Retrieve trotinettes data from the database
if (isset($_GET['id_location'])) {
    $oldTrotinettes = $trotinettesC->showTrotinettes($_GET['id_location']);
} else {
    // Handle the case where the trotinettes ID is not specified
    echo "ID du trotinettes non spécifié.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Trotinettes</title>

    <!-- Add links to Bootstrap CSS files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <style>
        body {
            /* Set your background image and size */
            background-image: url('trotinette2.jpg');
            background-size: cover;
            background-position: center;

            /* For modern browsers */
            background-color: rgba(255, 255, 255, 0.5);
            /* For older browsers */
            filter: alpha(opacity=50);
            /* Set your background image and size */
            background-image: url('trotinette2.jpg');
            background-size: cover;
            background-position: center;
            /* For modern browsers */
            background-color: rgba(255, 255, 255, 0.5);
            /* For older browsers */
            filter: alpha(opacity=50);
        }
    </style>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Update Trotinettes</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id_location" value="<?php echo $_GET['id_location']; ?>">
                            <div class="text-center mt-3">
                                <a href="liste_trotinettes.php" class="btn btn-secondary">Back to list</a>
                            </div>
                            <div class="form-group">
                                <label for="marque">Marque:</label>
                                <input type="text" class="form-control" id="marque" name="marque"
                                    value="<?php echo isset($_POST['marque']) ? $_POST['marque'] : $oldTrotinettes['marque']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="modele">Codele:</label>
                                <input type="text" class="form-control" id="modele" name="modele"
                                    value="<?php echo isset($_POST['modele']) ? $_POST['modele'] : $oldTrotinettes['modele']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="num_serie">Num_serie:</label>
                                <input type="tel" class="form-control" id="num_serie" name="num_serie"
                                    value="<?php echo isset($_POST['num_serie']) ? $_POST['num_serie'] : $oldTrotinettes['num_serie']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="duree">duree:</label>
                                <input type="text" class="form-control" id="duree" name="duree"
                                    value="<?php echo isset($_POST['duree']) ? $_POST['duree'] : $oldTrotinettes['duree']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" class="form-control" id="date" name="date"
                                    value="<?php echo isset($_POST['date']) ? $_POST['date'] : $oldTrotinettes['date']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="heure">Heure:</label>
                                <input type="time" class="form-control" id="heure" name="heure"
                                    value="<?php echo isset($_POST['heure']) ? $_POST['heure'] : $oldTrotinettes['heure']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Add links to Bootstrap JavaScript files (if needed) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="saisir_tro.js"></script>
</body>

</html>