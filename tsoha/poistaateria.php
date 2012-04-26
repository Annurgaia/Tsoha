<?php
//poistetaan ateria kannasta

// yhteyden muodostus tietokantaan
include("yhteys.php");
$nimi = $_GET['nimi'];


// kyselyn suoritus
$kysely = $yhteys->prepare("DELETE FROM ateriakokonaisuus WHERE nimi like '$nimi' ");
$kysely->execute();

echo ' Ateriakokonaisuus poistettu...siirry';
echo ' <a href=index.php>etusivulle</a>';
//$URL="index.php";
//header ("Location: $URL");

?>
