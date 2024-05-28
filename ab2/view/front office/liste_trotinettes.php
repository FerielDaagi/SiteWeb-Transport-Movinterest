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

$c = new TrotinettesC();
$tab = $c->listTrotinettes();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Liste des trotinettes</title>

</head>
<style>
    body {
        /* Set your background image and size */
        background-image: url('trotinette.jpg');
        background-size: cover;
        background-position: center;

        /* For modern browsers */
        background-color: rgba(255, 255, 255, 0.5);
        /* For older browsers */
        filter: alpha(opacity=50);
        /* Set your background image and size */
        background-image: url('trotinette.jpg');
        background-size: cover;
        background-position: center;
        /* For modern browsers */
        background-color: rgba(255, 255, 255, 0.5);
        /* For older browsers */
        filter: alpha(opacity=50);
    }

    .container {
        background-color: white;
        border-radius: 40px;
        padding: 70px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .custom-table {
        width: 120%;
        margin-top: 40px;
        margin-right: 60px;
    }

    .custom-link {
        color: #fff;



    }
</style>

<body>
    <div class="container mt-5 center-content">
        <h1 class="text-center">Liste des trotinettes</h1>
        <h2 class="text-center">
            <a href="add_trotinettes.php" class="btn btn-primary">Prendre un trotinettes</a>
        </h2>

        <table class="table custom-table">
            <thead class="thead-dark">
                <tr>
                    <th>Id location</th>
                    <th>Marque</th>
                    <th>Modele</th>
                    <th>Num_serie</th>
                    <th>duree</th>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($tab as $trotinettes): ?>
                    <tr>
                        <td>
                            <?= $trotinettes['id_location']; ?>
                        </td>
                        <td>
                            <?= $trotinettes['marque']; ?>
                        </td>
                        <td>
                            <?= $trotinettes['modele']; ?>
                        </td>
                        <td>
                            <?= $trotinettes['num_serie']; ?>
                        </td>
                        <td>
                            <?= $trotinettes['duree']; ?>
                        </td>
                        <td>
                            <?= $trotinettes['date']; ?>
                        </td>
                        <td>
                            <?= $trotinettes['heure']; ?>
                        </td>
                        <td>
                            <a href="update_trotinettes.php?id_location=<?= $trotinettes['id_location']; ?>"
                                class="btn btn-primary custom-link">Update</a>
                        </td>
                        <td>
                            <a href="delete_trotinettes.php?id_location=<?= $trotinettes['id_location']; ?>"
                                class="btn btn-primary custom-link">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Include Bootstrap scripts (jQuery and Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>