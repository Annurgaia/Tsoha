<?php

//lis�t��n raaka-aineita tietokantaan samaan tapaan kuin juomiakin. 


// yhteyden muodostus tietokantaan
include("yhteys.php");

//kysely

$kysely = $yhteys->prepare("INSERT INTO raakaaine (nimi) VALUES (?)");
$kysely->execute(array($_POST["nimi"]));

//t�h�n viel� redirect halutulle sivulle.

$URL="raakaainelista.php";
header ("Location: $URL");
