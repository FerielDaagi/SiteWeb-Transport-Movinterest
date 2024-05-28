<?php
include '../../../controlleur/trotinettesC.php';
include '../../../modele/trotinettes.php';

// Create a trotinettes
$trotinettes = null;

// Create an instance of the controller
$trotinettesC = new TrotinettesC();
$localisationC = new localisationC();

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


            
            $id_location = $_GET['id_location'];
            $id_link_tab = $localisationC->jointure($id_location);// trouver la localisation où id_location = $id_location
            
            $id_localisation = $id_link_tab["id_localisation"];
            
            $local = new localisation(null,$id_location,$_POST["ville"],$_POST["adresse"]);// creer et remplir un objet localisation

            $localisationC->updatelocalisation($id_localisation, $id_location, $local); // update dans la base de donnée



            // Redirect to the list of trotinettes after the update
            header('Location:trotinette.php');
        }
    }
}

// Retrieve trotinettes data from the database
if (isset($_GET['id_location'])) {
    $oldTrotinettes = $trotinettesC->showTrotinettes($_GET['id_location']);
    $old_Localisation = $localisationC->jointure($_GET['id_location']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Trotinettes</title>
    <link rel="stylesheet" href="../../front office/bootstrap.min.css" />
    <link rel="stylesheet" href="../../front office/style2.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

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

    <div class="container mt-5" >
        <div class="row justify-content-center" style="margin-top:-2.5rem">
            <div class="col-md-8">
                <div class="card">
                    <div class="text-center mt-4 mb-4">
                        <h3 class="p-3 mb-2 bg-warning text-dark">Update Trotinettes</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <input type="hidden" name="id_location" value="<?php echo $_GET['id_location']; ?>">
                            
                            <div class="form-group">
                                <label for="marque">Marque:</label>
                                <input type="text" class="form-control" id="marque" name="marque" value="<?php echo isset($_POST['marque']) ? $_POST['marque'] : $oldTrotinettes['marque']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="modele">Modele:</label>
                                <input type="text" class="form-control" id="modele" name="modele" value="<?php echo isset($_POST['modele']) ? $_POST['modele'] : $oldTrotinettes['modele']; ?>">
                            </div>


                            <!-- les champs ville et adresse de la table localisation -->
                            <div class="form-group">
                                <label for="ville"><i class="uil uil-user"></i> Ville</label>
                                <input class="form-control" type="text" id="ville" name="ville" value="<?php echo isset($_POST['ville']) ? $_POST['ville'] : $old_Localisation['ville']; ?>">
                            </div>

                            <div class="form-group">
                                <label for="adresse"><i class="uil uil-user"></i> Adresse</label>
                                <input class="form-control" type="text" id="adresse" name="adresse" value="<?php echo isset($_POST['adresse']) ? $_POST['adresse'] : $old_Localisation['adresse']; ?>">
                            </div>
                            <!-- ********************************************************* -->
                    

                            <div class="form-group">
                                <label for="num_serie">Numero de serie:</label>
                                <input type="tel" class="form-control" id="num_serie" name="num_serie" value="<?php echo isset($_POST['num_serie']) ? $_POST['num_serie'] : $oldTrotinettes['num_serie']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="duree">duree:</label>
                                <input type="text" class="form-control" id="duree" name="duree" value="<?php echo isset($_POST['duree']) ? $_POST['duree'] : $oldTrotinettes['duree']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="date">Date:</label>
                                <input type="date" class="form-control" id="date" name="date" value="<?php echo isset($_POST['date']) ? $_POST['date'] : $oldTrotinettes['date']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="heure">Heure:</label>
                                <input type="time" class="form-control" id="heure" name="heure" value="<?php echo isset($_POST['heure']) ? $_POST['heure'] : $oldTrotinettes['heure']; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary bg-warning btn-block" name="submit" onclick="return validateForm()">Sauvegarder</button>
                            <div class="text-center mt-3">
                                <a href="trotinette.php" class="btn btn-primary bg-warning btn-block">Annuler</a>
                            </div>
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
<script>
    function validateForm() {
        var marque = document.getElementById('marque').value;
        var modele = document.getElementById('modele').value;
        var num_serie = document.getElementById('num_serie').value;
        var duree = document.getElementById('duree').value;
        var date = document.getElementById('date').value;
        var heure = document.getElementById('heure').value;
        var ville = document.getElementById('ville').value;
        var adresse = document.getElementById('adresse').value;
        

        // Validation marque
        if (marque.trim() === '') {
            alert('Veuillez saisir une marque');
            return false;
        }
        if (!/^[A-Z][a-zA-Z\s]*$/.test(marque)) {
            alert('La marque doit commencer par une majuscule et ne peut contenir que des lettres.');
            return false;
        }

        // Validation modele
        if (modele.trim() === '') {
            alert('Veuillez saisir un modèle');
            return false;
        }
        // Validation num_serie
        if (num_serie === '') {
            alert('Veuillez saisir un numéro de série');
            return false;
        }
        if (num_serie.length !== 12 || isNaN(num_serie)) {
            alert('Le numéro de série doit avoir une longueur de 12 caractères et être numérique');
            return false;
        }

        // Validation duree
        if (duree === '' || isNaN(duree) || duree.length > 5) {
            alert('Veuillez saisir une durée valide (numérique, longueur < 5 caractères)');
            return false;
        }

        // Validation date
        if (date === '') {
            alert('Veuillez saisir une date');
            return false;
        }

        // Validation heure
        if (heure === '') {
            alert('Veuillez saisir une heure');
            return false;
        }

        // Validation ville
        if (ville.trim() === '') {
            alert('Veuillez saisir une ville');
            return false;
        }
        if (!/^[A-Za-z\s]{1,20}$/.test(ville)) {
            alert('La ville doit être alphabétique et avoir une longueur maximale de 20 caractères.');
            return false;
        }

        // Validation adresse
        if (adresse.trim() === '') {
            alert('Veuillez saisir une adresse');
            return false;
        }
        if (adresse.length > 30) {
            alert('L\'adresse ne peut pas dépasser 30 caractères.');
            return false;
        }
        // If all validations pass, the form is valid
        return true;
    }
</script>
</html>