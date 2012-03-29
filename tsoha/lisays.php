<?php

// yhteyden muodostus tietokantaan
try {
    $yhteys = new PDO("pgsql:host=localhost;dbname=annahiet",
                      "annahiet", "eb7e53f691791852");

} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}

$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// kyselyn suoritus
$kysely = $yhteys->prepare("INSERT INTO reseptit (nimi, kuvaus, resepti, raakaaineet) VALUES (?, ?)");
$kysely->execute(array($_POST["nimi"], $_POST["kuvaus"]));

// lisätyn rivin id:n selvitys
$id = $yhteys->lastInsertId("tuetteet_id_seq");
echo "Uuden tuotteen id: $id";

?>
