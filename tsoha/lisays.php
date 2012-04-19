<?php

// yhteyden muodostus tietokantaan
include("yhteys.php");

// kyselyn suoritus
$kysely = $yhteys->prepare("INSERT INTO resepti (nimi, kuvaus, resepti, raakaaineet) VALUES (?, ?)");
$kysely->execute(array($_POST["nimi"], $_POST["kuvaus"]));

// lisätyn rivin id:n selvitys
$id = $yhteys->lastInsertId("tuotteet_id_seq");
echo "Uuden tuotteen id: $id";

?>
