<?php

//lisätään raaka-aineita tietokantaan samaan tapaan kuin juomiakin. 


// yhteyden muodostus tietokantaan
try {
    $yhteys = new PDO("pgsql:host=localhost;dbname=annahiet",
                      "annahiet", "eb7e53f691791852");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//kysely

$kysely = $yhteys->prepare("INSERT INTO raakaaine (nimi) VALUES (?)");
$kysely->execute(array($_POST["nimi"]));

//tähän vielä redirect halutulle sivulle.

$URL="raakaainelista.php";
header ("Location: $URL");
