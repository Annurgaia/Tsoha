<?php
//lisataan juoma
// yhteyden muodostus tietokantaan
include("yhteys.php");

// kyselyn suoritus
$kysely = $yhteys->prepare("INSERT INTO juoma (nimi, alc) VALUES (?, ?)");
$kysely->execute(array($_POST["nimi"], $_POST["alc"]));

//$URL="index.html";
//header ("Location: $URL");
echo 'Juoma lisatty...siirry etusivulle';
echo '<a href="index.php">Etusivu</a>';
?>
