<?php

//lisätään raaka-aineita tietokantaan samaan tapaan kuin juomiakin. 


// yhteyden muodostus tietokantaan
include("yhteys.php");

//kysely

$kysely = $yhteys->prepare("INSERT INTO raakaaine (nimi) VALUES (?)");
$kysely->execute(array($_POST["nimi"]));

//tähän vielä redirect halutulle sivulle.

$URL="raakaainelista.php";
header ("Location: $URL");
