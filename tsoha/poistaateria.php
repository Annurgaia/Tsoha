<?php
//poistetaan ateria kannasta

// yhteyden muodostus tietokantaan
include("yhteys.php");
$nimi = $_GET['nimi'];


// kyselyn suoritus
$kysely = $yhteys->prepare("DELETE FROM ateriakokonaisuus WHERE nimi like '$nimi' ");
$kysely->execute();


$URL="index.php";
header ("Location: $URL");

?>
