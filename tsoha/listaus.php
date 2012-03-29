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
$kysely = $yhteys->prepare("SELECT * FROM reseptit");
$kysely->execute();

//Haettujen rivien tulostus
echo "<table border>";
while ($rivi = kysely->fetch()) {
	echo "<tr>";
	echo "<td>" , $rivi["nimi"] , "</td>";
	echo "<td>" , $rivi["kuvaus"] , "</td>";
	echo "</tr>";
}
echo "</table>";

?>
