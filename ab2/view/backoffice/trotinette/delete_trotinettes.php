<?php

include '../../../controlleur/trotinettesC.php';

$trotinettesC = new TrotinettesC();
$trotinettesC->deleteTrotinettes($_GET["id_location"]);
header('Location:trotinette.php');
?>