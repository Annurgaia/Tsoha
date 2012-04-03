<?php
//poistetaan ateria kannasta

// yhteyden muodostus tietokantaan
include("yhteys.php");
$nimi = $_GET['nimi'];


// kyselyn suoritus
$kysely = $yhteys->prepare("DELETE FROM ateria WHERE nimi like '$nimi' ");
$kysely->execute();


//$URL="index.html";
//header ("Location: $URL");

// lisätyn rivin id:n selvitys
//$id = $yhteys->lastInsertId("tuotteet_id_seq");
//echo "Uuden tuotteen id: $id";

?>
