<?php
//lisataan juoma
// yhteyden muodostus tietokantaan
try {
    $yhteys = new PDO("pgsql:host=localhost;dbname=annahiet",
                      "annahiet", "eb7e53f691791852");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// kyselyn suoritus
$kysely = $yhteys->prepare("INSERT INTO juoma (nimi, alc) VALUES (?, ?)");
$kysely->execute(array($_POST["nimi"], $_POST["alc"]));



//$URL="index.html";
//header ("Location: $URL");
echo 'Juoma lisatty.. siirry etusivulle';
echo '<a href="index.html">Etusivu</a>';
 




?>
