<?php
session_start();
// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // If not logged in, redirect to the login page
    header('Location: http://localhost/test/pmv/view/Front_office/Contact.php'); // Change 'login.php' to the actual login page
    exit();
}
include "../../../controlleur/trotinettesC.php";


$c = new TrotinettesC();
$tab = $c->listTrotinettes();

// <<=========================== debut filter ===========================>>

$selectedOption = "select filter"; // the default filter value is null
if (isset($_POST["submit_filter"])) {
    if (isset($_POST["filtre"])) { // Check if the 'filtre' key exists in the $_POST array
        $selectedOption = $_POST["filtre"]; // get the selected option
        if ($selectedOption === 'select filter') { // non filtre
            $tab = $c->listTrotinettes();
        } else if ($selectedOption === 'Marque Ascendant') { //  Marque Ascendant
            $tab = $c->filter_Marque_ASC();
        } else if ($selectedOption === 'Marque Descendant') { // Marque Descendant
            $tab = $c->filter_Marque_DESC();
        } else if ($selectedOption === 'Modele Ascendant') { // Modele Ascendant
            $tab = $c->filter_Modele_ASC();
        } else if ($selectedOption === 'Modele Descendant') { // Modele Descendant
            $tab = $c->filter_Modele_DESC();
        } else if ($selectedOption === 'Duree Ascendant') { // Duree Ascendant
            $tab = $c->filter_Duree_ASC();
        } else if ($selectedOption === 'Duree Descendant') { // Duree Descendant
            $tab = $c->filter_Duree_DESC();
        } else if ($selectedOption === 'Numero de serie Ascendant') { // Numero de serie Ascendant
            $tab = $c->filter_num_serie_ASC();
        } else if ($selectedOption === 'Numero de serie Descendant') { // Numero de serie Descendant
            $tab = $c->filter_num_serie_DESC();
        }
    }
}
// <<=========================== fin filter ===========================>>



// <<===================== debut search field =====================>>
if (isset($_POST["submit"])) {
    $search_value = $_POST["search_field"];
    $tab = $c->search($search_value); // afficher la table trotinette où où (marque = $recherche) ou (modele = $recherche) ou (num_serie = recherche)
}
// <<===================== fin search field =====================>>



if (isset($_POST["submit_date"])) {
    $date = $_POST["date_input"];
    if ($date) { // si la date n'est pas vide, afficher la table trotinette où la date = $date
        $tab = $c->filter_date($date);
    } else { // si la date est vide , afficher la table trotinette par defaut sans filtre_date
        $tab = $c->listTrotinettes();
    }
}


$local = new TrotinettesC();
$liste_localisation = $local->lister_localisation(); // afficher les villes dans la barre select (select de jointure)
if (isset($_POST["boutton_jointure"])) {
    $ville = $_POST["select_jointure"]; // $ville = la valeur de la barre select (name ="select_jointure")
    $tab = $local->jointure($ville); // afficher la table trotinette ou l'id_location se trouve dans la table localisation ET le champ ville dans la table localisation = $ville
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Trotinette</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="../index.php">
                        <span class="icon">
                            <img src="../assets/imgs/camion-de-livraison.png" class="logo">
                        </span>
                        <span class="title">Transports</span>
                    </a>
                </li>

                <li>
                    <a href="../index.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Clients</span>
                    </a>
                </li>

                <li class="hovered">
                    <a href="trotinette.php">
                        <span class="icon">
                            <img src="../assets/imgs/trottinette.png" class="trotinette">
                        </span>
                        <span class="title">Trotinettes</span>
                    </a>
                </li>

                <li>
                    <a href="http://localhost/test/pmv/view/Front_office/deconnecter.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">deconnecter</span>
                    </a>
                </li>
            </ul>
        </div>


        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>


                <!-- << ========================  debut barre de recherche (search) ========================>>  -->
                <div class="search">
                    <form action="" method="POST">
                        <label>
                            <input type="text" name="search_field" placeholder="Search here" autocomplete="off">
                            <ion-icon name="search-outline"></ion-icon>
                            <button class="search-btn" name="submit" type="submit" hidden></button>
                        </label>
                    </form>
                </div>
                <!-- << ========================  fin barre de recherche (search) ========================>>  -->



                <!-- <<========================= debut fomulaire jointure ========================>> -->
                <div class="jointure">
                    <form action="" method="POST">
                        <select name="select_jointure">
                            <?php
                            foreach ($liste_localisation as $localisation_ville) { ?>
                                <option value='<?= $localisation_ville['ville'] ?>'>
                                    <?= $localisation_ville["ville"] ?>
                                </option>
                            <?php } ?>
                        </select>
                        <input type="submit" name="boutton_jointure" value="jointure">
                    </form>
                </div>
                <!-- <<========================= fin fomulaire jointure ========================>> -->





                <!-- <<=============================== debut filtre date =============================>> -->
                <form action="" method="POST">
                    <div class="date-champs">
                        <input type="date" name="date_input">
                        <input type="submit" name="submit_date" class="submit_date" value="filter">
                    </div>
                </form>
                <!-- <<=============================== fin filtre date =============================>> -->






                <!-- ========================= debut filter select ==================== -->
                <div class="filter-div">
                    <form action="" method="POST">
                        <select name="filtre">
                            <option hidden>
                                <?= $selectedOption ?>
                            </option>
                            <option value="select filter">select filter</option>
                            <option value="Marque Ascendant">Marque Ascendant</option>
                            <option value="Marque Descendant">Marque Descendant</option>

                            <option value="Modele Ascendant">Modele Ascendant</option>
                            <option value="Modele Descendant">Modele Descendant</option>

                            <option value="Duree Ascendant">Duree Ascendant</option>
                            <option value="Duree Descendant">Duree Descendant</option>

                            <option value="Numero de serie Ascendant">Numero de serie Ascendant</option>
                            <option value="Numero de serie Descendant">Numero de serie Descendant</option>
                        </select>
                        <input type="submit" class="submit_filter" name="submit_filter" value="Filter">
                    </form>
                </div>
                <!-- ========================= fin filter select ==================== -->
            </div>

            <!-- ======================= Ajouter une trotinette boutton ================== -->
            <div class="cardBox">
                <a href="add_trotinettes.php" style="text-decoration:none;">
                    <div class="card">
                        <div>
                            <div class="numbers">Ajouter</div>
                            <div class="cardName">une trotinette</div>
                        </div>

                        <div class="iconBx">
                            <img src="../assets/imgs/trottinette.png" class="trotinette-ajouter">
                        </div>
                    </div>
                </a>
            </div>



            <!-- ================ afficher la liste des trotinettes dans un tableau ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Trotinettes / Liste</h2>
                    </div>

                    <table id="liste-trotinette">
                        <thead>
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
                                        <a class="status delivered"
                                            href="update_trotinettes.php?id_location=<?= $trotinettes['id_location']; ?>">Update</a>
                                    </td>
                                    <td>
                                        <a class="status return"
                                            href="delete_trotinettes.php?id_location=<?= $trotinettes['id_location']; ?>">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="../assets/js/main.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>