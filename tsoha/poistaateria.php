<?php
//poistetaan ateria kannasta

// yhteyden muodostus tietokantaan
include("yhteys.php");
$nimi = $_GET['nimi'];


// kyselyn suoritus
$kysely = $yhteys->prepare("DELETE FROM ateriakokonaisuus WHERE nimi like '$nimi' ");
$kysely->execute();


//$URL="index.html";
//header ("Location: $URL");

// lis�tyn rivin id:n selvitys
//$id = $yhteys->lastInsertId("tuotteet_id_seq");
//echo "Uuden tuotteen id: $id";

?>
