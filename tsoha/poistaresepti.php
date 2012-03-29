<?php
//poistetaan ko. resepti kannasta

// yhteyden muodostus tietokantaan
try {
    $yhteys = new PDO("pgsql:host=localhost;dbname=annahiet",
                      "annahiet", "eb7e53f691791852");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$nimi = $_GET[nimi];

// kyselyn suoritus
$kysely = $yhteys->prepare("DELETE FROM resepti WHERE nimi like '$nimi' ");
$kysely->execute();

//$URL="index.html";
//header ("Location: $URL");
echo 'resepti poistettu.. siirry etusivulle';
echo ' <a href= "index.html>etusivulle</a>';

// lisätyn rivin id:n selvitys
//$id = $yhteys->lastInsertId("tuotteet_id_seq");
//echo "Uuden tuotteen id: $id";

?>

