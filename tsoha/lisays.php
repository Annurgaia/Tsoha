<?php

// yhteyden muodostus tietokantaan
include("yhteys.php");

// kyselyn suoritus
$kysely = $yhteys->prepare("INSERT INTO reseptit (nimi, kuvaus, resepti, raakaaineet) VALUES (?, ?)");
$kysely->execute(array($_POST["nimi"], $_POST["kuvaus"]));

// lis�tyn rivin id:n selvitys
$id = $yhteys->lastInsertId("tuetteet_id_seq");
echo "Uuden tuotteen id: $id";

?>
