<?php


include '../../../controlleur/trotinettesC.php';
include '../../../modele/trotinettes.php';

// create trotinettes
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


        // -------- step 1 ------------
        // <<=================  ajouter une trotinette ================= >>
        $trotinettes = new Trotinettes(); // initialiser un objet trotinette vide
        $trotinettes->setValues($_POST["marque"], $_POST["modele"],
            $_POST["num_serie"], $_POST["duree"],
            $_POST["date"],
            $_POST["heure"]); // remplir l'objet trotinette en utilisant les champs du formulaire

        $trotinettesC->addTrotinettes($trotinettes); // ajouter cet objet (trotinette) à la base de donnée
        // <<================= fin ajouter trotinette ================== >>


        // ---- step 2: Partie 1 (trouver l'id correspondant du trotinette)
        $id = $trotinettesC->find_id_trotinette(); //trouver l'id du trotinette ajouté à la table trotinette

        // ---- step 2: Partie 2 (final)
        $localisation = new localisation(null, $id, $_POST["ville"], $_POST["adresse"]); // creer l'objet localisation et le remplir

        $localisationC = new localisationC();
        $localisationC->ajouter_localisation($localisation); // ajouter l'objet localisation à la table localisation


        header('Location:trotinette.php');
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
    <link rel="stylesheet" href="../../front office/bootstrap.min.css" />
    <link rel="stylesheet" href="../../front office/style2.css">
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
        <form action="" method="POST">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Détails du trotinettes</h5>
                    <div class="form-group">
                        <label for="marque"><i class="uil uil-user"></i> Marque</label>
                        <input class="form-control" type="text" id="marque" name="marque"
                            placeholder="Entrez le marque">
                    </div>
                    <div class="form-group">
                        <label for="modele"><i class="uil uil-user"></i> Modele</label>
                        <input class="form-control" type="text" id="modele" name="modele"
                            placeholder="Entrez le modele">
                    </div>

                    <!-- les champs ville et adresse de la table localisation -->
                    <div class="form-group">
                        <label for="ville"><i class="uil uil-user"></i> Ville</label>
                        <input class="form-control" type="text" id="ville" name="ville" placeholder="Entrez la ville">
                    </div>

                    <div class="form-group">
                        <label for="adresse"><i class="uil uil-user"></i> Adresse</label>
                        <input class="form-control" type="text" id="adresse" name="adresse"
                            placeholder="Entrez l'adresse">
                    </div>
                    <!-- ********************************************************* -->


                    <div class="form-group">
                        <label for="num_serie"><i class="uil uil-phone"></i> Num_serie</label>
                        <input class="form-control" type="text" id="num_serie" name="num_serie"
                            placeholder="Entrez le num_serie">
                    </div>
                    <div class="form-group">
                        <label for="duree"><i class="uil uil-hospital"></i> duree</label>
                        <input class="form-control" type="text" id="duree" name="duree" placeholder="Entrez le duree">
                    </div>
                    <div class="form-group">
                        <label for="date"><i class="uil uil-calendar"></i> Date</label>
                        <input class="form-control" type="date" id="date" name="date">
                    </div>
                    <div class="form-group">
                        <label for="heure"><i class="uil uil-clock"></i> Heure</label>
                        <input class="form-control" type="time" id="heure" name="heure">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit" onclick="return validateForm()">Ajouter
                            le trotinettes</button>
                    </div>
                </div>
                <div class="form-group" style="margin-left:1rem;margin-top:-7px;">
                    <a href="trotinette.php" class="btn btn-primary btn-block">Annuler</a>
                </div>
            </div>
        </form>
    </div>

</body>

<script>
    function validateForm() {
        var marque = document.getElementById('marque').value;
        var modele = document.getElementById('modele').value;
        var num_serie = document.getElementById('num_serie').value;
        var duree = document.getElementById('duree').value;
        var date = document.getElementById('date').value;
        var heure = document.getElementById('heure').value;

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